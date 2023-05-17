<?php

namespace App\Models\Ekp;

use App\Models\Luadm\Tips;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ApplicationStructure extends Eloquent
{
    protected $connection = 'ekp';

    protected $table = 'application_structure_line';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function application()
    {
        return $this->hasOne('App\Models\Ekp\Application', 'id', 'application_id');
    }

    public function userApplicationLine()
    {
        return $this->belongsTo('App\Models\Ekp\UserApplicationLine', 'application_classification_id', 'classification_id');
    }

    public function classification()
    {
        return $this->hasOne('App\Models\Ekp\Classification', 'id', 'application_classification_id');
    }

    public static function getApplicationFields(int $applicationId)
    {
        return ApplicationStructure::with('classification')
            ->whereNotIn('type', ['FTYP0001', 'FTYP0010', 'FTYP0011'])
            ->where('application_id', $applicationId)
            ->whereNull('status')->orderBy('order_by')->get();
    }

    public static function getApplicationMultichoiceFields(int $applicationId)
    {
        return ApplicationStructure::with('classification')
            ->whereNotIn('type', ['FTYP0001', 'FTYP0010', 'FTYP0011'])
            ->where('application_id', $applicationId)
            ->whereNull('status')
            ->whereNotNull('dropdown_data_source')
            ->get();
    }

    public static function getApplicationTextAnswerFields(int $applicationId)
    {
        return ApplicationStructure::with('classification')
            ->whereNotIn('type', ['FTYP0001', 'FTYP0010', 'FTYP0011'])
            ->where('application_id', $applicationId)
            ->whereNull('status')
            ->whereNull('dropdown_data_source')
            ->get();
    }

    public function getClassificationTipsOptions()
    {
        return Tips::where('tips_tkods', $this->dropdown_data_source)->orderBy('tnosauk')->get();
    }

    public function getSelectClassificatorOptions()
    {
        return Classification::where('classification_id', $this->dropdown_data_source)->get();
    }

    public function getClassificatorText(string $lang, ?string $classificator)
    {
        if(empty($classificator))
            return null;

        $lang == 'en' ? $field = optional(Classification::where('id', $classificator)->first())->text_en : $field = optional(Classification::where('id', $classificator)->first())->text_lt;

        if(empty($field)){
            $lang == 'en' ? $field = optional(Tips::where('tkods', $classificator)->first())->tnosauka : $field = optional(Tips::where('tkods', $classificator)->first())->tnosauk;
        }
        if(empty($field)){
            return $classificator;
        }
        else{
            return $field;
        }
    }

    public static function getApplicationFileList(int $appId){
        return ApplicationStructure::with('classification')
            ->where(['type' => 'FTYP0006', 'application_id' => $appId])
            ->whereNull('status')->get();
    }

    public function getStudySubjects(){
        return array(
            'INFO0064', 'INFO0065', 'INFO0066', 'INFO0123', 'INFO0124', 'INFO0137', 'INFO0138', 'INFO0139',
            'INFO0140', 'INFO0141', 'INFO0545', 'INFO0546', 'INFO0547', 'INFO0548'
        );
    }

    public function getStudySubjectClassificators(){
        return array('INFO0064', 'INFO0065', 'INFO0066', 'INFO0123', 'INFO0124');
    }
}

