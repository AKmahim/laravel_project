@extends('layouts.admin_master')


@section('admin_content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card-header">
                    <h1>Order Details</h1>
                </div>
                @if(session('success')) 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <th scope="col">SI NO</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Adress</th>
                        <th scope="col">Customer Number </th>
                        <th scope="col">Order List</th>
                        <th scope="col">Order At</th>
                        <th scope="col">Action</th>

                    </thead>
                    <tbody>
                        

                        @foreach ($orders as $order)
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
                                            Details
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
                                                                        
                                                                        @foreach ( (App\Models\Order::where('user_ip',$order->user_ip )->latest()) as $item)
                                                                            {{-- {{  $Item }} --}}
                                                                            
                                                                            {{-- @for ($item=0;$item<count($orderItem);$item++) --}}
                                                                            <tr >
                                                                                <td class="shoping__cart__item my-2">
                                                                                    <img class="rounded" src=" {{asset($item->product_img)}}" style="width:50px;height:50px" alt="" >
                                                                                    <span> {{ $item->product_name }} </span>
                                                                                </td>
                                                                                <td class="shoping__cart__price my-2">
                                                                                    ৳ {{ $item->price }}
                                                                                </td>
                                                                                <td class="shoping__cart__quantity my2">
                                                                                        {{$item->qty }}
                                                                                </td>
                                                                                <td class="shoping__cart__total">
                                                                                    ৳ {{ $item->price * $item->qty }}
                                                                                </td>
                                                                                <td class="shoping__cart__item__close">
                                                                                    <a href=" {{ url('cart/destroy/'.$item->id) }} ">
                                                                                    <span class="icon_close">
                                                                                        
                                                                                    </span>
                                                                                     </a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        {{-- @endfor --}}
                                                                        
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12"></div>
                                                        <div class="col-lg-5">
                                                            <div class="shoping__continue"></div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="shoping__checkout ">
                                                                <h5> Total</h5>
                                                                <ul>
                                                                    @php( $total = App\Models\Order::all()->where('user_ip',$order->user_ip)->sum(function($t){
                                                                         return $t->price * $t->qty;
                                                                    }) )
                                                                    <li>Subtotal <span> ৳ {{ $total  }} </span></li>
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
                                            </div>

                                        </div>

                                    </div>
                                </td>
                                <td> {{Carbon\Carbon::parse($order->created_at)->diffForHumans()}} </td>
                                <td class="">
                                          
                                    <a href=" " class="btn btn-info admin-order-action-list" onclick="return confirm( 'Are you sure you want to delete?' )">Processing</a>
                                    <a href=" " class="btn btn-info admin-order-action-list" onclick="return confirm( 'Are you sure you want to delete?' )">On Hold</a>
                                    <a href=" " class="btn btn-success admin-order-action-list "   onclick="return confirm( 'Are you sure you want to delete?' )">Complete</a>
                                    <a href=" {{ url('Delete/Order/'.$order->id ) }} "  class="btn btn-danger admin-order-action-list" onclick="return confirm( 'Are you sure you want to cancel the order?' )">Cancel </a>

                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $orders->links('pagination::bootstrap-5')  }}

            </div>
        </div>
    </div>
@endsection






