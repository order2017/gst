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

                        {{--<div class="weui_cells weui_cells_radio"
                        @if($data['user_money']<=0) onclick="Fb()" @else onclick="javascript:window.location='/user-push'" @endif
                        >--}}
                        <div class="weui_cells weui_cells_radio" onclick="javascript:window.location='/user-push'" >
                            <label class="weui_cell weui_check_label" for="x12">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px;">免费发布信息</p>
                                </div>
                                <div class="weui_cell_ft">
                                    <input type="radio" class="weui_check" id="x12" checked="checked">
                                    <span class="weui_icon_checked"></span>
                                </div>
                            </label>
                        </div>

                        {{--@if(empty($contract->user_id))
                        <div class="weui_cells weui_cells_access">
                            <a class="weui_cell" href="/user-contract">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px; color: #5a5959;">商家签约</p>
                                </div>
                                <div class="weui_cell_ft">
                                    <span style="font-size: 14px; color: red;">去签约</span>
                                </div>
                            </a>
                        </div>
                        @else
                            <div class="weui_cells weui_cells_access">
                                <a class="weui_cell" href="/user-contract-show">
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <p style="font-size: 14px; color: #5a5959;">商家签约</p>
                                    </div>
                                    <div class="weui_cell_ft">
                                        <span style="font-size: 14px; color: green;">您已签约</span>
                                    </div>
                                </a>
                            </div>
                        @endif--}}


                        <div class="weui_panel weui_panel_access">

                            <div class="weui_panel_hd">您当前级别：<span style="color: red;">{{ $data['user_type_text'] }}</span></div>

                        </div>

                        <div class="weui_cells_title">个人会员中心</div>
                        <div class="weui_cells">
                            <div class="weui_cell">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px; color: #5a5959;">用户名：{{ $data['user_name'] }}</p>
                                </div>
                                <div class="weui_cell_ft" onclick="javascript:window.location='/user-password'">
                                    <span style="font-size: 14px;">修改密码</span>
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px; color: #5a5959;">手机号：{{ $data['user_phone'] }}</p>
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px; color: #5a5959;">微信号：{{ $data['wechat_number'] }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="weui_cells_title">会员充值中心</div>
                        <div class="weui_cells weui_cells_access">
                            <a class="weui_cell" href="/user-qrcode">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px; color: #5a5959;">当前余额：&yen; {{ $data['user_money'] }} 元</p>
                                </div>
                                <div class="weui_cell_ft">
                                    <span style="font-size: 14px; color: red;">去充值</span>
                                </div>
                            </a>
                            <a class="weui_cell" href="javascript:;">
                                <div class="weui_cell_bd weui_cell_primary">
                                    <p style="font-size: 14px; color: #5a5959;">浏览信息次数：{{ $data['user_number'] }} 次</p>
                                </div>
                                <div class="weui_cell_ft">
                                </div>
                            </a>
                        </div>

                        <br>
                        <div class="weui_btn_area">
                            <a class="weui_btn weui_btn_warn" href="/logout" id="showTooltips">退出</a>
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
    <script type="text/javascript">
        function Fb() {
            layer.msg('您的余额不足10元!');
        }
    </script>

    @if(Session::has('message'))
        @if(Session::get('message')==4)
            <script>layer.msg('您的余额不足10元，请充值！');</script>
        @endif
    @endif

    @if(!empty(request('qy')))
        <script>layer.msg('签约成功！');</script>
    @endif
@endsection