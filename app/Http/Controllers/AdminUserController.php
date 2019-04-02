<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Sentinel;

class AdminUserController extends Controller
{
    public function index(){
        return view('adminpanel.login');
    }

    public function postLogin(Request $request){
        Sentinel::authenticate($request->all());
        return redirect('adminpanel/');
    }

    public function logout(){
        Sentinel::logout();
        return redirect('adminpanel/login');
    }
}
