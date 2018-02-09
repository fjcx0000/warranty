@extends('layouts.mobile')

@section('content')
    <div data-role="page" id="mainPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <h1>EVER UGG售后服务</h1>
            <a href="{{route('mobile.agentlogout')}}" data-ajax="false" class="ui-btn ui-btn-right ui-icon-back ui-btn-icon-left">退出</a>
        </div>
        <div data-role="main" class="ui-content">
            <h3>经销商操作</h3>
            @if(session()->has('message.level'))
                <div class="alert alert-{{ session('message.level') }}">
                    {!! session('message.content') !!}
                </div>
            @endif
            <a href="#sheetApplyPage" class="ui-btn">申请运维工单号</a>
            <p>&nbsp;</p>
            <button id="enquery">查询运维服务</button>
            <p>&nbsp;</p>
            <a href="#pwdChgPage" class="ui-btn">修改登录密码</a>
        </div>
    </div>
    <div data-role="page" id="pwdChgPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <a href="#mainPage" data-role="button" data-icon="back">返回</a>
            <h1>密码修改</h1>
        </div>
        <div data-role="content">
            <div class="ui-field-contain">
                <label for="password">请输入密码:<span>*</span></label>
                <input type="password" name="password" id="password" required value=""  />
            </div>
            <div class="ui-field-contain">
                <label for="password2">请再输入密码:<span>*</span></label>
                <input type="password" name="password2" id="password2" required value=""  />
            </div>
            <button id="pwdChgSubmit">提交</button>
        </div>
        <div data-role="popup" id="popupPwdChgResp">
            <h4 id="pwdChgRespMsg"></h4>
        </div>
    </div>
    <div data-role="page" id="sheetApplyPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <a href="#mainPage" data-role="button" data-icon="back">返回</a>
            <h1>工单号申请</h1>
        </div>
        <div data-role="content">
            <form id="sheetApplyForm">
                <div class="ui-field-contain">
                    <label for="clientName">客户姓名:<span>*</span></label>
                    <input type="text" name="clientName" id="clientName" required value=""  />
                </div>
                <div class="ui-field-contain">
                    <label for="clientMobile">客户手机号:<span>*</span></label>
                    <input type="number" data-clear-btn="true" name="clientMobile" id="clientMobile" required value="">
                </div>
                <div class="ui-field-contain">
                    <label for="searchField">产品编号或名称</label>
                    <input type="text" data-clear-btn="true" id="searchField" placeholder="产品编号或名称">
                    <ul id="suggestions" data-role="listview" data-inset="true"></ul>
                </div>
                <div class="ui-field-contain">
                    <label for="color">选择颜色</label>
                    <select name="color" id="color">
                    </select>
                </div>
                <div class="ui-field-contain">
                    <label for="size">选择尺码</label>
                    <select name="size" id="size">
                    </select>
                </div>
                <div class="ui-field-contain">
                    <label for="channelServiceReq">备注说明:</label>
                    <textarea data-mini="true" cols="40" rows="8" name="channelServiceReq" id="channelServiceReq"></textarea>
                </div>
                <input type="submit" data-icon="check" value="提交" id="sheetApplySubmit"/>
            </form>
        </div>
        <div data-role="popup" id="popupSheetApplyResp" data-dismissible="false" class="ui-corner-all">
            <div role="main" class="ui-content">
                <h4 id="sheetApplyRespMsg"></h4>
                <div align="center">
                    <a href="#mainPage" data-role="button" data-ajax="false" data-rel="back" data-transition="flow"
                       data-inline="true" class="ui-btn-active">结束</a>
                    <a data-role="button" data-rel="back" data-inline="true">取消</a>
                </div>
            </div>
        </div>
    </div>
@stop

@push('links')
@endpush
@push('scripts')
<script type="text/javascript" src="{{ URL::asset('js/autoComplete.js/jqm.autoComplete-1.5.2-min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/autoComplete.js/code.js') }}"></script>

