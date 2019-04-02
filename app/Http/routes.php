<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Main Content*/
Route::get('/', ['as' => 'index', 'uses' => 'IndexPageController@index']);
Route::post('/', 'IndexPageController@sendContactForm');
Route::get('print-your-own', ['as' => 'print-your-own', 'uses' => 'LpPrintYourOwnController@index']);
Route::get('print-from-our-gallery', ['as' => 'print-from-our-gallery', 'uses' => 'LpPrintPrintGalleryController@index']);
Route::get('commercial-printing', ['as' => 'commercial-printing', 'uses' => 'LpCommercialPrintingController@index']);
Route::get('gallery', 'LpPrintPrintGalleryController@gallery');
Route::get('gallery/{artist}', 'LpPrintPrintGalleryController@artistArtworks');
Route::get('/ajax/get-modal-art-info','LpPrintPrintGalleryController@ajaxGetModalInfo');
Route::get('/ajax/get-artworks','LpPrintPrintGalleryController@ajaxGetArtworks');

Route::get('orders/step-1', ['as' => 'step-1', 'uses' => 'OredrsController@step1']);
Route::post('orders/step-1','OredrsController@postStep1');
Route::post('orders/upload-from-gallery','OredrsController@postStep1FromGallery');
Route::get('orders/step-2', ['as' => 'step-2', 'uses' => 'OredrsController@step2']);
Route::post('orders/step-2/select-size','OredrsController@postSelectSize');
Route::get('orders/step-3', ['as' => 'step-3', 'uses' => 'OredrsController@step3']);
Route::post('orders/step-3/select-filter','OredrsController@postSelectFilter');
Route::get('orders/step-4', ['as' => 'step-4', 'uses' => 'OredrsController@step4']);
Route::post('orders/step-4/select-border','OredrsController@postSelectBorder');
Route::get('orders/step-5', ['as' => 'step-5', 'uses' => 'OredrsController@step5']);
Route::post('orders/payment-request','OredrsController@postPaymentRequest');
Route::get('/orders/get-token', 'OredrsController@getClientToken');
Route::get('/ajax/delete-artwork-order/{id}','OredrsController@ajaxDeleteArtworksOrder');
Route::get('/orders/contact-info/', 'OredrsController@addContactInfo');
Route::get('/orders/payment-info/', 'OredrsController@addPaymentInfo');
Route::get('/orders/get-transdirect-method/', 'OredrsController@getTransdirectMethod');
Route::get('/orders/check-free-delivery/', 'OredrsController@checkFreeDelivery');
Route::get('orders/step-5/change-count/{id}/{count}/', 'OredrsController@changeCount');
Route::get('orders/step-5/delete-item/{id}/', 'OredrsController@deleteItem');
Route::get('orders/step-5/confirm-discount-code/{code}/', 'OredrsController@confirmDiscountCode');
Route::post('orders/step-5/confirm-order', 'OredrsController@confirmOrder');


//Route::get('/ajax/upload-from-dropbox','OredrsController@ajaxUploadFromDropbox');


Route::get('my-account/', ['as' => 'my-account', 'uses' => 'PersonalAccauntController@index'])->middleware('user');
Route::get('my-account/login', ['as' => 'ma-login', 'uses' => 'PersonalAccauntController@login']);
Route::post('my-account/login', 'PersonalAccauntController@postLogin');
Route::post('my-account/logout', 'PersonalAccauntController@logout')->middleware('user');;
Route::get('my-account/registration', ['as' => 'ma-registration', 'uses' => 'PersonalAccauntController@registration']);
Route::post('my-account/registration', 'PersonalAccauntController@postRegister');
Route::get('my-account/faq', ['as' => 'ma-faq', 'uses' => 'PersonalAccauntController@faq'])->middleware('user');
Route::get('my-account/add-artwork', ['as' => 'ma-add-artwork', 'uses' => 'PersonalAccauntController@add_artwork'])->middleware('user');
Route::post('my-account/add-artwork', 'PersonalAccauntController@postAddArtwork')->middleware('user');
Route::post('my-account/forgot-password', 'PersonalAccauntController@postForgotPassword');
Route::get('/reset/{email}/{resetCode}','PersonalAccauntController@resetPassword');
Route::post('/reset/{email}/{resetCode}','PersonalAccauntController@postResetPassword');
Route::get('/activate/{email}/{activationCode}','PersonalAccauntController@viewActivation');
Route::get('my-account/edit-profile', 'PersonalAccauntController@viewEditProfile')->middleware('user');
Route::get('my-account/edit-artworks/{id}', 'PersonalAccauntController@editArtworks')->middleware('user');
Route::post('my-account/edit-artworks/{id}', 'PersonalAccauntController@postEditArtworks')->middleware('user');
Route::post('my-account/edit-profile', 'PersonalAccauntController@postEditProfile')->middleware('user');
Route::post('my-account/withdraw', 'PersonalAccauntController@postWithdraw')->middleware('user');
Route::post('my-account/delete-artwork', 'PersonalAccauntController@deleteArtwork')->middleware('user');



