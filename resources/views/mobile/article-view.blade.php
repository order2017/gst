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

        .main {
            width: 100%;
        }
        .clearfix:after{
            visibility: hidden;
            display: inline-block;
            content: "";
            height: 0;
            clear: both;
            *zoom: 1;

        }
        .main>div {
            width: 48%;
            background-color: #EFEFF4;
            border-radius: 3%;
            float: left;
            margin: 1%;
        }
        .page_title {
            font-size: 26px;
        }
    </style>
@endsection

@section('content')

<div class="container" id="container">
    <div class="tabbar">
        <div class="weui_tab">
            <div class="weui_tab_bd">

                <div class="hd" style="padding: 1em 0;">
                    <h1 class="page_title">
                        @foreach($type as $val)
                            @if($val->type_id == request('type_id'))
                                {{ substr($val->html,5,100) }}
                            @endif
                        @endforeach
                    </h1>
                </div>
                <div class="bd">

                    {{--地址用的--}}
                    <form action="/article-view-s" method="get">
                        <div class="weui_cell weui_cell_warn">
                            <div class="weui_cell_hd"><label for="" class="weui_label">国家/地区</label></div>
                            <div class="weui_cell_bd weui_cell_primary" id="address2">
                                <input readonly type="text" class="weui_input" name="article_add" placeholder="请选择地区" @if(!empty(request('article_name'))) value="{{ request('article_name') }}" @endif>
                            </div>
                            <div class="weui_cell_ft">
                                <input type="hidden" name="type_id" value="{{ request('type_id') }}">
                                <input type="submit" value="确定" class="weui_icon_clear" id="search_clear" style="width: 80px; height: 30px;">
                            </div>
                        </div>
                    </form>

                    <div class="weui_search_bar" id="search_bar">
                        <form class="weui_search_outer" action="/article-view" method="get">
                            <div class="weui_search_inner">
                                <i class="weui_icon_search"></i>
                                <input type="search" class="weui_search_input" id="search_input" name="article_name" @if(!empty(request('article_name'))) value="{{ request('article_name') }}" @endif placeholder="请输入搜索的信息">
                                <input type="hidden" name="type_id" value="{{ request('type_id') }}">
                                <input type="submit" value="立即搜索" class="weui_icon_clear" id="search_clear" style="height: 30px; margin-right: 80px;">
                                @if(session()->has('mobile_user'))
                                    <input type="button" value="发布信息" onclick="javascript:window.location='/user-push'" class="weui_icon_clear" id="search_clear" style="height: 30px;">
                                @else
                                    <input type="button" value="发布信息" onclick="javascript:window.location='/user-register'" class="weui_icon_clear" id="search_clear" style="height: 30px;">
                                @endif
                            </div>
                        </form>
                    </div>

                </div>

                <div class="main clearfix">
                    @foreach($data as $list)
                        <div onclick="window.location='{{ url('/article-details?article_id='.$list['article_id'].'&type_id='.request('type_id')) }}'">
                            <img src="{{ \App\Article::TitlePic($list['article_picture']) }}" alt="" width="100%" height="100px">
                            <p>{{ str_limit($list['article_name'], $limit = 20, $end = '...') }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection

@section('script')
    {{--<script>
        layer.open({
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '240px'], //宽高
            content: 'html内容'
        });
    </script>--}}

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