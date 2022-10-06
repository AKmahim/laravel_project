<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Products;
use App\Models\checkout;
use App\Models\Order;
use App\Models\Dorder;
use App\Models\Porder;




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
        $defalt_status = "In Process";
        Dorder::insert([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_no' => $request->customer_no,
            'payment_mode'=>$request->payment_mode,
            'email'=>$request->email,
            'order_status'=>$defalt_status,
            'user_ip' => $request->ip(),
            'time'=>Carbon::now()->format('d-m-Y h:i A'),
            'created_at' => Carbon::now()
        ]);
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });
        
        foreach ($carts as $cart) {
            Porder::insert([
                'user_ip' => $request->ip(),
                'product_name' => $cart->product->product_name,
                'product_img' => $cart->product->product_img,
                'product_id'=>$cart->product_id,
                'price' => $cart->price,
                'qty' => $cart->qty,
                'time' => Carbon::now()->format('d-m-Y h:i A'),
                'created_at' => Carbon::now()
            ]);
        }

        //delete all cart data and free
        Cart::whereIn('user_ip', explode(",",request()->ip())  )->delete();
        


        return Redirect()->back()->with('cart','Order complete');

    }
}
