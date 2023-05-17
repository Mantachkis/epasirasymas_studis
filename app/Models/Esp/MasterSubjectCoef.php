<?php

namespace App\Models\Esp;

use App\Models\Luadm\Programma;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;


class MasterSubjectCoef extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'master_subject_coef';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;



    public function classification()
    {
        return $this->hasOne('App\Models\Esp\Classification', 'id', 'mark_code');
    }

    public function programma(){
        return $this->hasMany('App\Models\Luadm\Programma', 'gkods', 'subject_code');
    }

    public function masterMarks(){
        return $this->hasMany('App\Models\Esp\MasterMarks', 'subject_coef_id', 'id');
    }

    public static function getCoefClassificators(string $studyProgram, int $year,string $pkods)
    {
        if(MasterSubjectCoef::where('pkods', $pkods)->where('year', $year)->get()->isNotEmpty())
        {
            return MasterSubjectCoef::where('pkods', $pkods)->where('year', $year)->with('classification')->orderBy('id')->get();}
        else{
            return MasterSubjectCoef::with('classification')
                ->where('subject_code', $studyProgram)
                ->where('year', $year)
                ->orderBy('id')
                ->get();
        }

    }

    public static function getSubjectCoefs(string $program, int $year)

    {
        if(MasterSubjectCoef::where('pkods', $program)->where('year', $year)->get()->isNotEmpty())
        {

            return MasterSubjectCoef::where('pkods', $program)->where('year', $year)->with('classification')->get();
        }else{
            $valstCode = ProgramList::getValstCodeByPkods($program);
            return MasterSubjectCoef::where('subject_code', $valstCode)->where('year', $year)->with('classification')->get();
        }

    }

    public static function getProgramTotalEnteredGrades($programCode, $year, $stage){
        return MasterSubjectCoef::where('subject_code', $programCode)->where('year', $year)
        ->withCount(['masterMarks' => function ($q) use ($stage){
            $q->whereHas('masterInfo', function ($qq) use ($stage){
                $qq->where('stage', $stage);
            });
        }])->first()->master_marks_count ?? 0;
    }

}
