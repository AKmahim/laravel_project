<?php

use Illuminate\Support\Facades\Route;
use Auth\VerificationController;
use App\Models\Category;
use App\Models\Products;
use App\Models\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $categories = Category::get();
    $products = Products::latest()->paginate(20);
    
    return view('welcome',compact('categories','products'));
});


// Route::get('about', function () {
//     return view('about');
// })->middleware('age');


Auth::routes(['verify' => true]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

//Category

Route::get('Category/All','App\Http\Controllers\CategoryController@AllCat')->name('all.category');

//add category 

Route::post('Category/Add', 'App\Http\Controllers\CategoryController@AddCat')->name('store.category');

//edit category

Route::get('Category/Edit/{id}','App\Http\Controllers\CategoryController@Edit');
Route::post('Store/Category/{id}','App\Http\Controllers\CategoryController@update');

Route::get('softdelete/category/{id}','App\Http\Controllers\CategoryController@SoftDelete');
Route::get('Category/Restore/{id}','App\Http\Controllers\CategoryController@Restore');
Route::get('pdelete/category/{id}','App\Http\Controllers\CategoryController@pdelete');

Route::get('item/{category}','App\Http\Controllers\CategoryView@ViewByItem');





/// order Page route

Route::get('Order/All','App\Http\Controllers\BrandController@AllBrand')->name('all.order');
// Route::post('Brand/Add','App\Http\Controllers\BrandController@StoreBrand')->name('store.brand');
Route::get('Order/View/{id}','App\Http\Controllers\BrandController@OrderView');
Route::get('admin/invoice/{id}','App\Http\Controllers\BrandController@ViewInvoice');
Route::get('admin/invoice/{id}/generate','App\Http\Controllers\BrandController@GenerateInvoice');
Route::post('order_status/update/{id}','App\Http\Controllers\BrandController@Update');
Route::post('payment_mode/update/{id}','App\Http\Controllers\BrandController@PaymentModeUpdate');
Route::post('order/filter','App\Http\Controllers\BrandController@Filter');




//edit brand page
Route::get('Brand/Edit/{id}','App\Http\Controllers\BrandController@Edit');
//update brand data
Route::post('Update/Brand/{id}','App\Http\Controllers\BrandController@Update');
Route::get('Delete/Order/{id}','App\Http\Controllers\BrandController@Delete');



//Multi image route
Route::get("Multi/Image",'App\Http\Controllers\MultiImage@index')->name('multi.image');
Route::post('Store/Image', 'App\Http\Controllers\MultiImage@AddImage')->name('store.image');


//profile editing 
Route::get('User/Profile','App\Http\Controllers\BrandController@Profile')->name('profile.user');
Route::post('Update/Profile', 'App\Http\Controllers\BrandController@update_profile')->name('update.profile');


// change password

Route::get('Change/Password', 'App\Http\Controllers\BrandController@ChangePass')->name('change.password');
Route::post('Change/New', 'App\Http\Controllers\BrandController@NewPass')->name('pass.edit');




/// product upload route
Route::get('Product/All','App\Http\Controllers\ProductController@index')->name('product.all');
Route::post('store/product','App\Http\Controllers\ProductController@AddProduct')->name('store.product');
// Route::get('product/edit/{$id}','App\Http\Controllers\ProductController@Edit');
Route::get('Product/Edit/{id}','App\Http\Controllers\ProductController@Edit');

Route::post('Product/update/{id}','App\Http\Controllers\ProductController@update')->name('product.update');

Route::get('product/delete/{id}','App\Http\Controllers\ProductController@Delete');




// product order page for viewers
Route::get('product/{category}/{id}','App\Http\Controllers\CartController@ViewerOrder');


// user home page search product
Route::post('/search','App\Http\Controllers\BrandController@SearchProduct');






//  = ================================ cart section ==================
Route::post('add/to-cart/{product_id}','App\Http\Controllers\CartController@AddToCart')->name('cart');
Route::get('/cart','App\Http\Controllers\CartController@CartPage');
Route::get('cart/destroy/{id}',"App\Http\Controllers\CartController@CartDestroy");
Route::post('cart/quantity/update/{id}','App\Http\Controllers\CartController@QtyUpdate');

Route::post('buy/{id}','App\Http\Controllers\CartController@buy');

//  ============================= checkout page =================

Route::get('/checkout','App\Http\Controllers\CheckoutController@process');
Route::post('/checkout/AddOrder','App\Http\Controllers\CheckoutController@AddOrder');














