<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    public function getTestimonials(){
        return self::all();
    }

    public function addTesimonials($request){
        $testimonials = new Testimonials();
        $testimonials->title = $request['title'];
        $testimonials->description = $request['description'];
        $testimonials->save();
    }

    public function deleteTestimonials($request){
        self::destroy($request['id']);
    }
}
