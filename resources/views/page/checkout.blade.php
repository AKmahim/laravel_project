@extends('layouts.app')

@section('main_content')
<section class="breadcrumb-section set-bg" data-setbg=" {{asset('fontend')}}/images/breadcrumb.jpg" style="background-image: url(&quot; {{asset('fontend')}}/images/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text text-light py-4 pb-1">
                    <h2>Check Out</h2>
                    <div class="breadcrumb__option">
                        {{-- <a href="./index.html">Home</a> --}}
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-form card">
                        <p class="text-center" style="font-size: 16px;">অর্ডারটি কনফার্ম করতে আপনার নাম, ঠিকানা,
                            মোবাইল নাম্বার, লিখে <span class="text-danger">অর্ডার কনফার্ম করুন</span> বাটনে
                            ক্লিক করুন
                        </p>
                        <!-- Form -->
                        <form method="POST" action=" {{ url('/checkout/AddOrder') }} ">
                            @csrf 
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>আপনার নাম<span>*</span></label>
                                    <input required type="text" name="customer_name" class="form-control" id="customerName" placeholder="আপনার নাম লিখুন" required="required">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>আপনার ঠিকানা<span>*</span></label>
                                    <input required type="text" name="customer_address" class="form-control" id="customerAddress" required="required" placeholder="আপনার ঠিকানা লিখুন">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>আপনার মোবাইল<span>*</span></label>
                                    <input required type="text" name="customer_no" pattern="[0-9]*" id="customerPhone" class="form-control" placeholder="আপনার মোবাইল লিখুন">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>আপনার ইমেইল<span>*</span></label>
                                    <input required type="email" name="email" class="form-control" placeholder="আপনার ইমেইল লিখুন">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Payment Method<span>*</span></label>
                                    <select class="form-control" id="selectCourier" name="payment_mode">
                                        <option value="Cash On Delivery">Cash On Delivery</option>
                                        <option value="Card">Card </option>
                                        <option value="Bkash">Bkash </option>
                                        <option value="Rocket">Rocket </option>
                                        <option value="Nagad">Nagad </option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Shipping Method<span>*</span></label>
                                    <select class="form-control" id="selectCourier">
                                         <option value="80">ঢাকার ভিতর </option>
                                        <option value="150">ঢাকার বাহির </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <button type="submit" id="orderConfirm" class="btn btn-block btn-success p-4"> অর্ডার কনফার্ম করুন</button>
                                </div>
                            </div>
                        <!--/ End Form -->
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="shoping__checkout ">
                        <h5>Cart Total</h5>
                        {{-- @php
                            $total = 500
                        @endphp --}}
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
                        
                    </div>
                </div>
                

    <!-- Order Widget -->
    
    <!--/ End Order Widget -->
  </div>

  <script type="text/javascript">
      cartQuantityInitialize();
  </script>
</div>
            </div>
        </div>
</section>





















@endsection