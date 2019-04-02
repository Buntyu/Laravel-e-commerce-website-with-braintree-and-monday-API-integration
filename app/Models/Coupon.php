<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function getCoupons(){
        return self::all();
    }

    public function addCoupons($request){
        $testimonials = new Coupon();
        $testimonials->coupon_title = $request['coupon_title'];
        $testimonials->coupon_value = $request['coupon_value'];
        $testimonials->save();
    }

    public function deleteCoupons($request){
        self::destroy($request['id']);
    }
}
