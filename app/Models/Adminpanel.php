<?php

namespace App\Models;

use App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use DB;
use Sentinel;
use Activation;
use Mail;

class Adminpanel extends Model
{
    function getAllOrders(){
        $orders = Order::latest('id')->paginate(15);
        return $orders;
    }

    function getOrderInfo($request){
        return Order::find($request['get']);
    }

    function getItemsOrder($request){
        return OrderItems::where('order_id', '=', $request['get'])->get();
    }

    public function getOrdersCount(){
        return Order::count();
    }

    public function getUserCount(){
        return User::count();
    }

    public function getImagesCount(){
        return PersonalAccountModel::count();
    }

    public function getLatestUser(){
        return User::latest()->where('id','!=',1)->take(5)->get();
    }

    public function changeOrderStatus($request){
        $order = Order::find($request['id']);
        $order->status = $request['status'];
        $order->save();
        return $order->status;
    }

    public function getNewArtworks(){
        return PersonalAccountModel::where('published', '=', '0')->where('deleted', '!=', '1')->get();
    }

    public function getArtworkInfo($id){
        return PersonalAccountModel::find($id);
    }

    public function acceptArtworks($request, $id){
        $artwork = PersonalAccountModel::find($id);
        $artwork->size_l = $request['size_l'];
        $artwork->size_xl = $request['size_xl'];
        $artwork->size_m = $request['size_m'];
        $artwork->size_s = $request['size_s'];
        $artwork->price_s = $request['price_s'];
        $artwork->price_m = $request['price_m'];
        $artwork->price_l = $request['price_l'];
        $artwork->price_xl = $request['price_xl'];
        $artwork->border_price_xl = $request['border_price_xl'];
        $artwork->border_price_l = $request['border_price_l'];
        $artwork->border_price_s= $request['border_price_s'];
        $artwork->border_price_m = $request['border_price_m'];
        $artwork->published = true;
        $artwork->save();
    }

    public function getNewUsers(){
        return DB::select('select * from users, activations where users.id = activations.user_id AND activations.completed = 0');
    }

    public function getAcceptUsers(){
        return DB::select('select * from users, activations where users.id = activations.user_id AND activations.completed = 1');
    }

    public function getNewUserInfo($id){
        return DB::select('select * from users, activations where activations.user_id = '. $id . ' AND activations.user_id = users.id');
    }

    public function sendActivateCode($id){
        $sentinelUser = Sentinel::findById($id);
        $activation = Activation::exists($sentinelUser);

        $this->sendMail($sentinelUser, $activation->code);

    }

    private function sendMail($user, $code){
        Mail::send('emails.activation-account', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->name, activate your account.");
        });
    }

    public function editArtworks($id, $request){
        $artwork = PersonalAccountModel::find($id);
        $artwork->title = $request->title;
        $artwork->style = $request->style;
        $artwork->subject = $request->subject;
        $artwork->size_l = $request['size_l'];
        $artwork->size_xl = $request['size_xl'];
        $artwork->size_m = $request['size_m'];
        $artwork->size_s = $request['size_s'];
        $artwork->price_s = $request['price_s'];
        $artwork->price_m = $request['price_m'];
        $artwork->price_l = $request['price_l'];
        $artwork->price_xl = $request['price_xl'];
        $artwork->border_price_xl = $request['border_price_xl'];
        $artwork->border_price_l = $request['border_price_l'];
        $artwork->border_price_s= $request['border_price_s'];
        $artwork->border_price_m = $request['border_price_m'];
        $artwork->save();
    }

}
