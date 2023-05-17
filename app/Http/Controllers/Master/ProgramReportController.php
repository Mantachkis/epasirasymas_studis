<?php

namespace App\Http\Controllers\Master;

use App\Models\Esp\MasterInfo;
use App\Models\Esp\MasterRequestList;
use App\Models\Esp\MasterStageAdmin;
use App\Models\Esp\ProgramList;
use App\Models\Luadm\LuserDept;
use Illuminate\Database\Eloquent\Collection;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramReportController extends Controller
{
    public function getProgramReportView()
    {
          if (empty($year)) {
            $year = date('Y');
        }
      
        $countPrograms=ProgramList::where('sp_metai',date('Y'))->count();
        if($countPrograms==0){
             $year = date('Y')-1;
        }
        $stage = MasterStageAdmin::getActiveStage($year);
        return view('magistrai.programReportBase', [
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'reportTypes' => self::getReportTypeCollection(),
            'stage' => $stage
        ]);
    }

    public function getProgramReportViewFull(int $year, string $program, int $type, int $stage)
    {
        return view('magistrai.programReportBase', [
            'programs' => ProgramList::getActiveProgramListByYearAndStage($year, LuserDept::getUserFaculties(), $stage),
            'year' => $year,
            'setProgram' => $program,
            'type' => $type,
            'students' => self::getReportList($year, $program, $type, $stage),
            'reportTypes' => self::getReportTypeCollection(),
            'stage' => $stage
        ]);
    }

    public static function getReportList(int $year, string $program, int $type, int $stage)
    {
        switch($type)
        {
            case 1: return self::getApplicantsForProgram($program, $year, $stage); break;
            case 2: return self::getInvitedToProgram($program, $year, $stage); break;
            case 3: return self::getAcceptedToProgram($program, $year, $stage); break;
            default: return null; break;
        }
    }


    public static function getReportTypeCollection()
    {
        return Collect([
            '1' => 'Pateikę dokumentus',
            '2' => 'Pakviesti studentai',
            '3' => 'Priimti studentai'
        ]);
    }
    public static function getApplicantsForProgram(string $program, int $year, int $stage)
    {
        $col = MasterRequestList::with(['masterInfo' => function($q) use ($year){
            $q->where('request_year', $year);
        }])->whereHas('masterInfo', function($q) use ($year, $stage){
            $q->where('request_year', $year)->where('stage', $stage);
        })->when($program != 'l0000', function($q) use ($program){
            return $q->where('pkods', $program);
        })->with(['bpoPakviestiEsign.agreement' => function($q){
            $q->where('agreement_status', 'AS0002');
        }])->orderByDesc('cum_score')->get();
        return self::filterDuplicateEntries($col);
    }

    public static function filterDuplicateEntries(Collection $col)
    {
        foreach($col as $k => $c)
        {
            if($col->where('master_info_id', $c->master_info_id)->where('finance_type', $c->finance_type)->count() > 1)
            {
                if(empty($c->bpoPakviestiEsign))
                {
                    $col->forget($k);
                }
            }
        }
        return $col;
    }

    public static function getInvitedToProgram(string $program, int $year, int $stage)
    {
        $col = MasterRequestList::with(['masterInfo' => function($q) use ($year){
            $q->where('request_year', $year);
        }])->whereHas('masterInfo', function($q) use ($year, $stage){
            $q->where('request_year', $year)->where('stage', $stage);
        })->when($program != 'l0000', function($q) use ($program){
            return $q->where('pkods', $program);
        })->with(['bpoPakviestiEsign.agreement' => function($q){
            $q->where('agreement_status', 'AS0002');
        }])->whereHas('bpoPakviestiEsign')->orderByDesc('cum_score')->get();

        return self::filterDuplicateEntries($col);
    }

    public static function getAcceptedToProgram(string $program, int $year, int $stage)
    {
        $col = MasterRequestList::with(['masterInfo' => function($q) use ($year){
            $q->where('request_year', $year);
        }])->whereHas('masterInfo', function($q) use ($year, $stage){
            $q->where('request_year', $year)->where('stage', $stage);
        })->when($program != 'l0000', function($q) use ($program){
            return $q->where('pkods', $program);
        })->with(['bpoPakviestiEsign.agreement' => function($q){
            $q->where('agreement_status', 'AS0002');
        }])->whereHas('bpoPakviestiEsign.agreement', function ($q)
        {
            $q->where('agreement_status', 'AS0002');
        })->orderByDesc('cum_score')->get();

        return self::filterDuplicateEntries($col);
    }
}
