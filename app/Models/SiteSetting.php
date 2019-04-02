<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    public function getSetting(){
        return SiteSetting::find(1)->first();
    }

    public function postSetting($request, $filereq){
        //dd($request);
        $setting = SiteSetting::find(1)->first();

        $setting->website_title = $request['website_title'];
        if(!empty($filereq)) {
            $file = current($filereq);
            $img_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/assets/upload/', $img_name);
            $setting->logo = $img_name;
        }
        $setting->phone_number = $request['phone_number'];
        $setting->email = $request['email'];
        $setting->address = $request['address'];
        $setting->copyright = $request['copyright'];
        $setting->facebook = $request['facebook'];
        $setting->google = $request['google'];
        $setting->instagram = $request['instagram'];
        $setting->border_price = $request['border_price'];
        $setting->discount_title = $request['discount_title'];
        $setting->discount_value = $request['discount_value'];
        $setting->save();
    }

    public function getDiscount(){
        $setting = SiteSetting::find(1)->first();
        return ['title' => $setting->discount_title, 'value' => $setting->discount_value];
    }

}
