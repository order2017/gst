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
                <div class="home">
                    <div class="hd">
                        <h1 class="page_title">广商通商业共享</h1>
                        <p class="page_desc" style="color:red;">共享-商业-商品-服务-金融</p>
                    </div>
                    <div class="bd">
                        <form onsubmit="return false" id="formAdd">
                        <div class="weui_cells weui_cells_form">
                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">用户名</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="text" name="user_name" placeholder="请输入用户名">
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">微信号</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="text" name="wechat_number" placeholder="请输入微信号">
                                </div>
                            </div>

                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">手 机</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="number" name="user_phone" id="user_phone" placeholder="请输入手机号">
                                </div>
                                {{--<div class="weui_cell_ft">
                                    <input type="button" class="weui_btn weui_btn_mini weui_btn_primary" value="发送验证码" onclick="sendCode(this)" />
                                </div>--}}
                            </div>
                            {{--<div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="number" name="user_phone_yz" placeholder="请输入手机验证码">
                                </div>
                            </div>--}}

                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">密 码</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="password" name="password" placeholder="请输入密码">
                                </div>
                            </div>
                            <div class="weui_cell">
                                <div class="weui_cell_hd"><label class="weui_label">确认密码</label></div>
                                <div class="weui_cell_bd weui_cell_primary">
                                    <input class="weui_input" type="password" name="fixed_password" placeholder="请输入确认密码">
                                </div>
                            </div>
                        </div>
                        <div class="weui_cells_tips">
                            <a href="{{ url('/user-register') }}" class="weui_btn weui_btn_mini weui_btn_primary">用户注册</a>&nbsp;&nbsp;
                            <a href="/user-login" class="weui_btn weui_btn_mini weui_btn_default">用户登录</a>
                        </div>
                        <div class="weui_btn_area">
                            <a class="weui_btn weui_btn_primary" href="javascript:" id="showTooltips" onclick="add()">确定</a>
                        </div>
                        </form>
                        <div style="padding: 30px 20px 8px 20px;">
                            温馨提示：<br><br>

                            不用注册会员，查阅招商信息一条一元，买卖信息一条十元。<br><br>

                            普通会员：<br>
                            发布信息免费。<br>
                            客户查询会员发布的信息所得费用与平台五五分。<br>
                            自己查阅一条招商信息收费一元。<br>
                            查阅一条买卖信息收费一元。<br><br>

                            VIP 会员：<br>
                            年费一千元，免费查阅发布信息。<br><br>

                            扫码付款成功，请联系广商通商业共享运营中心，及时开通会员权限 。<br>
                            24小时客服电话：13823171801 周生
                        </div>
                    </div>
                </div>
            </div>
            @include('include.mobile._footer')
        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">
        var clock = '';
        var nums = 60;
        var btn;

        function sendCode(thisBtn)
        {
            btn = thisBtn;
            btn.disabled = true; //将按钮置为不可点击
            btn.value = nums+'秒后可重新获取';
            clock = setInterval(doLoop, 1000); //一秒执行一次

            var mobile = $('#user_phone').val();

            $.post("{{url('/send')}}", {'_token': '{{csrf_token()}}', 'user_phone': mobile}, function (data) {
                if (data=='1') {
                    layer.msg('发送成功');
                }else{
                    layer.msg('发送失败');
                    window.location.reload();
                }
            });
        }
        function doLoop()
        {
            nums--;
            if(nums > 0){
                btn.value = nums+'秒后可重新获取';
            }else{
                clearInterval(clock); //清除js定时器
                btn.disabled = false;
                btn.value = '发送验证码';
                nums = 60; //重置时间
            }
        }
    </script>

    <script type="text/javascript">
        function add() {
            str=$("#formAdd").serialize();
            $.post('/user-register',{string:str,'_token':'{{csrf_token()}}'},function(data){
                if(data['success']=="注册成功"){
                    layer.msg(data['success']);
                    setTimeout(function () {
                        window.location.href="/user-login";
                    },500)
                }else{
                    layer.msg(data['error']);
                }
            });
        }
    </script>
@endsection