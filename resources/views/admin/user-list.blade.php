@extends('layouts.admin')

@section('content')

    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户列表</strong></div>
        </div>

        <hr>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title">用户名</th><th class="table-type">手机号</th><th class="table-author am-hide-sm-only">微信号</th><th class="table-title">会员类型</th><th class="table-date am-hide-sm-only">注册日期</th><th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{ $list['user_name'] }}</td>
                            <td>{{ $list['user_phone'] }}</td>
                            <td>{{ $list['wechat_number'] }}</td>
                            <td>{{ $list['user_type_text'] }}</td>
                            <td>{{ $list['created_at'] }}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="javascript:window.location='/admin/user-edit/{{ $list['user_id'] }}'"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"  onclick="del({{ $list['user_id'] }})"><span class="am-icon-trash-o"></span> 删除</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                    {{--<div class="am-cf">
                        共 15 条记录
                        <div class="am-fr">
                            <ul class="am-pagination">
                                <li class="am-disabled"><a href="#">«</a></li>
                                <li class="am-active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>--}}
                </form>
            </div>

        </div>
    </div>

@endsection

@section('script')

    @if(Session::has('message'))
        @if(Session::get('message')==1)
            <script>layer.msg('编辑成功！', {icon: 6}); </script>
        @endif
    @endif

    <script type="text/javascript">
        function del(id) {
            layer.msg('您确定要删除吗？', {
                time: 0
                ,btn: ['删除', '取消']
                ,yes: function(index){
                    layer.close(index);
                    $.post('/admin/user-delete/'+id,{'_token':'{{ csrf_token() }}','_method':'get'},function (data) {
                        if (data==1){
                            window.location.reload();
                        }
                    });
                }
            });
        }
    </script>

@endsection