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
                            <form action="/user-contract" method="post">
                                {{ csrf_field() }}
                                <div class="weui_cells_title">基本信息</div>
                                <div class="weui_cells weui_cells_form">

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商场名称：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_name" value="{{ old('sc_name') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">详细地址：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_add" value="{{ old('sc_add') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">联系人：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_person" value="{{ old('sc_person') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">联系电话：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_tel" value="{{ old('sc_tel') }}">
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">开店时间：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_time" value="{{ old('sc_time') }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="weui_cells_title">商场定位</div>

                                <div class="weui_cells weui_cells_form">

                                    <div class="weui_cell weui_cell_select weui_select_after">
                                        <div class="weui_cell_hd">
                                            <label for="" class="weui_label">方位：</label>
                                        </div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <select class="weui_select" name="sc_fw">
                                                <option value="1">否</option>
                                                <option value="2">是</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="weui_cell weui_cell_select weui_select_after">
                                        <div class="weui_cell_hd">
                                            <label for="" class="weui_label">商业中心：</label>
                                        </div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <select class="weui_select" name="sc_syzx">
                                                <option value="1">否</option>
                                                <option value="2">是</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="weui_cell weui_cell_select weui_select_after">
                                        <div class="weui_cell_hd">
                                            <label for="" class="weui_label">社区：</label>
                                        </div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <select class="weui_select" name="sc_sq">
                                                <option value="1">否</option>
                                                <option value="2">是</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="weui_cell weui_cell_select weui_select_after">
                                        <div class="weui_cell_hd">
                                            <label for="" class="weui_label">城郊结合部-档次：</label>
                                        </div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <select class="weui_select" name="sc_cjdc">
                                                <option value="1">高</option>
                                                <option value="2">中</option>
                                                <option value="3">低</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="weui_cells weui_cells_form">
                                        <div class="weui_cell">
                                            <div class="weui_cell_bd weui_cell_primary">
                                                <textarea class="weui_textarea" placeholder="具体描述：" rows="3" name="sc_jtms">{{ old('sc_jtms') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="weui_cells_title">主要合同内容</div>
                                <div class="weui_cells weui_cells_form">

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">场地情况：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_cdqk" value="{{ old('sc_cdqk') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">合同期限：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_htqx" value="{{ old('sc_htqx') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">保底：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_bd" value="{{ old('sc_bd') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">扣率：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_kl" value="{{ old('sc_kl') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">保证金：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_bzj" value="{{ old('sc_bzj') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">进场费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_jcf" value="{{ old('sc_jcf') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">店庆费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_dqf" value="{{ old('sc_dqf') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">管理费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_glf" value="{{ old('sc_glf') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">促销费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_cxf" value="{{ old('sc_cxf') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">店杂费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_dzf" value="{{ old('sc_dzf') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">其它费：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="sc_qtf" value="{{ old('sc_qtf') }}">
                                        </div>
                                    </div>

                                    <div class="weui_cells weui_cells_form">
                                        <div class="weui_cell">
                                            <div class="weui_cell_bd weui_cell_primary">
                                                <textarea class="weui_textarea" placeholder="具体描述：" rows="3" name="sc_htms">{{ old('sc_htms') }}</textarea>
                                            </div>
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