<?php
namespace App\Models\Luadm;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Programma extends Eloquent
{
    protected $connection = 'luadm';

    protected $table = 'luadm.programma';

    protected $primaryKey = 'PKODS';

    public $sequence = null;

    public $timestamps = null;


    /**
     * Relation between luadm_programma and luadm_tips tables on tips primary key
     * luadm_tips table holds full names of the classificators from tips_limenis column
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipsLimenis()
    {
        return $this->hasOne('App\Models\Luadm\Tips', 'tkods', 'tips_limenis');
    }
    public function tipsVirzieni()
    {
        return $this->hasOne('App\Models\Luadm\Tips', 'tkods', 'tips_virzieni');
    }

    /**
     * Relation between luadm_programma and luadm_bpo_programos tables
     * Not all bpo_programos has relation
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function luadmProgramma()
    {
        return $this->hasMany('App\Models\Luadm\BpoProgramos', 'pp_vdu_pkods', 'pkods');
    }

    public function tipsNodala()
    {
        return $this->hasOne('App\Models\Luadm\Tips', 'tkods', 'tips_nodala');
    }

    public function strukturvStkods()
    {
        return $this->hasOne('App\Models\Luadm\Strukturv', 'stkods', 'strukturv_stkods');
    }
    public function bpoPakvietsiEsign()
    {
        return $this->hasMany('App\Models\Esp\BpoPakviestiEsign',  'vdu_pkods','pkods');
    }
    public function masterRequestList(){
      return $this->hasMany('App\Models\Esp\MasterRequestList','pkods','pkods');
    }
}
