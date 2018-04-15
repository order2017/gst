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
                            <form action="/seek-password" method="post">
                                {{ csrf_field() }}
                                <div class="weui_cells weui_cells_form">
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">手 机</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="number" name="user_phone" id="user_phone" placeholder="请输入手机号">
                                        </div>
                                        <div class="weui_cell_ft">
                                            <input type="button" class="weui_btn weui_btn_mini weui_btn_primary" value="发送验证码" onclick="sendCode(this)" />
                                        </div>
                                    </div>
                                    <div class="weui_cell">
                                        <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
                                        <div class="weui_cell_bd weui_cell_primary">
                                            <input class="weui_input" type="number" name="user_phone_yz" placeholder="请输入手机验证码">
                                        </div>
                                    </div>
                                </div>

                                <div class="weui_btn_area">
                                    <button type="submit" class="weui_btn weui_btn_primary">确定</button>
                                    <a href="/user-login" class="weui_btn weui_btn_warn">返回</a>
                                </div>
                            </form>
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

    @if(Session::has('message'))
        @if(Session::get('message')=='0')
            <script>layer.msg('手机号不能为空!');</script>
        @elseif(Session::get('message')=='1')
            <script>layer.msg('验证码不能为空!');</script>
        @elseif(Session::get('message')=='2')
            <script>layer.msg('手机号不存在!');</script>
        @elseif(Session::get('message')=='3')
            <script>layer.msg('输入的验证码错误!');</script>
        @elseif(Session::get('message')=='4')
            <script>layer.msg('密码找回错误!');</script>
        @endif
    @endif

@endsection