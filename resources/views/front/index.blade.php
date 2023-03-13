@extends('layouts.front')
@section('content')
    @auth
        <div class="box">
            <a href="#" style="color: white">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
        </div>
        <div class="box">
            <a onclick="event.preventDefault();document.getElementById('logout-form').submit()" href="{{route('logout')}}">Exit</a>
            <form method="POST" action="{{route('logout')}}" id="logout-form">
                {{csrf_field()}}
            </form>
        </div>
    @endauth
    <div class="bnr" id="home">
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider4">
                @foreach(\App\Models\Slider::all() as $value)
                    <li>
                        <a class="mask" href="#">
                            <img class="img-responsive zoom-img"
                                 src="{{asset(\App\Helper\xHelper::largeImage($value->image))}}" alt="image"/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>

    @guest
    <div class="about">
        <div class="container">
            <div class="about-top grid-1">
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="{{asset('images/abt-1.jpg')}}" alt=""/>
                        <figcaption>
                            <h2>Nulla maximus nunc</h2>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="{{asset('images/abt-2.jpg')}}" alt=""/>
                        <figcaption>
                            <h4>Mauris erat augue</h4>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 about-left">
                    <figure class="effect-bubba">
                        <img class="img-responsive" src="{{asset('images/abt-3.jpg')}}" alt=""/>
                        <figcaption>
                            <h4>Cras elit mauris</h4>
                            <p>In sit amet sapien eros Integer dolore magna aliqua</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endguest
    <div class="product">
        <div class="container">
            <div class="product-top">
                <div class="product-one">
                    @foreach(\App\Models\Books::with('writer')->get()->chunk(4) as $chunk)
                        @foreach($chunk as $value)
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{route('book.detail',['selflink'=>$value['selflink']])}}" class="mask"><img style="width: 200px;height: 200px"
                                                                            class="img-responsive zoom-img"
                                                                            src="{{asset($value->image)}}"
                                                                            alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>{{$value->name}}</h3>
                                        {{--                                    <p>{{$value->writer->name}}</p>--}}
                                        <p>{{\App\Models\Writers::getField($value['writerId'],'name')}}</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                class=" item_price">${{$value->Price}}</span>
                                        </h4>
                                    </div>
                                    {{--                                <div class="srch">--}}
                                    {{--                                    <span>-50%</span>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
@endsection
