@extends('layouts.admin_master')


@section('admin_content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">
                <div class="card-header mt-2">
                        <div style="float:right;padding-right:2rem;padding-top:.8rem;font-size:1.4rem;">
                                <a href=" {{ url('admin/invoice/'.$orders->id) }} " class="btn btn-info">View Invoice</a>
                                <a href="{{ url('admin/invoice/'.$orders->id.'/generate') }}" target="_blank" class="btn btn-warning">Download Invoice</a>
                                <a href=" {{ url('Order/All') }} " class="btn btn-info">Back</a>
                            </div>
                    <h1 >Order Details</h1>
                    
                </div>
                @if(session('success')) 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row" >
                    <div class="col-md-6 mt-2 my-5">
                        <p class="fs-4">Order Details</p><hr>
                        <div class="order_details ">
                            <span class="fs-7"> Order ID: {{ $orders->id }}</span><br>
                            <span class="fs-7">Ordered Date: {{ $orders->created_at->format('d-m-Y h:i A') }} </span><br>
                            <span class="fs-7"> Payment Mode: <span class="badge rounded-pill bg-success"> {{ $orders->payment_mode }} </span> </span> <br>
                            <div >
                                Order Status Message : <span class=" fs-7 badge rounded-pill bg-success"> {{ $orders->order_status }} </span>
                            </div>
        
                        </div>
                    </div>
                    <div class="col-md-6 mt-2 my-5">
                        <p class="fs-4">Customers Details</p><hr>
                        <div class="order_details ">
                            <span class="fs-7"> Full Name: {{ $orders->customer_name }}</span><br>
                            <span class="fs-7">Email ID: {{ $orders->email }} </span><br>
                            <span class="fs-7">Phone: {{ $orders->customer_no }} </span> <br>
                            <span class="fs-7">Address: {{ $orders->customer_address }} </span><br>
                        </div>
                    </div>
                    

                </div>


                <p class="fs-4">Order Item</p><hr>

                <table class="table">
                    <thead>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Quantity </th>
                        <th scope="col">Total</th>

                    </thead>

                    <tbody>

                        @foreach ( (App\Models\Porder::where('time',$orders->time)->get()) as $item)
                            <tr class="mt-2">
                                <td class="shoping__cart__item my-2">
                                    <img class="rounded" src=" {{asset($item->product_img)}}" style="width:50px;height:50px" alt="" >
                                </td>
                                <td class="shoping__cart__price my-2">
                                    ৳ {{ $item->product_name }}
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
                            </tr>
                            
                        @endforeach
                            <tr>
                                @php( $total = App\Models\Porder::all()->where('user_ip',$orders->user_ip)->where('time',$orders->time)->sum(function($t){
                                        return $t->price * $t->qty;
                                   }) )
                                <td colspan="5" style="font-size:2rem;background-color:#f1f1f1">
                                    <div style="float:left">Total Amount: </div>
                                    @php($delivery_charge = 80)
                                    <div style="float:right;font-size:1.3rem;" class="pe-5">৳ {{ $total }} + Delivery Charge(80৳)<br>
                                        Total = ৳ {{ $total + $delivery_charge}}</div>

                                </td>
                            </tr>
                    </tbody>

                </table>
                {{-- {{ $orders->links('pagination::bootstrap-5')  }} --}}

            </div>
        </div>
        <div class="row">
            @if(session('success')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="fs-3">
                <p>Order Status Update</p><hr>
            </div>
            <div class="col-md-6 mt-3">
                <p class="fs-4">Update Your Order Status</p>
                <form action=" {{ url('order_status/update/'.$orders->id) }} " method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <select name="order_status" class="form-select" id="inputGroupSelect02">
                            <option value="COMPLETED">COMPLETED</option>
                            <option value="On Hold">On Hold</option>

                            <option value="In Processing">In Processing</option>
                            <option value="Cancel">Cancel</option>
                            <option value="Return">Return</option>

                        </select>
                        <button type="submit" class="input-group-text bg-info" for="inputGroupSelect02">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mt-3 rounded">
                <div class="mt-5 order_status_msg fs-4 ps-2" >
                    Current Order Status: <span class="badge rounded-pill bg-danger">{{ $orders->order_status }}</span>
                </div>

            </div>
            <div class="col-md-6 mt-3">
                <p class="fs-4">Update Payment Method</p>
                <form action=" {{ url('payment_mode/update/'.$orders->id) }} " method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <select name="payment_mode" class="form-select" id="inputGroupSelect02">
                            <option value="Cash On Delivery">Cash On Delivery</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option>
                            <option value="Rocket">Rocket</option>
                            <option value="Card">Card</option>

                        </select>
                        <button type="submit" class="input-group-text bg-info" for="inputGroupSelect02">Update</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mt-3 rounded">
                <div class="mt-5 order_status_msg fs-4 ps-2" >
                    Current Payment Method: <span class="badge rounded-pill bg-danger"> {{ $orders->payment_mode }} </span>
                </div>

            </div>

        </div>
    </div>
@endsection








