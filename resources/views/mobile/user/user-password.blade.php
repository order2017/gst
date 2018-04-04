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
                        <form action="/user-password" method="post">
                            {{ csrf_field() }}
                            <div class="weui_cells weui_cells_form">
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="text" name="user_name" value="{{ $data['user_name'] }}" disabled>
                                        <input  type="hidden" name="user_id" value="{{ $data['user_id'] }}">
                                    </div>
                                </div>
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">密 码</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="password" name="password" placeholder="请输入密码">
                                    </div>
                                </div>
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="password" name="fixed_password" placeholder="请输入确认密码">
                                    </div>
                                </div>
                            </div>
                            <div class="weui_btn_area">
                                <button type="submit" class="weui_btn weui_btn_primary">确定</button>
                                <a href="/user-index" class="weui_btn weui_btn_warn">返回</a>
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

    @if(Session::has('mgs'))
        @if(Session::get('mgs')=='0')
            <script>layer.msg('密码与确认密码不能为空!');</script>
        @elseif(Session::get('mgs')=='1')
            <script>layer.msg('两次密码不相同!');</script>
        @elseif(Session::get('mgs')=='2')
            <script>
                layer.msg('密码修改成功!');
                setTimeout(function () {
                    window.location.href="/logout";
                },500)
            </script>
        @endif
    @endif

@endsection