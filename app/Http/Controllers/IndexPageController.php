<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;
use App\Models\SiteSetting;
class IndexPageController extends Controller
{
    public function index(){

        return view('canvas.index', ['seo' => Page::find(1)]);
    }

    public function sendContactForm(Request $request, SiteSetting $setting){
        $file = current($request->file());
        $img_name = time().'_'.$file->getClientOriginalName();

        $path = public_path().'/assets/attach/'. $img_name;
        $file->move(public_path().'/assets/attach/', $img_name);
        $setting_mail = $setting->getSetting();
        $result = Mail::send('canvas.mail-contact-form', ['data' => $request->all()], function ($message) use ($path, $setting_mail) {
            $mail = 'sam.tuirin@yandex.ua';
            $message->from($mail,'Sam');
            $message->to($setting_mail->email)->subject('Canvas Contact Form');
            $message->attach($path);
        });
        return view('canvas.thanks-questions');

    }
}
