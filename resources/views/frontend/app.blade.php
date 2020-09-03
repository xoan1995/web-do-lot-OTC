<!DOCTYPE html>
<html lang="en" >
<head>
    @foreach ($code as $item)
        {!!$item->header!!}
    @endforeach
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{$themes->favicon}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/call.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/responsive.css')}}">

</head>
<body>
    @foreach ($code as $item)
        {!!$item->body!!}
    @endforeach
    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d3be5a5fe5.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-slider.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    @if(Cart::instance('saveForLater')->count() > 0)
        <script>
            $('#pills-tab a[href="#pills-profile"]').tab('show')
        </script>
    @endif



    @foreach ($code as $item)
        {!!$item->footer!!}
    @endforeach
</body>
</html>
