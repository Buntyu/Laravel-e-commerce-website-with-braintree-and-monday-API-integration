<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

use App\Models\SiteSetting;

use App\Models\User;
use Braintree_Transaction;
use App\Models\Size;

class Order extends Model
{
    const TRANSDIRECT_DELIVERY='transdirect_delivery';
    const FREE_DELIVERY='free_delivery';
    const PICK_UP_DELIVERY='pick_up';

    public function step_1($request){

        $images_upload = [];
        $i = 0;
        if(Session::get('images-upload')){
            $images_upload = Session::get('images-upload');
            $i = time() + count($images_upload);
        }
        foreach ($request as $file) {
            foreach ($file as $f) {
                $img_name = time().'_'.$f->getClientOriginalName();

                $f->move(public_path().'/assets/upload/', $img_name);
                $images_upload[$i]['name'] = $img_name;
                $images_upload[$i]['from-step-1'] = 1;
                $images_upload[$i]['count'] = 1;
                $images_upload[$i]['img-type'] = last(explode('.',$f->getClientOriginalName()));
                ++$i;

            }
        }
        Session::put('images-upload', $images_upload);
        Session::put('from-gallery', 0);
        Session::put('from-step-1', 1);
    }

    public function uploadFromDropbox($files){
        $images_upload = [];
        $i = 0;
        if(Session::get('images-upload')){
            $images_upload = Session::get('images-upload');
            $i = time() + count($images_upload);
        }
        /*foreach ($files as $file) {
            foreach ($file as $f) {
                $img_name = time().'_'.$f->getClientOriginalName();

                $f->move(public_path().'/assets/upload/', $img_name);
                $images_upload[$i]['name'] = $img_name;
                $images_upload[$i]['img-type'] = last(explode('.',$f->getClientOriginalName()));
                ++$i;

            }
        }
        Session::put('images-upload', $images_upload);
        Session::put('from-gallery', 0);*/
        $f = explode(',', $files);
        foreach ($f as $item) {
            $img = explode('/', $item);
            $img_name = time().'_'.last($img);
            $content = file_get_contents($item);
            file_put_contents(public_path().'/assets/upload/'.$img_name, $content);
            $images_upload[$i]['name'] = $img_name;
            $images_upload[$i]['count'] = 1;
            $images_upload[$i]['img-type'] = last(explode('.',$img_name));
            ++$i;
        }
        Session::put('images-upload', $images_upload);
        Session::put('from-gallery', 0);
        Session::put('from-step-1', 1);
    }

    public function step1FromGallery($request){
        if(Session::get('from-gallery') == 1){
            $images_upload = Session::get('images-upload');
            $i = time() + count($images_upload);
            $images_upload[$i]['name'] = $request['photo'];
            $images_upload[$i]['count'] = 1;
            $images_upload[$i]['img-type'] = last(explode('.',$request['photo']));
            $images_upload[$i]['price_artwork'] = $request['price_artwork'];
            $images_upload[$i]['artist_id'] = $request['artist_id'];
            $images_upload[$i]['from-gallery'] = true;
            $sizes = explode(',',$request['sizes']);
            $images_upload[$i]['type'] = $sizes[0];
            $images_upload[$i]['unit'] = $sizes[1];
            $images_upload[$i]['price'] = $sizes[3];
            $images_upload[$i]['size'] = $sizes[2];
            $images_upload[$i]['border'] = 'none';
            $images_upload[$i]['border_price'] = $sizes[4];
            Session::put('from-gallery', 1);
            Session::put('images-upload', $images_upload);
        }else {
            $images_upload = array();
            //Session::forget('images_upload');
            $i = 0;
            if(Session::get('images-upload')){
                $images_upload = Session::get('images-upload');
                $i = time() + count($images_upload);
            }
            $images_upload[$i]['name'] = $request['photo'];
            $images_upload[$i]['count'] = 1;
            $images_upload[$i]['img-type'] = last(explode('.',$request['photo']));
            $images_upload[$i]['price_artwork'] = $request['price_artwork'];
            $images_upload[$i]['artist_id'] = $request['artist_id'];
            $sizes = explode(',',$request['sizes']);
            $images_upload[$i]['type'] = $sizes[0];
            $images_upload[$i]['from-gallery'] = true;
            $images_upload[$i]['unit'] = $sizes[1];
            $images_upload[$i]['price'] = $sizes[3];
            $images_upload[$i]['size'] = $sizes[2];
            $images_upload[$i]['border'] = 'none';
            $images_upload[$i]['border_price'] = $sizes[4];
            Session::put('from-gallery', 1);
            Session::put('images-upload', $images_upload);
        }

    }

