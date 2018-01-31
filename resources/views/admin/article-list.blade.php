@extends('layouts.admin')

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章列表</strong></div>
    </div>

    <hr>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <a href="{{ url('/admin/article-insert') }}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">

                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-id">ID</th>
                        <th class="table-title">图片</th>
                        <th class="table-title">标题</th>
                        <th class="table-type">类别</th>
                        <th class="table-date am-hide-sm-only">日期</th>
                        <th class="table-set">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                    <tr>
                        <td>{{ $list->article_id }}</td>
                        <?php
                            if(!empty($list->article_picture)){
                                if (file_exists(public_path('/uploads/'.$list->article_picture))){
                                    $pic = asset('/uploads/'.$list->article_picture);
                                }else{
                                    $pic = asset('/uploads/gst_logo.png');
                                }
                            }else{
                                $pic = asset('/uploads/gst_logo.png');
                            }
                        ?>
                        <td><img src="{{ $pic }}" alt="" width="60px" height="40px"></td>
                        <td><a href="#">{{ $list->article_name }}</a></td>
                        <td>
                            @foreach($type as $val)
                                @if($val->type_id == $list['article_type'])
                                    {{substr($val->html,5,100)}}
                                @endif
                            @endforeach
                        </td>
                        <td class="am-hide-sm-only">{{ $list->updated_at }}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{ url('/admin/article-update',['article_id'=>$list->article_id]) }}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                                    <a href="javascript:;" onclick="del({{ $list->article_id }})" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>

    </div>
</div>

@endsection

@section('script')

    @if(Session::has('message'))
        @if(Session::get('message')==1)
            <script>layer.msg('插入成功！', {icon: 6}); </script>
        @endif
    @endif

    <script type="text/javascript">
        function del(id) {
            layer.msg('您确定要删除吗？', {
                time: 0
                ,btn: ['删除', '取消']
                ,yes: function(index){
                    layer.close(index);
                    $.post('/admin/article-delete/'+id,{'_token':'{{ csrf_token() }}','_method':'get'},function (data) {
                        if (data==1){
                            window.location.reload();
                        }
                    });
                }
            });
        }
    </script>

@endsection
