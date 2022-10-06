@extends('layouts.app')

@section('main_content')

{{-- card section   --}}
<div class="product-area most-popular pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    @if(session('error')) 
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> {{ session('error') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                <div class="card">
                    
                    <div class="card-body">
                        <div class="row">

                            
                            
                             @foreach($products as $product)
                            <div class="col-md-2 col-6">
                                    
                                <div class="single-product">
                                    <div class="product-img">
                                        {{-- set route for cart page --}}
                                        <a href=" {{ url('product/'. $product->category . '/' . $product->id) }} ">
                                        <img class="default-img lazyload rounded img-fluid" style="height:160px;" src=" {{ asset($product->product_img) }} " alt=" {{ $product->product_name }} ">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        {{-- set route --}}
                                        <h3 class="pt-1"> {{ $product->product_name }} </h3>
                                        
                                        <div class="product-price-old me-2 pe-2">
                                            @if($product->old_price != 'None')
                                                <del>
                                                ৳ {{ $product->old_price }}
                                                </del>
                                            @endif
                                            <span class="product-price ms-2 ps-2">
                                                <strong>
                                                    ৳  {{  $product->price }}
                                                </strong>
                                            </span>
                                        </div>
                                        <form action=" {{ url('buy/' . $product->id ) }} " method="POST" class="mb-1" >
                                            @csrf 
                                            <input type="hidden" name="price" value=" {{ $product->price }} ">
                                        <button type="submit" class="add-to-cart btn"  onclick="buyNow( {{  $product->price }} )" ><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i> Buy</button>
                                        </form>
                                        <form action=" {{ url('add/to-cart/' . $product->id ) }} " method="POST" >
                                            @csrf 
                                            <input type="hidden" name="price" value=" {{ $product->price }} ">
                                        <button type="submit" class="add-to-cart btn"  onclick="buyNow( {{  $product->price }} )" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Add to Cart</button>
                                        </form>
                                    </div>
                                </div>

                                
                                
                            </div>
                            @endforeach
                            
                        </div>
                                                                   
                    </div>
                       
                </div>
            </div>

        </div>
    </div>
</div>

{{-- end card section --}}


@endsection