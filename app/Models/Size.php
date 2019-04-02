<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Size extends Model
{
    public function editSize($request){
        DB::table('sizes')->where('type', '=', $request['type'])->delete();

        for($i = 0; $i < count($request['title']); $i++){
            $size = new Size();
            $size->type = $request['type'];
            $size->unit = $request['title'][$i];
            $size->price = $request['price'][$i];
            $size->first_size = $request['first_size'][$i];
            $size->second_size = $request['second_size'][$i];
            $size->unit_size = $request['unit_size'][$i];
            $size->border_price = $request['border_price'][$i];
            $size->save();
        }
    }

    public function getSize($type){
        return Size::where('type', '=', $type)->get();
    }
    public function getSizeUnit($type, $unit){
        return Size::where('type', '=', $type)->where('unit', '=', $unit)->get();
    }

    public function getSizeAll(){
        return Size::all();
    }
}
