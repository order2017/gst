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
                                欢迎广大共享商业的用户购买广商通客户对接服务，让租方(卖方)与承租方(买方)直接交易服务。
                                <br><br>
                                一，广商通400电话对接服务:
                                <br><br>
                                每分钟收费为:<br>
                                商场招商为一元一分钟，<br>
                                商场买卖为十元一分钟，
                                <br><br>
                                商业招商为二元一分钟，<br>
                                商业买卖为二十元一分钟，
                                <br><br>
                                设备买卖为十元一分钟，<br>
                                品牌拓展为十元一分钟。
                                <br><br>
                                二，网络招商收费标准:<br>
                                共享商业中所有网络招商买卖拓展通过本公司客服推荐客户收费<br>
                                推荐一个意向客户:一个一百元，<br>
                                <br>
                                推荐一个签约一个意向客户，一个收费一千元，
                                <br>
                                推荐一个网络签约客户，一个收费半个月租金为拥金。
                                <br>
                                驻场线下招商标准:<br>
                                驻场人员工资三千保底包吃住，成功一个收一个月租金为拥金。
                                <br>
                                24小时客服电话:13823171801周生。
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