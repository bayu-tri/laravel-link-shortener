@extends('layouts.main')

@section('title', 'Register')

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
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="30">
                                <h1 class="h3 mt-2 text-gray-900 font-weight-bold">Breve</h1>
                                <p class="text-small text-secondary">A simple URL shortener just for you.</p>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" 
                                    class="form-control form-control-user @error('name') is-invalid @enderror" 
                                    id="FullName" 
                                    placeholder="Full Name" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name">
                                </div>
                                @error('name')
                                    <div class="text-small text-danger" style="font-size: 14px">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <input type="email" 
                                    class="form-control form-control-user @error('email') is-invalid @enderror" 
                                    id="InputEmail" 
                                    placeholder="Email Address" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email">
                                </div>
                                @error('email')
                                    <div class="text-small text-danger mb-3" style="font-size: 14px">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" 
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="InputPassword" 
                                        placeholder="Password" 
                                        name="password" 
                                        required 
                                        autocomplete="new-password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" 
                                        class="form-control form-control-user @error('password') is-invalid @enderror" 
                                        id="RepeatPassword" 
                                        placeholder="Repeat Password" 
                                        name="password_confirmation" 
                                        required 
                                        autocomplete="new-password">
                                    </div>
                                </div>
                                @error('password')
                                    <div class="text-small text-danger mb-3" style="font-size: 14px">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
