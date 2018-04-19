@extends('layouts.admin')

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户编辑</strong></div>
    </div>

    <hr/>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8"></div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

            <form class="am-form am-form-horizontal" method="post" action="{{ url('/admin/user-edit') }}" enctype="multipart/form-data" data-am-validator>
                {{ csrf_field() }}
                <fieldset>
                <div class="am-form-group">
                    <label for="user_name" class="am-u-sm-3 am-form-label">用户名：</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="user_name" name="user_name" value="{{ $data['user_name'] }}" disabled>
                        <input type="hidden" id="user_id" name="user_id" value="{{ $data['user_id'] }}" >
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="user_phone" class="am-u-sm-3 am-form-label">手机号：</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="user_phone" name="user_phone" value="{{ $data['user_phone'] }}" placeholder="输入手机号" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="wechat_number" class="am-u-sm-3 am-form-label">微信号</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="wechat_number" name="wechat_number" value="{{ $data['wechat_number'] }}" disabled>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="user_money" class="am-u-sm-3 am-form-label">充值金额</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="user_money" name="user_money" value="{{ $data['user_money'] }}" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="user_type" class="am-u-sm-3 am-form-label">会员类型</label>
                    <div class="am-u-sm-9">
                        <select id="user_type" name="user_type" required>
                            <option value="">-=请选择会员类型=-</option>

                            @foreach(\App\User::UserTypeList() as $key=>$type)
                                <option value="{{ $key }}" @if($data['user_type'] == $key) selected @endif>{{ $type }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-9 am-u-sm-push-3">
                        <button type="submit" class="am-btn am-btn-primary">保存</button>
                        <a href="/admin/user-list" class="am-btn am-btn-warning">返回</a>
                    </div>
                </div>
                </fieldset>

            </form>

        </div>
    </div>
</div>
@endsection

@section('script')

    @if(Session::has('message'))
        @if(Session::get('message')=='0')
            <script>layer.msg('编辑失败！', {icon: 5}); </script>
        @endif
    @endif

@endsection
