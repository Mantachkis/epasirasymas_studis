<?php

namespace App\Http\Controllers\Settings;

use App\Models\Esp\Classification;
use App\Models\Ekp\UserApplication;
use App\Models\Esp\SurnameChanges;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurnameChangeController extends Controller
{
    public function getMainView(){
        return view('settings.surnameChange', [
            'users' => self::getUsersWithSurnameChange(),
            'statusList' => Classification::getSurnameChangeStatusList()
        ]);
    }

    public static function getUsersWithSurnameChange(){
        return UserApplication::whereHas('userApplicationLine', function($q){
            $q->where('classification_id', 'INFO0038');
        })->whereHas('user.luadmCilveksCkods')->with('application')->with('masterInfo')
            ->with('user.luadmCilveksCkods.surnameChanges.classification')->with('userApplicationLine')
            ->where('submit_date', '>', '2019-05-01')
            ->orderBy('submit_date', 'desc')
            ->paginate(20);
    }

    public function update(SurnameChanges $id, Request $req){
        if($id != null) {
            $id->status = $req->get('status');
            $id->save();
        }
    }
}
