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
                        <h1 class="page_title">广商通</h1>
                        <p class="page_desc">专业为商业打造系统平台</p>
                    </div>
                    <div class="bd">
                        <div class="weui_cells weui_cells_form">
                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="text" placeholder="请输入用户名">
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">密 码</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="password" placeholder="请输入密码">
                                </div>
                            </div>
                        </div>
                        <div class="weui_cells_tips">
                            <a href="javascript:;" class="weui_cells_tips">用户注册</a>
                            <a href="javascript:;" class="weui_cells_tips">找回密码</a>
                        </div>
                        <div class="weui_btn_area">
                            <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips">确定</a>
                        </div>
                    </div>
                </div>
            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection