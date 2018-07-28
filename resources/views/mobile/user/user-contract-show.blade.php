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
                            <p class="page_desc" style="color:green; margin-top: 10px; font-size: 16px;">商家签约信息</p>
                        </div>
                        <div class="bd">
                            <form>
                                <div class="weui_cells_title">当前用户信息</div>
                                <div class="weui_cells weui_cells_form">
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd" style="color:red;">审核状态：@if($contract['sc_status']=="1") 未审核 @elseif($contract['sc_status']=="2") 审核中 @else 已审核 @endif</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">用户名：{{ $user['user_name'] }}</div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">手机号：{{ $user['user_phone'] }}</div>
                                    </div>
                                </div>

                                <div class="weui_cells_title">基本信息</div>
                                <div class="weui_cells weui_cells_form">

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">商场名称：{{ $contract['sc_name'] }}</div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">详细地址：{{ $contract['sc_add'] }}</div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">联系人：{{ $contract['sc_person'] }}</div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">联系电话：{{ $contract['sc_tel'] }}</div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">开店时间：{{ $contract['sc_time'] }}</div>
                                    </div>

                                </div>

                                <div class="weui_cells_title">商场定位</div>

                                <div class="weui_cells weui_cells_form">
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">方位：@if($contract['sc_fw']=="1") 否 @else 是 @endif</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">商业中心：@if($contract['sc_syzx']=="1") 否 @else 是 @endif</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">社区：@if($contract['sc_sq']=="1") 否 @else 是 @endif</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">城郊结合部-档次：@if($contract['sc_cjdc']=="1") 高 @elseif($contract['sc_cjdc']=="2") 中 @else 低 @endif</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_bd weui_cell_primary">
                                            具体描述：{{ $contract['sc_jtms'] }}
                                        </div>
                                    </div>

                                </div>

                                <div class="weui_cells_title">主要合同内容</div>
                                <div class="weui_cells weui_cells_form">

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">场地情况：{{ $contract['sc_cdqk'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">合同期限：{{ $contract['sc_htqx'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">保底：{{ $contract['sc_bd'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">扣率：{{ $contract['sc_kl'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">保证金：{{ $contract['sc_bzj'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">进场费：{{ $contract['sc_jcf'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">店庆费：{{ $contract['sc_dqf'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">管理费：{{ $contract['sc_glf'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">促销费：{{ $contract['sc_cxf'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">店杂费：{{ $contract['sc_dzf'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd">其它费：{{ $contract['sc_qtf'] }}</div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_bd weui_cell_primary">
                                            具体描述：{{ $contract['sc_htms'] }}
                                        </div>
                                    </div>

                                </div>

                                <div class="weui_btn_area">
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