@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h1>Order Details</h1>
                    
                </div>
                    
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if(session('success')) 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SI NO</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Adress</th>
                            <th scope="col">Customer Number </th>
                            <th scope="col">Oder List</th>
                            <th scope="col">Order At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                                
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row">{{ $orders->firstItem()+$loop->index }}</th>
                                    <td> {{$order->customer_name}} </td>
                                    <td> 
                                        {{ $order->customer_address }}
                                    </td>
                                    <td> {{$order->customer_no}} </td>
                                    <td> 
                                       <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            see order details
                                        </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <div class="shoping__cart__table ">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                                <table class="table table-sm table-hover">
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
                                                                                            <tr >
                                                                                                <td class="shoping__cart__item my-2">
                                                                                                    <img class="rounded" src=" {{asset($cart->product->product_img)}}" style="width:50px;height:50px" alt="" >
                                                                                                    <h5> {{ $cart->product->product_name }} </h5>
                                                                                                </td>
                                                                                                <td class="shoping__cart__price my-2">
                                                                                                    ৳ {{ $cart->price }}
                                                                                                </td>
                                                                                                <td class="shoping__cart__quantity my2">
                                                                                                        {{ $cart->qty }}
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
                                                                        <h5> Total</h5>
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
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                    </td>


                                    <td> {{Carbon\Carbon::parse($order->created_at)->diffForHumans()}} </td>
                                    <td>
                                          
                                        <a href=" {{ url('Delete/Order/'.$order->id ) }} " class="btn btn-danger " onclick="return confirm( 'Are you sure you want to delete?' )">Delete </a>

                                    </td>
                                    
                                  </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                      {{ $orders->links('pagination::bootstrap-5')  }}
                    
                </div>
            </div>
        </div>
        

    </div>

    

</div>


@endsection

{{-- @section('js_script')

<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>

@endsection --}}