@extends('layouts.app')

@section('main_content')
<div class="card-body product-gallery">
							 
    <div class="row no-gutters">
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 ">
            <!-- Product Slider -->
            <div class="product-gallery me-3 pt-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                            <div class="carousel-item   active " >
                                <img class="rounded"  src=" {{ asset($product->product_img) }} " alt="First slide">
                            </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- End Product slider -->
            
        </div>
        
        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mt-3">
                <div class="product-content">
                    <h3> {{ $product->product_name }} </h3>
                    <div class="product-price-old">
                        <del>
                        ৳ {{ $product->old_price }}
                        </del>
                        <span class="product-price">
                        <strong>
                            ৳ {{ $product->price }}
                        </strong>
                        </span>
                    </div>
    
                    <div class="size">
    
                         
                        <div style="display: flex">
                            <form action=" {{ url('buy/' . $product->id ) }} " method="POST" class=" mb-1 me-4" >
                                @csrf 
                                <input type="hidden" name="price" value=" {{ $product->price }} ">
                                <button type="submit" class="add-to-cart btn btn-block"  onclick="buyNow( {{  $product->price }} )" ><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i>অর্ডার করুন</button>
                            </form>
                            <form action=" {{ url('add/to-cart/' . $product->id ) }} " method="POST" >
                                @csrf 
                                <input type="hidden" name="price" value=" {{ $product->price }} ">
                            <button type="submit" class="add-to-cart btn btn-block text-center"  onclick="buyNow( {{  $product->price }} )" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Add to Cart</button>
                            </form>
                            {{-- <a href=" {{ url('buy/' . $product->id ) }} " onclick="buyNow( {{ $product->price }} )" class="add-to-cart btn"> অর্ডার করুন</a> --}}
                            {{-- <a href=" {{ url('add/to-cart/' . $product->id ) }} " style="background: #fc5403;color: white !important;" onclick="addToCart( {{ $product->price }} )" class="add-to-cart btn"> Add to cart</a> --}}
                        </div>
    
                            <a href="tel:01931612302" class="mt-2 btn btn-block btn-primary text-center">
                                কল করতে ক্লিক করুন <br>
                                <i class="fa fa-phone" aria-hidden="true"></i> 01931612302
                            </a>
                    </div>
    
                    <div class="quickview-peragraph">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    ঢাকায় ডেলিভারি খরচ
                                </td>
                                <td>
                                    <b>৳  80.00</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ঢাকার বাইরের ডেলিভারি খরচ
                                </td>
                                <td>
                                    <b>৳ 150.00</b>
                                </td>
                            </tr>
    
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        
    </div>
        
        

    <div class="">
            <div class="container">
                <div class=" mt-5 bg-light bg-gradient mb-3">
                    <h2 class=" fs-3 pt-3 ps-1">Discription:</h2> <br>
                </div>
                
            </div>
            <div class="row ">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="ms-5 fs-6">
                                {{ $product->product_details }}
                        </div>
                        
                    </div>
                </div>
    </div>
        
    </div>

    

 
</div> 
@endsection