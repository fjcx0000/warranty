@extends('layouts.mobile')

@section('content')
    <div data-role="page" id="mainPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <a href="{{route('mobile.index')}}" data-role="button" data-icon="back">返回</a>
            <h1>EVER UGG售后服务</h1>
        </div>
        <div data-role="main" class="ui-content">
            <h3>运维工单上传</h3>
            @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                    <font color="#FF0000">{!! session('message.content') !!}</font>
                </div>
            @endif
            <form method="get" action="{{route('mobile.worksheetuploadindex')}}" data-ajax="false">
                <div class="ui-field-contain">
                    <label for="sheetCode">工单号:<span>*</span></label>
                    <input type="text" name="sheetCode" id="sheetCode" required value=""  />
                </div>
                <div class="ui-field-contain">
                    <label for="clientMobile">手机号:<span>*</span></label>
                    <input type="number" name="clientMobile" id="clientMobile" required value=""  />
                </div>
                {{ csrf_field() }}
                <input type="submit" data-inline="true" value="提交" data-theme="b">
            </form>
        </div>
    </div>
@stop

@push('links')
@endpush
