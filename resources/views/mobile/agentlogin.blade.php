@extends('layouts.mobile')

@section('content')
    <div data-role="page" id="mainPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <h1>EVER UGG售后服务</h1>
        </div>
        <div data-role="main" class="ui-content">
            <h3>经销商登录</h3>
            @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                    <font color="#FF0000">{!! session('message.content') !!}</font>
                </div>
            @endif
            <form method="post" action="{{route('mobile.agentlogincheck')}}" data-ajax="false">
                <div class="ui-field-contain">
                    <label for="name">渠道编号:<span>*</span></label>
                    <input type="text" name="channelID" id="channelID" required value=""  />
                </div>
                <div class="ui-field-contain">
                    <label for="password">访问密码:<span>*</span></label>
                    <input type="password" name="password" id="password" required value=""  />
                </div>
                {{ csrf_field() }}
                <input type="submit" data-inline="true" value="Submit" data-theme="b">
            </form>
        </div>
    </div>
@stop

@push('links')
@endpush
