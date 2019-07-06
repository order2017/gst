<div class="home">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active" onclick="javascript:window.location='https://docs.qq.com/doc/DVlhTWHhIQnF3bXlU'">
                <img style="width:100%; height:130px" src="{{ asset('/uploads/sc01.png') }}" alt="">
            </div>
            <div class="item" onclick="javascript:window.location='https://docs.qq.com/doc/DVk5WdE1RZEdkUUFI'">
                <img style="width:100%; height:130px" src="{{ asset('/uploads/sc02.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="bd">
        <div class="weui_cells_title">共享商超</div>
        <div class="weui_grids">
            <a href="{{ url('/article-view?type_id=9') }}" class="weui_grid" style="padding: 5px;">
                <div class="weui_grid_icon" style="width: 100%; height: 80px;">
                    <img src="{{ asset('/assets/i/rou.jpg') }}" alt="">
                </div>
                <p class="weui_grid_label">
                    共享超市
                </p>
            </a>
            <a href="{{ url('/article-view?type_id=10') }}" class="weui_grid" style="padding: 5px;">
                <div class="weui_grid_icon" style="width: 100%; height: 80px;">
                    <img src="{{ asset('/assets/i/fs.jpg') }}" alt="">
                </div>
                <p class="weui_grid_label">
                    共享商品
                </p>
            </a>
            <a href="{{ url('/article-view?type_id=11') }}" class="weui_grid" style="padding: 5px;">
                <div class="weui_grid_icon" style="width: 100%; height: 80px;">
                    <img src="{{ asset('/assets/i/gc.jpg') }}" alt="">
                </div>
                <p class="weui_grid_label">
                    共享商城
                </p>
            </a>
            <a href="{{ url('/article-view?type_id=12') }}" class="weui_grid" style="padding: 5px;">
                <div class="weui_grid_icon" style="width: 100%; height: 80px;">
                    <img src="{{ asset('/assets/i/c.jpg') }}" alt="">
                </div>
                <p class="weui_grid_label">
                    共享商家
                </p>
            </a>
            <a href="{{ url('/article-view?type_id=13') }}" class="weui_grid" style="padding: 5px;">
                <div class="weui_grid_icon" style="width: 100%; height: 80px;">
                    <img src="{{ asset('/assets/i/m.jpg') }}" alt="">
                </div>
                <p class="weui_grid_label">
                    共享服务
                </p>
            </a>
            <a href="{{ url('/article-view?type_id=14') }}" class="weui_grid" style="padding: 5px;">
                <div class="weui_grid_icon" style="width: 100%; height: 80px;">
                    <img src="{{ asset('/assets/i/gst_logo.png') }}" alt="">
                </div>
                <p class="weui_grid_label">
                    共享金融
                </p>
            </a>
        </div>
    </div>
    <div class="hd">
        <p class="page_desc" style="color:red;">加入-共享商超网购-线上线下销售-更轻松！</p>
    </div>
</div>

