@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                     Edit Category
                    </div>
                        
                    <div class="card-body">
                         
                            

                        <form action=" {{url('Store/Category/' . $categories->id)}} " method="POST">
                               @csrf 
                            <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Edit Category</label>
                                  <input type="text" class="form-control @error('category_name') is-invalid @enderror " id="category_name" 
                                  aria-describedby="emailHelp"
                                  name="category_name"
                                  placeholder=" {{$categories->category_name}} "
                                  >

                                  @error('category_name')
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
