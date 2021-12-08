@extends('layouts.main')

@section('title', 'Login')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-8 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <img src="{{asset('img/logo.png')}}" alt="" height="30">
                                    <h1 class="h3 mt-2 text-gray-900 font-weight-bold">Breve</h1>
                                    <p class="text-small text-secondary">A simple URL shortener just for you.</p>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" 
                                        name="email"
                                        value="{{ old('email') }}"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="exampleInputEmail" 
                                        aria-describedby="emailHelp" 
                                        required 
                                        autocomplete="email"
                                        placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" 
                                        name="password" 
                                        required 
                                        autocomplete="current-password" 
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="exampleInputPassword" 
                                        placeholder="Password">
                                    </div>
                                    @error('email')
                                        <div class="text-small text-danger" style="font-size: 14px">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <button type="submit" class="btn btn-primary btn-user btn-block mt-4">
                                        Login
                                    </button>
                                    
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Create an account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection