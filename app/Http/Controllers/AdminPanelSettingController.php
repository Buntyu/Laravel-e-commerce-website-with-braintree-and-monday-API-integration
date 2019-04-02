<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\SiteSetting;
class AdminPanelSettingController extends Controller
{
    public function index(SiteSetting $setting){
        $set = $setting->getSetting();
        return view('adminpanel.setting', ['setting' => $set]);
    }

    public function postSetting(SiteSetting $setting, Request $request){
        $setting->postSetting($request->all(), $request->file());
        return redirect('adminpanel/setting');
    }
}
