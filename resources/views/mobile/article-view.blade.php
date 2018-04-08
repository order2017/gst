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

                    <div class="weui_search_bar" id="search_bar">
                        <form class="weui_search_outer" action="/article-view" method="get">
                            <div class="weui_search_inner">
                                <i class="weui_icon_search"></i>
                                <input type="search" class="weui_search_input" id="search_input" name="article_name" @if(!empty(request('article_name'))) value="{{ request('article_name') }}" @endif placeholder="请输入搜索的信息">
                                <input type="hidden" name="type_id" value="{{ request('type_id') }}">
                                <input type="submit" value="立即搜索" class="weui_icon_clear" id="search_clear" style="height: 30px;">
                            </div>
                        </form>
                    </div>

                </div>

                <div class="main clearfix">
                    @foreach($data as $list)
                        <div onclick="window.location='{{ url('/article-details?article_id='.$list['article_id']) }}'">
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