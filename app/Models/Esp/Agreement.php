<?php
namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Agreement extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'agreement';

    protected $primaryKey = 'id';

    protected $fillable = ['person_code', 'agreement_type_id', 'agreement_status'];

    public $sequence = null;

    public $timestamps = null;


    public function agreementAgreementType()
    {
        return $this->hasOne('App\Models\Esp\AgreementType', 'id', 'agreement_type_id');
    }

    public function agreementAgreementStatus()
    {
        return $this->hasOne('App\Models\Esp\Classification', 'id', 'agreement_status');
    }

    public function agreementBpoPakviestiEsign()
    {
        return $this->belongsTo('App\Models\Esp\BpoPakviestiEsign', 'agreement_id', 'id');
    }

    public static function getAgreementUrl(int $agreementId)
    {
        return Agreement::where('id', $agreementId)->first()->php_file_name;
    }

    public function getGeneratedAgreementTemplate()
    {
        $agreementYear = BpoPakviestiEsign::where('agreement_id', $this->id)->first()->metai;

        $templates = [
            1 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_dvikalb_2021',
            2 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_dvikalb_2021',
            5 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_bndr_lt2018',
            7 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_bndr_eng2018',
            8 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_stud_eng',
            10 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_klaus',
            11 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_dvikalb_neform',
            12 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_dvikalb_2021',
            13 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_klaus_eng',
            16 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis2018leu',
            17 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis2018enleu',
            18 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis2018leud',
            19 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis2018enleud',
            20 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis2018dk',
            21 => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis2018endk',
            'default' => 'http://andromeda.vdu.lt:7778/reports/rwservlet?esutartis_dvikalb_2021',
        ];

        if(empty($templates[$this->agreement_type_id]))
        {
            return $templates['default'].'&p_id='.$this->id.'&p_metai='.$agreementYear;
        }

        return $templates[$this->agreement_type_id].'&p_id='.$this->id.'&p_metai='.$agreementYear;
    }

    public function userFileUpload()
    {
        return $this->hasMany('App\Models\Esp\UserFileUpload', 'agreement_id', 'id');
    }

    /**
     * @param $masterInfoId
     * @param $agreement_type
     * @return mixed
     */
    public static function store($masterInfoId, $agreement_type)
    {
        $masterInfo = MasterInfo::where('id', $masterInfoId)->first();
        $agree = new Agreement([
            'person_code' => $masterInfo->person_code,
            'agreement_type_id' => $agreement_type,
            'agreement_status' => 'AS0001'
        ]);

        $agree->save();
        return $agree->id;
    }
}