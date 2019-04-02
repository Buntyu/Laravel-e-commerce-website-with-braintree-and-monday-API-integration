<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function editContent($request){
        $content = Shipping::all();
        if(count($content) == 0){
            $content = new Shipping();
            $content->content = $request->content;
            $content->save();
        }else{
            $content = Shipping::first();
            $content->content = $request->content;
            $content->save();
        }
    }
}
