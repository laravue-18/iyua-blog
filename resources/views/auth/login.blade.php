@extends('layouts.master-without-nav')

@section('title')
Login
@endsection

@section('body')

<body style="background-image: url(https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80);">
    @endsection

    @section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{url('/')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <div class="p-2">
                                <div class="text-center py-4">
                                    <a class="navbar-brand" href="/">
                                        <img src="/assets/images/logo-lg.png" style="height: 4rem;">
                                    </a>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" @if(old('email')) value="{{ old('email') }}" @else value="admin@test.com" @endif id="username" placeholder="Enter username" autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="userpassword" value="password" placeholder="Enter password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Sign In</button>
                                    </div>

{{--                                    <div class="mt-4 text-center">--}}
{{--                                        <a href="password/reset" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>--}}
{{--                                    </div>--}}
                                </form>
                            </div>
                        </div>

                    </div>

{{--                    <div class="mt-5 text-center">--}}
{{--                        <p>Don't have an account ? <a href="{{url('register')}}" class="font-weight-medium text-primary"> Signup now </a> </p>--}}
{{--                        <p>© <script>--}}
{{--                                document.write(new Date().getFullYear())--}}
{{--                            </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
    @endsection
