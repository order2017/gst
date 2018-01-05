@extends('layouts.admin')

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
                    <a href="{{ url('/admin/article-insert') }}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
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
                        <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">类别名称</th><th class="table-type">所属类别</th><th class="table-author am-hide-sm-only">添加二级类别</th><th class="table-date am-hide-sm-only">日期</th><th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($type as $list)
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>{{ $list->type_id }}</td>
                        <td><a href="#">{{ $list->type_name }}</a></td>
                        <?php $arr=explode(',',$list->type_path); $tot=count($arr)-2; ?>
                        <td>{{str_repeat("|===",$tot)}}{{$list->type_name}}</td>
                        <td class="am-hide-sm-only"><a href="/admin/type-insert?type_pid={{ $list->type_id }}&type_path={{ $list->type_path }}{{ $list->type_id }}">添加二级子类</a></td>
                        <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 添加</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @foreach($list->parent as $line)
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>{{ $line->type_id }}</td>
                            <td><a href="#">{{ $line->type_name }}</a></td>
                            <?php $arr=explode(',',$line->type_path); $tot=count($arr)-2; ?>
                            <td>{{str_repeat("|===",$tot)}}{{$line->type_name}}</td>
                            <td class="am-hide-sm-only"><a href="/admin/type-insert?type_pid={{ $line->type_id }}&type_path={{ $line->type_path }}{{ $line->type_id }}">添加三级子类</a></td>
                            <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 添加</button>
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @foreach($line->parent as $san)
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>{{ $san->type_id }}</td>
                                <td><a href="#">{{ $san->type_name }}</a></td>
                                <?php $arr=explode(',',$san->type_path); $tot=count($arr)-2; ?>
                                <td>{{str_repeat("|===",$tot)}}{{$san->type_name}}</td>
                                <td class="am-hide-sm-only"></td>
                                <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 添加</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    @endforeach
                    </tbody>
                </table>
                <div class="am-cf">
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
                </div>
            </form>
        </div>

    </div>
</div>

@endsection