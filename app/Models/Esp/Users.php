<?php
namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Users extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'esp.users';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function luadmCilveksCkods()
    {
        return $this->hasOne('App\Models\Luadm\Cilveks', 'ckods', 'ckods');
    }

    public function cilveksPersCode()
    {
        return $this->hasOne('App\Models\Luadm\Cilveks', 'pers_kods', 'pers_code');
    }
}