    public function getImagesStep2 (){
        return Session::get('images-upload');
    }

    public function addSizeImages($request){
        $arr = Session::get('images-upload');
        //dd($request);
        $arr[$request['id']]['type'] = $request['type'];
        $arr[$request['id']]['unit'] = $request['unit'];
        $arr[$request['id']]['price'] = $request['price'];
        $arr[$request['id']]['size'] = $request['size'];
        $arr[$request['id']]['border'] = 'none';
        $arr[$request['id']]['border_price'] = $request['border_price'];
        $arr[$request['id']]['size-additional-info'] = $request['size-additional-info'];

        $src_size_img = $request['src_size_img'];
        $removeHeaders = substr ($src_size_img, strpos($src_size_img, ",")+1);
        $decode = base64_decode($removeHeaders);
        $img_name = time().'_filter_image.' . $arr[$request['id']]['img-type'];
        $fopen = fopen('assets/upload/' . $img_name, 'wb');
        fwrite($fopen, $decode);
        fclose($fopen);
        $arr[$request['id']]['src_size_img'] = $img_name;
        Session::put('images-upload', $arr);
    }

    public function addFilterImage($request){
        //dd($request);
        $arr = Session::get('images-upload');
        $subject_removal = null;
        if(isset($request['additional_filter_option'])){
            foreach ($request['additional_filter_option'] as $item){
                if($item == "Subject Removal"){
                    $subject_removal = 25;
                }
            }
        }

        //$subject_removal = $request['subject_removal'];
        if(!empty($request['filter-img-src'])){
            $filter_img_src = $request['filter-img-src'];
            $removeHeaders = substr ($filter_img_src, strpos($filter_img_src, ",")+1);
            $decode = base64_decode($removeHeaders);
            $img_name = time().'_filter_image.' . $arr[$request['id']]['img-type'];
            $fopen = fopen('assets/upload/' . $img_name, 'wb');
            fwrite($fopen, $decode);
            fclose($fopen);
            $arr[$request['id']]['filter-img-src'] = $img_name;
        }



        if(isset($request['additional_filter_option'])){
            $arr[$request['id']]['additional_filter_option'] = strtolower(implode(',', $request['additional_filter_option']));
        }
        if(!empty($request['additional_filter_notes'])){
            $arr[$request['id']]['additional_filter_notes'] = $request['additional_filter_notes'];
        }
        $arr[$request['id']]['subject_removal'] = $subject_removal;

        Session::put('images-upload', $arr);
    }

    public function addBorderImages($request){
        $arr = Session::get('images-upload');
        //dd($request);
        $arr[$request['id']]['border'] = $request['border'];
        $arr[$request['id']]['border-additional-info'] = $request['border-additional-info'];
        Session::put('images-upload', $arr);
    }

    public function checkFieldImages($field){
        $arr = Session::get('images-upload');
        $key = true;
        if(isset($arr)) {
            foreach ($arr as $val) {
                if (!isset($val[$field])) {
                    $key = false;
                }
            }
        }else{
            $key = false;
        }
        return $key;
    }

