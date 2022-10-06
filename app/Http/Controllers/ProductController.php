<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Carbon;
use App\Models\Category;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //product index
    //this is for admin page
    public function index(){
        $products = Products::latest()->paginate(10);

        $categories = Category::get();
        return view('admin.products.index',compact('products','categories'));
    }







    public function AddProduct(Request $request){
        
        $product_img = $request->file('product_img');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($product_img->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'img/product_img/';
        $last_img = $up_location.$img_name;
        $product_img->move($up_location,$img_name);

        Products::insert([
            'product_name' => $request->product_name,
            'product_img' => $last_img,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'product_details' => $request->product_details,
            'category' => $request->category,
            'created_at' => Carbon::now()
        ]);
       return Redirect()->back()->with('success','Product Inserted');


    }

    public function Edit($id){
        $products = Products::find($id);
        
        return view('admin.products.update',compact('products'));
    }
    


    // delete function
    public function Delete($id){

        $products = Products::find($id);
        $old_img = $products->product_img;
        unlink($old_img);

        Products::find($id)->delete();
        return Redirect()->route('product.all')->with('success','Product Delete Permanately');
        

    }

    // update function 
    public function update(Request $request,$id){
        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'product_img' => 'required|mimes:jpg,jpeg,png',
            'price' => 'required',
             'product_details' => 'required',
            
        ]
      );

      $old_img = $request->old_image; 
      $product_img = $request->file('product_img');
      if($product_img){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($product_img->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'img/product_img/';
        $last_img = $up_location.$img_name;
        $product_img->move($up_location,$img_name);
          
        unlink($old_img);
  
         Products::find($id)->update([
          'product_name'=>$request->product_name,
          'product_img'=> $last_img,
          'price' => $request->price,
          'old_price' => $request->old_price,
           'product_details' => $request->product_details,
          'created_at' => Carbon::now()
         ]);

         return Redirect()->route('product.all')->with('success','Product updated');

      }
      
      else{
        Products::find($id)->update([
            'product_name'=>$request->product_name,
          'price' => $request->price,
          'old_price' => $request->old_price,
           'product_details' => $request->product_details,
          'created_at' => Carbon::now()
           ]);
  
        return Redirect()->route('product.all')->with('success','Product updated');
      }

    
    }














}
