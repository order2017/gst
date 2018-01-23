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

                <div class="main clearfix">
                    <div class="box1" onclick="window.location='{{ url('/article-details') }}'">
                        <img src="{{ url('/uploads/gst_logo.png') }}" alt="" width="100%">
                        <p>嘉荣超市</p>
                    </div>
                    <div class="box2" onclick="window.location='{{ url('/article-details') }}'">
                        <img src="{{ url('/uploads/gst_logo.png') }}" alt="" width="100%">
                        <p>大众超市</p>
                    </div>
                </div>

            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection