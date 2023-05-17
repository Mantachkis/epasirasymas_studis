<?php

namespace App\Models\Ekp;

use App\Models\Luadm\Tips;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class UserApplicationLine extends Eloquent
{
    protected $connection = 'ekp';

    protected $table = 'user_application_line';

    protected $primaryKey = 'id';

    public $sequence = null;

    public $timestamps = null;

    public function userApplication()
    {
        return $this->hasOne('App\Models\Ekp\UserApplication',  'id', 'user_application_id');
    }

    public function fieldClass()
    {
        return $this->hasOne('App\Models\Ekp\Classification',  'id', 'classification_id');
    }

    public function fieldAppStructure()
    {
        return $this->hasMany('App\Models\Ekp\ApplicationStructure', 'application_classification_id', 'classification_id');
    }

    /**
     * Often may not have an attached field due to the nature of the answers, only part of the fields have
     * a classification as an answer.
     */
    public function answerClass()
    {
        return $this->hasOne('App\Models\Ekp\Classification', 'id', 'answer_id');
    }

    public function answerTips()
    {
        return $this->hasOne('App\Models\Luadm\Tips', 'tkods', 'answer_id');
    }
    /**
     * @param int $userApplicationId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * returns the fields of persons application form
     */
    public static function getUserApplicationInfo(int $userApplicationId = null)
    {
        return UserApplicationLine::with('fieldClass')
            ->with('answerClass')
            ->with('answerTips')
            ->where('user_application_id', $userApplicationId)->get();
    }


}
