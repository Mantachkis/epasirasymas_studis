<?php

namespace App\Http\Controllers;

use App\Models\Ekp\Application;
use App\Models\Ekp\ApplicationStructure;
use App\Models\Ekp\UserApplication;
use App\Models\Ekp\UserApplicationLine;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\MasterSubjectCoef;
use App\Models\Esp\ProgramList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserApplicationDisplayController extends Controller
{
    public function getApplicationFieldView(int $userApplicationId = null, Request $req)
    {
        if(empty($userApplicationId))
        {
            $userApplicationId = UserApplication::getUserAppIdFromMasterInfoId($req->get('masterInfoId'));
            $applicationId = UserApplication::getAppIdFromUserAppId($userApplicationId);

            $year = Application::where('id', $applicationId)->first()->year;
            $program = MasterSubjectCoef::getCoefClassificators(ProgramList::getValstCodeByPkods($req->get('program')), $year,$req->get('program')??null);

            return view('layouts.studentInfoView', [
                'applicationFields' => ApplicationStructure::getApplicationFields($applicationId),
                'userFields' => UserApplicationLine::getUserApplicationInfo($userApplicationId),
                'userInfo' => UserApplication::getUserInfo($userApplicationId),
                'lang' => 'lt',
                'appId' => $applicationId,
                'program' => $program,
                'templateId' => Application::getTemplateId($applicationId),
                'year' => $year,
                'stage' => !ProgramList::isProgramCountryCodePed($program->first()->subject_code) ? $stage = MasterStageAdmin::getActiveStage($year) : $stage = MasterStageAdmin::getActiveStage($year).'PED'
            ]);
        }

    }

    /**
     * @param UserApplication $id
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserApplication $id, Request $req){
        $it = 0;
        foreach($req->all() as $key => $line){
            if($it < 2){
                $it++;
                continue;
            } else {
                $appLine = UserApplicationLine::where('user_application_id', $id->id)->where('classification_id', $key)->first();
                $appLine->answer_id = $line;
                $appLine->save();
            }
        }
        $binds = ['p_user_app_id' => $id->id];

        /** Padaromas atnaujinimas esp lentoje kadangi siuo metu toje funkcijoje yra subindinti laukai
         *  Ateityje galbut perdaryti binda ant laravel arba isvis ismesti esp.master_info lentoje info nes turime viska anketoje*/
        DB::executeProcedure('esp.esp_dmls.ins_from_ekp_to_esp', $binds);

        return redirect()->back()->with('alert-success', 'Informacija atnaujinta');
    }
}
