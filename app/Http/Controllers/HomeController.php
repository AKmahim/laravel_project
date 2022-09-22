<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use app\Models\User;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::all();
        $users = DB::table('users')->get();
        // $categories = Category::get();
        return view('order',compact('users'));
    }

}
