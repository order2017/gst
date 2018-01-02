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
</head>
<body>

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>广商通</strong> <small>后台管理</small>
    </div>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
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
                            <a href="{{ url('/admin/article-insert') }}" class="am-cf"><span class="am-icon-check"></span> 发布文章<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/type-list') }}" class="am-cf"><span class="am-icon-check"></span> 类型列表 <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/type-insert') }}" class="am-cf"><span class="am-icon-check"></span> 添加类型 <span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a>
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
        <div class="admin-content-body">
            <div class="am-cf am-padding">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>一些常用模块</small></div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-bd am-table-striped admin-content-table">
                        <thead>
                        <tr>
                            <th>ID</th><th>用户名</th><th>最后成交任务</th><th>成交订单</th><th>管理</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td>1</td><td>John Clark</td><td><a href="#">Business management</a></td> <td><span class="am-badge am-badge-success">+20</span></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                    <ul class="am-dropdown-content">
                                        <li><a href="#">1. 编辑</a></li>
                                        <li><a href="#">2. 下载</a></li>
                                        <li><a href="#">3. 删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr><td>2</td><td>风清扬</td><td><a href="#">公司LOGO设计</a> </td><td><span class="am-badge am-badge-danger">+2</span></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                    <ul class="am-dropdown-content">
                                        <li><a href="#">1. 编辑</a></li>
                                        <li><a href="#">2. 下载</a></li>
                                        <li><a href="#">3. 删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr><td>3</td><td>詹姆斯</td><td><a href="#">开发一款业务数据软件</a></td><td><span class="am-badge am-badge-warning">+10</span></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                    <ul class="am-dropdown-content">
                                        <li><a href="#">1. 编辑</a></li>
                                        <li><a href="#">2. 下载</a></li>
                                        <li><a href="#">3. 删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr><td>4</td><td>云适配</td><td><a href="#">适配所有网站</a></td><td><span class="am-badge am-badge-secondary">+50</span></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                    <ul class="am-dropdown-content">
                                        <li><a href="#">1. 编辑</a></li>
                                        <li><a href="#">2. 下载</a></li>
                                        <li><a href="#">3. 删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>5</td><td>呵呵呵</td>
                            <td><a href="#">基兰会获得BUFF</a></td>
                            <td><span class="am-badge">+22</span></td>
                            <td>
                                <div class="am-dropdown" data-am-dropdown>
                                    <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                    <ul class="am-dropdown-content">
                                        <li><a href="#">1. 编辑</a></li>
                                        <li><a href="#">2. 下载</a></li>
                                        <li><a href="#">3. 删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

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

</body>
</html>