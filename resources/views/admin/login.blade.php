<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>广商通</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="{{ url('assets/i/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('assets/css/amazeui.min.css') }}"/>
    <style>
        .header {
            text-align: center;
        }
        .header h1 {
            font-size: 200%;
            color: #333;
            margin-top: 30px;
        }
        .header p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="am-g">
        <h1>广商通</h1>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <form method="post" action="{{ url('/admin/login') }}" class="am-form" data-am-validator>
            {{ csrf_field() }}
            <label for="username">用户名:</label>
            <input type="text" name="user_name" id="username" placeholder="输入用户名" required>
            <br>
            <label for="password">密码:</label>
            <input type="password" name="password" id="password" placeholder="输入密码" required>
            <br />
            <div class="am-cf">
                <input type="submit" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
            </div>
        </form>
    </div>
</div>
<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/amazeui.min.js') }}"></script>
<script src="{{ url('assets/layer/layer.js') }}"></script>

@if(Session::has('message'))
    @if(Session::get('message')==1)
        <script>layer.msg('用户名不存在或者无权访问!', {icon: 5}); </script>
    @elseif(Session::get('message')==0)
        <script>layer.msg('密码错误!', {icon: 5}); </script>
    @elseif(Session::get('message')==2)
        <script>layer.msg('您无权访问该资源，请登陆！', {icon: 5}); </script>
    @elseif(Session::get('message')==3)
        <script>layer.msg('退出成功!', {icon: 6}); </script>
    @endif
@elseif(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>layer.msg('{{ $error }}',{icon: 5});</script>
    @endforeach
@endif

</body>
</html>