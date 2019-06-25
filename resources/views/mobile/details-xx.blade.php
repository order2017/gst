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
        .article_content li {
            list-style: none;
        }
        .article_content p img {
            width:100%;
        }
    </style>
@endsection

@section('content')

<div class="container" id="container">
    <div class="tabbar">
        <div class="weui_tab">
            <div class="weui_tab_bd">

                <div class="bd">
                    <article class="weui_article">
                        <section>
                            <section class="article_content">
                                商场招商上广商通，免费，快捷，还有钱收。<br>
								商业招商上广商通，免费，快捷，还有钱收。<br>
								商场买卖上广商通，快捷，保密，更轻松。<br>
								商业买卖上广商通，快捷，保密，更轻松。<br>
								品牌拓展上广商通，轻松，快捷，占领市场。<br>
								设备买卖上广商通，保密，价值，老板对老板的交易。<br><br>

									   广商通商业共享<br>
										  网络招商部<br>
										  商场买卖部<br>
										  品牌拓展部<br>
										  设备买卖部<br>
										  
								<p onclick="javascript:window.location='{{ url('/user-login')}}'">我注册会员，我发信息。连接会员中心。</p>
                                <br>
                                24小时客服电话:13823171801周生。
                                <br>
                                <br>
                                网络招商合同下载
                                <br>
                                <br>
                                <a href="{{ url('/download-xieyishu') }}">招商协议书下载</a>
                                <br>
                                <br>
                                <a href="{{ url('/download-yixiangshu') }}">招商意向书下载</a>
                            </section>
                        </section>
                    </article>
                </div>

            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection