<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Adminpanel;

class AdminPanelOrdersInnerController extends Controller
{
    public function index(Request $request, Adminpanel $adminpanel){

        $item = $adminpanel->getOrderInfo($request->route()->parameters());
        $items = $adminpanel->getItemsOrder($request->route()->parameters());
        return view('adminpanel.orders_inner', ['item' => $item, 'items' => $items]);
    }

    public function changeOrderStatus(Request $request, Adminpanel $adminpanel){
        dd($adminpanel->changeOrderStatus($request->all()));
    }
}
