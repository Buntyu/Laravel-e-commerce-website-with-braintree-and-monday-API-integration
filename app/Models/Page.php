<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function editPage($request){
        $page = Page::find($request->id);
        $page->title =  $request->title;
        $page->keywords =  $request->keywords;
        $page->description =  $request->description;
        $page->save();
    }
}