/*AdminPanel*/
Route::get('adminpanel', ['as' => 'adminpanel', 'uses' => 'AdminPanelController@index'])->middleware('manager');
Route::get('adminpanel/login', ['as' => 'ap-login', 'uses' => 'AdminUserController@index']);
Route::post('adminpanel/login', 'AdminUserController@postLogin');
Route::post('adminpanel/logout','AdminUserController@logout');
Route::get('adminpanel/orders', ['as' => 'ap-orders', 'uses' => 'AdminPanelOrdersController@index'])->middleware('manager');
//Route::get('adminpanel/orders/view', ['as' => 'ap-orders-inner', 'uses' => 'AdminPanelOrdersInnerController@index']);
Route::get('adminpanel/orders/{get}', ['as' => 'ap-orders-inner', 'uses' => 'AdminPanelOrdersInnerController@index'])->middleware('manager');
Route::get('/ajax/change-status-order','AdminPanelOrdersInnerController@changeOrderStatus');
Route::get('adminpanel/pages', ['as' => 'ap-pages', 'uses' => 'AdminPanelPagesController@index'])->middleware('manager');
Route::get('adminpanel/profile', ['as' => 'ap-profile', 'uses' => 'AdminPanelProfileController@index'])->middleware('manager');
Route::get('adminpanel/setting', ['as' => 'ap-setting', 'uses' => 'AdminPanelSettingController@index'])->middleware('manager');
Route::post('adminpanel/setting','AdminPanelSettingController@postSetting');
Route::get('adminpanel/users', ['as' => 'ap-users', 'uses' => 'AdminPanelUsersController@index'])->middleware('manager');
Route::get('adminpanel/user/{id}', 'AdminPanelUsersController@viewUserInner');
Route::get('adminpanel/all-users', 'AdminPanelUsersController@allUsers');
Route::get('adminpanel/all-users/profile/{id}', 'AdminPanelUsersController@allUsersProfile');
Route::post('adminpanel/all-users/profile/delete/{id}', 'AdminPanelUsersController@allUsersProfileDelete');
Route::get('adminpanel/pages/testimonials','AdminPanelPagesController@getTestimonials');
Route::get('adminpanel/pages/testimonials-commercial-printing','AdminPanelPagesController@getTestimonialsCommercialPrinting');
Route::post('adminpanel/pages/testimonials/add', 'AdminPanelPagesController@addTestimonials');
Route::post('adminpanel/pages/testimonials-commercial-printing/add', 'AdminPanelPagesController@addTestimonialsCommercialPrinting');
Route::post('adminpanel/pages/testimonials-commercial-printing/delete', 'AdminPanelPagesController@deleteTestimonialsCommercialPrinting');
Route::post('adminpanel/pages/testimonials/delete', 'AdminPanelPagesController@deleteTestimonials');
Route::get('adminpanel/pages/additional-services','AdminPanelPagesController@getAdditionalServices');
Route::get('adminpanel/pages/additional-services-gallery','AdminPanelPagesController@getAdditionalServicesGallery');
Route::get('adminpanel/pages/additional-services-commercial-printing','AdminPanelPagesController@getAdditionalServicesCommercialPrinting');
Route::post('adminpanel/pages/additional-services/add', 'AdminPanelPagesController@addAdditionalServices');
Route::post('adminpanel/pages/additional-services-gallery/add', 'AdminPanelPagesController@addAdditionalServicesGallery');
Route::post('adminpanel/pages/additional-services-commercial-printing/add', 'AdminPanelPagesController@addAdditionalServicesCommercialPrinting');
Route::post('adminpanel/pages/additional-services/edit', 'AdminPanelPagesController@editAdditionalServices');
Route::post('adminpanel/pages/additional-services-gallery/edit', 'AdminPanelPagesController@editAdditionalServicesGallery');
Route::post('adminpanel/pages/additional-services-commercial-printing/edit', 'AdminPanelPagesController@editAdditionalServicesCommercialPrinting');
Route::get('adminpanel/pages/sizes', 'AdminPanelPagesController@indexEditSizes');
Route::post('adminpanel/pages/size/edit', 'AdminPanelPagesController@editSizes');
Route::get('adminpanel/pages/our-clients','AdminPanelPagesController@editOurClients');
Route::get('adminpanel/pages/border-price','AdminPanelPagesController@editBorderPrice');
Route::get('adminpanel/pages/coupon','AdminPanelPagesController@editCoupon');
Route::post('adminpanel/pages/coupon/add','AdminPanelPagesController@postEditCoupon');
Route::post('adminpanel/pages/coupon/delete','AdminPanelPagesController@postDeleteCoupon');
/*Route::get('adminpanel/pages/faq','AdminPanelPagesController@editFaq');
Route::post('adminpanel/pages/faq','AdminPanelPagesController@postEditFaq');*/
Route::get('adminpanel/pages/faq-for-artist','AdminPanelPagesController@editFaqForArtist');
Route::post('adminpanel/pages/faq-for-artist','AdminPanelPagesController@postAddFaqForArtist');
Route::post('adminpanel/pages/faq-for-artist/delete/{id}','AdminPanelPagesController@postDeleteFaqForArtist');
Route::post('adminpanel/pages/faq-for-artist/{id}','AdminPanelPagesController@postEditFaqForArtist');
Route::get('adminpanel/pages/faq-for-users','AdminPanelPagesController@editFaqForUsers');
Route::post('adminpanel/pages/faq-for-users','AdminPanelPagesController@postAddFaqForUsers');
Route::post('adminpanel/pages/faq-for-users/delete/{id}','AdminPanelPagesController@postDeleteFaqForUsers');
Route::post('adminpanel/pages/faq-for-users/{id}','AdminPanelPagesController@postEditFaqForUsers');

