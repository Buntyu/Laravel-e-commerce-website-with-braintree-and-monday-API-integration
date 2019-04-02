<?php

namespace App\Http\Controllers;

use App\Models\FaqForUser;
use App\Models\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Testimonials;
use App\Models\AdditionalService;
use App\Models\Size;
class LpPrintYourOwnController extends Controller
{
    public function index(Testimonials $testimonials, AdditionalService $additionalService, Size $size, FaqForUser $faqForUser){
        return view('canvas.landing-pages.print_your_own', ['testimonials' => $testimonials->getTestimonials(), 'additionalService' => $additionalService->getAdditionalServices(), 'photo_cm' => $size->getSizeUnit('photo' ,'in centimeters'), 'photo_in' => $size->getSizeUnit('photo' ,'in inches'), 'square_cm' => $size->getSizeUnit('square' ,'in centimeters'), 'square_in' => $size->getSizeUnit('square' ,'in inches'), 'panoramic_cm' => $size->getSizeUnit('panoramic' ,'in centimeters'), 'panoramic_in' => $size->getSizeUnit('panoramic' ,'in inches'), 'faqs' => $faqForUser::all(), 'seo' => Page::find(2)]);
    }
}
