@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
            
        <div class="col-md-8">
                @if(session('success')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif


                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                        @foreach($images as $img)
                        <div class="col-md-4 col-sm-4" >
                          <div class="card h-80">
                            <img src=" {{ asset($img->image) }} " class=" img-fluid " alt="..." style="height:100%">
                          </div>
                        </div>
                        @endforeach
                </div>




                {{ $images->links('pagination::bootstrap-5')  }}
        </div>
        
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Multiple image
                    </div>
                        
                    <div class="card-body">
                         
                            

                        <form action=" {{ route('store.image') }} " method="POST" enctype="multipart/form-data">
                               @csrf 
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Multiple Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror " id="category_name" 
                                aria-describedby="emailHelp"
                                name="image[]"
                                placeholder="Enter Image"
                                multiple
                                >

                                @error('image')
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
