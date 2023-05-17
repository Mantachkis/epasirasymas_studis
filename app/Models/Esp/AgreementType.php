<?php
namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class AgreementType extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'agreement_type';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public static function types()
    {
        return self::where('not_active', null)->orderBy('id', 'asc')->get();
    }

}