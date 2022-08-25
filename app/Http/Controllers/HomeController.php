<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        if(Auth::user() == TRUE){
            dd('umar');
            $order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
        if(empty($order)){
           return redirect()->route('home');
        }

        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        dd($orderdetails);
        return view('includes.frontend.cart', [
            // 'order' => $order,
            'orderdetails' => $orderdetails
    ]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function shop(){
        return view('pages.shop');
    
    }
    public function blog(){
        return view('pages.blog');
    }

    public function checkout()
    {

        $order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();

        return view('pages.shoping-cart', [
            'orderdetails' => $orderdetails,
            'order' => $order
        ]);

    }
}
