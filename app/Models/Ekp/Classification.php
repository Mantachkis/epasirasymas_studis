<?php

namespace App\Models\Ekp;

use App\Models\Luadm\Tips;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Classification extends Eloquent
{
    protected $connection = 'ekp';

    protected $table = 'application_classification';

    protected $primaryKey = 'ID';

    public $sequence = null;

    public $timestamps = null;

    public static function getSelectClassificatorOptions(string $classificatorId)
    {
        return Classification::where('classification_id', $classificatorId)->get();
    }


}