    public function getTotalPrice(){
        $total_price = 0;
        foreach (Session::get('images-upload') as $item){
            $total_price += $item['price'];
            if($item['border'] != 'none') {
                $total_price += $item['border_price'];
            }

            if(isset($item['price_artwork'])){
                $total_price += $item['price_artwork'];
            }
            if(isset($item['subject_removal']) && $item['subject_removal'] != null){
                $total_price += $item['subject_removal'];
            }
        }
        return $total_price;
    }

    public function paymentRequest($request, $setting)
    {
//        dd($request);
        $order = new Order();
        $customerInfo = Session::get('customer-info');
        $order->name = $customerInfo['name'];
        $order->country = $customerInfo['country'];
        $order->city = $customerInfo['city'];
        $order->postcode = $customerInfo['postcode'];
        $order->address = $customerInfo['address'];
        $order->email = $customerInfo['email'];
        $order->phone = $customerInfo['phone'];
        $order->notes = $customerInfo['notes'];
        $order->save();

        $total_price = 0;

        $data_thanks = ['id' => $order->id, 'email' => $order->email];
        //dd(Session::get('images-upload'));
        foreach (Session::get('images-upload') as $item){
            if($item != null){
                $order_item = new OrderItems();
                $order_item->order_id = $order->id;
                $order_item->originals_photo = $item['name'];
                $order_item->type  = $item['type'];
                $order_item->unit = $item['unit'];
                $order_item->size = $item['size'];
                if(isset($item['size-additional-info'])){
                    $order_item->size_additional_info = $item['size-additional-info'];
                }


                if(isset($item['filter-img-src'])){
                    $order_item->filter_photo = $item['filter-img-src'];
                }
                if(isset($item['additional_filter_option'])){
                    $order_item->additional_filter_photo = $item['additional_filter_option'];
                }
                if(isset($item['additional_filter_notes'])){
                    $order_item->additional_style_info = $item['additional_filter_notes'];
                }

                if(isset($item['src_size_img'])){
                    $order_item->src_size_img = $item['src_size_img'];
                }

                $order_item->border = $item['border'];
                if(isset($item['border-additional-info'])){
                    $order_item->border_additional_info = $item['border-additional-info'];
                }
                $order_item->total_price_item = $item['price'];
                $total_price += $item['price'];
                if($item['border'] != 'none'){
                    $total_price += $item['border_price'];
                }
                if(isset($item['subject_removal']) &&  $item['subject_removal'] != null){
                    $total_price += $item['subject_removal'];
                }

                if(isset($item['price_artwork'])){
                    $order_item->artwork_price = $item['price_artwork'];
                    $order_item->artist_id = $item['artist_id'];
                    $total_price += $item['price_artwork'];
                    $user = User::find($item['artist_id']);
                    $user->balance += $item['price_artwork'];
                    $user->save();
                }
                $order_item->save();
            }
        }
        $discount = $setting->getDiscount();

        if($discount['title'] == $request['discount']){
            $total_price = $total_price - $total_price * ($discount['value'] / 100);
        }
        if(Session::has('discount-code')){
            $total_price = $total_price - Session::get('discount-code');
        }
        /*if($request['rr'] == 'pick_up'){
            $order->pick_up = 1;
        }*/
        $order->save();
        if($request['delivery_method'] != 'pick_up'){
            $result = Braintree_Transaction::sale([
                'amount' => $total_price,
                'paymentMethodNonce' => $request['payment_method_nonce'],
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
        }

        Session::forget('images-upload');

        return $data_thanks;

    }
    
    public function getActiveImageStep2(){
        $all_image = Session::get('images-upload');

        $image = null;
        foreach ($all_image as $key => $item) {
            if(!isset($item['type']) && !isset($item['from-gallery'])){
                $image = $item;
                $image['id'] = $key . '';
                return $image;
            }
        }
        return $image;
    }

    public function defaultSize(){
        return Size::all()->first();
    }

    public function checkFromGallery($field){
        $arr = Session::get('images-upload');
        $key = false;
        foreach ($arr as $val){
            if(isset($val[$field])){
                $key = true;
            }
        }
        return $key;
    }

    public function getActiveImageStep3(){
        $all_image = Session::get('images-upload');

        $image = null;
        foreach ($all_image as $key => $item) {
            if(!isset($item['subject_removal']) && !isset($item['from-gallery'])){
                $image = $item;
                $image['id'] = $key . '';
                return $image;
            }
        }
        return $image;
    }

    public function checkImagesFromStep1(){
        $all_image = Session::get('images-upload');
        $key = false;
        foreach ($all_image as $item){
            if(isset($item['from-step-1'])){
                $key = true;
            }
        }
        return $key;
    }

    public function addContactInfo($request){
        $customerInfo = [];
        $customerInfo['name'] = $request['name'];
        $customerInfo['email'] = $request['email'];
        $customerInfo['phone'] = $request['phone'];
        $customerInfo['country'] = $request['country'];
        $customerInfo['city'] = $request['city'];
        $customerInfo['postcode'] = $request['postcode'];
        $customerInfo['address'] = $request['address'];
        Session::put('customer-info', $customerInfo);
    }



    public function addPaymentInfo($request){
        $customerInfo = Session::get('customer-info');
        $customerInfo['notes'] = $request['notes'];
        Session::put('customer-info', $customerInfo);
    }

    public static function getGlobalTotalPrice(){
        $total_price = 0;
        if(Session::has('images-upload')) {
            foreach (Session::get('images-upload') as $item) {
                if (isset($item['price'])) {
                    $total_price += $item['price'];
                    if ($item['border'] != 'none') {
                        $total_price += $item['border_price'];
                    }

                    if (isset($item['price_artwork'])) {
                        $total_price += $item['price_artwork'];
                    }
                    if (isset($item['subject_removal']) && $item['subject_removal'] != null) {
                        $total_price += $item['subject_removal'];
                    }
                    $total_price *= $item['count'];
                }
            }
            if(Session::has('discount-code')){
                $total_price = $total_price - Session::get('discount-code');
            }
        }
        return $total_price;
    }

    public static function getTotalPriceItem($id){
        $total_price = 0;
        $item = Session::get('images-upload');
        $total_price += $item[$id]['price'];
        if(isset($item[$id]['border_price']) && $item[$id]['border'] != 'none'){
            $total_price += $item[$id]['border_price'];
        }
        if(isset($item[$id]['price_artwork'])){
            $total_price += $item[$id]['price_artwork'];
        }
        if(isset($item[$id]['subject_removal']) && $item[$id]['subject_removal'] != null){
            $total_price += $item[$id]['subject_removal'];
        }
        return $total_price;
    }

    public function addCount($id, $count){
        $image = Session::get('images-upload');
        $image[$id]['count'] = $count;
        Session::put('images-upload', $image);
    }
    public function deleteItem($id){
        $image = Session::get('images-upload');
        unset($image[$id]);
        Session::put('images-upload', $image);
    }

    public function confirmDiscountCode($code, $coupon){
        $answer = 'false';
        foreach ($coupon as $discount){
            $discount_price = 0;
            if($discount->coupon_title == $code){
                $discount_price = Order::getGlobalTotalPrice() * ($discount->coupon_value / 100);
                Session::put('discount-code', $discount_price);
                $answer = 'true';
            }
        }

        return json_encode($answer);
    }

    public function checkStep3ForRedirect(){
        $images = Session::get('images-upload');
        $flag = 1;
        foreach ($images as $image){
            if(isset($image['filter-img-src']) || isset($image['additional_filter_option']) && $image['additional_filter_option'] != null ||  isset($image['subject_removal']) && $image['subject_removal'] != null){

            }else{
                $flag = 0;
            }
        }
        return $flag;
    }
    public function checkStep4ForRedirect(){
        $images = Session::get('images-upload');
        $flag = 1;
        //dd($images);
        foreach ($images as $image){
            if(isset($image['border']) && $image['border'] != 'none'){

            }else{
                $flag = 0;
            }
        }
        return $flag;
    }


}
