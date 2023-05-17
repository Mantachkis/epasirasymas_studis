<?php
namespace App\Models\Luadm;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Tips extends Eloquent
{
    protected $connection = 'luadm';

    protected $table = 'tips';

    protected $primaryKey = 'TKODS';

    public $sequence = null;

    public $timestamps = null;

    public function tipsTkods()
    {
        return $this->hasMany('App\Model\Luadm\Tips', 'tips_tkods', 'tkods');
    }

    public static function getStudentStages()
    {
        return Tips::where('tips_tkods', 'B90000')->whereNotNull('status')->get();
    }

    public static function getCountryList()
    {
        return Tips::where('tips_tkods', 'VA0000')->whereNotNull('saisin')->orderBy('tnosauk')->get();
    }

}
