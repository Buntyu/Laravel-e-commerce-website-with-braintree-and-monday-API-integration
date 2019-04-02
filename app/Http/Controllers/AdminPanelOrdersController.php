<?php

namespace App\Http\Controllers;

use App\Models\Adminpanel;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPanelOrdersController extends Controller
{
    public function index(Adminpanel $adminpanel){
        $orders = $adminpanel->getAllOrders();

        return view('adminpanel.orders', ['orders' => $orders]);
    }
}
