<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Order;
use App\Models\Product;
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

    // public function __construct()
    // {
        // if(Auth::check() == TRUE){

    //     $user = auth()->user();
    //     dd($user);
    //     if(!empty($user)){
    //         dd('tidak kosong');
    //         $order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
    //     if(empty($order)){
    //        return redirect()->route('home');
    //     }

    //     $orderdetails = OrderDetail::where('order_id', $order->id)->get();
    //     dd($orderdetails);
    //     return view('includes.frontend.cart', [
    //         // 'order' => $order,
    //         'orderdetails' => $orderdetails
    // ]);
        // }
        // dd('kosong');

    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::take(4)->get();
        $posts = Post::OrderBy('id', 'DESC')->take(3)->get();
        return view('pages.home', [
            'products' => $products,
            'posts' => $posts
        ]);
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
