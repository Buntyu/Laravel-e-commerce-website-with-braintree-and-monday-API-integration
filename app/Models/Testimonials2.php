<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials2 extends Model
{
    public function getTestimonials(){
        return self::all();
    }

    public function addTesimonials($request){
        $testimonials = new Testimonials2();
        $testimonials->title = $request['title'];
        $testimonials->description = $request['description'];
        $testimonials->save();
    }

    public function deleteTestimonials($request){
        self::destroy($request['id']);
    }
}
