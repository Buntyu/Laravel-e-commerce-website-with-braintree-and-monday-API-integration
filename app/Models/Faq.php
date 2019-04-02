<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public function editContent($request){
        $content = Faq::all();
        if(count($content) == 0){
            $content = new Faq();
            $content->title = $request->title;
            $content->description = $request->description;
            $content->save();
        }else{
            $content = new Faq();
            $content->title = $request->title;
            $content->description = $request->description;
            $content->save();
        }
    }

    public function deleteFaq($id){
        Faq::destroy($id);
    }
    public function editFaq($request){
        $content = Faq::find($request->id);
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();
    }
}
