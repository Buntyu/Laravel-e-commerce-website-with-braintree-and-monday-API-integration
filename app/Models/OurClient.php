<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    public function getClients(){
        return OurClient::all();
    }

    public function addClients($request){
        $file = current($request);
        $img_name = time().'_'.$file->getClientOriginalName();

        $file->move(public_path().'/assets/upload/', $img_name);

        $client = new OurClient();

        $client->image = $img_name;
        $client->save();
    }


    public function deleteClients($request){
        OurClient::destroy($request['id']);
    }
}
