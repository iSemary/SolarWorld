<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use \Validator;
use App\Role_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ManageModsController extends Controller
{
    public function delete(Request $request){
        $User = User::find($request->UserID);
        $MyUser = Auth::user()->role->first()->name;
        if (($MyUser == "Administrator") && ($MyUser == "Administrator")){
            if($User->count()>0) {
                $User->delete();
                return json_encode("");
            }
        }else {
            return json_encode('Invalid!');
        }
    }
    public function edit(Request $request) {
        $User = User::find($request->UserID);
        $MyUser = Auth::user()->role->first()->name;
        if (($MyUser == "Administrator") && ($MyUser == "Administrator")) {
            if ($User->count() > 0) {
                $validator = Validator::make($request->all(), [
                    'user_email' => ['required', Rule::unique('users', 'email')->ignore($request->UserID), 'max:128'],
                    'user_name' => ['required', Rule::unique('users', 'user_name')->ignore($request->UserID), 'max:45'],
                    'full_name' => 'required|max:128',
                ]);

                if ($validator->fails()) {
                    return json_encode($validator->errors()->first());
                } else {
                    $User->user_name = $request->user_name;
                    $User->full_name = $request->full_name;
                    $User->email = $request->user_email;
                    $User->save();
                    return json_encode('');
                }
            }
        }
    }
    public function unpromote(Request $request){
        $User = User::find($request->UserID);
        $MyUser = Auth::user()->role->first()->name;
        if (($MyUser == "Administrator") && ($MyUser == "Administrator")) {
            if ($User->count() > 0) {
                $Role = Role_user::where('user_id', $request->UserID)->first();
                // Set as moderator
                $Role->role_id = '3';
                $Role->save();
                return json_encode('');
            }

        }
    }
}
