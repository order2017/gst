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
        .hd{
        	margin-bottom:0;
        	padding-bottom: 0;
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
                            <br/>
                            <p class="page_desc" style="color:green; font-size: 16px;">网络代理签约</p>
                        </div>
                        <div class="bd">
                            <form action="/user-contract-two" method="post">
                                {{ csrf_field() }}
                                <div class="weui_cells_title">商场买卖</div>
                                <div class="weui_cells weui_cells_form">

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场租期：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_name" value="{{ old('sc_name') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场名称：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_add" value="{{ old('sc_add') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商户租期：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_person" value="{{ old('sc_person') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场交租金：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_tel" value="{{ old('sc_tel') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商户收租金：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场交押金：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商户收押金：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场面积：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商户面积：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场转让费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">其它：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="weui_btn_area">
                                    <button type="submit" class="weui_btn weui_btn_primary">确定</button>
                                    <a href="/" class="weui_btn weui_btn_warn">返回</a>
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
            <script>layer.msg('商场名称不能为空!');</script>
        @elseif(Session::get('mgs')=='1')
            <script>layer.msg('联系人不能为空!');</script>
        @elseif(Session::get('mgs')=='2')
            <script>layer.msg('电话不能为空!');</script>
        @elseif(Session::get('mgs')=='188')
            <script>layer.msg('签约申请失败!');</script>
        @elseif(Session::get('mgs')=='199')
            <script>
                layer.msg('签约申请成功!');
                setTimeout(function () {
                    window.location.href="/user-index";
                },500)
            </script>
        @endif
    @endif

@endsection