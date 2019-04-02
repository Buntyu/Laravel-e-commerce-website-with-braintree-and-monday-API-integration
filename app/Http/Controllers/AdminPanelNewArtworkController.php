<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\PersonalAccountModel;
use App\Models\Adminpanel;
class AdminPanelNewArtworkController extends Controller
{
    public function index(Adminpanel $adminpanel){

        return view('adminpanel.new-artworks', ['new_artworks' => $adminpanel->getNewArtworks()]);
    }
    public function viewInnerNewArtwork(Request $request, Adminpanel $adminpanel){
        return view('adminpanel.new-artwork-item',['artworks' => $adminpanel->getArtworkInfo($request->id)]);
    }

    public function acceptArtworks(Request $request, Adminpanel $adminpanel){
        $adminpanel->acceptArtworks($request->all(), $request->id);
        return redirect('adminpanel/new-artworks');
    }
}
