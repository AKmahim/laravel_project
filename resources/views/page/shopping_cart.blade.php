@extends('layouts.app')

@section('main_content')
<section class="breadcrumb-section set-bg" data-setbg=" {{asset('fontend')}}/images/breadcrumb.jpg" style="background-image: url(&quot; {{asset('fontend')}}/images/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text text-light py-5">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href=" {{ url('/')}} ">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(session('cart_destroy')) 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session('cart_destroy') }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<section class="shoping-cart spad">
        <div class="container ms-3 ps-5" style="font-weight:500;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table ">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img class="rounded" src=" {{asset($cart->product->product_img)}}" alt="" >
                                        <h5> {{ $cart->product->product_name }} </h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ৳ {{ $cart->price }}
                                    </td>
                                    <td class="shoping__cart__quantity ">
                                    <form action="{{ url('cart/quantity/update/'.$cart->id)}}" method="POST">
                                            @csrf
                                            <div class="quantity d-flex">
                                                <div class="pro-qty d-flex ">
                                                    <input type="text" name="qty" value=" {{ $cart->qty }} " min="1"
                                                    class="form-control qty-input-box">
                                                    
                                                </div>
                                                <button type="submit" class=" btn btn-sm btn-success ms-3">Update</button>
                                                
                                            </div>
                                        </form>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ৳ {{ $cart->price * $cart->qty }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href=" {{ url('cart/destroy/'.$cart->id) }} ">
                                        <span class="icon_close">
                                            
                                        </span>
                                         </a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
                <div class="col-lg-5">
                    <div class="shoping__continue">
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout ">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span> ৳ {{ $total }} </span></li>
                            <li>Delivery charge <span>+ ৳ 80 </span></li>
                            <li>Total <span>৳ 
                                @if($total)
                                    {{$total + 80 }}  
                                @else 
                                    00.00
                                @endif
                            </span></li>
                        </ul>
                        <a href=" {{ url('/checkout')}} " class="primary-btn text-light check-out p-2 bg-primary">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
</section>


@endsection