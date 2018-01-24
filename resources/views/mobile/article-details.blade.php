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
                            <h2 class="title">{{ $data['article_name'] }}</h2>
                            <h3>发布日期：{{ $data['updated_at'] }}</h3>
                            <p>
                                <img src="{{ url('/uploads/'.$data['article_picture']) }}" width="100%" alt="{{ $data['article_name'] }}">
                            </p>
                            <section class="article_content">
                                {!! $data['article_content'] !!}
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