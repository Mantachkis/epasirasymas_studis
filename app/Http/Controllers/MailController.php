<?php
/**
 * Created by PhpStorm.
 * User: 12482
 * Date: 2019-05-07
 * Time: 14:53
 */

namespace App\Http\Controllers;


use App\Mail\MastersInviteMail;
use App\Mail\MastersMail;
use App\Models\Esp\MasterInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController
{
    /**
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMissingDocView(Request $req){
        return view('emailForms.missingDocs', [
            'email' => self::getPersonEmail($req->get('masterInfoId'))
        ]);
    }


    public function sendMail(Request $req){
        Mail::send(new MastersMail($req));
        return redirect()->back()->with('alert-success', 'Laiškas išsiųstas');
    }


    /**
     * @param $id
     * @return mixed
     */
    private static function getPersonEmail($id){
        return MasterInfo::where('id', $id)->first()->email;
    }
}