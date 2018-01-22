@extends('layouts.admin')

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong></div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">

        </div>
    </div>

</div>

@endsection

@section('script')
    @if(Session::has('message'))
        @if(Session::get('message')==1)
            <script>layer.msg('登录成功！', {icon: 6}); </script>
        @endif
    @endif
@endsection
