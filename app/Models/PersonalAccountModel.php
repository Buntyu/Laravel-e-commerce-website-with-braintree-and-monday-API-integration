<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sentinel;
use DB;
use App\Models\User;

use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PersonalAccountModel extends Model
{
    public function getArtworks(){
        $user = Sentinel::getUser();
        return self::where('user_id', '=', $user->id)->where('personal_account_models.deleted', '!=', '1')->paginate(10);
    }

    public function getBalance(){
        $login_user = Sentinel::getUser();
        $user = User::find($login_user->id);
        return $user->balance;
    }

    public function getHistory(){
        $login_user = Sentinel::getUser();
        $query = DB::table('users')
            ->join('orders_items', 'users.id', '=', 'orders_items.artist_id')->where('users.id', '=',$login_user->id)->take(4)->get();
        return $query;
    }

    public function add_artworks($req){

        $user = Sentinel::getUser();
        $request = $req->all();
        $f = '';
        $img_name ='';
        if(empty($request['files_dropbox'])){
            $f = current($req->file());
            $img_name = time().'_'.$f->getClientOriginalName();
            $f->move(public_path().'/assets/upload/', $img_name);
        }else{
            $img = explode('/', $request['files_dropbox']);
            $img_name = time().'_'.last($img);
            $content = file_get_contents($request['files_dropbox']);
            file_put_contents(public_path().'/assets/upload/'.$img_name, $content);
        }


        $work = new PersonalAccountModel();
        $work->user_id = $user->id;
        $work->title = $request['title'];
        //$work->subject = $request['subject'];

        $work->size = $request['size'];
        $work->desired_price_l = $request['desired_price_l'];
        $work->desired_price_xl = $request['desired_price_xl'];
        $work->desired_price_s = $request['desired_price_s'];
        $work->desired_price_m = $request['desired_price_m'];

        $work->price = $request['price'];
        $work->style = $request['style'];
        $work->subject = $request['subject'];
        $work->image = $img_name;
        $work->save();
    }

    public function getMainArtworks(){
        //return self::all();
        $query = DB::table('users')
            ->join('personal_account_models', 'users.id', '=', 'personal_account_models.user_id')->take(10)->get();
        return $query;
    }



    public function getAllArtworks(){
        //return self::all();
        $query = DB::table('users')
            ->join('personal_account_models', 'users.id', '=', 'personal_account_models.user_id')->where('personal_account_models.deleted', '!=', '1')->where('personal_account_models.published', '=', '1')->get();
        return $query;
    }

    public function getArtistInfo($id){
        return current(DB::select('select * from users where id = ' . $id));
    }

    public function getArtistArtworks($id){

        return self::where('user_id', '=', $id)->take(9)->get();
    }

    public function getCurrentArtwork($id){
        return self::where('id', '=', $id)->first();
    }

    public function addOtherUserInfo($user_id, $file, $request){

        if(!empty($file)) {
            $f = current($file);
            $img_name = time() . '_' . $f->getClientOriginalName();
            $f->move(public_path() . '/assets/upload/', $img_name);
            DB::update('update users set photo = "' . $img_name . '" where id = ' . $user_id);
        }else if(!empty($request['files_dropbox'])){
            $img = explode('/', $request['files_dropbox']);
            $img_name = time().'_'.last($img);
            $content = file_get_contents($request['files_dropbox']);
            file_put_contents(public_path().'/assets/upload/'.$img_name, $content);
            DB::update('update users set photo = "' . $img_name . '" where id = ' . $user_id);
        }
        $sell_originals = "";
        $ready_to_print = "";
        if(isset($request['sell_originals']) && $request['sell_originals'] == "on"){
            $sell_originals = "Yes";
        }else{
            $sell_originals = "No";
        }
        if(isset($request['ready_to_print']) && $request['ready_to_print'] == "on"){
            $ready_to_print = "Yes";
        }else{
            $ready_to_print = "No";
        }
        DB::update('update users set ready_to_print = "' . $ready_to_print . '",sell_originals = "' . $sell_originals . '", bio = "'.$request['bio'].'"  where id = ' . $user_id);
    }

    public function getFilterArtworks($request){

        //return DB::select('select * from users, personal_account_models where users.id = personal_account_models.user_id AND users.name Like "%'.$request['artist'].'%" AND personal_account_models.style Like "%'.$request['style'].'%" AND personal_account_models.subject Like "%'.$request['subject'].'%" AND personal_account_models.originals Like "%'.$request['originals'].'%"');
        return DB::select('select * from users, personal_account_models where users.id = personal_account_models.user_id AND personal_account_models.published = 1 AND users.name Like "%'.$request['artist'].'%"');
    }

    public function editProfile($info, $photo){
        $user = User::whereEmail($info['email'])->first();
        if(!empty($photo)){
            $img_name = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path() . '/assets/upload/', $img_name);
            $user->photo = $img_name;
        }
        if(!empty($info['name'])){
            $user->name = $info['name'];
        }
        if(!empty($info['phone'])){
            $user->phone = $info['phone'];
        }
        if(!empty($info['medium'])){
            $user->medium = $info['medium'];
        }
        if(!empty($info['city'])){
            $user->city_country = $info['city'];
        }
        $user->bio = $info['bio'];
        $user->save();
    }

    public function getArtistArtwork($artist){
        //return self::all();
        //dd($artist);
        $query = DB::table('users')
            ->join('personal_account_models', 'users.id', '=', 'personal_account_models.user_id')->where('personal_account_models.published', '=', '1')->where('users.name' , '=', $artist)->get();
        return $query;
    }

    public function getActiveArtist(){
        return DB::select('select * from users, activations where users.id = activations.user_id AND activations.completed = 1');
    }

    public function editArtworks($req){
        $request = $req->all();
        $f = '';
        $img_name ='';
        if(empty($request['files_dropbox'])){
            if(!empty($req->file())){
                $f = current($req->file());
                $img_name = time().'_'.$f->getClientOriginalName();
                $f->move(public_path().'/assets/upload/', $img_name);
            }
        }else{
            $img = explode('/', $request['files_dropbox']);
            $img_name = time().'_'.last($img);
            $content = file_get_contents($request['files_dropbox']);
            file_put_contents(public_path().'/assets/upload/'.$img_name, $content);
        }


        $work = PersonalAccountModel::find($req->id);
        if(!empty($request['title'])){
            $work->title = $request['title'];
        }

        $work->style = $request['style'];
        $work->subject = $request['subject'];
        if(!empty($img_name)){
            $work->image = $img_name;
        }
        $work->save();
    }


}
