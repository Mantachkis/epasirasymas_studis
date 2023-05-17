<?php

namespace App\Http\Controllers\Users;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Luadm\Cilveks;
use App\Models\Esp\Users;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        return view('users.searchMenu');
    }

    public function list(Request $request)
    {
        $users = array();
        $vdu_users = array();

        if ($request['searchPhrase'] && $request['userType']){
            if(strlen($request['searchPhrase'])  > 4 && $request['userType'] == 'user'){
                $users = Users::with('cilveksPersCode')
                    ->where('name', 'LIKE', '%'.$request['searchPhrase'].'%')
                    ->orWhere('surname', 'LIKE', '%'.$request['searchPhrase'].'%')
                    ->orWhere('pers_code', 'LIKE', '%'.$request['searchPhrase'].'%')
                    ->orWhere('email', 'LIKE', '%'.$request['searchPhrase'].'%')
                    ->orWhere('email', 'LIKE', '%'.$request['searchPhrase'].'%')
                    ->get();
            }

            if(strlen($request['searchPhrase'])  > 4 && $request['userType'] == 'vdu') {
                $vdu_users = Cilveks::with('espUsers')
                    ->whereHas('espUsers')
                    ->where('vards', 'LIKE', '%' . $request['searchPhrase'] . '%')
                    ->orWhere('uzvards', 'LIKE', '%' . $request['searchPhrase'] . '%')
                    ->orWhere('pers_kods', 'LIKE', '%' . $request['searchPhrase'] . '%')
                    ->orWhere('nod_gk_vieta', 'LIKE', '%' . $request['searchPhrase'] . '%')
                    ->get();
            }
        }

        return view('users.searchList', ['users' => $users, 'vdu_users' => $vdu_users]);
    }

    public function edit(Request $request)
    {
        $user = array();

        if($request['id'] && $request['type']){
            switch ($request['type']) {
                case 'user':
                    $user = Users::with('cilveksPersCode')
                        ->where('id', '=', $request['id'])
                        ->get()
                        ->first();
                    break;
                case 'vdu':
                    $user = Users::with('luadmCilveksCkods')
                        ->where('id', '=', $request['id'])
                        ->get()
                        ->first();
                    break;
            }
        }

        return view('users.edit', ['user' => $user]);
    }

    public function new(Request $request)
    {
        return null;
    }

    public function saveEdit(Request $request)
    {
        if($request['password'] != ''){
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:esp.users,id',
                'name' => 'required|max:100',
                'surname' => 'required|max:100',
                'email' => ['required', Rule::unique('esp.users','email')->ignore($request['id'], 'id'), 'max:100'],
                'pers_code' => ['required', Rule::unique('esp.users','pers_code')->ignore($request['id'], 'id'), 'max:100'],
                'password' => 'required|confirmed|max:100',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:esp.users,id',
                'name' => 'required|max:100',
                'surname' => 'required|max:100',
                'email' => ['required', Rule::unique('esp.users','email')->ignore($request['id'], 'id'), 'max:100'],
                'pers_code' => ['required', Rule::unique('esp.users','pers_code')->ignore($request['id'], 'id'), 'max:100'],
            ]);
        }

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $user = Users::find($request['id']);

        $user->name      = $request['name'];
        $user->surname   = $request['surname'];
        $user->email     = $request['email'];
        $user->pers_code = $request['pers_code'];

        if($request['password'] != ''){
            $user->pass = password_hash($request['password'], PASSWORD_DEFAULT);
        }

        $user->save();

        return response()->json(['success'=>'Naudotojo informacija atnaujinta']);
    }

    public function saveNew(Request $request)
    {
        if($request['password'] != ''){
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'surname' => 'required|max:100',
                'email' => ['required', Rule::unique('esp.users','email'), 'max:100'],
                'pers_code' => ['required', Rule::unique('esp.users','pers_code'), 'max:100'],
                'password' => 'required|confirmed|max:100',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'surname' => 'required|max:100',
                'email' => ['required', Rule::unique('esp.users','email'), 'max:100'],
                'pers_code' => ['required', Rule::unique('esp.users','pers_code'), 'max:100'],
            ]);
        }

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $user = new Users;

        $user->name      = $request['name'];
        $user->surname   = $request['surname'];
        $user->email     = $request['email'];
        $user->pers_code = $request['pers_code'];

        if($request['password'] != ''){
            $user->pass = password_hash($request['password'], PASSWORD_DEFAULT);
        }

        $user->save();

        return response()->json(['success'=>'Naudotojas sukurtas']);
    }
}
