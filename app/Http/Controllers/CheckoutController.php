<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Products;
use App\Models\checkout;

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
        ]);
        return Redirect()->back()->with('cart','Order complete');

    }
}
