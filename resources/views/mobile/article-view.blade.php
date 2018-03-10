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
    </style>
@endsection

@section('content')

<div class="container" id="container">
    <div class="tabbar">
        <div class="weui_tab">
            <div class="weui_tab_bd">

                <div class="navbar">
                    <div class="bd" style="height: 100%;">
                        <div class="weui_tab">
                            <div class="weui_navbar">
                                <div class="weui_navbar_item weui_bar_item_on">
                                    @foreach($type as $val)
                                        @if($val->type_id == request('type_id'))
                                            {{ substr($val->html,5,100) }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="weui_tab_bd"></div>
                        </div>
                    </div>
                </div>

                <div class="main clearfix">
                    @foreach($data as $list)
                        <div onclick="window.location='{{ url('/article-details?article_id='.$list['article_id']) }}'">
                            <img src="{{ \App\Article::TitlePic($list['article_picture']) }}" alt="" width="100%" height="100px">
                            <p>{{ $list['article_name'] }}</p>
                        </div>
                    @endforeach
                </div>

            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection