<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;


class MasterMarks extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'master_marks';

    protected $primaryKey = 'id';

    protected $fillable = ['master_info_id', 'mark', 'subject_coef_id'];

    public $sequence = null;

    public $timestamps = null;

    public function masterInfo()
    {
        return $this->hasOne('App\Models\Esp\MasterInfo', 'id', 'master_info_id');
    }

    public function subjectCoef()
    {
        return $this->hasOne('App\Models\Esp\MasterSubjectCoef', 'id', 'subject_coef_id');
    }


}
