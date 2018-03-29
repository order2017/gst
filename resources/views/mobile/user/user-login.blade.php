@extends('layouts.index')

@section('style')
    <style type="text/css">
        .weui_grid_icon + .weui_grid_label {
            margin-top: 10px;
        }
        .iconfont {
            font-size: 23px;
            color:#3cc51f;
        }
    </style>
@endsection

@section('content')

<div class="container" id="container">
    <div class="tabbar">
        <div class="weui_tab">
            <div class="weui_tab_bd">
                <div class="home">
                    <div class="hd">
                        <h1 class="page_title">广商通商业共享</h1>
                        <p class="page_desc" style="color:red;">共享-商业-商品-服务-金融</p>
                    </div>
                    <div class="bd">
                        <form onsubmit="return false" id="formAdd">
                            <div class="weui_cells weui_cells_form">
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="text" name="user_name" placeholder="请输入用户名">
                                    </div>
                                </div>
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">密 码</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="password" name="password" placeholder="请输入密码">
                                    </div>
                                </div>
                            </div>
                            <div class="weui_cells_tips">
                                <a href="{{ url('/user-register') }}" class="weui_cells_tips">用户注册</a>
                                <a href="javascript:;" class="weui_cells_tips">找回密码</a>
                            </div>
                            <div class="weui_btn_area">
                                <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips" onclick="Login()">确定</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection

@section('script')

    @if(Session::has('message'))
        @if(Session::get('message')=='0')
            <script>layer.msg('请登录!');</script>
        @elseif(Session::get('message')=='3')
            <script>layer.msg('退出成功!');</script>
        @endif
    @endif

    <script type="text/javascript">
        function Login() {
            str=$("#formAdd").serialize();
            $.post('/user-login',{string:str,'_token':'{{csrf_token()}}'},function(data){
                if(data['success']=="登录成功"){
                    layer.msg(data['success'],function () {
                        window.location.href="/user-index";
                    });
                }else{
                    layer.msg(data['error']);
                }
            });
        }
    </script>

@endsection