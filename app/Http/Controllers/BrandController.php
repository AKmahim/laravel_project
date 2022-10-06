<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\checkout;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Brand;
use app\Models\User;
use app\Models\Products;
use App\Models\Order;
use App\Models\Dorder;
use App\Models\Porder;


use DB;



// use config\image;
use Image;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function AllBrand(){
        $orders = Dorder::latest()->paginate(20);
        // $carts = Cart::where('user_ip',request()->ip())->latest()->get();

        // $total = ::all()->where('user_ip',request()->ip())->sum(function($t){
        //     return $t->price * $t->qty;
        // });
        // $checkouts = checkout::with('order')->get();
        // $orders = Order::with('checkout')->get();
        // $users = DB::table('checkouts')
        //     ->leftJoin('orders', 'checkouts.user_ip', '=', 'orders.user_ip')->get();
        // $users1 = DB::table('checkouts')
        //     ->leftJoin('orders', 'checkouts.user_ip', '=', 'orders.user_ip')
        //     ->get();
 
        // 
        
        // $checkouts = checkout::with('order')->get();
        // $orders = checkout::latest()->get();
        
            // $i =1;
            // ['sd' => $sd]
        return view('admin.order.index',['orders' => $orders])->render();

    }




    //view order function
    public function OrderView($id){
        $orders = Dorder::find($id);
        // echo $orders;

        return view('admin.order.view',compact('orders'));
    }


    //view invoice 
    public function ViewInvoice($id){
        $order = Dorder::find($id);

        return view('admin.invoice.index',compact('order'));
    }

    // generate invoice pdf

    public function GenerateInvoice($id){
        $order = Dorder::find($id);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.index', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-' . $order->id . '-'. $todayDate . '.pdf');

    }

    //order status update button

    public function Update(Request $request,$id){
        
        Dorder::find($id)->update([
            'order_status'=>$request->order_status,
            
           ]);

           return Redirect()->back()->with('success','Order Status Update');


    }

    //oder payment mode update function
    public function PaymentModeUpdate(Request $request,$id){
        
            Dorder::find($id)->update([
                'payment_mode'=>$request->payment_mode,
            
           ]);
            

           return Redirect()->back()->with('success','Payment Method Updated');


    }


    // this function is for store brand data 
    // public function StoreBrand(Request $request){
    //     $validated = $request->validate([
    //         'brand_name' => 'required|max:255',
    //         'brand_image' => 'required|mimes:jpg,jpeg,png',
            
    //     ],
    //     [
    //         'brand_name.required' => 'Please Input Brand Name',
    //         'brand_name.max' => 'Brand name less than 255',
    //         'brand_image.required' => 'Please enter jpg,',
            
    //     ]
    //   );

    //   $brand_image = $request->file('brand_image');

    //   $name_gen = hexdec(uniqid());
    //   $img_ext = strtolower($brand_image->getClientOriginalExtension());
    //   $img_name = $name_gen . '.' . $img_ext;
    //   $up_location = 'img/brand/';
    //   $last_img = $up_location.$img_name;
    //   $brand_image->move($up_location,$img_name);
        
    // //   $name_gen = hexdec(uniqid()) . '.' .$brand_image->getClientOriginalExtension();
    // //   Image::make($brand_image)->resize(200,200)->save('img/brand/');
    // //   $last_img = 'img/brand/' . $name_gen;
    
    //    Brand::insert([
    //     'brand_name'=>$request->brand_name,
    //     'brand_image'=> $last_img,
    //     'created_at' => Carbon::now()
    //    ]);

    //    return Redirect()->back()->with('success','Brand Insert');


    // }

    //edit function
    // public function Edit($id){
    //     $brands = Brand::find($id);
    //     return view('admin.order.edit',compact('brands'));
    // }

    // update function for brand list
    // public function Update(Request $request,$id){
    //     $validated = $request->validate([
    //         'brand_name' => 'required|max:255',
    //         // 'brand_image' => 'required|mimes:jpg,jpeg,png',
            
    //     ],
    //     [
    //         'brand_name.required' => 'Please Input Brand Name',
    //         'brand_name.max' => 'Brand name less than 255',
    //         // 'brand_image.required' => 'Please enter jpg,jpeg,png photo',
            
    //     ]
    //   );

    //   $old_img = $request->old_image; 
    //   $brand_image = $request->file('brand_image');
    //   if($brand_image){
    //     $name_gen = hexdec(uniqid());
    //     $img_ext = strtolower($brand_image->getClientOriginalExtension());
    //     $img_name = $name_gen . '.' . $img_ext;
    //     $up_location = 'img/brand/';
    //     $last_img = $up_location.$img_name;
    //     $brand_image->move($up_location,$img_name);
          
    //     unlink($old_img);
  
    //      Brand::find($id)->update([
    //       'brand_name'=>$request->brand_name,
    //       'brand_image'=> $last_img,
    //       'created_at' => Carbon::now()
    //      ]);

    //      return Redirect()->route('all.order')->with('success','Brand Updated');

    //   }
      
    //   else{
    //     Brand::find($id)->update([
    //         'brand_name'=>$request->brand_name,
    //         'created_at' => Carbon::now()
    //        ]);
  
    //     return Redirect()->route('all.brand')->with('success','Brand Updated');
    //   }

      



    // }

    //this function is for delete brand list data
    public function Delete($id){

        
        $order = Dorder::find($id);
        //delete all cart data and free
        Porder::whereIn('user_ip', explode(",",$order->user_ip)  )->whereIn('time', explode(",",$order->time)  )->delete();
        Dorder::find($id)->delete();
        return Redirect()->route('all.order')->with('success','Order Delete Permanately');
        

    }


    //user profile update

    public function Profile(){
        $id = Auth::id();

        $user = User::find($id)->get();
        return view('admin.profile.index',compact('user'));
    }

    //update profile
    public function update_profile(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            
        ]
      );

      $id = Auth::id();
      User::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);

      return Redirect()->back()->with('success','Profile Updated');


    }



    //change password function
    public function ChangePass(){
        return view('admin.profile.password');
    }

    //update password
    public function NewPass(Request $request){
        $validated = $request->validate([
            'old_pass' => 'required',
            'new_pass' => 'required',
            'confirm_pass' => 'required',
            
        ]
      );
      $db_pass = Auth::user()->password;
      $old_pass = $request->old_pass;
      $new_pass = $request->new_pass;
      $confirm_pass = $request->confirm_pass;

      if(Hash::check($old_pass, $db_pass)){
        if($new_pass === $confirm_pass){
            $id = Auth::id();
            User::find($id)->update([
                'password' => Hash::make($request->new_pass),
            ]);
            Auth::logout();
            return Redirect()->route('login');
        }
        else{
        return Redirect()->back()->with('danger','Confirm Password Not Match');

        }
      }
      else{
        return Redirect()->back()->with('error','Old Password Not Match');

      }

    }


    //order filter system

    public function Filter(Request $request){
        if($request->filter_by == 'id'){
            $orders = Dorder::where('id',$request->search_key)->get();

            if(!$orders->count()){
                
                return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');
            }
            else{
               
                return view('admin.order.OrderFilter',compact('orders'));
            }

        }
        else if($request->filter_by === 'customer_no'){
            $orders = Dorder::where('customer_no',$request->search_key)->get();
            
            if(!$orders->count()){
                
                return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');
            }
            else{
               
                return view('admin.order.OrderFilter',compact('orders'));
            }
        }
        else if($request->filter_by === 'order_status'){
            $orders = Dorder::where('order_status',$request->search_key)->get();
            
            if(!$orders->count()){
                
                return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');
            }
            else{
               
                return view('admin.order.OrderFilter',compact('orders'));
            }

        }
        else{
            return Redirect()->back()->with('success','Order is not avaiable or you put wrong data');

        }
        
        

        
    }

    




    // //admin data edit option
    // public function Edit_Product($id){
    //     $products = Products::find($id);
    //     return view('admin.products.update',compact('products'));
    // }


    // search product
    public function SearchProduct(Request $request){
        $products = Products::where('category',$request->q)->get();
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