<script>
    $('#pwdChgSubmit').on('click', function(event){
        if ($('#password').val() != $('#password2').val())
        {
            $('#pwdChgRespMsg').empty();
            $('#pwdChgRespMsg').text("两次输入密码不一致，请重新输入");
            $('#popupPwdChgResp').popup();
            $('#popupPwdChgResp').popup('open');
            setTimeout(function(){$('#popupPwdChgResp').popup('close');}, 1000);
            $('#password').val('');
            $('#password2').val('');
            $('#password').focus();
        } else {
            $.ajax({
                url: '{{ route('mobile.agentpwdchg') }}',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type: "post",
                data: {'password': $('#password').val(),
                },
                beforeSend: function () {
                    showLoader();
                },
                complete:function(){
                    hideLoader();
                },
                success: function(data) {
                    $('#pwdChgRespMsg').empty();
                    $('#pwdChgRespMsg').text(data);
                    $('#popupPwdChgResp').popup();
                    $('#popupPwdChgResp').popup('open');
                    setTimeout(function(){$('#popupPwdChgResp').popup('close');}, 1000);
                    //$.mobile.changePage("#mainPage");
                }
            });
        }
    });
    $("#sheetApplySubmit").click(function(){

        var formData = $("#sheetApplyForm").serialize();

        $.ajax({
            type: "POST",
            url: "{{route('mobile.applyworksheet')}}",
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            cache: false,
            data: formData,
            beforeSend: function () {
                showLoader();
            },
            complete:function(){
                hideLoader();
            },
            success: function(data) {
                $('#sheetApplyRespMsg').empty();
                $('#sheetApplyRespMsg').text("运维工单已生成，工单号是<b>"+data+"</b>.");
                $('#popupSheetApplyResp').popup();
                $('#popupSheetApplyResp').popup('open');
            }
        });

        return false;
    });

    $("#searchField").autocomplete({
        target: $('#suggestions'),
        source: '{{route('mobile.getproducts')}}',
        minLength: 3,
        callback: function(e) {
            var $a = $(e.currentTarget);
            $('#searchField').val($a.text());
            $('#searchField').autocomplete('clear');
            $goodsno = getGoodsno($a.text());
            $.ajax({
                url: '{{route('mobile.getcolors')}}',
                type: "get",
                data: {'goodsno':$goodsno},
                success: function(data) {
                    $('#color').empty();
                    $('#color').append("<option></option>");
                    $.each(data, function(i, value){
                        $('#color').append("<option value='"+value.colorcode+"'>"+value.colordesc+"</option>");
                    });
                    $('#color').attr("selectedIndex",0);
                    $('#color').selectmenu('refresh');
                }
            });

        }
    });
    $('#color').change(function(){
        $goodsno = getGoodsno($('#searchField').val());
        $colorcode = $('#color').val();
        $.ajax({
            url: '{{route('mobile.getsizes')}}',
            type: "get",
            data: {'goodsno':$goodsno, 'colorcode':$colorcode},
            success: function(data) {
                $('#size').empty();
                $('#size').append("<option></option>");
                $.each(data, function(i, value){
                    $('#size').append("<option value='"+value.sku+"'>"+value.sizedesc+"</option>");
                });
                $('#size').attr("selectedIndex",0);
                $('#size').selectmenu('refresh');
            }
        });

    });

    function getGoodsno(str)
    {

        if (str.charAt(str.indexOf('-') + 1) == '-')
            return str.substring(0,str.indexOf('-')+1);
        else
            return str.substring(0,str.indexOf('-'));
    }

    //显示加载器
    function showLoader() {
        //显示加载器.for jQuery Mobile 1.2.0
        $.mobile.loading('show', {
            text: '数据查询中...', //加载器中显示的文字
            textVisible: true, //是否显示文字
            theme: 'a',        //加载器主题样式a-e
            textonly: false,   //是否只显示文字
            html: ""           //要显示的html内容，如图片等
        });
    }

    //隐藏加载器.for jQuery Mobile 1.2.0
    function hideLoader()
    {
        //隐藏加载器
        $.mobile.loading('hide');
    }
</script>
@endpush
