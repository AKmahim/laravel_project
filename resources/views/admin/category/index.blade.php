{{-- @extends('layouts.app') --}}
@extends('layouts.admin_master')

@section('admin_content')
<div class="container ms-5">
    <div class="row justify-content-center mt-5" >
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header ">
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
                            <th scope="col">Name</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                                
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td> {{$category->category_name}} </td>
                                    <td> {{$category->user->name}} </td>
                                    <td> {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}} </td>
                                    <td>
                                          <a href=" {{ url('Category/Edit/'.$category->id ) }} " class="btn btn-primary me-2">Edit </a>
                                          <a href=" {{ url('softdelete/category/'.$category->id ) }} " class="btn btn-danger ">Delete </a>

                                    </td>
                                    
                                  </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                      {{ $categories->links('pagination::bootstrap-5')  }}
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header">
                        Add Category
                    </div>
                        
                    <div class="card-body">
                         
                            

                        <form action=" {{route('store.category')}} " method="POST">
                               @csrf 
                            <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Add Category</label>
                                  <input type="text" class="form-control @error('category_name') is-invalid @enderror " id="category_name" 
                                  aria-describedby="emailHelp"
                                  name="category_name"
                                  placeholder="Enter Category"
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

    {{-- this div is for trash box --}}
    <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    Trash Box
                </div>
                    
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    {{-- @if(session('success')) 
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('success') }} </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif --}}

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SI NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                          </tr>
                        </thead>
                        <tbody>
                                
                            @foreach($trashCat as $category )
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td> {{$category->category_name}} </td>
                                    <td> {{$category->user->name}} </td>
                                    <td> {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}} </td>
                                    <td>
                                          <a href=" {{ url('Category/Restore/'. $category->id ) }} " class="btn btn-primary me-2">Restore </a>
                                          <a href=" {{ url('pdelete/category/' . $category->id ) }} " class="btn btn-danger ">Delete permanately </a>

                                    </td>
                                    
                                  </tr>
                          @endforeach
                          
                          
                        </tbody>
                      </table>
                      {{ $trashCat->links('pagination::bootstrap-5')  }}
                    
                </div>
            </div>
    </div>
    <div class="col-md-4">

    </div>

</div>
@endsection
