@extends('layouts.admin')

@section('style')
    <style type="text/css">
        .am-table-striped>tbody>tr:nth-child(odd)>td, .am-table-striped>tbody>tr:nth-child(odd)>th {
            background:none;
        }
    </style>
@endsection

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">类型列表</strong></div>
    </div>

    <hr>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="{{ url('/admin/type-insert') }}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">

                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-id">ID</th><th class="table-title">类别名称</th><th class="table-type">所属类别</th><th class="table-author am-hide-sm-only">添加二级类别</th><th class="table-date am-hide-sm-only">日期</th><th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($type as $list)
                    <tr>
                        <td>{{ $list->type_id }}</td>
                        <td><a href="javascript:;">{{ $list->type_name }}</a></td>
                        <?php $arr=explode(',',$list->type_path); $tot=count($arr)-2; ?>
                        <td>{{str_repeat("|===",$tot)}}{{$list->type_name}}</td>
                        <td class="am-hide-sm-only"><a href="/admin/type-insert?type_pid={{ $list->type_id }}&type_path={{ $list->type_path }}{{ $list->type_id }}">添加二级子类</a></td>
                        <td class="am-hide-sm-only">{{ $list->updated_at }}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a  href="{{ url('/admin/type-update?type_id='.$list->type_id.'&type_name='.$list->type_name) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 更新</a>
                                    <a href="javascript:void(0);" onclick="del({{ $list->type_id }})" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @foreach($list->parent as $line)
                        <tr>
                            <td>{{ $line->type_id }}</td>
                            <td><a href="javascript:;">{{ $line->type_name }}</a></td>
                            <?php $arr=explode(',',$line->type_path); $tot=count($arr)-2; ?>
                            <td>{{str_repeat("|===",$tot)}}{{$line->type_name}}</td>
                            <td class="am-hide-sm-only"></td>
                            <td class="am-hide-sm-only">{{ $line->updated_at }}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="{{ url('/admin/type-update?type_id='.$line->type_id.'&type_name='.$line->type_name) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 更新 </a>
                                        <a href="javascript:void(0);" onclick="del({{ $line->type_id }})" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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

                <div class="am-cf">
                    <div class="am-fr">
                        {{ $type->links() }}
                    </div>
                </div>

        </div>

    </div>
</div>

@endsection

@section('script')
    @if(Session::has('message'))
        @if(Session::get('message')==1)
            <script>layer.msg('更新成功！', {icon: 6}); </script>
        @endif
    @endif

    <script type="text/javascript">
        function del(id) {
            layer.msg('您确定要删除吗？', {
                time: 0
                ,btn: ['删除', '取消']
                ,yes: function(index){
                    layer.close(index);
                    $.post('/admin/type-delete/'+id,{'_token':'{{ csrf_token() }}','_method':'get'},function (data) {
                        if (data==1){
                            window.location.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection