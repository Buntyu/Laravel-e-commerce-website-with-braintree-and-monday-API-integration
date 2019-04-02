<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use App\Models\Withdraw;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Sentinel;
use App\Models\PersonalAccountModel;
use App\Models\User;
use Reminder;
use Mail;
use Activation;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class PersonalAccauntController extends Controller
{
    public function index(PersonalAccountModel $account){

        if(Sentinel::check()){
            $artworks = $account->getArtworks();

            return view('personal-account.index', ['artworks' => $artworks, 'balance' => $account->getBalance(), 'art_history' => $account->getHistory()]);
        }else{
            return redirect('my-account/login');
        }

    }

    public function login(){
        if(Sentinel::check()){
            return view('personal-account.index');
        }else{
            return view('personal-account.login', ['seo' => Page::find(5)]);
        }

    }

    public function logout(Request $request){
        Sentinel::logout();
        return redirect('my-account/login');
    }

    public function postLogin(Request $request){
        try{
            $user = Sentinel::authenticate($request->all());
            if(!$user){
                return redirect()->back()->with('modal-error', 'display: block');
            }
            return redirect('my-account/');
        }catch (NotActivatedException $e){
            return redirect()->back()->with('activate-error', 'display: block');
        }

        //return Sentinel::check();
    }

    public function registration(){
        return view('personal-account.registration', ['seo' => Page::find(6), 'faqs' => Faq::all()]);
    }

    public function postRegister(Request $request, PersonalAccountModel $account){
        //dd($request->all());

        //$account->uploadUserPhoto(1, $request->file());
        $f = current($request->file());
        if($f->getSize() < 500000){
            return redirect()->back()->with(['small-file' => '1']);
        }
        if($f->getSize() > 31457280){
            return redirect()->back()->with(['big-file' => '1']);
        }
        try{
            if($request->password == $request->password_confirm){
                try{
                    $user = Sentinel::register($request->all());
                    $activation = Activation::create($user);
                    $role = Sentinel::findRoleBySlug('user');
                    $role->users()->attach($user);
                    $account->addOtherUserInfo($user->id, $request->file(), $request);
                    //Sentinel::authenticate($request->all());
                    return view('orders/thanks-registration');
                } catch (QueryException $exception){
                    if($exception->getCode() == 23000){
                        return redirect()->back()->with(['user-error' => '1']);
                    }
                }

            }else{
                return redirect()->back()->with('modal-error', '1');
            }
        }catch(FileException $fileException){
            return redirect()->back()->with('modal-error-big-file', '1');
        }


    }

    public function faq(){
        if(Sentinel::check()){
            return view('personal-account.faq');
        }else{
            return view('personal-account.login');
        }

    }

    public function add_artwork(PersonalAccountModel $account){
        if(Sentinel::check()){
            return view('personal-account.add_artworks',['balance' => $account->getBalance(),'art_history' => $account->getHistory()]);
        }else{
            return view('personal-account.login');
        }

    }
    public function postAddArtwork(Request $request, PersonalAccountModel $account){
        $account->add_artworks($request);
        return redirect('my-account/');
    }

    public function postForgotPassword(Request $request){
        $user = User::whereEmail($request->email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if(count($user) == 0){
            return redirect()->back()->with([
                'success' => 'Reset code was sent to your email.'
            ]);
        }
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        $this->sendMail($user, $reminder->code);
        return redirect()->back()->with([
            'success' => 'Reset code was sent to your email.'
        ]);
    }

    private function sendMail($user, $code){
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->name, reset your password.");
        });
    }

    public function resetPassword($email, $resetCode){
        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if(count($user) == 0){
            abort(404);
        }
        if($reminder = Reminder::exists($sentinelUser)){
            if($resetCode == $reminder->code){
                return view('personal-account.reset-password');
            }else {
                return redirect('/my-account');
            }
        }else {
            return redirect('/my-account');
        }
    }
    public function postResetPassword(Request $request, $email, $resetCode){
        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if(count($user) == 0){
            abort(404);
        }
        if($reminder = Reminder::exists($sentinelUser)){
            if($resetCode == $reminder->code){
                Reminder::complete($sentinelUser, $resetCode, $request->password);
                return redirect('my-account/login')->with('success', 'Please login with your new password.');
            }else {
                return redirect('/my-account');
            }
        }else {
            return redirect('/my-account');
        }
    }

    public function viewActivation($email, $activationCode){
        $user = User::whereEmail($email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if(Activation::complete($sentinelUser, $activationCode)){
            return redirect('/my-account/login/');
        }else {
            return redirect('my-account/login');
        }
    }

    public function viewEditProfile(PersonalAccountModel $account){
        $user = Sentinel::check();
        return view('personal-account.edit-account', ['user' => $account->getArtistInfo($user->id), 'balance' => $account->getBalance(),'art_history' => $account->getHistory()]);
    }

    public function postEditProfile(PersonalAccountModel $personalAccountModel, Request $request){
        $personalAccountModel->editProfile($request->all(), current($request->file()));
        return redirect('my-account/edit-profile');
    }

    public function postWithdraw(Request $request, Withdraw $withdraw){
        $withdraw->createWithdraw($request);
        return redirect()->back();
    }

    public function editArtworks(Request $request, PersonalAccountModel $account){
        return view('personal-account.edit-artworks',['artwork' => PersonalAccountModel::find($request->id), 'balance' => $account->getBalance(), 'art_history' => $account->getHistory()]);
    }

    public function postEditArtworks(Request $request, PersonalAccountModel $account){
        //dd($request->id);
        $account->editArtworks($request);
        return redirect()->back();
    }

    public function deleteArtwork(Request $request){
        $a = PersonalAccountModel::find($request->id);
        $a->deleted = 1;
        $a->save();
        return redirect('/my-account/');
    }
}
