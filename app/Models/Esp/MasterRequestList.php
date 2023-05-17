<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class MasterRequestList extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'master_request_list';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function masterInfo()
    {
        return $this->hasOne('App\Models\Esp\MasterInfo', 'id', 'master_info_id');
    }

    public function bpoPakviestiEsign()
    {
        return $this->hasOne('App\Models\Esp\BpoPakviestiEsign', 'master_req_id', 'id');
    }

    public function bpoProgramos()
    {
        return $this->hasOne('App\Models\Luadm\BpoProgramos', 'pp_vdu_pkods', 'pkods');
    }

    public static function getInvitedStudentList(int $year, string $programName, int $stage)
    {
        $collection =  MasterRequestList::whereHas('masterInfo', function ($q) use($year, $stage){
            $q->where(['request_year' => $year, 'stage' => $stage, 'request_status' => 'RS0002']);
        })->with(['bpoPakviestiEsign' => function($q){
            $q->orderByDesc('agreement_id');
        }])->where([
            'pkods' => $programName,
            'mark' => 'Y',
        ])->orderBy('finance_type')->orderBy('place_final')->get();
        foreach($collection as $key => $coll)
        {
            if(empty($coll->bpoPakviestiEsign))
            {
                if(count($collection->where('master_info_id', $coll->master_info_id)->where('pkods', $coll->pkods)->all()) > 1)
                {
                    if(empty($coll->bpoPakviestiEsign))
                    {
                        $collection->forget($key);
                    }
                }
            }

        }

        return $collection;
    }
    public static function getUninvitedStudentList(int $year, string $programName, int $stage)
    {
        $collection =  MasterRequestList::whereHas('masterInfo', function ($q) use ($year, $stage) {
            $q->where(['request_year' => $year, 'stage' => $stage, 'request_status' => 'RS0002']);
        })->with(['bpoPakviestiEsign' => function($q){
            $q->orderByDesc('agreement_id');
        }])->where('pkods',$programName)
            ->whereNull('mark')
            ->whereNotNull('subject')
            ->orderByDesc('cum_score')
            ->orderBy('priority_no')
            ->get();

        $invitedCollection = self::getInvitedStudentList($year, $programName, $stage);

        foreach($collection as $key => $coll)
        {
            if(empty($coll->bpoPakviestiEsign))
            {
                if(count($invitedCollection->where('master_info_id', $coll->master_info_id)->where('pkods', $coll->pkods)->all()) > 0)
                {
                    $collection->forget($key);
                }
            }
            if(count($collection->where('master_info_id', $coll->master_info_id)->where('pkods', $coll->pkods)->all()) > 1)
            {
                if(empty($coll->bpoPakviestiEsign))
                {
                    $collection->forget($key);
                }
            }
        }


        return $collection;
    }

    public static function getStudentAgreement(int $reqId, string $program, int $year, int $agreementType, int $stage)
    {
        $stageBpo = BpoPakviestiEsign::getBpoStage($stage);

        return BpoPakviestiEsign::where(['master_req_id' => $reqId, 'vdu_pkods' => $program, 'metai' => $year, 'etapas' => $stageBpo])
            ->whereHas('agreement', function ($q) use ($agreementType){
                $q->where('agreement_type_id', $agreementType)->whereNotIn('agreement_status', ['AS0003', 'AS0004']);
        })->first();
    }


    public function checkIfDuplicate()
    {
        return count(MasterRequestList::where(['master_info_id' => $this->master_info_id, 'pkods' => $this->pkods, 'finance_type' => $this->finance_type])->get()) > 1;
    }
    public function checkIfApplicationWasAccepted()
    {
        return count(MasterRequestList::where(['master_info_id' => $this->master_info_id, 'mark' => 'Y'])->where('pkods', '!=' , $this->pkods)->get()) != 0;
    }

    public function checkIfAgreementCanTimeout()
    {
        return count(MasterRequestList::whereHas('bpoPakviestiEsign.agreement', function($q)
        {
            $q->where('agreement_status' , 'AS0001');
        })->whereHas('bpoPakviestiEsign', function ($q)
        {
            $q->where('master_req_id', $this->id);
        })->get()) != 0;
    }

    public function getAgreement()
    {
        $coll = BpoPakviestiEsign::with(['agreement' => function($q)
        {
            $q->whereIn('agreement_status', ['AS0001', 'AS0002']);
        }])->where('master_req_id', $this->id)->whereHas('agreement')->get();
        foreach($coll as $key => $col)
        {
            if (is_null($col->agreement))
            {
               $coll->forget($key);
            }
        }
        return $coll->first();
    }

    public static function updateFinanceType($id, $financeType)
    {
        $req = MasterRequestList::where('id', $id)->first();
        $req->finance_type = $financeType;
        $req->save();
    }

    public function getFacultyName($year)
    {
        $app = self::with(['bpoProgramos' => function($q) use ($year) {
            $q->where('pp_metai', $year);
        }])->where('id', $this->id)->first();
        return $app->bpoProgramos->pp_fakultetas;
    }

    public function getProgramName($year)
    {
        $app = self::with(['bpoProgramos' => function($q) use ($year) {
            $q->where('pp_metai', $year);
        }])->where('id', $this->id)->first();
        return explode('[', $app->bpoProgramos->pp_pavad)[0];
    }
}