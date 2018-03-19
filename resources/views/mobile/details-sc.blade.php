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
                                加入-共享商超网购-线上线下销售-更轻松！
                                <br><br>
                                加入实体店会员，网购零售公司收零售额的百分之一服务费，批发团购公司收批发团购交易额的百分零点三服务费。通过入店保证金中扣入，保证金不够服务终止。先交易后补交。<br>
                                实体店会员<br><br>

                                网购模式<br><br>

                                店名<br>
                                地址<br>
                                电话<br>
                                商品<br>
                                实现网购<br>
                                共享超市员工送货上门，<br>
                                共享商品快递送货上门(或在共享超市取货)，<br>
                                共享商城快递送货上门<br>
                                共享商家员工送货上门<br>
                                共享服务客服上门服务<br>
                                共享金融客服上门服务。
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