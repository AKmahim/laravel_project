<?php

namespace App\Http\Controllers;
// use App\models\Multiimg;
use App\Models\Multiimg;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class MultiImage extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //this function is for index page of multi image
    public function index(){
        $images = Multiimg::latest()->paginate(9);
        return view('admin.multiImage.index',compact('images'));
    }

    // this function is for insert image data into database
    public function AddImage(Request $request){
       
        $image = $request->file('image');

        foreach($image as $img){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($img->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'img/multiple_img/';
            $last_img = $up_location.$img_name;
            $img->move($up_location,$img_name);
        
            
            Multiimg::insert([
                'image'=> $last_img,
                'created_at' => Carbon::now()
            ]);
        }

        return Redirect()->back()->with('success','Image Inserted');
    }

}
