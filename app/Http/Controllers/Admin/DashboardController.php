<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        //dd(totalPrice($orders[0]->products));
        return view('admin/dashboard', ['orders' => $orders]);
    }
}
