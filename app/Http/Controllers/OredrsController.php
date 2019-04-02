<?php

namespace App\Http\Controllers;

use App\Models\Adminpanel;
use App\Models\Coupon;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Order;
use Session;

use App\Models\SiteSetting;
use App\Models\Size;
use Braintree_ClientToken;
use Braintree_Transaction;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class OredrsController extends Controller
{
    public function step1(Order $order){
        //Session::put('images-upload', null);
        $open_modal = true;
        if (Session::has('modal-step-1')){
            $open_modal = false;
        }else {
            Session::put('modal-step-1', 1);
        }
        $images = $order->getImagesStep2();
        //dd($images);
        return view('orders.step_1',['images' => $images, 'open_modal' => $open_modal]);
    }

    public function postStep1(Order $order, Request $request){
        //dd($request->all());
        try{
            if(!empty($request->files_dropbox)){
                $order->uploadFromDropbox($request->files_dropbox);
            }else{
                $order->step_1($request->file());
            }

            if(Session::get('images-upload')){
                return redirect('orders/step-1');
            }
        }catch(FileException $fileException){
            return view('errors.big-file');
        }

    }

    public function postStep1FromGallery(Order $order, Request $request){
        $order->step1FromGallery($request->all());
        if(Session::get('images-upload')){
            return redirect('orders/step-4');
        }
    }

    public function postSelectSize(Request $request, Order $order){
        //dd($request->all());
        $order->addSizeImages($request->all());
        if($order->checkFieldImages('size')){
            return redirect('orders/step-3');
        }else {
            return redirect('orders/step-2');
        }
    }

    public function step2(Order $order, Size $size){
        //dd(Session::get('images-upload'));
        $open_modal = true;
        if (Session::has('modal-step-2')){
            $open_modal = false;
        }else {
            Session::put('modal-step-2', 1);
        }

        $images = $order->getImagesStep2();
        $active_image = $order->getActiveImageStep2();
        $def = $order->defaultSize();
        if(!empty($images) && isset($images)){
            if($order->checkImagesFromStep1()) {
                return view('orders.step_2', ['open_modal' => $open_modal, 'default_size' => $order->defaultSize(), 'active_image' => $active_image, 'images' => $images, 'photo_cm' => $size->getSizeUnit('photo', 'in centimeters'), 'photo_in' => $size->getSizeUnit('photo', 'in inches'), 'square_cm' => $size->getSizeUnit('square', 'in centimeters'), 'square_in' => $size->getSizeUnit('square', 'in inches'), 'panoramic_cm' => $size->getSizeUnit('panoramic', 'in centimeters'), 'panoramic_in' => $size->getSizeUnit('panoramic', 'in inches')]);
            }else{
                return redirect('orders/step-4');
            }
        }else {
            return redirect('/orders/step-1');
        }

    }
    public function step3(Order $order){
        //dd(Session::get('images-upload'));


        $open_modal = true;
        if (Session::has('modal-step-3')){
            $open_modal = false;
        }else {
            Session::put('modal-step-3', 1);
        }
        $images = $order->getImagesStep2();

        /*if($order->checkFieldImages('size') || Session::get('from-gallery')!=1){
            return view('orders.step_3',['images' => $images]);
        }else {
            return redirect('orders/step-2');
        }*/
        if($order->checkFieldImages('size') && !empty($images) && isset($images)){
            if($order->checkImagesFromStep1()) {
                return view('orders.step_3', ['open_modal' => $open_modal, 'images' => $images]);
            }else{
                return redirect('orders/step-4');
            }
        }else {
            return redirect('orders/step-2');
        }

    }

    public function postSelectFilter(Request $request, Order $order){
        $order->addFilterImage($request->all());
        if($order->checkStep3ForRedirect() == 1){
            return redirect('orders/step-4');
        }
        return redirect('orders/step-3');
    }

    public function step4(Order $order){
        $open_modal = true;
        if (Session::has('modal-step-4')){
            $open_modal = false;
        }else {
            Session::put('modal-step-4', 1);
        }
        $images = $order->getImagesStep2();
        $checkFromGallery = $order->checkFromGallery('from-gallery');

        if($order->checkFieldImages('size') && !empty($images) && isset($images)){
            return view('orders.step_4', ['checkFromGallery' => $checkFromGallery, 'open_modal' => $open_modal, 'images' => $images]);
        }else {
            return redirect('orders/step-2');
        }
    }

    public function postSelectBorder(Request $request, Order $order){
        $order->addBorderImages($request->all());
        if($order->checkStep4ForRedirect() == 1){
            return redirect('orders/step-5');
        }
        return redirect('orders/step-4');
        /*if($order->checkFieldImages('border')){
            return redirect('orders/step-5');
        }else {
            return redirect('orders/step-4');
        }*/
    }

    public function step5(Order $order){

        //dd(Session::get('images-upload'));
        //dd($order->checkFieldImages('size'));
        $open_modal = true;
        if (Session::has('modal-step-5')){
            $open_modal = false;
        }else {
            Session::put('modal-step-5', 1);
        }
        //dd(Session::get('images-upload'));
        $contactInfo = Session::get('customer-info');
        $images = $order->getImagesStep2();
        if($order->checkFieldImages('size') && count(Session::get('images-upload')) != 0){
            return view('orders.step_5', ['contactInfo' => $contactInfo, 'images' => $images,'open_modal' => $open_modal, 'total_price' => $order->getTotalPrice()]);
        }else {
            return redirect('orders/step-1');
        }

    }

    public function postPaymentRequest(Request $request, Order $order, SiteSetting $setting){
        $orderRequest = $request->all();
        switch ($orderRequest['delivery_method']) {
            case Order::FREE_DELIVERY:
                //free_delivery here
                break;
            case Order::TRANSDIRECT_DELIVERY:
                $this->transDirect($orderRequest);
                break;
            case Order::PICK_UP_DELIVERY:
                //pick up delivery here
                break;
        }
        $data = $order->paymentRequest($request->all(), $setting);
        return view('orders/thanks-order', ['id' => $data['id'], 'email' => $data['email']]);

    }

    public function getClientToken(){
        return json_encode(Braintree_ClientToken::generate());
    }

    public function ajaxDeleteArtworksOrder(Request $request){
        $art = Session::get('images-upload');
        unset( $art[$request->id] );
        Session::put('images-upload', $art);
        return 1;
    }

    public function ajaxUploadFromDropbox(Request $request, Order $order){
        return $request->all();
    }

    public function addContactInfo(Order $order, Request $request){
        $order->addContactInfo($request->all());
        //return json_encode(Session::get('customer-info'));
    }
    public function addPaymentInfo(Order $order, Request $request){
        $order->addPaymentInfo($request->all());
        //return json_encode(Session::get('customer-info'));
    }

    public function changeCount(Order $order, Request $request){
        $order->addCount($request->id, $request->count);
        $total_price = Order::getGlobalTotalPrice();
        $tax = Order::getGlobalTotalPrice() * 0.1;
        $total_price_all = Order::getGlobalTotalPrice() + Order::getGlobalTotalPrice() * 0.1;
        return $total_price;
    }

    public function deleteItem(Order $order, Request $request){
        $order->deleteItem($request->id);
        $total_price = Order::getGlobalTotalPrice();
        if(count(Session::get('images-upload')) != 0){
            return $total_price;
        }else{
            Session::forget('discount-code');
            return 'redirect';

        }
    }

    public function confirmDiscountCode(Order $order, Request $request, SiteSetting $setting){
        $answer = $order->confirmDiscountCode($request->code, Coupon::all());
        $answer = json_decode($answer);
        $total_price = '';
        if($answer == "false"){
            $total_price = false;
        }else {
            $total_price = [];
            $total_price[0] = Order::getGlobalTotalPrice();
            $total_price[1] = Session::get('discount-code');
        }
        return json_encode($total_price);
    }


    public function transDirect($orderRequest){
        //dd(Session::get('images-upload'));
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.transdirect.com.au/api/bookings/v4");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);
        $declared_value = Order::getGlobalTotalPrice() + Order::getGlobalTotalPrice() * 0.1;
        $url = url('/');
        $customerInfo = Session::get('customer-info');
        $sizeInfo = Session::get('images-upload')[0];
        $currentSize = Size::where('id', $sizeInfo['size'])->first();
        $deliveryItems = '{
              "weight": "39.63",
              "height": ' . $currentSize['first_size'] . ',
              "width": "2.65",
              "length": ' . $currentSize['second_size'] . ',
              "quantity": 2,
              "description": ' . $sizeInfo['size-additional-info'] . '
            }';

        //dd($customerInfo);

        $delivery = "{
          \"declared_value\": \"".$declared_value."\",
          \"referrer\": \"API\",
          \"requesting_site\": \"".$url."\",
          \"tailgate_pickup\": true,
          \"tailgate_delivery\": true,
          \"items\": [". $deliveryItems ."],
          \"sender\": {
            \"address\": \"21 Kirksway Place\",
            \"company_name\":\"Canvas\",
            \"email\": \"print@canvasprintstudio.com.au\",  
            \"name\": \"Canvas Print Studio\",  
            \"postcode\": \"2000\",
            \"phone\": 123456789,
            \"state\": \"\",
            \"suburb\": \"SYDNEY\",
            \"type\": \"business\",
            \"country\": \"AU\"
          },
          \"receiver\": {
            \"address\": \"".$customerInfo['address']."\",
            \"company_name\": \"\",
            \"email\": \"".$customerInfo['email']."\",
            \"name\": \"".$customerInfo['name']."\",
            \"postcode\": \"".$customerInfo['postcode']."\",
            \"phone\": ".$customerInfo['phone'].",
            \"state\":  \"".$customerInfo['city']."\",
            \"suburb\": \"".$customerInfo['country']."\",
            \"type\": \"business\",
            \"country\":\"".$customerInfo['country']."\",
          }
        }";


