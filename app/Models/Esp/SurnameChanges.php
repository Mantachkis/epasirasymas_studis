<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class SurnameChanges extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'esp.surname_changes';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function classification(){
        return $this->hasOne('App\Models\Esp\Classification', 'id', 'status');
    }
}
