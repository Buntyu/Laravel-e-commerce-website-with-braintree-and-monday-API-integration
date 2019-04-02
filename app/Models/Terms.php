<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    public function editContent($request){
        $content = Terms::all();
        if(count($content) == 0){
            $content = new Terms();
            $content->content = $request->content;
            $content->save();
        }else{
            $content = Terms::first();
            $content->content = $request->content;
            $content->save();
        }
    }
}