//        \"receiver\": {
//            \"address\": \"".$customerInfo['address']."\",
//            \"company_name\": \"\",
//            \"email\": \"".$customerInfo['email']."\",
//            \"name\": \"".$customerInfo['name']."\",
//            \"postcode\": \"".$customerInfo['postcode']."\",
//            \"phone\": ".$customerInfo['phone'].",
//            \"state\": \"\",
//            \"suburb\": \"".$customerInfo['country']."\",
//            \"type\": \"business\",
//            \"country\": \"AU\"
//          }



        curl_setopt($ch, CURLOPT_POSTFIELDS, $delivery);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Api-key: 5155258369b8fe275a570ed1ccbbe8cc"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        //dd(json_decode($response));
    }
    public function getTransdirectMethod(){
        $ch = curl_init();
        $customerInfo = Session::get('customer-info');

        curl_setopt($ch, CURLOPT_URL, "https://www.transdirect.com.au/api/quotes");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"declared_value\": \"1000.00\",
  \"items\": [
    {
      \"weight\": \"38.63\",
      \"height\": \"0.25\",
      \"width\": \"1.65\",
      \"length\": \"3.32\",
      \"quantity\": 1,
      \"description\": \"carton\"
    },
    {
      \"weight\": \"39.63\",
      \"height\": \"1.25\",
      \"width\": \"2.65\",
      \"length\": \"4.32\",
      \"quantity\": 2,
      \"description\": \"carton\"
    }
  ],
  \"sender\": {
    \"postcode\": \"2000\",
    \"suburb\": \"SYDNEY\",
    \"type\": \"business\",
    \"country\": \"AU\"
  },
  \"receiver\": {
    \"postcode\": \"".$customerInfo['postcode']."\",
    \"suburb\": \"".$customerInfo['country']."\",
    \"type\": \"business\",
    \"country\": \"AU\"
  }
}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Api-key: 5155258369b8fe275a570ed1ccbbe8cc"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        //dd($response);
        return view('ajax.transdirect-method', ['quote' => $response->quotes]);
    }
    public function checkFreeDelivery(){
        $ch = curl_init();
        $customerInfo = Session::get('customer-info');
        $art = Session::get('images-upload');
        $sum = 0;
        foreach ($art as $image){
            $sum += $image['price'];
        }

        curl_setopt($ch, CURLOPT_URL, "https://www.transdirect.com.au/api/quotes");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"declared_value\": \"1000.00\",
  \"items\": [
    {
      \"weight\": \"38.63\",
      \"height\": \"0.25\",
      \"width\": \"1.65\",
      \"length\": \"3.32\",
      \"quantity\": 1,
      \"description\": \"carton\"
    },
    {
      \"weight\": \"39.63\",
      \"height\": \"1.25\",
      \"width\": \"2.65\",
      \"length\": \"4.32\",
      \"quantity\": 2,
      \"description\": \"carton\"
    }
  ],
  \"sender\": {
    \"postcode\": \"2000\",
    \"suburb\": \"SYDNEY\",
    \"type\": \"business\",
    \"country\": \"AU\"
  },
  \"receiver\": {
    \"postcode\": \"".$customerInfo['postcode']."\",
    \"suburb\": \"".$customerInfo['country']."\",
    \"type\": \"business\",
    \"country\": \"AU\"
  }
}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Api-key: 5155258369b8fe275a570ed1ccbbe8cc"
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        //dd($response);
        if($response->quotes->couriers_please_domestic_proirity_signature->total <= ($sum * 0.25)){
            return 0;
        }else{
            return 'error';
        }

    }
    //"Api-key: 5155258369b8fe275a570ed1ccbbe8cc"
    public function confirmOrder(Request $request){

    }
}


