<?php

namespace App\Models\FileUpload;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class UploadedFiles extends Eloquent
{
    protected $connection = 'file';

    protected $table = 'uploaded_files';

    public $sequence = null;

    public $timestamps = null;

    public function agreementFile()
    {
        return $this->hasOne('App\Models\Esp\Agreement', 'file_name', 'name');
    }
}