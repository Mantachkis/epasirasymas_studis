<?php
namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Classification extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'classification';

    protected $primaryKey = 'ID';

    public $sequence = null;

    public $timestamps = null;

    public function classificationClasId()
    {
        return $this->hasOne('App\Models\Esp\Classification', 'classification_id', 'id');
    }

    public static function getCoeficientNameList(){
        return Classification::where('classification_id', 'MT0000')->get();
    }

    public static function getSurnameChangeStatusList(){
        return Classification::where('classification_id', 'PK0000')->get();
    }
}