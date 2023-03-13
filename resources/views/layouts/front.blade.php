<!DOCTYPE html>
<html>
<body>
<head>
    <title>Home .:: BabaYaga ::. Home</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('css/memenu.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="BabaYaga"/>
    <link rel="stylesheet" type="text/css" media="all" href="{{mix('css/app.css')}}">

</head>
<div class="top-header">
    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">
                <div class="drop">
                    @guest
                    <div class="box">
                        <a href="{{url('/login')}}">Login</a>
                    </div>
                    <div class="box1">
                        <a href="{{url('/register')}}">Register</a>
                    </div>
                    @endguest
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="checkout.html">
                        <div class="total">
                            <span class="simpleCart_total"></span></div>
                        <img src="{{asset('images/cart-1.png')}}" alt=""/>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="logo">
    <a href="{{route('front')}}"><h1>BabaYaga</h1></a>
</div>

@include('layouts.frontHeader')

@yield('content')

@include('layouts.frontFooter')

@yield('scripts')
<script src="{{mix('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
