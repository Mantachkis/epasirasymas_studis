<?php

namespace App\Models\Luadm;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Cilveks extends Eloquent
{
    protected $connection = 'luadm';

    protected $table = 'luadm.cilveks';

    protected $primaryKey = 'ckods';

    public $sequence = null;

    public $timestamps = null;

    /**
     * Lytis
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cilveksTipsDzimums()
    {
        return $this->hasOne('App\Models\Luadm\Tips', 'tkods', 'tips_dzimums');
    }

    /**
     * Pilietybė
     */
    public function cilveksTipsPilsoniba()
    {
        return $this->hasOne('App\Models\Luadm\Tips', 'tkods', 'tips_pilsoniba');
    }


    public function studijas()
    {
        return $this->hasMany('App\Models\Luadm\Studijas', 'cilveks_ckods', 'ckods');
    }
    /**
     * get personal id codes from cilveks ckods field, one ckods should have only one unique personal code
     * @param $ckods
     * @return mixed
     */
    public static function getPersCodeFromCkods($ckods)
    {
        return Cilveks::where('ckods', $ckods)->get()->first()->pers_kods;
    }

    public static function getCkodsFromPersCode($perscode)
    {
        return Cilveks::where('pers_kods', $perscode)->get()->first()->ckods;
    }

    public function espUsers()
    {
        return $this->hasOne('App\Models\Esp\Users', 'ckods', 'ckods');
    }

    public function surnameChanges(){
        return $this->hasMany('App\Models\Esp\SurnameChanges', 'ckods', 'ckods');
    }
}