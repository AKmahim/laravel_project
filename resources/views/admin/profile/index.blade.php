@extends('layouts.admin_master')

@section('admin_content')
<div class="container" >
    <div class="row justify-content-center" style="margin-top:3rem;">
        <div class="col-md-8" style="margin-top:3rem;">
            <div class="card">
                <div class="card-header">
                   Update Profile
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
                    <form action=" {{ route('update.profile') }} " method="POST">
                        @csrf
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Profile Name</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror " id="category_name" 
                                aria-describedby="emailHelp"
                                name="name"
                                placeholder="Enter Profile Name"
                                >

                                @error('name')
                                <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Profile Email</label>
                                <input type="email" class="form-control @error('brand_name') is-invalid @enderror " id="category_name" 
                                aria-describedby="emailHelp"
                                name="email"
                                placeholder="Enter Profile Email"
                                >

                                @error('Email')
                                <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                        </div>

                        <div class="form-group">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="margin-top:3rem;">
                <div class="card" style="width: 18rem;">
                    <img src= " {{ asset('img/multiple_img/mahim.jpg') }} " class="card-img-top" alt="..." >
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> {{ Auth::user()->name }} </li>
                        <li class="list-group-item">{{ Auth::user()->email }}</li>
                        <li class="list-group-item">
                            <a href=" {{ route('change.password') }} ">Change Password</a>
                        </li>


                        
                    </ul>
                    
                </div>
        </div>


    </div>

    

</div>
@endsection
