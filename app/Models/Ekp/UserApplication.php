<?php

namespace App\Models\Ekp;

use App\Models\Luadm\Karto;
use App\Models\Luadm\Studijas;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class UserApplication extends Eloquent
{
    protected $connection = 'ekp';

    protected $table = 'user_application';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function application()
    {
        return $this->hasOne('App\Models\Ekp\Application', 'id', 'application_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\Esp\Users', 'id', 'user_id');
    }

    public function classification()
    {
        return $this->hasOne('App\Models\Ekp\Classification', 'id', 'app_status');
    }

    public function agreement()
    {
        return $this->hasOne('App\Models\Esp\Agreement', 'id', 'agreement_id');
    }

    public function masterInfo()
    {
        return $this->hasOne('App\Models\Esp\MasterInfo', 'id', 'master_info_id');
    }

    public function userApplicationLine()
    {
        return $this->hasMany('App\Models\Ekp\UserApplicationLine', 'user_application_id', 'id');
    }

    public function applicationFiles()
    {
        return $this->hasMany('App\Models\Ekp\ApplicationFiles', 'user_application_id', 'id');
    }

    public static function getUserAppIdFromMasterInfoId(int $masterInfoId)
    {
        return UserApplication::where('master_info_id', $masterInfoId)->first()->id;
    }

    public static function getAppIdFromUserAppId(int $userApplicationId)
    {
        return UserApplication::where('id', $userApplicationId)->first()->application_id;
    }

    public static function getUserInfo(int $userApplicationId)
    {
        return UserApplication::where('id', $userApplicationId)->with(['user' => function($q){
            $q->select('id', 'ckods')->with(['luadmCilveksCkods' => function ($q) {
                $q->select('ckods')->with(['studijas' => function ($q){
                    $q->select('studkods', 'cilveks_ckods')->with('studAnalize');
                }]);
            }]);
        }])->with('masterInfo.masterMarks')->first();
    }

    public function getTemplateId()
    {
        return Application::where('id', $this->application_id)->first()->agreement_template;
    }

    public static function getApplicationIdFromMasterStage(int $stage, int $year, int $appId = 2)
    {
        $masterApplications = Application::where(['agreement_template' => $appId, 'year' => $year])->orderBy('start_date')->get(['id'])->toArray();

        return $masterApplications[$stage-1] ?? null;
    }


}