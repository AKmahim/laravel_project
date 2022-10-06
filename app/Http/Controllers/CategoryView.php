<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Carbon;
use App\Models\Category;


class CategoryView extends Controller
{
    //

    public function ViewByItem($category)
    {
        $products = Products::where('category',$category)->get();
        // echo $products;
        // $categories = Category::get();
        if ($products->count()) {
            return view('page.ViewByItem',compact('products'));
        }
        else{
            return Redirect('/')->with('cart','This category product is not avaiable');
        }
        
    }
}
