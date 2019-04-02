<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccountModel;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Adminpanel;
class AdminPanelUsersController extends Controller
{
    public function index(Adminpanel $adminpanel){
        //dd($adminpanel->getNewUsers());
        return view('adminpanel.new_users',['users' => $adminpanel->getNewUsers()]);
    }

    public function sendActivateCode(Adminpanel $adminpanel, $id){
        //user = $adminpanel->getNewUserInfo($id);
        $adminpanel->sendActivateCode($id);
        return redirect('/adminpanel/users');
    }

    public function viewUserInner(Adminpanel $adminpanel, $id){
        //dd($adminpanel->getNewUserInfo($id));
        return view('adminpanel.users-inner', ['user' => $adminpanel->getNewUserInfo($id)]);
    }

    public function allUsers(Adminpanel $adminpanel){
        return view('adminpanel.all-users', ['users' => $adminpanel->getAcceptUsers()]);
    }

    public function allUsersProfile(Adminpanel $adminpanel, $id){
        return view('adminpanel.all-users-profile', ['user' => User::where('id','=', $id)->get(), 'artworks' => PersonalAccountModel::where('user_id', '=', $id)->where('personal_account_models.deleted', '!=', '1')->get()]);
    }

    public function allUsersProfileDelete(Request $request){
        User::destroy($request->id);
        return redirect('/adminpanel/all-users');
    }

}
