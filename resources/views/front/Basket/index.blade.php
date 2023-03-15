@extends('layouts.front')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Basket</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="ckeckout">
        <div class="container">
            <div class="ckeck-top heading">
                <h2>Basket</h2>
            </div>
            <div class="ckeckout-top">
                <div class="cart-items">
                    <h3>My Basket</h3>

                    <div class="in-check" >
                        <ul class="unit">
                            <li><span>Picture</span></li>
                            <li><span>Book Name</span></li>
                            <li><span>Unit Price</span></li>
                            <li><span>Delivery Details</span></li>
                            <li> </li>
                            <div class="clearfix"> </div>
                        </ul>
                        @foreach(\App\Helper\basketHelper::allList() as $key => $value)
                        <ul class="cart-header">
                            <div class="close1"> </div>
                            <li class="ring-in"><img style="width: 100px;height: 100px" src="{{$value['image']}}" class="img-responsive" alt=""></li>
                            <li><span class="name">{{$value['name']}}</span></li>
                            <li><span class="cost">$ 290.00</span></li>
                            <li><span>Free</span>
                                <p>Delivered in 2-3 business days</p></li>
                            <div class="clearfix"> </div>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
