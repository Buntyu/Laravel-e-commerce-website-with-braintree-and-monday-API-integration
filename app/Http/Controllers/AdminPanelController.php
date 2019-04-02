<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccountModel;
use App\Models\Withdraw;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Adminpanel;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function index(Adminpanel $adminpanel){
        $ordersCount = $adminpanel->getOrdersCount();
        $userCount= $adminpanel->getUserCount() - 1;
        $imagesCount= $adminpanel->getImagesCount();

        $latestUser = $adminpanel->getLatestUser();

        //dd($ordersCount);
        return view('adminpanel.index', ['ordersCount' => $ordersCount, 'userCount' => $userCount, 'imagesCount'=>$imagesCount, 'latestUser' => $latestUser]);
    }

    public function editArtworks($id){
        return view('adminpanel.edit-artwork', ['artwork' => PersonalAccountModel::find($id)]);
    }

    public function postEditArtworks($id, Adminpanel $adminpanel, Request $request){
        $adminpanel->editArtworks($id, $request);
        return redirect()->back();
    }

    public function withdraw(){
        return view('adminpanel.withdraw', ['withdraw' => Withdraw::where('status','=','0')->get()]);
    }

    public function withdrawDetails($id){
        return view('adminpanel.withdraw-details', ['withdraw' => $users = DB::table('users')->join('withdraws', 'users.id', '=', 'withdraws.user_id')->where('withdraws.id', '=', $id)->first()]);
    }

    public function withdrawSuccess(Withdraw $withdraw, Request $request){
        $withdraw->successWithdraw($request);
        return redirect('/adminpanel/withdraw');
    }

    public function withdrawFailed(Withdraw $withdraw, Request $request){
        $withdraw->failedWithdraw($request);
        return redirect('/adminpanel/withdraw');
    }

    public function postDeleteArtworks(Request $request){
        $a = PersonalAccountModel::find($request->id_a);
        $a->deleted = 1;
        $a->save();
        return redirect('adminpanel/all-users/profile/'.$request->user_id);
    }


}
