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
                    <div class="hd" style="padding: 2em 0 0 0;">
                        <h1 class="page_title">广商通商业共享</h1>
                        <p class="page_desc" style="color:red;">共享-商业-商品-服务-金融</p>
                    </div>
                    <div class="bd">
                        <article class="weui_article">
                            <section>
                                <p>
                                    <img src="{{ asset('assets/i/qrcode.jpg') }}" alt="">
                                </p>
                            </section>
                        </article>
                        <div class="weui_btn_area">
                            <a href="{{ url('/user-index?qy=1') }}" class="weui_btn weui_btn_primary">确定签约</a>
                            <a href="{{ url()->previous() }}" class="weui_btn weui_btn_warn">返回</a>
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