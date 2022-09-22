@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    All Category
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
                            <th scope="col">Brand Name</th>
                            <th scope="col">Brand Image</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                                
                            @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                    <td> {{$brand->brand_name}} </td>
                                    <td> 
                                        <img src=" {{ asset($brand->brand_image) }} " alt=" {{$brand->brand_name}} " style="height:50px;width:70px;">
                                    </td>
                                    <td> {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}} </td>
                                    <td>
                                          <a href=" {{ url('Brand/Edit/'.$brand->id ) }} " class="btn btn-primary me-2">Edit </a>
                                          <a href=" {{ url('Delete/Brand/'.$brand->id ) }} " class="btn btn-danger " onclick="return confirm( 'Are you sure you want to delete?' )">Delete </a>

                                    </td>
                                    
                                  </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                      {{ $brands->links('pagination::bootstrap-5')  }}
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Brand Details
                    </div>
                        
                    <div class="card-body">
                         
                            

                        <form action=" {{route('store.brand')}} " method="POST" enctype="multipart/form-data">
                               @csrf 
                            <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Add Brand Name</label>
                                  <input type="text" class="form-control @error('brand_name') is-invalid @enderror " id="category_name" 
                                  aria-describedby="emailHelp"
                                  name="brand_name"
                                  placeholder="Enter Brand Name"
                                  >

                                  @error('brand_name')
                                    <span class="text-danger" style="color:red;"> {{$message}} </span>
                                  @enderror
                                  
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                <input type="file" class="form-control @error('brand_image') is-invalid @enderror " id="category_name" 
                                aria-describedby="emailHelp"
                                name="brand_image"
                                placeholder="Enter Brand Image"
                                >

                                @error('brand_image')
                                  <span class="text-danger" style="color:red;"> {{$message}} </span>
                                @enderror
                                
                          </div>
                                
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
        </div>


    </div>

    

</div>
@endsection
