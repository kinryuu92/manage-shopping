<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
{{--    <link rel="canonical" href="{{ $url }}">--}}

{{--    <meta property="og:image" content="{{ $imageUrl }}">--}}
{{--    <meta property="og:sitename" content="{{ $url }}">--}}
    @yield('title')
    <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body>

@include('frontEnd.components.header')
@yield('content')
@include('frontEnd.components.footer')

<script src="{{ asset('eshopper/js/jquery.js') }}"></script>
<script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('eshopper/js/price-range.js') }}"></script>
<script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}z"></script>
<script src="{{ asset('eshopper/js/main.js') }}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="0Mini8cJ"></script>
@yield('js')
</body>
</html>
