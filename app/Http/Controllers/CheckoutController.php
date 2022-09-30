<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Products;
use App\Models\checkout;
use App\Models\Order;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    //
    public function process(){
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });
        return view('page.checkout',compact('total'));
    }

    public function AddOrder(Request $request){
        checkout::insert([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_no' => $request->customer_no,
            'user_ip' => $request->ip(),
        ]);
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });
        
        foreach ($carts as $cart) {
            Order::insert([
                'user_ip' => $request->ip(),
                'product_name' => $cart->product->product_name,
                'product_img' => $cart->product->product_img,
                'price' => $cart->price,
                'qty' => $cart->qty,
                'total' => $total,

            ]);
        }

        //delete all cart data and free
        Cart::whereIn('user_ip', explode(",",request()->ip())  )->delete();
        


        return Redirect()->back()->with('cart','Order complete');

    }
}
