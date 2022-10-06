<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Products;

use Illuminate\Support\Facades\Auth;
use DB;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function AddToCart(Request $request,$product_id){
      
    //    $data->all();
    $check = Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->first();

       
       if($check){
           Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->increment('qty');
           $data = Cart::where('user_ip',$request->ip())->get();
           $sum =0;
           foreach($data as $i){
            $sum = $sum + $i->qty;
           }
           return Redirect()->back()->with('cart','Product added to cart');
       }
       else{
            Cart::insert([
                'product_id' => $product_id,
                'qty' => 1,
                'price' => $request->price,
                'user_ip' => request()->ip(),
            ]);

            $data = Cart::where('user_ip',$request->ip())->get();
            $sum =0;
            foreach($data as $i){
                $sum = $sum + $i->qty;
            }
           return Redirect()->back()->with('cart','Product added to cart');
           
       }
    
    
    

    }

        // this function is for viewer order papge
        public function ViewerOrder($category,$id){
            $categories = Category::get();
    
            $product = Products::find($id);
    
            return view('page.product_details',compact('product','categories'));
        }

    //cart page for viewer
    public function CartPage(){

        $categories = Category::get();
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();

        $total = Cart::all()->where('user_ip',request()->ip())->sum(function($t){
            return $t->price * $t->qty;
        });

        return view('page.shopping_cart',compact('categories','carts','total'));
    }


    // destroy cart when click on close 
    public function CartDestroy($id){
        Cart::where('id',$id)->where('user_ip',request()->ip())->delete();
        return Redirect()->back()->with('cart_destroy','Cart Deleted');

    }

    // update quantity of product
    public function QtyUpdate(Request $request ,$id){
        Cart::where('id',$id)->where('user_ip',request()->ip())->update([
            'qty' => $request->qty,
        ]);
        return Redirect()->back()->with('cart_destroy','Quantity updated');

    }

    public function buy(Request $request,$product_id){


        $check = Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->first();
       if($check){
           Cart::where('product_id',$product_id)->where('user_ip',$request->ip())->increment('qty');
           $data = Cart::where('user_ip',$request->ip())->get();
           $sum =0;
           foreach($data as $i){
            $sum = $sum + $i->qty;
           }
           return Redirect('/cart');
       }
       else{
            Cart::insert([
                'product_id' => $product_id,
                'qty' => 1,
                'price' => $request->price,
                'user_ip' => request()->ip(),
            ]);

            $data = Cart::where('user_ip',$request->ip())->get();
            $sum =0;
            foreach($data as $i){
                $sum = $sum + $i->qty;
            }
           return Redirect('/cart');
        }



    }








}
