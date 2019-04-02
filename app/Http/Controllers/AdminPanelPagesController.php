<?php

namespace App\Http\Controllers;

use App\Models\AdditionalServices2;
use App\Models\AdditionalServices3;
use App\Models\Coupon;
use App\Models\Faq;
use App\Models\FaqForUser;
use App\Models\Page;
use App\Models\Shipping;
use App\Models\Terms;
use App\Models\Testimonials2;
use App\Models\UserAgreement;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Testimonials;
use App\Models\AdditionalService;
use App\Models\Size;
use App\Models\OurClient;
use App\Models\Border;
class AdminPanelPagesController extends Controller
{
    public function index(){

        return view('adminpanel.pages');
    }

    public function getTestimonials(Testimonials $testimonials){

        return view('adminpanel.testimonials' ,['testimonials' => $testimonials->getTestimonials()]);
    }


    public function getTestimonialsCommercialPrinting(Testimonials2 $testimonials){

        return view('adminpanel.testimonials-commercial-printing' ,['testimonials' => $testimonials->getTestimonials()]);
    }

    public function addTestimonials(Testimonials $testimonials, Request $request){
        $testimonials->addTesimonials($request->all());
        return redirect('adminpanel/pages/testimonials');
    }

    public function addTestimonialsCommercialPrinting(Testimonials2 $testimonials, Request $request){
        $testimonials->addTesimonials($request->all());
        return redirect('adminpanel/pages/testimonials-commercial-printing');
    }

    public function deleteTestimonials(Testimonials $testimonials, Request $request){
        $testimonials->deleteTestimonials($request->all());
        return redirect('adminpanel/pages/testimonials');
    }

    public function deleteTestimonialsCommercialPrinting(Testimonials2 $testimonials, Request $request){
        $testimonials->deleteTestimonials($request->all());
        return redirect('adminpanel/pages/testimonials-commercial-printing');
    }

    public function getAdditionalServices(AdditionalService $additionalService){

        return view('adminpanel.additional-services', ['additional_services' => $additionalService->getAdditionalServices()]);
    }

    public function getAdditionalServicesGallery(AdditionalServices2 $additionalService){

        return view('adminpanel.additional-services-gallery', ['additional_services' => $additionalService->getAdditionalServices()]);
    }

    public function getAdditionalServicesCommercialPrinting(AdditionalServices3 $additionalService){

        return view('adminpanel.additional-services-commercial-printing', ['additional_services' => $additionalService->getAdditionalServices()]);
    }

    public function addAdditionalServices(AdditionalService $additionalService, Request $request){
        //$testimonials->addTesimonials($request->all());
        $additionalService->addAdditionalServices($request->all(), $request->file());
        return redirect('adminpanel/pages/additional-services');
    }

    public function editAdditionalServices(AdditionalService $additionalService, Request $request){
        $additionalService->editAdditionalServices($request->all(), $request->file());
        return redirect('adminpanel/pages/additional-services');
    }

    public function editAdditionalServicesGallery(AdditionalServices2 $additionalService, Request $request){
        $additionalService->editAdditionalServices($request->all(), $request->file());
        return redirect('adminpanel/pages/additional-services-gallery');
    }

    public function editAdditionalServicesCommercialPrinting(AdditionalServices3 $additionalService, Request $request){
        $additionalService->editAdditionalServices($request->all(), $request->file());
        return redirect('adminpanel/pages/additional-services-commercial-printing');
    }

    public function indexEditSizes(Size $size){
        $photo = $size->getSize('photo');
        $square = $size->getSize('square');
        $panoramic = $size->getSize('panoramic');

        return view('adminpanel.sizes', ['photo' => $photo, 'square' => $square, 'panoramic' => $panoramic]);
    }

    public function editSizes(Request $request, Size $size){
        $size->editSize($request->all());
        return redirect('adminpanel/pages/sizes');
    }

    public function editOurClients(OurClient $client){
        return view('adminpanel.our-clients', ['our_clients'=>$client->getClients()]);
    }

    public function addOurClients(OurClient $client, Request $request){
        $client->addClients($request->file());
        return redirect('adminpanel/pages/our-clients');
    }

    public function deleteOurClients(Request $request, OurClient $ourClient){
        $ourClient->deleteClients($request->all());
        return redirect('adminpanel/pages/our-clients');
    }

    public function editBorderPrice(Border $border){
        return view('adminpanel.border-price',['raw' => $border->getBorderPrice(1), 'white' => $border->getBorderPrice(2), 'black' => $border->getBorderPrice(3)]);
    }

    public function editCoupon(Coupon $coupon){
        return view('adminpanel.coupons' ,['coupons' => $coupon->getCoupons()]);

    }

    public function postDeleteCoupon(Coupon $coupon, Request $request){
        $coupon->deleteCoupons($request->all());
        return redirect('adminpanel/pages/coupon');
    }

    public function postEditCoupon(Coupon $coupon, Request $request){
        $coupon->addCoupons($request->all());
        return redirect('adminpanel/pages/coupon');
    }

    public function editFaq(){
        return view('adminpanel.faq', ['faq' => Faq::first()]);
    }

    public function editFaqForUsers(){
        return view('adminpanel.faq-for-users', ['faq' => FaqForUser::all()]);
    }

    public function postAddFaqForUsers(Request $request, FaqForUser $faqForUser){
        $faqForUser->editContent($request);
        return redirect()->back();
    }
    public function postDeleteFaqForUsers(Request $request, FaqForUser $faqForUser){
        $faqForUser->deleteFaq($request->id);
        return redirect()->back();
    }
    public function postEditFaqForUsers(Request $request, FaqForUser $faqForUser){
        $faqForUser->editFaq($request);
        return redirect()->back();
    }

    public function editFaqForArtist(){
        return view('adminpanel.faq', ['faq' => Faq::all()]);
    }

    public function postAddFaqForArtist(Request $request, Faq $faqForUser){
        $faqForUser->editContent($request);
        return redirect()->back();
    }
    public function postDeleteFaqForArtist(Request $request, Faq $faqForUser){
        $faqForUser->deleteFaq($request->id);
        return redirect()->back();
    }
    public function postEditFaqForArtist(Request $request, Faq $faqForUser){
        $faqForUser->editFaq($request);
        return redirect()->back();
    }


    public function postEditFaq(Request $request, Faq $faq){
        $faq->editContent($request);
        return redirect()->back();
    }

    public function editTerms(){
        return view('adminpanel.terms', ['terms' => Terms::first()]);
    }

    public function postEditTerms(Request $request, Terms $terms){
        $terms->editContent($request);
        return redirect()->back();
    }

    public function editShipping(){
        return view('adminpanel.shipping', ['shipping' => Shipping::first()]);
    }

    public function postEditShipping(Request $request, Shipping $shipping){
        $shipping->editContent($request);
        return redirect()->back();
    }

    public function seo(){
        return view('adminpanel.seo', ['pages' => Page::all()]);
    }

    public function seoEditPage(Request $request){
        return view('adminpanel.seo-inner-page', ['page' => Page::find($request->id)]);
    }

    public function postSeoEditPage(Request $request, Page $page){
        $page->editPage($request);
        return redirect()->back();
    }

    public function editUserAgreement(){
        return view('adminpanel.user-agreement', ['ua' => UserAgreement::first()]);
    }

    public function postEditUserAgreement(Request $request, UserAgreement $terms){
        $terms->editContent($request);
        return redirect()->back();
    }


}
