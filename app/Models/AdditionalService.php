<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalService extends Model
{
    public function getAdditionalServices(){
        return self::all();
    }

    public function addAdditionalServices($request, $file){
        $additionalService = new AdditionalService();
        $additionalService->title = $request['title'];
        $additionalService->description = $request['description'];
        if(!empty($file)) {
            $f = current($file);
            $img_name = time() . '_' . $f->getClientOriginalName();
            $f->move(public_path() . '/assets/upload/', $img_name);
            $additionalService->image = $img_name;
        }
        $additionalService->save();
    }

    public function editAdditionalServices($request, $file){
        $additionalService = AdditionalService::find($request['id']);
        $additionalService->title = $request['title'];
        $additionalService->description = $request['description'];
        if(!empty($file)) {
            $f = current($file);
            $img_name = time() . '_' . $f->getClientOriginalName();
            $f->move(public_path() . '/assets/upload/', $img_name);
            $additionalService->image = $img_name;
        }
        $additionalService->save();
    }
}
