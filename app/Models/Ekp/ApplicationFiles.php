<?php

namespace App\Models\Ekp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class ApplicationFiles extends Eloquent
{
    protected $connection = 'ekp';

    protected $table = 'application_files';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;
}