<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>zVintauge - Free Html5 Templates</title>
    <meta name="description" content="Free Responsive Html5 Css3 Templates | zerotheme.com">
    <meta name="author" content="https://www.zerotheme.com">

    <!-- Mobile Specific Metas
	================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
	================================================== -->
    <link rel="stylesheet" href="{{ asset('main/css/zerogrid.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">

    <!-- Custom Fonts -->
    <link href="{{asset('main/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('main/css/menu.css') }}">
    <script src="{{asset('main/js/jquery1111.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('main/js/jquery1111.min.js')}}js/script.js"></script>

    <!-- Owl Carousel Assets -->
    <link href="{{asset('main/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

<!--[if lt IE 9]>
    <script src="{{asset('main/js/html5.js')}}"></script>
    <script src="{{asset('main/js/css3-mediaqueries.js')}}"></script>
    <![endif]-->

    <style>
        html{

            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }

        body
        {
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;

        }

        .items-text {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }
        .logoH3{
            font-family: 'Dancing Script', cursive;
            font-size: 80px;
            color: #333;
            font-weight: bold;
            display: block;
            line-height: 1.3;
        }

        .mainDiv{
            max-width: 1000px;
        }
        a {
            text-decoration: none; /* Отменяем подчёркивание у ссылки */
        }

    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('comment/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('comment/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="home-page" >
<?php
use App\Models\Topmenu;use Illuminate\Support\Facades\DB;
$topmenu = Topmenu::menu();
$categories = DB::table('categories')->where('parent_id', null)->where('deleted_at',null)->get();
$lang = App::getLocale();
?>
<div class="wrap-body">
    <header class="">
        <div class="logo">
           <h3 class="logoH3">zVintauge</h3>
            <span> @lang('home.h2')</span>
        </div>

        <div id="cssmenu" class="align-center">
            <ul>
                <li class="{{ Route::is('index') ? 'active' : '' }}"><a href="{{route('index')}}"><span>@lang("home.home")</span></a></li>
                <li class="{{ Route::is('blog.category-items') ? 'active' : '' }} has-sub"><a><span>@lang("home.blog")</span></a>
                    <ul>

                        {{--  Сперва идут элементы имеющие ПОД-КЛАССЫ  --}}
                        @foreach($topmenu->roots() as $category)
                            @if($category->hasChildren())
                                <li class="has-sub"><a href="#"><span>{{$category->title}}</span></a>
                                    <ul>
                                        @if($category->hasChildren())
                                            @foreach($category->children() as $item)
                                                <li><a href="{{route('blog.category-items',$item->id)}}"><span>{{$item->title}}</span></a></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endforeach

                        {{--  Затем идут элементы БЕЗ ПОД-КЛАССОВ  --}}
                        @foreach($categories as $category)
                                <li class=""><a href="{{route('blog.category-items',$category->id)}}"><span>@if($lang == 'ru'){{$category->title_ru}}@endif @if($lang == 'en'){{$category->title}}@endif</span></a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ Route::is('about') ? 'active' : '' }}"><a href="{{route('about')}}"><span>@lang("home.about")</span></a></li>
                <li class="last {{ Route::is('contact') ? 'active' : '' }}"><a href="{{route('contact')}}"><span>@lang("home.contact")</span></a></li>
                <li><a href="{{route('cabinet.index')}}"><span>@lang("home.cabinet")</span></a></li>
                <li class="ml-5 {{$lang == 'ru' ? 'active' : ''}}">  <a href="{{ LaravelLocalization::getLocalizedURL("ru") }}">ru</a></li>
                <li class="{{$lang == 'en' ? 'active' : ''}}"><a href="{{ LaravelLocalization::getLocalizedURL("en") }}">en</a></li>
            </ul>
        </div>

        @yield('slider')
    </header>
    <!--////////////////////////////////////Container-->
    <section id="container">
        <div class="wrap-container">

            <!-----------------content-box-2-------------------->
            @yield('gallery')
            <!-----------------content-box-3-------------------->
            @yield('aboutUs_Like')
        </div>
    </section>
    <!--////////////////////////////////////Footer-->
    <footer>
        <div class="zerogrid wrap-footer">
            <div class="row">
                <div class="col-1-4 col-footer-1">
                    <div class="wrap-col">
                        <h3 class="widget-title">About Us</h3>
                        <p>Ut volutpat consectetur aliquam. Curabitur auctor in nis ulum ornare. Metus elit vehicula
                            dui. Curabitur auctor in nis ulum ornare. Sed consequat, augue condimentum fermentum</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque la
                            udantium</p>
                    </div>
                </div>
                <div class="col-1-4 col-footer-2">
                    <div class="wrap-col">
                        <h3 class="widget-title">Recent Post</h3>
                        <ul>
                            <li><a href="#">MOST VISITED COUNTRIES</a></li>
                            <li><a href="#">5 PLACES THAT MAKE A GREAT HOLIDAY</a></li>
                            <li><a href="#">PEBBLE TIME STEEL IS ON TRACK TO SHIP IN JULY</a></li>
                            <li><a href="#">STARTUP COMPANY???S CO-FOUNDER TALKS ON HIS NEW PRODUCT</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-1-4 col-footer-3">
                    <div class="wrap-col">
                        <h3 class="widget-title">Tag Cloud</h3>
                        <a href="#">animals</a>
                        <a href="#">cooking</a>
                        <a href="#">countries</a>
                        <a href="#">city</a>
                        <a href="#">children</a>
                        <a href="#">home</a>
                        <a href="#">likes</a>
                        <a href="#">photo</a>
                        <a href="#">link</a>
                        <a href="#">law</a>
                        <a href="#">shopping</a>
                        <a href="#">skate</a>
                        <a href="#">scholl</a>
                        <a href="#">video</a>
                        <a href="#">travel</a>
                        <a href="#">images</a>
                        <a href="#">love</a>
                        <a href="#">lists</a>
                        <a href="#">makeup</a>
                        <a href="#">media</a>
                        <a href="#">password</a>
                        <a href="#">pagination</a>
                        <a href="#">wildlife</a>
                    </div>
                </div>
                <div class="col-1-4 col-footer-4">
                    <div class="wrap-col">
                        <h3 class="widget-title">Gallery</h3>
                        <div class="row">
                            <div class="col-1-3">
                                <div class="wrap-col">
                                    <a href="#"><img src="{{asset('main/images/11.jpg')}}"></a>
                                    <a href="#"><img src="{{asset('main/images/1.jpg')}}"></a>
                                    <a href="#"><img src="{{asset('main/images/13.jpg')}}"></a>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="wrap-col">
                                    <a href="#"><img src="{{asset('main/images/10.jpg')}}"></a>
                                    <a href="#"><img src="{{asset('main/images/9.jpg')}}"></a>
                                    <a href="#"><img src="{{asset('main/images/4.jpg')}}"></a>
                                </div>
                            </div>
                            <div class="col-1-3">
                                <div class="wrap-col">
                                    <a href="#"><img src="{{asset('main/images/2.jpg')}}"></a>
                                    <a href="#"><img src="{{asset('main/images/6.jpg')}}"></a>
                                    <a href="#"><img src="{{asset('main/images/5.jpg')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="zerogrid bottom-footer">
            <div class="row">
                <div class="bottom-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                    <a href="#"><i class="fa fa-vimeo"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="copyright">
                Copyright @ - Designed by <a href="https://www.zerotheme.com">ZEROTHEME</a>
            </div>
        </div>
    </footer>
    <!-- carousel -->
    <script src="{{asset('main/owl-carousel/owl.carousel.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#owl-slide").owlCarousel({
                autoPlay: 3000,
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1],
                navigation: true,
                navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
                pagination: false
            });
        });
    </script>
</div>
</body>
</html>
