<?php

namespace App\Models\Luadm;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Karto extends Eloquent
{
    protected $connection = 'luadm';

    protected $table = 'karto';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function studijas()
    {
        return $this->hasOne('App\Models\Luadm\Studijas', 'stud_studkods', 'id');
    }

    public static function getGraduationThesisGrade(int $studkods)
    {
        return Karto::where('stud_studkods', $studkods)
            ->whereNotNull('darb_txt')
            ->whereNotNull('kursa_nosauk_txt')
            ->whereBetween('atzime', ['5', '10'])->first()->atzime;
    }
}