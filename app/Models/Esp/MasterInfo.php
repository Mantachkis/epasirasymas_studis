<?php

namespace App\Models\Esp;

use App\Models\Ekp\UserApplication;
use Illuminate\Pagination\Paginator;
use Nexmo\Call\Collection;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class MasterInfo extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'master_info';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function masterRequestList()
    {
        return $this->hasMany('App\Models\Esp\MasterRequestList', 'master_info_id', 'id');
    }

    public function masterMarks()
    {
        return $this->hasMany('App\Models\Esp\MasterMarks', 'master_info_id', 'id');
    }

    public function setStatus(string $status)
    {
        $this->request_status = $status;
    }

    public static function getStudentList(int $year, string $programName, int $stage, int $pageSize)
    {
        return MasterInfo::whereHas('masterRequestList', function($q) use ($programName)
        {
            $q->where('pkods', $programName);
        })->with('masterRequestList')->where(['request_year' => $year, 'stage' => $stage])->paginate($pageSize);
    }

    public function getEnteredGradeAverage(string $program = null, string $valstCode = null)
    {$avg = 0;

        if (($valstCode ?? ProgramList::getValstCodeByPkods($program)) == '6310MX006' &&
            MasterMarks::whereHas('subjectCoef', function ($q) use ($program) {
                $q->where('pkods', $program);
            })->where('master_info_id', $this->id)->get()->isNotEmpty())
        {
        $grades=  MasterMarks::whereHas('subjectCoef', function ($q) use ($program)
        {
            $q->where('pkods', $program);
        })->where('master_info_id', $this->id)->get();

    }elseIf(($valstCode ?? ProgramList::getValstCodeByPkods($program)) == '6310MX006' && MasterMarks::whereHas('subjectCoef', function ($q) use ($program) {$q->where('pkods', $program);})->where('master_info_id', $this->id)->get()->isEmpty()){
            return $avg;
    }else{
        $grades = MasterMarks::whereHas('subjectCoef', function($q) use ($program, $valstCode)
        {
            $q->where('subject_code', $valstCode ?? ProgramList::getValstCodeByPkods($program));
        })->with('subjectCoef')->where('master_info_id', $this->id)->get();

    }


        foreach($grades as $grade)
        {
            $avg += $grade->mark * $grade->subjectCoef->coef;
        }
        return $avg;
    }

    public function getStudentProgramGrades(string $program)
    {
        if(ProgramList::getValstCodeByPkods($program)=='6310MX006' && MasterMarks::whereHas('subjectCoef', function ($q) use ($program) {$q->where('pkods', $program);})->where('master_info_id', $this->id)->get()->isNotEmpty())
        {
            return  MasterMarks::whereHas('subjectCoef', function ($q) use ($program) {$q->where('pkods', $program);})->where('master_info_id', $this->id)->get();

        }elseIf( ProgramList::getValstCodeByPkods($program)=='6310MX006' && MasterMarks::whereHas('subjectCoef', function ($q) use ($program) {$q->where('pkods', $program);})->where('master_info_id', $this->id)->get()->isEmpty()){
            return null;
        }

        return MasterMarks::whereHas('subjectCoef', function ($q) use ($program)
        {
            $q->where('subject_code', ProgramList::getValstCodeByPkods($program));
        })->where('master_info_id', $this->id)->get();
    }

    public function isPersCodeValid($persCode) // TO DO pakeisti kai prasides nauji asmens kodai
    {
        return strlen($persCode) == 11 && in_array(substr($persCode, 0, 1), [3, 4, 5, 6]);
    }

    public function getBirthDayFromPersCode()
    {
        $persCode = $this->person_code;
        $fullYear = $fullYear = '19'.substr($persCode, 1, 2);

        substr($persCode, 1, 2) >= date('y') ?: $fullYear = '20'.substr($persCode, 1, 2);

        if(self::isPersCodeValid($persCode)){
            return $fullYear.'-'.substr($persCode, 3, 2).'-'.substr($persCode, 5, 2);
        } else {
            return '';
        }
    }

    public function getFullAdress()
    {
        return $this->street.' - '.$this->house_no.' - '.$this->flat_no.' , '.$this->post_no.' , '.$this->city;
    }

    public function getCountry()
    {
        $app = UserApplication::where('master_info_id', $this->master_info_id)
            ->with('userApplicationLine.answerTips')
            ->first();
        return $app->userApplicationLine->where('classification_id', 'MLT0002')->first()->answerTips->tnosauk;
    }

}
