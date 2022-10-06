
 {{-- this is products index page for admin --}}

@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
            
        <div class="col-md-8">
                @if(session('success')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                        @foreach($products as $product)
                        
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4" >
                           
                          <div class="card h-80" style="max-height:320px;">
                            <img src=" {{ asset($product->product_img) }} " class="rounded img-fluid  " alt="..." style="max-height:150px">
                            <p> {{ $product->product_name }} </p>
                            <div class="d-inline-block text-dark ps-1" style="font-size:.5rem;font-weight:700">
                              <h5>Price:{{ $product->price }}tk</h5>
                              <span class="fs-5 text-warning" >Uploaded:</span>
                              <h5>{{ Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</h5>

                            </div>
                            <div class="d-flex justify-content-between">
                                <a href=" {{ url('Product/Edit/'.$product->id ) }} " class="btn btn-primary ">Edit</a>
                                <a href="{{ url('product/delete/'.$product->id )}} " class="btn btn-danger"  onclick="return confirm( 'Are you sure you want to delete?' )">Delete</a>
                            </div>
                            
                          </div>
                          
                        </div>
                        @endforeach
                </div>
                




                {{ $products->links('pagination::bootstrap-5')  }}
        </div>
        
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                     Upload New Product
                    </div>
                        
                    <div class="card-body">
                            

                        <form action=" {{ url('store/product') }} " method="POST" enctype="multipart/form-data">
                               @csrf 
                               
                            <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                  <input type="text" class="form-control @error('product_name') is-invalid @enderror " id="category_name" 
                                  aria-describedby="emailHelp"
                                  name="product_name"
                                  placeholder="Enter Product Name "
                                  required
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
                                required
                                >

                                @error('produt_img')
                                  <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                          </div>

                          <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror "  
                                
                                name="price"
                                placeholder="Enter Product price "
                                required
                                >

                                @error('price')
                                  <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                          </div>

                          <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Old Price</label>
                                <input type="text" class="form-control @error('old_price') is-invalid @enderror " id="category_name" 
                               
                                name="old_price"
                                placeholder="Enter Product Old Price "
                                value="None"
                                >

                                @error('old_price')
                                  <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                          </div>
                          <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Details:</label>
                                
                                <textarea name="product_details" class="mt-2 @error('product_details') is-invalid @enderror  " rows="10" cols="40">
                                   
                                </textarea>

                                @error('product_details')
                                  <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                          </div>
                          <div class="mb-3">
                                <label class="form-label">Product Category:</label>
                                <select class="form-select"aria-label=".form-select-lg example"  name="category" size="5">
                                @foreach($categories as $category)
                                <option  value=" {{$category->category_name}} "> {{$category->category_name}} </option>
                                @endforeach
                                </select>
                          </div>

                          

                                
                          <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
        </div>


    </div>

    

</div>
@endsection
