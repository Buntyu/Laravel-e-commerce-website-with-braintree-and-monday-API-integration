<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalServices3 extends Model
{
    public function getAdditionalServices(){
        return self::all();
    }

    public function addAdditionalServices($request, $file){
        $additionalService = new AdditionalServices3();
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
        $additionalService = AdditionalServices3::find($request['id']);
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
