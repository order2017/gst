<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>广商通</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{ url('assets/i/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('assets/i/app-icon72x72@2x.png') }}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="{{ url('assets/css/amazeui.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">
    @yield('style')
</head>
<body>

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>广商通</strong> <small>后台管理</small>
    </div>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="{{ url('/admin/logout') }}"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="{{ url('/admin/index') }}"><span class="am-icon-home"></span> 首页</a></li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 用户中心 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li>
                            <a href="{{ url('/admin/user-list') }}" class="am-cf"><span class="am-icon-check"></span> 用户列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a>
                        </li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#article-nav'}"><span class="am-icon-file"></span> 图文管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="article-nav">
                        <li>
                            <a href="{{ url('/admin/article-list') }}" class="am-cf"><span class="am-icon-check"></span> 文章列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/type-list') }}" class="am-cf"><span class="am-icon-check"></span> 类型列表 <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a>
                        </li>

                    </ul>
                </li>

                <li><a href="{{ url('/admin/logout') }}"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">

        @yield('content')

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2018 广商通</p>
        </footer>
    </div>
    <!-- content end -->

</div>

<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/amazeui.min.js') }}"></script>
<script src="{{ url('assets/js/app.js') }}"></script>
<script src="{{ url('assets/layer/layer.js') }}"></script>
@yield('script')
</body>
</html>