<?php

namespace App\Http\Controllers\Master;

use App\Http\Requests\GradeEnterRequest;
use App\Http\Services\DataValidationService;
use App\Models\Ekp\ApplicationStructure;
use App\Models\Ekp\UserApplication;
use App\Models\Ekp\UserApplicationLine;
use App\Models\Esp\MasterInfo;
use App\Models\Esp\MasterMarks;
use App\Models\Esp\MasterRequestList;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\MasterSubjectCoef;
use App\Models\Esp\ProgramList;
use App\Http\Controllers\Controller;
use App\Models\Luadm\LuserDept;
use GrahamCampbell\Flysystem\FlysystemManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradeEnterController extends Controller
{
    protected $flysystem;
    /**
     * @var DataValidationService
     */
    private $validationService;

    public function __construct(FlysystemManager $flysystem, DataValidationService $validationService)
    {
        $this->flysystem = $flysystem;
        $this->validationService = $validationService;
    }

    public function getMainView()
    {
        $stage = MasterStageAdmin::getActiveStage(date('Y'));
        return view('magistrai/gradeEnterBase',[
            'programs' => ProgramList::getActiveProgramListByYearAndStage(date('Y'), LuserDept::getUserFaculties(), $stage),
            'year' => date('Y'),
            'subsite' => 'balu_suvedimas',
            'stage' => $stage
        ]);
    }

    public function getMainViewWithYear(int $year)
    {
        $stage = MasterStageAdmin::getActiveStage($year);
        return view('magistrai/gradeEnterBase',[
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'subsite' => 'balu_suvedimas',
            'stage' => $stage
        ]);
    }

    /**
     * @param int $year
     * @param string $program
     * @param string $stage
     * @return Factory|View
     */
    public function getMainViewFull(int $year, string $program, string $stage) : View
    {
       // dd($program);
        $studList = MasterInfo::getStudentList($year, $program, $stage, 15);
        return view('magistrai/gradeEnterBase',[
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'students' => $studList,
            'program' => $program,
            'stage' => !ProgramList::isProgramPed($program) ? $stage : $stage = $stage.'PED',
            'coefs' => MasterSubjectCoef::getSubjectCoefs($program, $year),
            'subsite' => 'balu_suvedimas',
            'badStudents' => $this->getIncorrectDataStudents($studList)
        ]);
    }

    /**
     * @param $masterId
     * @return View
     */
    public function getFileUploadView($masterId): View {
        $userApp = UserApplication::getUserAppIdFromMasterInfoId($masterId);
        $appId = UserApplication::getAppIdFromUserAppId($userApp);
        return view('magistrai.partials.fileAddModalContent', [
            'userAppId' => $userApp,
            'fileList' => ApplicationStructure::getApplicationFileList($appId)
        ]);
    }

    /**
     * @param UserApplication $userApp
     * @param Request $req
     * @return RedirectResponse
     */
    public function upload(UserApplication $userApp, Request $req) : RedirectResponse{
        $userAppLine = UserApplicationLine::where([
            'user_application_id' => $userApp->id,
            'classification_id' => $req->get('file-type')
        ])->first();

        if(is_null($userAppLine)){
            $userAppLine = new UserApplicationLine;
            $userAppLine->user_application_id = $userApp->id;
            $userAppLine->classification_id = $req->get('file-type');
        }

        $file = $req->file('file');
        $randomName = str_random(20);
        $stream = fopen($file->getRealPath(), 'r+');
        $this->flysystem->writeStream('app_uploads/'.$randomName.'.'.$file->guessExtension(), $stream);
        fclose($stream);

        $userAppLine->submit_date = date('Y-m-d');
        $userAppLine->answer_id = 'app_uploads/'.$randomName.'.'.$file->guessExtension();
        $userAppLine->save();
        return redirect()->back()->with('alert-success', 'Failas įkeltas');
    }

    /**
     * @param $id
     * @param GradeEnterRequest $req
     * @return RedirectResponse
     */
    public function gradeSubmit($id, GradeEnterRequest $req) : RedirectResponse{
      //  dd($id,$req->all());
        $pkods=null;
        $valstCode = $req->get('valst-code');
        foreach($req->except(['_token', 'valst-code'])  as $key => $grade){
             $mark = MasterMarks::updateOrCreate([
                 'master_info_id' => $id,
                 'subject_coef_id' => explode('-', $key)[1]
             ]);
             $mark->mark = str_replace(',', '.', $grade);
             $mark->save();
             $pkods=MasterSubjectCoef::where('id',explode('-', $key)[1])->first()->pkods??null;


        }

        $r = MasterRequestList::where(['master_info_id' => $id, 'subject' => $valstCode])->get();
        if($pkods!=null){
            $r = MasterRequestList::where(['master_info_id' => $id, 'subject' => $valstCode,'pkods'=>$pkods])->get();
        }
        $master = MasterInfo::where('id', $id)->first();

        foreach($r as $request) {

            $request->cum_score = number_format($master->getEnteredGradeAverage($pkods, $valstCode), 4);
            $request->save();
        }


        $master->setStatus('RS0002');
        $master->save();

        $userApp = UserApplication::where('master_info_id', $id)->first();
        $userApp->app_status = 'AS0003';
        $userApp->save();

        return redirect()->back();
    }

    /**
     * @param $students
     * @return array
     */
    public function getIncorrectDataStudents($students) : array {
        $studList = [];
        foreach($students as $stud) {
            $trig = true;
            $this->validationService->checkIfNameOrSurnameNotFullyUpperFirst($stud->name) ?: $trig = false;
            //$this->validationService->checkIfNameOrSurnameNotFullyUpperFirst($stud->surname) ?: $trig = false;
            $this->validationService->isPassportNumberLengthCorrect($stud->passport_no) ?: $trig = false;
            $this->validationService->isPassportExpiryDateCorrect($stud->passport_date) ?: $trig = false;
            $this->validationService->isEmailFormatCorrect($stud->email) ?: $trig = false;
            $this->validationService->isPersonCodeLengthCorrect($stud->person_code) ?: $trig = false;

            if(!$trig && !in_array($stud->id, $studList)) {
                $studList[] = $stud->id;
            }
        }

        return $studList;
    }
}
