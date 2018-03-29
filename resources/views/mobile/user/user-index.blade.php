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
                        <div class="weui_cells_title">个人会员中心</div>
                        <div class="weui_cells">
                            <div class="weui_cell">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p>用户名：{{ $data['user_name'] }}</p>
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p>手机号：{{ $data['user_phone'] }}</p>
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p>微信号：{{ $data['wechat_number'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="weui_cells_title">会员充值中心</div>
                        <div class="weui_cells weui_cells_access">
                            <a class="weui_cell" href="javascript:;">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p>当前余额：1000元</p>
                                </div>
                                <div class="weui_cell_ft">
                                </div>
                            </a>
                            <a class="weui_cell" href="javascript:;">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p>浏览信息次数：1600次</p>
                                </div>
                                <div class="weui_cell_ft">
                                </div>
                            </a>
                        </div>

                        <br>
                        <div class="weui_btn_area">
                            <a class="weui_btn weui_btn_primary" href="/logout" id="showTooltips">退出</a>
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