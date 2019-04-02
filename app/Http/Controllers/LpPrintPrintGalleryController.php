<?php

namespace App\Http\Controllers;

use App\Models\AdditionalServices2;
use App\Models\FaqForUser;
use App\Models\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\PersonalAccountModel;
use App\Models\AdditionalService;
use App\Models\Order;
use Session;
class LpPrintPrintGalleryController extends Controller
{
    public function index(PersonalAccountModel $work, AdditionalService $additionalService){
        $artwork = $work->getMainArtworks();
        return view('canvas.landing-pages.print_gallery',['artwork' => $artwork, 'additionalService' => $additionalService->getAdditionalServices()]);
    }

    public function gallery(PersonalAccountModel $work, AdditionalServices2 $additionalService, FaqForUser $faqForUser){
        $artwork = $work->getAllArtworks();
        $checkOrder = false;
        if(Session::has('images-upload') && !empty(Session::get('images-upload'))){
            $checkOrder = true;
        }
        return view('canvas.landing-pages.gallery',['checkOrder' => $checkOrder,'artwork' => $artwork, 'additionalService' => $additionalService->getAdditionalServices(), 'artists' => $work->getActiveArtist(), 'faqs' => $faqForUser::all(),'seo' => Page::find(3)]);
    }

    public function ajaxGetModalInfo(Request $request, PersonalAccountModel $work){
        $tmp = $request->all();
        $user_id = $tmp['user-id'];
        $art_id = $tmp['art-id'];
        $user = $work->getArtistInfo($user_id);
        $art = $work->getArtistArtworks($user_id);
        $item = $work->getCurrentArtwork($art_id);
        return view('ajax.get-modal-art-info', ['user' => $user, 'arts' => $art, 'item' => $item]);
    }

    public function ajaxGetArtworks(Request $request, PersonalAccountModel $work){
        $artwork = $work->getFilterArtworks($request->all());

        return view('ajax.get-artworks', ['artwork' => $artwork]);
    }

    public function artistArtworks($artist, PersonalAccountModel $work, AdditionalService $additionalService, FaqForUser $faqForUser){
        $artwork = $work->getArtistArtwork($artist);
        $checkOrder = false;
        if(Session::has('images-upload') && !empty(Session::get('images-upload'))){
            $checkOrder = true;
        }
        return view('canvas.landing-pages.gallery',['checkOrder' => $checkOrder,'artwork' => $artwork, 'additionalService' => $additionalService->getAdditionalServices(),'artists' => $work->getActiveArtist(), 'faqs' => $faqForUser::all(),'seo' => Page::find(3)]);
    }
}

