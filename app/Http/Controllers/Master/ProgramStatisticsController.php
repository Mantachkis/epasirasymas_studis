<?php

namespace App\Http\Controllers\Master;


use App\Http\Controllers\Controller;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\ProgramList;
use App\Models\Esp\ProgramStatistics;
use App\Models\Esp\BpoPakviestiEsign;
use App\Models\Luadm\LuserDept;
use App\Models\Esp\MasterRequestList;
use App\Models\Luadm\Strukturv;
use Illuminate\Http\Request;

class ProgramStatisticsController extends Controller
{

    public function getStatisticsReportBaseView()
    {
        if (empty($year)) {
            $year = date('Y');
        }
      
        $countPrograms=ProgramList::where('sp_metai',date('Y'))->count();
        if($countPrograms==0){
             $year = date('Y')-1;
        }
        $stage = MasterStageAdmin::getActiveStage($year);
        return view('magistrai.statisticsReportBase', [
            'faculties' => Strukturv::getFacultyList(),
            'year' => $year,
            'stage' => $stage
        ]);
    }

    public function getStatisticsReportViewFull(int $year, string $faculty, int $stage)
    {

        $programs=[];
        $select = $faculty;
        $faculty = [$faculty];

        if($faculty[0]=='all'){
           $programs=ProgramList::getAllMasterProgramsByStageAndYear($year, $stage);
        }else{
            $programs=ProgramList::getActiveProgramListByYearAndStage($year, $faculty, $stage);
        }

        return view('magistrai.statisticsReportBase', [
            'faculties' => Strukturv::getFacultyList(),
            'year' => $year,
            'stage' => $stage,
            'faculty' => $faculty,
            'select' => $select,
            'programs' => $programs,
        ]);
    }

}
