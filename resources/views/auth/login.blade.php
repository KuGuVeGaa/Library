@extends('layouts.front')
    @section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>.:: BabaYaga | Login ::.</title>
    <link href="{{asset('}css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />

    <link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </div>
</div>
<div class="login">
    <div class="container">
        <div class="account-top heading">
            <h2>Login</h2>
        </div>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="account-main">
                <div class="col-md-6 account-left">
                    <h3>Existing User</h3>
                    <div class="account-bottom">
                        <input placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="text" tabindex="3" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" type="password" tabindex="4" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="address">
                            <a class="forgot" href="#">Forgot Your Password?</a>
                            <input type="submit" value="Login">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 account-right account-left">
                    <h3>New User? Create an Account</h3>
                    <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                    <a href="{{route('register')}}">Create an Account</a>
                </div>

                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="{{asset('js/simpleCart.min.js')}}"> </script>
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/memenu.js')}}"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="{{asset('js/jquery.easydropdown.js')}}"></script>
</body>
</html>

@endsection
