<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;
use Sentinel;

class Withdraw extends Model
{
    public function createWithdraw($request){
        $withdraw = new Withdraw();
        $sentinelUser = Sentinel::check();
        $user = User::find($sentinelUser->id);
        if($request->sum > $user->balance){
            return 'failed';
        }
        $withdraw->user_id = $user->id;
        $withdraw->sum = $request->amount;
        $withdraw->status = '0';
        $withdraw->bsb = $request->bsb;
        $withdraw->account = $request->account;
        $user->balance -= $request->amount;
        $user->save();
        $withdraw->save();
        return 'success';
    }

    public function successWithdraw($request){
        $withdraw = Withdraw::find($request->id);
        $withdraw->status = '1';
        $withdraw->save();
    }

    public function failedWithdraw($request){
        $withdraw = Withdraw::find($request->id);
        $user = User::find($withdraw->user_id);
        $user->balance += $withdraw->sum;
        $withdraw->status = '2';
        $user->save();
        $withdraw->save();
    }
}
