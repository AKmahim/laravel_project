@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                     Update Brand
                    </div>
                        
                    <div class="card-body">
                            

                        <form action=" {{ url('Update/Brand/' . $brands->id) }} " method="POST" enctype="multipart/form-data">
                               @csrf 
                               <input type="hidden" value=" {{ $brands->brand_image }} " name="old_image">
                            <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Edit Brand Name</label>
                                  <input type="text" class="form-control @error('brand_name') is-invalid @enderror " id="category_name" 
                                  aria-describedby="emailHelp"
                                  name="brand_name"
                                  placeholder=" {{$brands->brand_name}} "
                                  value=" {{ $brands->brand_name }} "
                                  >

                                  @error('brand_name')
                                    <span class="text-danger" style="color:red;"> {{$message}} </span>
                                  @enderror
                                  
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Update Brand Image</label>
                                <input type="file" class="form-control @error('brand_image') is-invalid @enderror "
                                aria-describedby="emailHelp"
                                name="brand_image"
                                >

                                @error('brand_image')
                                  <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                          </div>

                          <div class="mb-3">
                           
                            <img src=" {{ asset($brands->brand_image) }} " style="height: 45px;width:60px">
                            
                          </div>

                                
                          <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
