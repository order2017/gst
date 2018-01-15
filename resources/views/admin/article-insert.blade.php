@extends('layouts.admin')

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">发布文章</strong></div>
    </div>

    <hr/>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8"></div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

            <form class="am-form am-form-horizontal" method="post" action="{{ url('/admin/article-insert') }}" enctype="multipart/form-data" data-am-validator>
                {{ csrf_field() }}
                <fieldset>
                <div class="am-form-group">
                    <label for="article-title" class="am-u-sm-3 am-form-label">标题：</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="article-title" name="article_name" placeholder="标题" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-u-sm-3 am-form-label">封面图片：</label>
                    <div class="am-u-sm-9">
                        <div class="am-form-group am-form-file">
                            <img id="article_picture" src="{{ asset('/uploads/gst_logo.png') }}" class="am-img-thumbnail" style="height: 130px">
                            <input name="article_picture" id="file" type="file" multiple onchange="imgPreview(this,'article_picture')">
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="article-contact" class="am-u-sm-3 am-form-label">联系人：</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="article-contact" name="article_contact" value="周文彪" placeholder="联系人" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="article-phone" class="am-u-sm-3 am-form-label">电话</label>
                    <div class="am-u-sm-9">
                        <input type="tel" id="article-phone" name="article_tel" value="13800138000" placeholder="输入你的电话号码" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="article-QQ" class="am-u-sm-3 am-form-label">QQ</label>
                    <div class="am-u-sm-9">
                        <input type="number" pattern="[0-9]*" id="article-QQ" value="13800138000" name="article_qq" placeholder="输入你的QQ号码" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="article-type" class="am-u-sm-3 am-form-label">文章类型</label>
                    <div class="am-u-sm-9">
                        <select id="rticle-type" name="article_type" required>
                            <option value="">-=请选择所属类型=-</option>

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

                <div class="am-form-group">
                    <label for="article-intro" class="am-u-sm-3 am-form-label">内容</label>
                    <div class="am-u-sm-9">
                        <textarea name="article_content" rows="10" minlength="10" maxlength="100" id="article-intro" placeholder="输入内容"></textarea>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-9 am-u-sm-push-3">
                        <button type="submit" class="am-btn am-btn-primary">保存发布</button>
                    </div>
                </div>
                </fieldset>

            </form>

        </div>
    </div>
</div>
@endsection

@section('script')

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
            <script>layer.msg('插入失败！', {icon: 5}); </script>
        @endif
    @endif

@endsection
