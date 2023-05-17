<?php

namespace App\Models\Esp;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class MasterStageAdmin extends Eloquent
{
    protected $connection = 'esp';

    protected $table = 'master_stage_admin';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    /**
     * @param int $year
     * @return int
     */
    public static function getActiveStage(int $year){
        return MasterStageAdmin::where('year', $year)->where('is_current', 'Y')->first()->stage;
    }

    public static function isEditAllowed(int $year, string $stage){
        return MasterStageAdmin::where('year', $year)->where('stage', $stage)->first()->edit;
    }
}
