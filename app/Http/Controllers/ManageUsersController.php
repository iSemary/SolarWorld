<?php

namespace App\Http\Controllers;
use \Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\User;
use App\Role_user;
class ManageUsersController extends Controller
{
    public function index() {
        toast('Welcome to Admins/Mods/Users<br>"Here you can control all users!"', 'success');
        return view('admin.users',
                 ['users' => 'App\User', 'files' => 'App\File', 'category' => 'App\Category', 'sub_category' => 'App\Sub_Category',
                'movies' => 'App\Movie', 'series' => 'App\Series', 'musics' => 'App\Music', 'anime' => 'App\Anime',
                'programs' => 'App\Program', 'games' => 'App\Game', 'others' => 'App\Other']);
    }
    public function delete(Request $request){
        $User = User::find($request->UserID);
        if($User->count()>0) {
            $User->delete();
            return json_encode("");
        }
    }
    public function edit(Request $request) {
        $User = User::find($request->UserID);
        if($User->count()>0) {
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
    public function promote(Request $request){
        $User = User::find($request->UserID);
        if($User->count()>0) {
            $Role = Role_user::where('user_id', $request->UserID)->first();
            // Set as moderator
            $Role->role_id = '2';
            $Role->save();
            return json_encode('');
        }
    }

}
