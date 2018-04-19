@extends('layouts.admin')

@section('style')
    <style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .clear{
            clear: both;
        }
    </style>
@endsection

@section('content')

    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户列表</strong></div>
        </div>

        <hr>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default" data-am-modal="{target: '#user-search'}"><span class="am-icon-search"></span> 搜索</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title">用户名</th><th class="table-type">手机号</th><th class="table-author am-hide-sm-only">微信号</th><th class="table-title">会员类型</th><th class="table-title">余额</th><th class="table-title">浏览次数</th><th class="table-date am-hide-sm-only">注册日期</th><th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{ $list['user_name'] }}</td>
                            <td>{{ $list['user_phone'] }}</td>
                            <td>{{ $list['wechat_number'] }}</td>
                            <td>{{ $list['user_type_text'] }}</td>
                            <td>{{ $list['user_money'] }}</td>
                            <td>{{ $list['user_number'] }}</td>
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

                    <div id="pull_right">
                        <div class="pull-right">
                            {!! $data->links() !!}
                        </div>
                    </div>

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

<div class="am-modal am-modal-no-btn" tabindex="-1" id="user-search">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">搜索</div>
        <div class="am-modal-bd">
            <form class="am-form" data-normal action="" method="get">
                <div class="am-form-group">
                    <label for="user_phone">手机号</label>
                    <input type="text" name="user_phone" id="user_phone">
                </div>
                <button type="submit" class="am-btn am-btn-primary am-btn-block">搜索</button>
                <button type="button" class="am-btn am-btn-default  am-btn-block" data-am-modal-close>取消</button>
            </form>
        </div>
    </div>
</div>

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