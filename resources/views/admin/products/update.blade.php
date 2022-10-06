
 {{-- this is products index page --}}
 @extends('layouts.admin_master')

 @section('admin_content')
 <div class="container mt-5">
     <div class="row justify-content-center mt-5">
             
         
         
         <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                      Update Product Data
                     </div>
                         
                     <div class="card-body">
                             
 
                         <form action=" {{ url('Product/update/' . $products->id) }} " method="POST" enctype="multipart/form-data">
                                @csrf 
                                
                             <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                   <input type="text" class="form-control @error('product_name') is-invalid @enderror " id="category_name" 
                                   aria-describedby="emailHelp"
                                   name="product_name"
                                   placeholder=" {{ $products->product_name }} "
                                   value=" {{ $products->product_name }} "
                                   >
 
                                   @error('product_name')
                                     <span class="text-danger" style="color:red;"> {{$message}} </span>
                                   @enderror
                                   
                             </div>
                             <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Product Image</label>
                                 <input type="file" class="form-control @error('product_img') is-invalid @enderror "
                                 aria-describedby="emailHelp"
                                 name="product_img"
                                 
                                 >
                                 <input type="hidden" value=" {{ $products->product_img }} " name="old_image">

 
                                 @error('product_img')
                                   <span class="text-danger" style="color:red;"> {{$message}} </span>
                                 @enderror
                                 
                           </div>
 
                           <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                 <input type="text" class="form-control @error('price') is-invalid @enderror "  
                                 
                                 name="price"
                                 placeholder=" {{ $products->price}} "
                                 value=" {{ $products->price }} "
                                 >
 
                                 @error('price')
                                   <span class="text-danger" style="color:red;"> {{$message}} </span>
                                 @enderror
                                 
                           </div>
 
                           <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Product Old Price</label>
                                 <input type="text" class="form-control @error('old_price') is-invalid @enderror " id="category_name" 
                                
                                 name="old_price"
                                 placeholder=" {{ $products->old_price }} "
                                 value=" {{ $products->old_price }} "
                                 >
 
                                 @error('old_price')
                                   <span class="text-danger" style="color:red;"> {{$message}} </span>
                                 @enderror
                                 
                           </div>
                           <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label">Product Details:</label>
                                 
                                 <textarea value="{{ $products->product_details }}" name="product_details" class="mt-2 @error('product_details') is-invalid @enderror  " rows="10" cols="40">
                                 </textarea>
 
                                 @error('product_details')
                                   <span class="text-danger" style="color:red;"> {{$message}} </span>
                                 @enderror
                                 
                           </div>
                           
 
                           
 
                                 
                           <button type="submit" class="btn btn-primary">Add Product</button>
                         </form>
                     </div>
                 </div>
         </div>
 
 
     </div>
 
     
 
 </div>
 @endsection
 