Route::get('adminpanel/pages/seo','AdminPanelPagesController@seo');
Route::get('adminpanel/pages/seo/{id}','AdminPanelPagesController@seoEditPage');
Route::post('adminpanel/pages/seo/{id}','AdminPanelPagesController@postSeoEditPage');

Route::get('adminpanel/pages/terms','AdminPanelPagesController@editTerms');
Route::post('adminpanel/pages/terms','AdminPanelPagesController@postEditTerms');
Route::get('adminpanel/pages/user-agreement','AdminPanelPagesController@editUserAgreement');
Route::post('adminpanel/pages/user-agreement','AdminPanelPagesController@postEditUserAgreement');
Route::get('adminpanel/pages/shipping','AdminPanelPagesController@editShipping');
Route::post('adminpanel/pages/shipping','AdminPanelPagesController@postEditShipping');
Route::post('adminpanel/pages/our-clients/add', 'AdminPanelPagesController@addOurClients');
Route::post('adminpanel/pages/our-clients/delete', 'AdminPanelPagesController@deleteOurClients');
Route::get('adminpanel/new-artworks','AdminPanelNewArtworkController@index');
Route::get('adminpanel/new-artworks/{id}','AdminPanelNewArtworkController@viewInnerNewArtwork');
Route::post('adminpanel/new-artworks/{id}', 'AdminPanelNewArtworkController@acceptArtworks');
Route::get('activation-account/send-mail/{id}', 'AdminPanelUsersController@sendActivateCode');
Route::get('adminpanel/artworks/edit/{id}', 'AdminPanelController@editArtworks');
Route::post('adminpanel/artworks/edit/{id}', 'AdminPanelController@postEditArtworks');
Route::post('adminpanel/artworks/delete/', 'AdminPanelController@postDeleteArtworks');
Route::get('adminpanel/withdraw','AdminPanelController@withdraw');
Route::get('adminpanel/withdraw/details/{id}','AdminPanelController@withdrawDetails');
Route::post('adminpanel/withdraw/success/{id}','AdminPanelController@withdrawSuccess');
Route::post('adminpanel/withdraw/failed/{id}','AdminPanelController@withdrawFailed');

Route::get('test-payment','Controller@test_payment');

Route::get('test-del', 'OredrsController@transDirectQuote');

