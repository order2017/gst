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
                            <form action="/set-password" method="post">
                                {{ csrf_field() }}
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">新密码</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="password" name="password" placeholder="请输入新密码">
                                        <input class="weui_input" type="hidden" name="user_phone" value="{{ request('user_phone') }}">
                                    </div>
                                </div>
                                <div class="weui_cell">
                                    <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <input class="weui_input" type="password" name="fixed_password" placeholder="请输入确认密码">
                                    </div>
                                </div>
                                <div class="weui_btn_area">
                                    <button type="submit" class="weui_btn weui_btn_primary">确定</button>
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
            <script>layer.msg('密码和确认密码不能为空!');</script>
        @elseif(Session::get('message')=='1')
            <script>layer.msg('密码和确认密码不相同!');</script>
        @endif
    @endif

@endsection