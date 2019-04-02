<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Border extends Model
{
    public function getBorderPrice($request){
        return Border::find($request);
    }
}
