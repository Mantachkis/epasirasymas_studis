<?php

namespace App\Models\Esp;

use Illuminate\Support\Facades\DB;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class UserFileUpload extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'user_file_upload';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function agreement()
    {
        return $this->hasOne('App\Models\Esp\Agreement', 'id', 'agreement_id');
    }

    public function userFileUploadNextId()
    {
        return intval(DB::connection($this->connection)->select('select user_file_upload_seq.nextval from dual')[0]->nextval);
    }
}
