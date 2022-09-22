@extends('layouts.admin_master')

@section('admin_content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Admin Login</h3></div>
                        <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf 
                                <div class="form-floating mb-3">
                                    <input   class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" 
                                    @error('email') is-invalid @enderror value="{{ old('email') }}" required autocomplete="email" autofocus
                                    />
                                    <label for="inputEmail">Email address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                

                                <div class="form-floating mb-3">
                                    <input name="password" required class="form-control" id="inputPassword" type="password" placeholder="Password" @error('password') is-invalid @enderror name="password" required autocomplete="current-password"/>
                                    <label for="inputPassword">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>

                                {{-- remember password --}}
                                <div class="form-check mb-3">
                                    <input name="remember" class="form-check-input" id="inputRememberPassword" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                    <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                    </button>
                                    
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection