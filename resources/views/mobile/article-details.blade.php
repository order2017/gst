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
                                <h2 class="title" style="color: red;">{{ $data['article_name'] }}</h2>
                                <hr>
                                <h3>发布日期：{{ $data['updated_at'] }}</h3>
                                <p>
                                    <img src="{{ \App\Article::TitlePic($data['article_picture']) }}" width="100%" alt="{{ $data['article_name'] }}">
                                </p>
                                @if(session()->has('mobile_user'))
                                    <?php
                                    $userData = \App\User::where('user_id',session()->get('mobile_user')['user_id'])->first();
                                    ?>
                                    @if($userData['user_money']>=50)

                                        <?php

                                        if($_GET['type_id']==3){ // 看商场招商信息收费10元一次，
                                            \App\User::where('user_id',$userData['user_id'])->update(['user_money'=>($userData['user_money']-10)]);
                                        }elseif($_GET['type_id']==4){ // 看商业招商信息收费10元一次，
                                            \App\User::where('user_id',$userData['user_id'])->update(['user_money'=>($userData['user_money']-10)]);
                                        }elseif($_GET['type_id']==8){ //看品牌拓展信息收费十元一次，
                                            \App\User::where('user_id',$userData['user_id'])->update(['user_money'=>($userData['user_money']-10)]);
                                        }elseif($_GET['type_id']==5){ //看商场买卖信息收费五十元一次
                                            \App\User::where('user_id',$userData['user_id'])->update(['user_money'=>($userData['user_money']-50)]);
                                        }elseif($_GET['type_id']==6){ //看商业买卖信息收费五十元一次。
                                            \App\User::where('user_id',$userData['user_id'])->update(['user_money'=>($userData['user_money']-50)]);
                                        }elseif($_GET['type_id']==7){ //免费看

                                        }else{
                                            goto goEnd;
                                        }

                                        ?>

                                        <div class="weui_cells_title" style="color:green;" onclick="javascript:window.location='/user-qrcode'">您当前是：普通会员、升级VIP会员了解更多信息！</div>
                                        <div class="weui_cells weui_cells_access">
                                            {{--<a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:blue; margin: 0;">当前所在位置：{{ $add }}</p>
                                                </div>
                                            </a>--}}
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:green; margin: 0;">项目情况</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:red; margin: 0;">面积：{{ $data['article_mj'] }}</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:red; margin: 0;">商圈：{{ $data['article_sq'] }}</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:green; margin: 0;">项目招商</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:red; margin: 0;">项目电话：{{ $data['article_tel'] }}</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:red; margin: 0;">项目微信号：{{ $data['article_qq'] }}</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:red; margin: 0;">项目负责人：{{ $data['article_contact'] }}</p>
                                                </div>
                                            </a>
                                            <a class="weui_cell" href="javascript:;">
                                                <div class="weui_cell_bd weui_cell_primary">
                                                    <p style="color:red; margin: 0;">项目财富地址：{{ $data['article_add'] }}{{ $data['article_street'] }}</p>
                                                </div>
                                            </a>
                                        </div>

                                    @else
                                        <?php goEnd: ?>
                                        <div class="weui_cells_title" style="color:green;" onclick="javascript:window.location='/user-index'">我来发信息~(免费发布，免费推广，还有红包拿)</div>
                                        <div class="weui_cells_title" style="color:red;" onclick="javascript:window.location='/user-qrcode'">您的余额低于100元，请充值 、立即查看联系咨询服务！</div>
                                    @endif
                                @else
                                    <div class="weui_cells_title" style="color:green;" onclick="javascript:window.location='/user-login'">我来发信息~(免费发布，免费推广，还有红包拿)</div>
                                    <div class="weui_cells_title" style="color:red;" onclick="javascript:window.location='/user-login'">请登录 、查看联系方式</div>
                                @endif
                                <hr>
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