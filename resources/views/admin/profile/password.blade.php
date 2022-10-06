@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    Change Password
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
                    <form action=" {{ route('pass.edit') }} " method="POST">
                        @csrf
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Old Password </label>
                                <input type="password" class="form-control @error('old_pass') is-invalid @enderror " id="category_name" 
                                aria-describedby="emailHelp"
                                name="old_pass"
                                placeholder="Enter Your Old Password"
                                >

                                @error('old_pass')
                                <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                        </div>
                        @if(session('error')) 
                        
                            <strong class="text-danger mb-3"> {{ session('error') }} </strong>

                        @endif
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">New Password</label>
                                <input type="password" class="form-control @error('new_pass') is-invalid @enderror " 
                                aria-describedby="emailHelp"
                                name="new_pass"
                                placeholder="Enter Your New Password"
                                >

                                @error('new_pass')
                                <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                        </div>

                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control @error('confirm_pass') is-invalid @enderror " 
                                aria-describedby="emailHelp"
                                name="confirm_pass"
                                placeholder="Confirm Your Password"
                                >

                                @error('confirm_pass')
                                <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                        </div>
                        @if(session('danger')) 
                        
                            <strong class="text-danger mb-3"> {{ session('danger') }} </strong>

                        @endif

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        


    </div>

    

</div>
@endsection
