@extends('layouts.admin_master')

@section('admin_content')
<div class="container mt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }} <span  class="badge bg-success"> {{ ('Active Now') }} </span>
                <b style="float:right;">Total users: <span  class="badge bg-secondary"> {{ count($users) }} </span></b>
                </div>
                    
                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">SI NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                    <td></td>
                                  </tr>
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
