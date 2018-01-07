@extends('layouts.admin')

@section('content')

<div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">更新类型</strong></div>
    </div>

    <hr/>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8"></div>
        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

            <form class="am-form am-form-horizontal" method="post" action="{{ url('/admin/type-update') }}" data-am-validator>
                {{ csrf_field() }}
                <fieldset>
                <div class="am-form-group">
                    <label for="type_name" class="am-u-sm-3 am-form-label">类型名称：</label>
                    <div class="am-u-sm-9">
                        <input type="text" id="type_name"  name="type_name" value="{{ request('type_name') }}" placeholder="名称" required>
                        <input type="hidden" name="type_id" value="{{ request('type_id') }}">
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
