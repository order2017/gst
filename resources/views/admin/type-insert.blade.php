@extends('layouts.admin')

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加类型</strong></div>
    </div>

    <hr/>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8"></div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

            <form class="am-form am-form-horizontal" data-am-validator>

                <fieldset>
                <div class="am-form-group">
                    <label for="article-title" class="am-u-sm-3 am-form-label">类型名称：</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="article-name" placeholder="名称" required>
                    </div>
                </div>

                <div class="am-form-group">
                    <div class="am-u-sm-9 am-u-sm-push-3">
                        <button type="submit" class="am-btn am-btn-primary">保存</button>
                    </div>
                </div>
                </fieldset>

            </form>

        </div>
    </div>
</div>
@endsection
