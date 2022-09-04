<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // public function __construct()
    // {$od 
    //     $order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
    //     $orderdetails = OrderDetail::where('order_id', $order->id)->get();

    //     return view('includes.frontend.cart', [
    //         'order' => $order,
    //         'orderdetails' => $orderdetails
    //     ]);
    // }

    public function index()
    {

        

        return view('pages.shop')->with([
            'products' => Product::latest()->filter()->get()
            // 'cari' => $cari
        ]);
    }

    public function search(){

    }

    public function detail(Product $product)
    {
        $item = $product;
        return view('pages.detail', [
            'item' => $item
        ]);
    }

    public function order(Request $request, Product $product)
    {
        $tanggal = Carbon::now();

        // validated stok
        if ($product->stok < $request->jumlah) {
            return redirect()->back();
        }

        // cek apakah sudah ada id pesanan sebelumnya
        $cekOrder = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
        if(empty($cekOrder)) {
            // simpan kedatabase ORDER
            $Order = new Order;
            $Order->user_id = Auth()->user()->id;
            $Order->tanggal = $tanggal;
            $Order->total_harga = 0;
            $Order->status = 0;
            $Order->kode = mt_rand(100, 999);
            $Order->save();
        }

        // simpan kedatabase pesanan detail
        $newOrder = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();

        // cek order detail
        $cek_order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $newOrder->id)
            ->where('size', $request->size)->where('colour', $request->colour)->first();

        if (empty($cek_order_detail)) {

            $Orderdetail = new OrderDetail;
            $Orderdetail->product_id = $product->id;
            $Orderdetail->order_id = $newOrder->id;
            $Orderdetail->size = $request->size;
            $Orderdetail->colour = $request->colour;
            $Orderdetail->jumlah = $request->jumlah;
            $Orderdetail->jumlah_harga = $product->price * $request->jumlah;
            $Orderdetail->save();
        } else {
            $Orderdetail = OrderDetail::where('product_id', $product->id)->where('order_id', $newOrder->id)
                ->where('size', $request->size)->where('colour', $request->colour)->first();

            $Orderdetail->jumlah = $Orderdetail->jumlah + $request->jumlah;

            // harga sekarang
            $Orderdetail->jumlah_harga = $Orderdetail->jumlah_harga + $product->price * $request->jumlah;
            $Orderdetail->update();
        }

        // total harga order
        $Order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
        $Order->total_harga = $Order->total_harga + $product->price * $request->jumlah;
        $Order->update();

        return redirect()->route('order.index');
    }

    public function checkout()
    {
        $order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
        if(!empty($order)){
            $orderdetails = OrderDetail::where('order_id', $order->id)->get();
            return view('pages.shoping-cart', [
                'orderdetails' => $orderdetails, 
                'order' => $order
            ]);
        }

        return view('pages.shoping-cart');




    }

    public function delete(OrderDetail $orderdetail){
        dd($orderdetail);
        $orderdetail->delete();
        return redirect()->route('route.checkout');
    }

    // public function cart()
    // {
    //     $order = Order::where('user_id', Auth()->user()->id)->where('status', 0)->first();
    //     $orderdetails = OrderDetail::where('order_id', $order->id)->get();

    //     return view('includes.frontend.cart', [
    //         'orderdetails' => $orderdetails,
    //         'order' => $order
    //     ]);
    // }
}
