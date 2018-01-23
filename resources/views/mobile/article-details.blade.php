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

                <div class="bd">
                    <article class="weui_article">
                        <section>
                            <h2 class="title">广商通招商</h2>
                            <section>
                                <h3>广商通招商广商通招商</h3>
                                <p>
                                    妹子，中国南方对同辈年纪比自己小的女子的称呼[1]  。在中古时期的意思是妹妹的孩子，是常用的宗亲称谓词之一。到唐代以后开始广泛地称为甥。另外，妹子，也指甥女，即妹妹的女儿。
                                </p>
                                <p>
                                    <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1515235923280&di=30fcf90a33986c9faed973aabc03e63c&imgtype=0&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F0115f158ad6c38a801219c77b6447c.jpg%40900w_1l_2o_100sh.jpg" alt="">
                                    <img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1515235923272&di=9615d788a8237352257c6047b038a054&imgtype=0&src=http%3A%2F%2Fimage.tianjimedia.com%2FuploadImages%2F2015%2F141%2F20%2FEM423Q284B27.jpg" alt="">
                                </p>
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