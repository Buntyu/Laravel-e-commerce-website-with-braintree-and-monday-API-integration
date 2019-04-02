<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqForUser extends Model
{
    public function editContent($request){
        $content = FaqForUser::all();
        if(count($content) == 0){
            $content = new FaqForUser();
            $content->title = $request->title;
            $content->description = $request->description;
            $content->save();
        }else{
            $content = new FaqForUser();
            $content->title = $request->title;
            $content->description = $request->description;
            $content->save();
        }
    }

    public function deleteFaq($id){
        FaqForUser::destroy($id);
    }
    public function editFaq($request){
        $content = FaqForUser::find($request->id);
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();
    }
}
