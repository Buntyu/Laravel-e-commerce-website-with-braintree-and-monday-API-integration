<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAgreement extends Model
{
    public function editContent($request){
        $content = UserAgreement::all();
        if(count($content) == 0){
            $content = new UserAgreement();
            $content->content = $request->content;
            $content->save();
        }else{
            $content = UserAgreement::first();
            $content->content = $request->content;
            $content->save();
        }
    }
}
