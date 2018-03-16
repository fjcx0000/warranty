@extends('layouts.mobile')

@section('content')
    <div data-role="page" id="mainPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <h1>EVER UGG售后服务</h1>
            <a href="{{route('mobile.agentindex')}}" data-ajax="false" class="ui-btn ui-btn-right ui-icon-shop ui-btn-icon-left">经销商</a>
        </div>
        <div data-role="content">
            <h3>客户操作</h3>
            <a href="{{route('mobile.clientconfirm')}}" data-ajax="false" class="ui-btn">上传运维服务图片</a>
            <p>
                温馨提醒：请先联系经销商获得运维单号
            </p>
            <a href="{{route('mobile.worksheetenqindex')}}" data-ajax="false" class="ui-btn">查询运维服务工单</a>
        </div>
    </div>
@stop

@push('links')
@endpush

