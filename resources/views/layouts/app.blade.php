<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{isset($title)?$title .' | '. config('app.name'): config('app.name')}}</title>
    @extends('landingpage.maincss')
    <script type="text/javascript" src="/js/multiple-item-carousel.js"></script>
    @yield('css')
    {{-- <link rel="stylesheet" type="text/css" href="/css/w3.css"> --}}
    <link rel="stylesheet" type="text/css" href="/css/multiple-item-carousel.css">
    <link rel="stylesheet" href="/admin/vendors/sweetalert/css/sweetalert.css"/>
    <script src="/js/sweetalert.min.js"></script>
</head>
<body>
      <!-- Top Nav Start -->
    @if(Auth::check())
         @include('landingpage.topnav')
    @endif
    <!-- Top Nav Stop -->

    <!-- Header Start -->
    @if( Request::url() != url('/login') and Request::url() != url('/sign-up'))
            @include('landingpage.headernav')
    @endif
    <!-- //Header End -->

    <!--Carousel Start -->
    @if(Request::url() == url('/'))
        @include('landingpage.carousel')
    @endif
    <!-- //Carousel End -->
    @if($flash = session('error'))
        <script>
            swal({
            title: "Oops! Something Went Wrong",
            text: "",
            icon: "error",
            button: "OK",
            });
        </script>
    @elseif($flash = session('registered'))
        <script>
            swal({
            title: "Registered Successfully",
            text: "",
            icon: "success",
            button: "OK",
            });
        </script>
    @endif
    <div>@yield('contents')</div>

    @if(Request::url() != url('/login') and Request::url() !=  url('/sign-up') and Request::url() != url('/search-result'))
        <div class="copyright" style="position:absolute; text-align: center; width:100%">
            <div class="container">
                <p class="text-center">Copyright &copy; Central Mindanao University | Research Office</p>
            </div>
        </div>
    @endif
    
    @if(Request::url() == url('/'))
        <a style="background-color:#01bc8c" id="back-to-top" href="#" class="btn btn-success btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
            <i class="livicon" data-name="angle-double-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
        </a>
    @endif
    @yield('scripts')
</body>
</html>
