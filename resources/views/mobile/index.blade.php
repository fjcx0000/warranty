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
            <button id="enquery">查询运维服务进展</button>
        </div>
    </div>
    <div data-role="page" id="stockPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <a href="#mainPage" data-role="button" data-icon="back">返回</a>
            <h1>库存结果</h1>
            <a href="#" onclick="getItemLocations();" class="ui-btn ui-btn-right ui-icon-star ui-btn-icon-left">库位</a>
        </div>
        <div data-role="content">
            <h2 id="product"></h2>
            <div id="stocks"></div>
            </ul>
        </div>
        <div data-role="popup" id="showlocs" class="ui-corner-all">
            <div role="main" class="ui-content">
                <div id="locations"></div>
                <div align="center">
                    <a data-role="button" data-rel="back">返回</a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('links')
@endpush

