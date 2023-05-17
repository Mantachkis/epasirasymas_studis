<?php

namespace App\Http\Controllers\Master;

use App\Models\Ekp\UserApplication;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\ProgramList;
use App\Models\Luadm\LuserDept;
use function GuzzleHttp\Psr7\str;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ReportsController extends Controller
{
    public function getApplicantsMainView()
    {
        return view('magistrai.applicantReportsMain');
    }

    public function getMasterApplicantJsonData(Request $req)
    {
        return self::getMasterApplicantDatatableJson($req);
    }

    public static function getMasterApplicantList(Request $req)
    {
       
            $currYear = date('Y');
        
      
        $countPrograms=ProgramList::where('sp_metai',date('Y'))->count();
        if($countPrograms==0){
            $currYear = date('Y')-1;
        }
       

        $req->get('startDate')== null ? $startDate = "$currYear-05-01" : $startDate = $req->get('startDate');

        $req->get('endDate')== null ? $endDate = date('Y-m-d') : $endDate = $req->get('endDate');

        $req->get('stage') == null ? $stage = MasterStageAdmin::getActiveStage(date('Y', strtotime($startDate))) : $stage = $req->get('stage');

        $appId = $req->get('appId') == null ? 2 : $req->get('appId');

        $totalCollection = new Collection();
        $collectionArr = [];
        $tempEndDate = date('Y-m-d', strtotime($startDate.' +1 days'));
        $tempStartDate = $startDate;
        while(date('Y-m-d', strtotime($tempEndDate)) <= date('Y-m-d', strtotime($endDate))){

            $collection = UserApplication::with(['userApplicationLine.answerClass' => function ($q){
                $q->select('id', 'text_lt');
            }])->with(['userApplicationLine.fieldClass' => function ($q){
                $q->select('id', 'text_lt');
            }])->with(['user' => function ($q){
                $q->select('id', 'name', 'surname', 'email');
            }])->with(['user.luadmCilveksCkods' => function($q){
                $q->select('ckods', 'vards', 'uzvards');
            }])
                ->whereBetween('submit_date', [$tempStartDate, date('Y-m-d', strtotime($tempEndDate.' +1 day'))])
                ->where('application_id', UserApplication::getApplicationIdFromMasterStage($stage, date('Y', strtotime($startDate)), $appId ))
                ->whereNotNull('user_id')->orderByDesc('submit_date')->get();

            $collectionArr[] = $collection;
            $tempStartDate = $tempEndDate;
            $tempEndDate = date('Y-m-d', strtotime($tempStartDate.' +1 days'));

        }

        foreach($collectionArr as $arr){
            $totalCollection = $totalCollection->merge($arr);
        }
        return $totalCollection;
    }

    public static function getMasterApplicantDatatableJson(Request $req)
    {
        $col = self::getMasterApplicantList($req);

        $d = [];
        foreach($col as $k => $c)
        {
            if(empty($c->userApplicationLine->where('classification_id', 'INFO0028')->first()->answer_id)) {
                $educationPlace = $c->userApplicationLine->where('classification_id', 'MLT0006')->first()->answerClass->text_lt ?? '';
            } else {
                $educationPlace = $c->userApplicationLine->where('classification_id', 'INFO0028')->first()->answer_id;
            }
            $year = date('Y',strtotime($c->submit_date)); // reikalinga, kad trauktu programos pavadinima tu metu kuriais pateikta prasymas
            $arr = new \stdClass();
            $arr->name = empty($c->user->luadmCilveksCkods) ? $c->user->name : $c->user->luadmCilveksCkods->vards;
            $arr->surname = empty($c->user->luadmCilveksCkods) ? $c->user->surname : $c->user->luadmCilveksCkods->uzvards;
            $arr->email = empty($c->user->email) ? $c->userApplicationLine->where('classification_id' , 'INFO0005')->first()->answer_id : $c->user->email ?? '';
            $arr->submit_date = date('Y-m-d',strtotime($c->submit_date));
            $arr->education_place = $educationPlace ?? '';
            $arr->education_year = $c->userApplicationLine->where('classification_id', 'INFO0027')->first()->answer_id ?? "''";
            $arr->first_program = ProgramList::getProgramName($c->userApplicationLine->where('classification_id', 'INFO0064')->first()->answer_id ?? '', $year);
            $arr->first_finance =  $c->userApplicationLine->where('classification_id', 'INFO0137')->first()->answerClass->text_lt ?? '';
            $arr->second_program =  ProgramList::getProgramName($c->userApplicationLine->where('classification_id', 'INFO0065')->first()->answer_id ?? '', $year);
            !empty($arr->second_program) ? $arr->second_finance =  $c->userApplicationLine->where('classification_id', 'INFO0138')->first()->answerClass->text_lt ?? '' : $arr->second_finance = '';
            $arr->third_program =  ProgramList::getProgramName($c->userApplicationLine->where('classification_id', 'INFO0066')->first()->answer_id ?? '', $year);
            !empty($arr->third_program) ?  $arr->third_finance =  $c->userApplicationLine->where('classification_id', 'INFO0139')->first()->answerClass->text_lt ?? '' : $arr->third_finance = '';
            $arr->fourth_program = ProgramList::getProgramName($c->userApplicationLine->where('classification_id', 'INFO0123')->first()->answer_id ?? '', $year);
            !empty($arr->fourth_program) ? $arr->fourth_finance = $c->userApplicationLine->where('classification_id', 'INFO0140')->first()->answerClass->text_lt ?? '' : $arr->fourth_finance = '';
            $d[] = $arr;
        }
        $data['data'] = $d;
        return json_encode($data);
    }
}
