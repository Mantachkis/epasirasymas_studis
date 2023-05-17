<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class BpoPakviestiEsign extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'bpo_pakviesti_esign';

    public $sequence = null;

    public $timestamps = null;

    public $incrementing = false;

    public function luadmProgrammaPkods()
    {
        return $this->hasOne('App\Models\Luadm\Programma', 'pkods', 'vdu_pkods');
    }

    public function agreement()
    {
        return $this->hasOne('App\Models\Esp\Agreement', 'id', 'agreement_id');
    }

    public static function getBpoStage(int $stage)
    {
        $stageArr = [
            '1' => 'I',
            '2' => 'II',
            '3' => "III"
        ];
        return $stageArr[$stage];
    }

    public function getAgreementNum($year, $financeType)
    {
        return $this->getFinanceTypeAgreePrefix($financeType).
            '-'.substr($year, -2).'-'
            .str_pad($this->getMasterAgreementMaxNumber($year, $this->getFinanceTypeAgreePrefix($financeType))+1, 4, 0, STR_PAD_LEFT);
    }

    public function getFinanceTypeAgreePrefix($financeType)
    {
        $financeTypeAgreeName = [
            'VF' => 'MVF',
            'VNF' => 'MVNF'
        ];
        return $financeTypeAgreeName[$financeType];
    }

    public function getMasterAgreementMaxNumber($year, $prefex)
    {
        $agreementName = $this->getMaxAgreementNum($year, $prefex);
        if(is_null($agreementName)) { return 0; }

        return substr($agreementName, '-4');
    }

    public function getMaxAgreementNum($year, $prefex)
    {
        return BpoPakviestiEsign::where('metai', $year)
            ->where('stud_sut_nr', 'like', '%'.$prefex.'%')
            ->max('stud_sut_nr');
    }


    public static function stages(int $year)
    {
        return self::select('etapas')->distinct()->where('METAI', $year)->orderBy('etapas', 'desc')->get();
    }

    public static function programs(int $year, int $type)
    {
        return self::with('luadmProgrammaPkods')
            ->select('vdu_pkods', 'lama_kodas')
            ->distinct()
            ->whereHas('agreement', function($q) use ($type){
                $q->where( 'agreement_type_id', $type);
            })
            ->where('metai', $year)
            ->orderBy('lama_kodas', 'asc')->get();
    }

    /**
     * @param $masterReqId
     * @param $masterInfoId
     * @param $agreementId
     */
    public function store($masterReqId, $masterInfoId, $agreementId)
    {
        $masterInfo = MasterInfo::where('id', $masterInfoId)->first();
        $masterReq = MasterRequestList::where('id', $masterReqId)->first();
        $bpo = new BpoPakviestiEsign;

        $tkods = 'B90300';

        if($masterReq->pkods == 'l19145' || $masterReq->pkods == 'l09124' || $masterReq->pkods == 'l09139') { $tkods = 'B90503';}

        $bpo->pavarde = $masterInfo->surname;
        $bpo->vardas = $masterInfo->name;
        $bpo->asmens_kodas = $masterInfo->person_code;
        $bpo->gimimo_data = $masterInfo->getBirthDayFromPersCode();
        $bpo->pirmas_telef = $masterInfo->phone_no;
        $bpo->elpastas = $masterInfo->email;
        $bpo->gyvvieta = $masterInfo->getFullAdress();
        $bpo->valstybe = $masterInfo->identity;
        $bpo->fakultetas = $masterReq->getFacultyName($masterInfo->request_year);
        $bpo->valst_programos_kodas = $masterReq->subject;
        $bpo->programos_pavadinimas = $masterReq->getProgramName($masterInfo->request_year);
        $bpo->finansavimas = $masterReq->finance_type;
        $bpo->konkursinisbalas = $masterReq->cum_score;
        $bpo->metai = $masterInfo->request_year;
        $bpo->etapas = $masterInfo->stage;
        $bpo->agreement_id = $agreementId;
        $bpo->vdu_stud_pakopa_tkods = $tkods;
        $bpo->vdu_pkods = $masterReq->pkods;
        $bpo->vdu_sut_sablon = '2KSTUD2018';
        $bpo->asmensdok = $masterInfo->document_type;
        $bpo->asmensdoknr = $masterInfo->passport_no;
        $bpo->asmensdok_gal_iki = $masterInfo->passport_date;
        $bpo->priemimas = 'MG_'.date('Y').'_'.$masterInfo->stage;
        $bpo->master_req_id = $masterReq->id;

        $bpo->save();
    }
    public function report()
    {
        return $this->belongsTo(ProgramStatistics::class, 'vdu_pkods','pkods');
    }

}
