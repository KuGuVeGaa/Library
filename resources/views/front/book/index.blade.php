@extends('layouts.front')
@section('content')
    <div class="col-md-12"
         style="--bs-breadcrumb-divider: '>';font-size: 15px;left: 2cm"
         aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{route('front')}}">Home Page</a></li>
            <li class="breadcrumb-item ">{{$data[0]->name}}</li>
        </ol>
    </div>
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="{{asset('/images/Assassin\'sCreedtheRenaissanceCodex.jpg')}}">
                                        <div class="col-xs-12 thumb-image"><img src="{{asset('/images/Assassin\'sCreedtheRenaissanceCodex.jpg')}}"
                                                                      data-imagezoom="true" class="img-responsive"
                                                                      alt=""/></div>
                                    </li>
                                    <li data-thumb="{{asset(\App\Helper\xHelper::largeImage($data[0]['image']))}}">
                                        <div class="col-xs-12 thumb-image"><img src="{{asset(\App\Helper\xHelper::largeImage($data[0]['image']))}}"
                                                                      data-imagezoom="true" class="img-responsive"
                                                                      alt=""/></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{$data[0]->name}}</h2>
                                <div class="star-on">
                                    <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#"> 1 read review </a>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <h5 class="item_price">$ {{$data[0]->Price}}.00</h5>
                                <p> {{$data[0]->Description}}}</p>
                                <ul class="tag-men">
                                    <li><span>Category</span>
                                        <span class="span_3_of_2">: {{\App\Models\Category::getField($data[0]['categoryId'],'name')}}</span></li>
                                    <li><span>Writer</span>
                                        <span class="span_3_of_2">: {{$data[0]->writer->name}}</span></li>
                                    <li><span>Publisher House</span>
                                        <span class="span_3_of_2">: {{$data[0]->publisher->name}}</span></li>
                                </ul>
                                <a href="#" class="add-cart item_add">ADD TO CART</a>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="latestproducts">
                        <div class="product-one">
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                                                            src="images/p-1.png" alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>Smart Watches</h3>
                                        <p>Explore Now</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                class=" item_price">$ 329</span></h4>
                                    </div>
                                    <div class="srch">
                                        <span>-50%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                                                            src="images/p-2.png" alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>Smart Watches</h3>
                                        <p>Explore Now</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                class=" item_price">$ 329</span></h4>
                                    </div>
                                    <div class="srch">
                                        <span>-50%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                                                            src="images/p-3.png" alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>Smart Watches</h3>
                                        <p>Explore Now</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                class=" item_price">$ 329</span></h4>
                                    </div>
                                    <div class="srch">
                                        <span>-50%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 single-right">
                    <div class="w_sidebar">
                        <section class="sky-form">
                            <h4>Catogories</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All
                                        Accessories</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids
                                        Watches</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men
                                        Watches</label>
                                </div>
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>Brand</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox"
                                                                   name="checkbox"><i></i>Fastrack</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
                                    <label class="checkbox"><input type="checkbox"
                                                                   name="checkbox"><i></i>Citizen</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>
                                </div>
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>Colour</h4>
                            <ul class="w_nav2">
                                <li><a class="color1" href="#"></a></li>
                                <li><a class="color2" href="#"></a></li>
                                <li><a class="color3" href="#"></a></li>
                                <li><a class="color4" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                                <li><a class="color12" href="#"></a></li>
                                <li><a class="color13" href="#"></a></li>
                                <li><a class="color14" href="#"></a></li>
                                <li><a class="color15" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                            </ul>
                        </section>
                        <section class="sky-form">
                            <h4>discount</h4>
                            <div class="row1 row2 scroll-pane">
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and
                                        above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                                </div>
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- FlexSlider -->
    <script src="{{asset('js/imagezoom.js')}}"></script>
    <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css" media="screen"/>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

@endsection
