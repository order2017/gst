<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>广商通</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <link rel="icon" type="image/png" href="{{ url('assets/i/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('assets/i/app-icon72x72@2x.png') }}">

    <link rel="stylesheet" href="{{ url('/assets/wechat/css/weui.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/wechat/css/example.css') }}">
    <link rel="stylesheet" href="//at.alicdn.com/t/font_532785_xo84tkcdojgrdx6r.css">

    @yield('style')
</head>
<body ontouchstart>

 @yield('content')

 <script src="{{ url('/assets/wechat/js/zepto.min.js') }}"></script>
 <script src="{{ url('assets/js/jquery.min.js') }}"></script>
 <script src="{{ url('assets/layer/layer.js') }}"></script>

@yield('script')
</body>
</html>