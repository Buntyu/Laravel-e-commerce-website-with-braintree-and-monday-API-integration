<?php

namespace App\Http\Controllers;

use App\Models\AdditionalServices3;
use App\Models\FaqForUser;
use App\Models\Page;
use App\Models\Testimonials2;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Testimonials;
use App\Models\AdditionalService;
use App\Models\OurClient;
class LpCommercialPrintingController extends Controller
{
    public function index(Testimonials2 $testimonials, AdditionalServices3 $additionalService, OurClient $ourClient, FaqForUser $faqForUser){
        return view('canvas.landing-pages.commercial_printing' ,['testimonials' => $testimonials->getTestimonials(), 'additionalService' => $additionalService->getAdditionalServices(),'our_clients' => $ourClient->getClients(), 'faqs' => $faqForUser::all(),'seo' => Page::find(4)]);
    }


}
