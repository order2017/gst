@extends('layouts.index')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://topoadmin.github.io/address/dist/amazeui.min.css">
    <link rel="stylesheet" type="text/css" href="https://topoadmin.github.io/address/dist/amazeui.address.css">
    <style type="text/css">
        .weui_grid_icon + .weui_grid_label {
            margin-top: 10px;
        }
        .iconfont {
            font-size: 23px;
            color:#3cc51f;
        }
        #edui11_body{
            width: 320px !important;
        }
        #edui11_content{
            width: 320px !important;
        }
        #edui4_body{
            width: 320px !important;
        }
        #edui4_content{
            width: 320px !important;
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
                            <form action="/user-push" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="weui_cells weui_cells_form">
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">标题：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="article_name" placeholder="输入标题" required>
                                        </div>
                                    </div>

                                    {{----}}
                                    <div class="weui_cell">
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <div class="weui_uploader">
                                                <div class="weui_uploader_hd weui_cell">
                                                    <div class="weui_cell_bd weui_cell_primary">上传封面图：</div>
                                                </div>

                                                <div class="weui_uploader_bd">
                                                    <ul class="weui_uploader_files">
                                                        <li class="weui_uploader_file">
                                                            <img id="article_picture" class="weui_uploader_file" src="{{ asset('/uploads/gst_logo.png') }}" >
                                                        </li>
                                                    </ul>
                                                    <div class="weui_uploader_input_wrp">
                                                        <input class="weui_uploader_input" name="article_picture" id="file" type="file" accept="image/*" multiple onchange="imgPreview(this,'article_picture')">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{----}}

                                    <hr>

                                    <div class="weui_cells_title" style="font-size: 16px; color: black;">上传多张图片及视频：</div>
                                    <div class="weui_cells weui_cells_form">
                                        <div class="weui_cell">
                                            <div class="weui_cell_bd weui_cell_primary">
                                                <script id="contents" name="article_all" type="text/plain"></script>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">联系人：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="article_contact" placeholder="输入联系人" required>
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">电话：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="tel" name="article_tel" placeholder="输入你的电话号码" required>
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">微信：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="article_qq" placeholder="输入你的微信" required>
                                        </div>
                                    </div>

                                    <div class="weui_cell weui_cell_select weui_select_after">
                                        <div class="weui_cell_hd">
                                            <label for="" class="weui_label">类型：</label>
                                        </div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <select class="weui_select" name="article_type" required>
                                                <option value="">请选择所属类型</option>
                                                @foreach($data as $value)
                                                    @if($value->size==1)
                                                        <option value="{{$value->type_id}}">{{$value->html}}</option>
                                                    @else
                                                        <option disabled value="{{$value->type_id}}">{{$value->html}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="weui_cells_title" style="font-size: 16px; color: black;">招商项目：</div>
                                    <div class="weui_cells weui_cells_form">
                                        <div class="weui_cell">
                                            <div class="weui_cell_bd weui_cell_primary">
                                                <textarea class="weui_textarea" name="article_content" placeholder="请输入内容" rows="5" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">商圈：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="article_sq" placeholder="请输入商圈" required>
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">面积：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="text" name="article_mj" placeholder="请输入面积" required>
                                        </div>
                                    </div>

                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">地址：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            {{----}}
                                            <div class="am-form-group am-input-group" id="address2">
                                                <input readonly type="text" class="weui_input" name="article_add" placeholder="请选择地址" required="">
                                            </div>
                                            {{----}}
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">街道：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            {{----}}
                                            <div class="am-form-group am-input-group" id="address2">
                                                <input type="text" class="weui_input" name="article_street" placeholder="请输入街道" required>
                                            </div>
                                            {{----}}
                                        </div>
                                    </div>
                                    {{--<div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">招商合同：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            --}}{{----}}{{--
                                            <div class="am-form-group am-input-group" id="address2">
                                                <input type="text" class="weui_input" name="" placeholder="请输入网络招商合同" required>
                                            </div>
                                            --}}{{----}}{{--
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">意向书：</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            --}}{{----}}{{--
                                            <div class="am-form-group am-input-group" id="address2">
                                                <input type="text" class="weui_input" name="" placeholder="请输入招商意向书" required>
                                            </div>
                                            --}}{{----}}{{--
                                        </div>
                                    </div>--}}

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
    @include('vendor.ueditor.assets')
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('contents', {
            toolbars: [
                ['simpleupload','insertimage','insertvideo']
            ],
            autoHeightEnabled: true,
            autoFloatEnabled: true
        });
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });

    </script>

    <script>
        function imgPreview(fileDom,src){

            if (window.FileReader) {
                var reader = new FileReader();
            } else {
                alert("您的设备不支持图片预览功能，如需该功能请升级您的设备！");
            }

            var file = fileDom.files[0];
            var imageType = /^image\//;

            if (!imageType.test(file.type)) {
                alert("请选择图片！");
                return;
            }

            reader.onload = function(e) {

                var img = document.getElementById(src);

                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>

    @if(Session::has('message'))
        @if(Session::get('message')==0)
            <script>layer.msg('发布失败!');</script>
        @elseif(Session::get('message')==1)
            <script>layer.msg('发布成功!');</script>
        @endif
    @endif

    <script src="https://topoadmin.github.io/address/dist/amazeui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://topoadmin.github.io/address/dist/iscroll.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://topoadmin.github.io/address/dist/address.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
        $(function() {
            //	带底部的
            $("#address2").address({
                prov: "广东省",
                city: "深圳市",
                district: "光明新区",
                scrollToCenter: true,
                footer: true,
                selectEnd: function(json) {
                    // console.log(JSON.stringify(json));
                }
            });
        });
    </script>
@endsection