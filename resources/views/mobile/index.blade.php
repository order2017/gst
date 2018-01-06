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

                <div class="container" id="container"><div class="home">
                        <div class="hd">
                            <h1 class="page_title">广商通</h1>
                            <p class="page_desc">专业为商业打造系统平台</p>
                        </div>
                        <div class="bd">
                            <div class="weui_cells_title">商超共享</div>
                            <div class="weui_grids">
                                <a href="#/button" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-customs-clearance"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                       商场招商
                                    </p>
                                </a>
                                <a href="#/cell" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-liebiaoxingshi"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        商业招商
                                    </p>
                                </a>
                                <a href="#/toast" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-leimu"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        商场买卖
                                    </p>
                                </a>
                                <a href="#/dialog" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-caidan"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        商业买卖
                                    </p>
                                </a>
                                <a href="#/progress" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-ziyuan-xianxing"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        设备买卖
                                    </p>
                                </a>
                            </div>

                            <div class="weui_cells_title">共享商超</div>
                            <div class="weui_grids">
                                <a href="#/button" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-zhekou"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        共享商品
                                    </p>
                                </a>
                                <a href="#/cell" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-gouwuchetianjia"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        共享商城
                                    </p>
                                </a>
                                <a href="#/toast" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-hezuoguanxi-xianxing"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        共享商家
                                    </p>
                                </a>
                                <a href="#/dialog" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-kefu"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        共享服务
                                    </p>
                                </a>
                            </div>

                            <div class="weui_cells_title">共享超市</div>
                            <div class="weui_grids">
                                <a href="#/button" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-dianpu"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        嘉湖总店
                                    </p>
                                </a>
                                <a href="#/cell" class="weui_grid">
                                    <div class="weui_grid_icon">
                                        <i class="iconfont icon-gouwu"></i>
                                    </div>
                                    <p class="weui_grid_label">
                                        波海蓝湾店
                                    </p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="weui_tabbar">
                <a href="javascript:;" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <i class="iconfont icon-shouye-xianxing"></i>
                    </div>
                    <p class="weui_tabbar_label">首页</p>
                </a>
                <a href="javascript:;" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <i class="iconfont icon-caigou-xianxing"></i>
                    </div>
                    <p class="weui_tabbar_label">购物</p>
                </a>
                <a href="javascript:;" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <i class="iconfont icon-hezuoguanxi-xianxing"></i>
                    </div>
                    <p class="weui_tabbar_label">商业</p>
                </a>
                <a href="javascript:;" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <i class="iconfont icon-wode"></i>
                    </div>
                    <p class="weui_tabbar_label">我的</p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection