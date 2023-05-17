<?php

namespace App\Models\Esp;

use Illuminate\Database\Eloquent\Collection;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ProgramList extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'program_list';

    public $sequence = null;

    public $timestamps = null;

    public $incrementing = false;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
    /**
     * @var int
     */
    public function masterRequestList(){
        return $this->hasMany('App\Models\Esp\MasterRequestList','pkods','sp_progr_id');
    }

    public function programma(){
        return $this->hasOne('App\Models\Luadm\Programma', 'pkods', 'sp_progr_id');
    }

    public function masterSubjectCoef(){
        return $this->hasMany('App\Models\Esp\MasterSubjectCoef', 'subject_code', 'sp_valst_kodas');
    }
    public static function getActiveProgramListByYearAndStage(?string $year, array $faculties, int $stage){
        if(in_array(array('dept_stkods' => 'll0000000000'), $faculties)){
            return ProgramList::where('sp_metai', $year)
                ->whereIn('sp_priemimas', ['MG_'.$year.'_'.$stage, 'MG_'.$year.'_'.$stage.'PED'])
                ->where('sp_etapas', $stage)
                ->orderBy('sp_progr_pavad')->get();
        } else {
            return ProgramList::whereHas('programma', function($q) use($faculties){
                $q->whereIn('strukturv_stkods', $faculties);
            })->where('sp_metai', $year)
                ->whereIn('sp_priemimas', ['MG_'.$year.'_'.$stage, 'MG_'.$year.'_'.$stage.'PED'])
                ->where('sp_etapas', $stage)
                ->orderBy('sp_progr_pavad')->get();
        }
    }

    public static function getProgramListByYear(?string $year, array $faculties){
        if(in_array(array('dept_stkods' => 'll0000000000'), $faculties)){
            return ProgramList::where('sp_metai', $year)
                ->whereIn('sp_priemimas', ['MG_'.$year.'_1', 'MG_'.$year.'_1PED'])
                ->orderBy('sp_progr_pavad')->get();
        } else {
            return ProgramList::whereHas('programma', function($q) use($faculties){
                $q->whereIn('strukturv_stkods', $faculties);
            })->where('sp_metai', $year)
                ->whereIn('sp_priemimas', ['MG_'.$year.'_1', 'MG_'.$year.'_1PED'])
                ->orderBy('sp_progr_pavad')->get();
        }
    }

    public static function getAllMasterProgramsByStageAndYear(?int $year, int $stage) : Collection {
        return ProgramList::where('sp_metai', $year)
            ->whereRaw("('sp_priemimas' not in (?) OR 'sp_priemimas' is null)", ['MG_'.$year.'_IST'])
            ->where('sp_etapas', $stage)
            ->orderBy('sp_progr_pavad')
            ->get();
    }

    public static function getPkodsByValstCode(?string $valstCode){
        return ProgramList::where('sp_valst_kodas', $valstCode)->first()->sp_progr_id;
    }

    public static function getValstCodeByPkods(?string $pkods){
        return ProgramList::where('sp_progr_id', $pkods)->first()->sp_valst_kodas;
    }

    public static function getProgramName(string $pkods, int $year = null, int $stage = null){
        return ProgramList::where('sp_progr_id', $pkods)
        ->when(!is_null($year), function ($q) use ($year){
            $q->where('sp_metai', $year);
        })->when(!is_null($stage), function ($q) use ($stage) {
            $q->where('sp_etapas', $stage);
        })->first()->sp_progr_pavad ?? '';
    }

    public static function getProgramWithCoefs(?string $programStateCode, ?int $year,?string $pkods){
        if($programStateCode == '6310MX006'){
            return ProgramList::where(['sp_valst_kodas' => $programStateCode, 'sp_metai' => $year,])->with(['masterSubjectCoef' => function($q) use ($year,$pkods){
                $q->with('classification')->where(['year'=> $year,'pkods'=>$pkods]);
            }])->orderBy('sp_progr_pavad')->get();
        }else{
            return ProgramList::where(['sp_valst_kodas' => $programStateCode, 'sp_metai' => $year,])->with(['masterSubjectCoef' => function($q) use ($year){
                $q->with('classification')->where('year', $year);
            }])->orderBy('sp_progr_pavad')->get();
        }

    }

    public static function getProgramListWithCoefs(int $year){
        // imam tik pirmo etapo, kad nesidubliuotu sarasas, nes vistiek koeficientas taikomas per visus etapus
        return ProgramList::where(['sp_metai' => $year, 'sp_etapas' => 1])->with(['masterSubjectCoef' => function($q) use ($year){
            $q->with('classification')->where('year', $year)->distinct('pkods');
        }])->orderBy('sp_progr_pavad')->get();
    }

    public function getProgramCount(){
        return MasterInfo::where('request_year', $this->sp_metai)->whereHas('masterRequestList',  function ($q) {
            $q->where('subject', $this->sp_valst_kodas);
        })->where('stage', $this->sp_etapas)->count();
    }

    public function getProgramEnteredGrades(){
        $total = MasterSubjectCoef::getProgramTotalEnteredGrades($this->sp_valst_kodas, $this->sp_metai, $this->sp_etapas);
        if($total == 0) { return 0; }
        return $total;
    }

    /**
     * @param string $pkods
     * @return bool
     */
    public static function isProgramPed(string $pkods) : bool {
        return ProgramList::where('sp_progr_id', $pkods)->first()->sp_valst_kodas == '6310MX006'; // ped study program country code
    }

    /**
     * @param string $program
     * @return bool
     */
    public static function isProgramCountryCodePed(string $program) : bool {
        return $program == '6310MX006';
    }
    public function countFirstPriorityAplicationsByProgram($programID, $priemimas){
        return MasterRequestList::where(['pkods'=>$programID,'priority_no'=>'1'])->wherehas('masterInfo', function ($q) use($priemimas){
            $q->where('priemimas',$priemimas);
        })->count();
    }

    public function countSignedAplications( $programID,  $financeType,  $priemimas){

        return BpoPakviestiEsign::where(['vdu_pkods'=>$programID,'finansavimas'=>$financeType,'priemimas'=>$priemimas])->wherehas('agreement',function($q){
            $q->where('agreement_status','AS0002');
        })->count();
    }
    public function countTotalSignedAplications( $programID,int $year){
        return BpoPakviestiEsign::where('vdu_pkods',$programID)->where('priemimas','like', '%'.'MG_'.$year.'%')->wherehas('agreement',function($q){
            $q->where('agreement_status','AS0002');
        })->count();
    }
}

