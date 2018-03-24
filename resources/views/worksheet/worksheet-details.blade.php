<div class="modal container fade" id="worksheet-popup" tabindex="-1" aria-labelledby="myModalLabel" style="margin-top:50px" aria-hidden="true" data-backdrop="static">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">运维工单详情</h4>
        </div>
        <div class="modal-body" >
            <div class="row clearfix">
                <div class="col-sm-12 column">
                    <div class="row clearfix">
                        <fieldset>
                            <legend class="text-center">基本信息</legend>

                        <div class="col-sm-12 column" data-always-visible="1" data-rail-visible="1">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        工单号：
                                    </td>
                                    <td id="td-sheetCode">
                                       sheetCode
                                    </td>
                                    <td>
                                        渠道编号：
                                    </td>
                                    <td id="td-channelID">
                                       channelID
                                    </td>
                                    <td>
                                        渠道名称：
                                    </td>
                                    <td id="td-channelName">
                                        channelName
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        客户姓名：
                                    </td>
                                    <td id="td-clientName">
                                        clientName
                                    </td>
                                    <td>
                                        手机号：
                                    </td>
                                    <td id="td-clientMobile">
                                        clientMobile
                                    </td>
                                    <td>
                                        创建日期：
                                    </td>
                                    <td id="td-createdAt">
                                        created_at-date
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        产品名称：
                                    </td>
                                    <td id="td-goodsno">
                                        goodsno-name
                                    </td>
                                    <td>
                                        颜色：
                                    </td>
                                    <td id="td-colordesc">
                                        colordesc
                                    </td>
                                    <td>
                                        尺码：
                                    </td>
                                    <td id="td-sizedesc">
                                        sizedesc
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        客户投诉：
                                    </td>
                                    <td id="td-issueDesc" colspan="5">
                                        issueDesc
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        渠道意见：
                                    </td>
                                    <td id="td-channelServiceReq" colspan="5">
                                        channelServiceReq
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        服务原因：
                                    </td>
                                    <td id="td-issueCodeName">
                                        issueCodeExp
                                    </td>
                                    <td>
                                        生产工厂：
                                    </td>
                                    <td id="td-supplierName">
                                        supplierName
                                    </td>
                                    <td>
                                        处理方式：
                                    </td>
                                    <td id="td-serviceTypeName">
                                        serviceTypeExp
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    </fieldset>
                    <div class="row clearfix well" id="div-process">
                        <fieldset>
                            <legend class="text-center">工单处理</legend>
                            <div class="col-sm-12 column" id="processInputs">
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <fieldset>
                    <legend class="text-center">相关信息</legend>
                <div class="col-sm-12 column">
                    <div class="tabbable" id="tabs-worksheet">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#panel-pics" data-toggle="tab">上传图片</a>
                            </li>
                            <li>
                                <a href="#panel-address" data-toggle="tab">地址信息</a>
                            </li>
                            <li>
                                <a href="#panel-posts" data-toggle="tab">快递记录</a>
                            </li>
                            <li>
                                <a href="#panel-logs" data-toggle="tab">处理日志</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="panel-pics">
                                <div class="row clearfix">
                                    <div class="col-sm-4 column">
                                        <a href="#" id="link-whole" target="_blank">
                                            <img alt="整体图" src="" id="img-whole" class="img-thumbnail img-rounded" />
                                        </a>
                                    </div>
                                    <div class="col-sm-4 column">
                                        <a href="#" id="link-damage" target="_blank">
                                            <img alt="破损图" src="" id="img-damage" class="img-thumbnail img-rounded" />
                                        </a>
                                    </div>
                                    <div class="col-sm-4 column">
                                        <a href="#" id="link-bottom" target="_blank">
                                            <img alt="鞋底图" id="img-bottom" src="" class="img-thumbnail img-rounded" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="panel-address">
                                <div id="table-address" class="row clearfix">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>
                                                收件人姓名：
                                            </td>
                                            <td id="td-clientReceiverName" >
                                                clientReceiverName
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                收件人电话：
                                            </td>
                                            <td id="td-clientReceiverMobile">
                                                clientReceiverMobile
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                收件地址行1：
                                            </td>
                                            <td id="td-clientAddress1">
                                                clientAddress1
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                收件地址行2：
                                            </td>
                                            <td id="td-clientAddress2">
                                                clientAddress2
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                省-市-区/县：
                                            </td>
                                            <td id="td-clientAddressArea">
                                                clientAddressProvince
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="panel-logs">
                                <div class="row clearfix">
                                    <table id="table-worklog"  data-show-header="true" data-pagination="true"
                                           data-id-field="name"
                                           data-page-list="[4, 8, ALL]"
                                           data-page-size="4">
                                        <thead>
                                        <tr>
                                            <th data-field="created_at">操作时间</th>
                                            <th data-field="userName">操作用户</th>
                                            <th data-field="processPhaseName">处理阶段</th>
                                            <th data-field="remark">处理说明</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="panel-posts">
                                <div class="row clearfix">
                                    <table id="table-postrecord"  data-show-header="true" data-pagination="true"
                                           data-id-field="name"
                                           data-page-list="[4, 8, ALL]"
                                           data-page-size="4">
                                        <thead>
                                        <tr>
                                            <th data-field="typeName">处理类型</thda>
                                            <th data-field="carrierName">快递公司</th>
                                            <th data-field="trackNumber">快递单号</th>
                                            <th data-field="fee">快递费用</th>
                                            <th data-field="itemDesc">物品说明</th>
                                            <th data-field="created_at">创建时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </fieldset>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn-recoverSubmit" class="btn btn-primary">恢复</button>
            <button type="button" id="btn-cancelSubmit" class="btn btn-primary">终止</button>
            <button type="button" id="btn-processSubmit" class="btn btn-primary">提交</button>
            <button type="button" id="btn-processCancel" class="btn btn-default">取消</button>
        </div>
    </div>
</div>
@include('worksheet.auth-process')
@include('worksheet.waitshoes-process')
@include('worksheet.repair-process')
@include('worksheet.sendback-process')
@push('links')
    <style type="text/css">
        .modal-body{
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('js/mustache.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap-typeahead.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#worksheet-popup').on('hide.bs.modal', function () {
                $(".modal-body").prop('scrollTop',0); //reset scrollbar to top
            });
            $('#worksheet-popup').on('show.bs.modal', function(){
                $.ajax({
                    type: "get",
                    url: "{{route('worksheet.getWorksheetdetails')}}",
                    cache: false,
                    data: {'sheetCode': processingSheetCode},
                    success: function(data) {
                        $('#td-sheetCode').html(data.sheetCode);
                        $('#td-channelID').html(data.channelID);
                        $('#td-channelName').html(data.channelName);
                        $('#td-clientName').html(data.clientName);
                        $('#td-clientMobile').html(data.clientMobile);
                        $('#td-createdAt').html(data.created_at);
                        $('#td-goodsno').html(data.goodsno+'-'+data.goodsname);
                        $('#td-colordesc').html(data.colordesc);
                        $('#td-sizedesc').html(data.sizedesc);
                        $('#td-issueDesc').html(data.issueDesc);
                        $('#td-channelServiceReq').html(data.channelServiceReq);
                        $('#td-clientReceiverName').html(data.clientReceiverName);
                        $('#td-clientReceiverMobile').html(data.clientReceiverMobile);
                        $('#td-clientAddress1').html(data.clientAddress1);
                        $('#td-clientAddress2').html(data.clientAddress2);
                        $('#td-clientAddressArea').html(data.clientAddressProvince+"-"+data.clientAddressCity+"-"+data.clientAddressTown);
                        $('#td-issueCodeName').html(data.issueCodeName);
                        $('#td-serviceTypeName').html(data.serviceTypeName);
                        $('#td-supplierName').html(data.supplierName);

                        processingPhase = data.processPhase;
                        if (data.status == 0)
                        {
                            $('#div-process').removeClass('hidden');
                            $('#div-process').addClass('show');
                            $('#btn-processSubmit').removeAttr('disabled');
                            $('#btn-cancelSubmit').removeAttr('disabled');
                            $('#btn-recoverSubmit').attr('disabled',true);
                            worksheetProcessDisplay(data);
                        }
                        else if (data.status == 1) //订单处理结束1
                        {
                            $('#div-process').removeClass('show');
                            $('#div-process').addClass('hidden');
                            $('#btn-processSubmit').attr('disabled',true);
                            $('#btn-cancelSubmit').attr('disabled',true);
                            $('#btn-recoverSubmit').attr('disabled',true);
                        } else { //订单终止
                            $('#div-process').removeClass('show');
                            $('#div-process').addClass('hidden');
                            $('#btn-processSubmit').attr('disabled',true);
                            $('#btn-cancelSubmit').attr('disabled',true);
                            $('#btn-recoverSubmit').removeAttr('disabled');
                        }

                        $('#img-whole').attr("src",data.picWhole);
                        $('#link-whole').attr("href",data.picWhole);
                        $('#img-damage').attr("src",data.picDamage);
                        $('#link-damage').attr("href",data.picDamage);
                        $('#img-bottom').attr("src",data.picBottom);
                        $('#link-bottom').attr("href",data.picBottom);

                        $('#table-worklog').bootstrapTable({
                            data: data.worklog
                        });
                        $('#table-worklog').bootstrapTable('load',data.worklog);
                        $('#table-postrecord').bootstrapTable({
                            data: data.postrecord
                        });
                        $('#table-postrecord').bootstrapTable('load',data.postrecord);

                    },
                    error: function(data) {
                        alert(data.responseJSON.error);
                    }
                });

            });
            $('#btn-processCancel').on('click',function(){
                $.confirm({
                    title: '工单处理',
                    content: '确认取消操作吗',
                    buttons: {
                        confirm:{
                            text: '确认',
                            btnClass: 'btn-blue',
                            action: function () {
                                $('#worksheet-popup').modal('hide');
                            }
                        },
                        cancel:{
                            text: '取消',
                            action: function () {
                            }
                        },
                    }
                });
            });
            $('#btn-cancelSubmit').on('click',function(){
                $.confirm({
                    title: '工单终止',
                    content: '确认终止该工单吗',
                    buttons: {
                        confirm:{
                            text: '确认',
                            btnClass: 'btn-blue',
                            action: function () {
                                changeWorksheetStatus(2);
                            }
                        },
                        cancel:{
                            text: '取消',
                            action: function () {
                            }
                        },
                    }
                });
            });
            $('#btn-recoverSubmit').on('click',function(){
                $.confirm({
                    title: '工单恢复',
                    content: '确认恢复该工单吗',
                    buttons: {
                        confirm:{
                            text: '确认',
                            btnClass: 'btn-blue',
                            action: function () {
                                changeWorksheetStatus(0);
                            }
                        },
                        cancel:{
                            text: '取消',
                            action: function () {
                            }
                        },
                    }
                });
            });

        });


        function worksheetProcessDisplay(data)
        {
            $("#processInputs").empty();
            var template;
            var html;

            switch (processingPhase) {
                case 'auth':
                    template = $("#authprocess-template").html();
                    html = Mustache.render(template);
                    $("#processInputs").append(html);
                    $("#input-goodsno").val(data.goodsno+'-'+data.goodsname);
                    $('#input-color').empty();
                    $('#input-color').append("<option></option>");
                    $('#input-color').append("<option value='"+data.colordesc+"' selected>"+data.colordesc+"</option>");
                    $('#input-size').empty();
                    $('#input-size').append("<option></option>");
                    $('#input-size').append("<option value='"+data.sku+"' selected>"+data.sizedesc+"</option>");
                    $('#input-issueCode').val(data.issueCode);
                    if (data.postrecord.length > 0) {
                        data.postrecord.each(function(index,postrecord){
                            if (postrecord.type == 'R') {
                                $('#input-carrierName').val(postreocrd.carrierName);
                                $('#input-trackNumber').val(postreocrd.trackNumber);
                                $('#input-fee').val(postreocrd.fee);
                            }
                        });
                    }
                    $('#btn-goodsnoremove').on('click',function(){
                        $('#input-goodsno').val('');
                        $('#input-color').empty();
                        $('#input-size').empty();
                    });

                    $("#input-goodsno").typeahead({
                        onSelect: function(item) {
                            $goodsno = getGoodsno(item.value);
                            $.ajax({
                                url: '{{route('mobile.getcolors')}}',
                                type: "get",
                                data: {'goodsno':$goodsno},
                                success: function(data) {
                                    $('#input-color').empty();
                                    $('#input-color').append("<option></option>");
                                    $.each(data, function(i, value){
                                        $('#input-color').append("<option value='"+value.colorcode+"'>"+value.colordesc+"</option>");
                                    });
                                    $('#input-color').attr("selectedIndex",0);
                                    //$('#input-color').selectmenu("refresh");
                                }
                            });
                        },
                        ajax: {
                            url: "{{route('mobile.getproducts')}}",
                            triggerLength: 3,
                            scrollBar: true,
                            method: "get"
                        },
                    });

                    $('#input-color').change(function(){
                        $goodsno = getGoodsno($('#input-goodsno').val());
                        $colorcode = $('#input-color').val();
                        $.ajax({
                            url: '{{route('mobile.getsizes')}}',
                            type: "get",
                            data: {'goodsno':$goodsno, 'colorcode':$colorcode},
                            success: function(data) {
                                $('#input-size').empty();
                                $('#input-size').append("<option></option>");
                                $.each(data, function(i, value){
                                    $('#input-size').append("<option value='"+value.sku+"'>"+value.sizedesc+"</option>");
                                });
                                $('#input-size').attr("selectedIndex",0);
                                $('#input-size').selectmenu('refresh');
                            }
                        });
                    });

                    $('#input-issueCode').change(function(){
                        if($("input[name='input-serviceType']:checked").val() == 'G') { //协商
                           // $('#carrierinfo').removeClass('show');
                           // $('#carrierinfo').addClass('hidden');
                            $('#paymentinfo').removeClass('show');
                            $('#paymentinfo').addClass('hidden');
                            $('#negotiation').removeClass('hidden');
                            $('#negotiation').addClass('show');
                        } else {
                            if ($('#input-issueCode').val() != 'T001') { //质量或运营问题
                                $('#negotiation').removeClass('show');
                                $('#negotiation').addClass('hidden');
                                $('#paymentinfo').removeClass('show');
                                $('#paymentinfo').addClass('hidden');
                            //    $('#carrierinfo').removeClass('hidden');
                            //    $('#carrierinfo').addClass('show');
                            } else {  //客户付费换鞋
                            //    $('#carrierinfo').removeClass('show');
                            //    $('#carrierinfo').addClass('hidden');
                                $('#negotiation').removeClass('show');
                                $('#negotiation').addClass('hidden');
                                $('#paymentinfo').removeClass('hidden');
                                $('#paymentinfo').addClass('show');
                            }
                        }

                    });

                    $('input[name="input-serviceType"]').change(function () {
                       if($(this).val() == 'G') { //协商
                       //    $('#carrierinfo').removeClass('show');
                       //    $('#carrierinfo').addClass('hidden');
                           $('#paymentinfo').removeClass('show');
                           $('#paymentinfo').addClass('hidden');
                           $('#negotiation').removeClass('hidden');
                           $('#negotiation').addClass('show');
                       } else {
                           if ($('#input-issueCode').val() != 'T001') { //质量或运营问题
                               $('#negotiation').removeClass('show');
                               $('#negotiation').addClass('hidden');
                               $('#paymentinfo').removeClass('show');
                               $('#paymentinfo').addClass('hidden');
                       //        $('#carrierinfo').removeClass('hidden');
                       //        $('#carrierinfo').addClass('show');
                           } else {  //客户付费换鞋
                       //        $('#carrierinfo').removeClass('show');
                       //        $('#carrierinfo').addClass('hidden');
                               $('#negotiation').removeClass('show');
                               $('#negotiation').addClass('hidden');
                               $('#paymentinfo').removeClass('hidden');
                               $('#paymentinfo').addClass('show');
                           }
                       }
                    });

                    /*
                    $.ajax({
                        url: '{{route('worksheet.getcarriers')}}',
                        type: "get",
                        success: function(data) {
                            $('#input-carrier').empty();
                            $('#input-carrier').append("<option></option>");
                            $.each(data, function(i, value){
                                $('#input-carrier').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            });
                            $('#input-carrier').attr("selectedIndex",0);
                            //$('#input-carrier').selectmenu("refresh");
                        }
                    });
                    */

                    $("#btn-processSubmit").unbind('click');
                    $("#btn-processSubmit").on('click', function () {
                        if($('#input-goodsno').val() == '' || $('#input-color').val() == '' || $('#input-size').val() == '') {
                            alert("产品信息必须设置");
                            return false;
                        }
                        /*
                        if ($("input[name='input-serviceType']:checked").val() != 'G' && $("#input-issueCode").val() != 'T001') {
                            if ($('#input-carrierName').val() == '' || $('#input-fee').val() == '') {
                                alert("快递公司和费用必须设置");
                                return false;
                            }
                        }
                        */
                        if ($("#input-issueCode").val() == 'T001' && $("input[name='input-serviceType']:checked").val() != 'H' ) {
                            if (!$('#paymentConfirm').is(':checked')) {
                                alert("客户原因换鞋必须先确认运费已收");
                                return false;
                            }
                            if($('#input-paymentMethod').val() == '' || $('#input-paymentAmount').val() == '') {
                                alert("客户付款信息必须设置");
                                return false;
                            }
                        }
                        if ($("input[name='input-serviceType']:checked").val() == 'G') {
                            if ($('#input-content').val() == '') {
                                alert("协商结果必须设置");
                                return false;
                            }
                        }
                        $.ajax({
                            url: '{{route('worksheet.processauth')}}',
                            type: "post",
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            data: {
                                'sheetCode': processingSheetCode,
                                'sku': $('#input-size').val(),
                                'serviceType': $("input[name='input-serviceType']:checked").val(),
                                //'carrierName': $("#input-carrierName").val(),
                                //'trackNumber': $("#input-trackNumber").val(),
                                //'fee': $("#input-fee").val(),
                                'content': $('#input-content').val(),
                                'compensation': $('#input-compensation').val(),
                                'remark': $('#input-remark').val(),
                                'issueCode': $('#input-issueCode').val(),
                                'paymentMethod': $('#input-paymentMethod').val(),
                                'paymentAmount': $('#input-paymentAmount').val(),
                            },
                            success: function(data) {
                                $.alert({
                                    title: '工单提交结果',
                                    content: '处理成功!',
                                    buttons: {
                                        ok: function(){
                                            $('#worksheet-popup').modal('hide');
                                            table.draw();
                                        }
                                    }
                                });
                            },
                            error: function(XMLHttpRequest, textStatus) {
                                alert("服务器处理错误: "+XMLHttpRequest.status+", "+
                                    XMLHttpRequest.readyState+", "+textStatus);
                            }
                        });
                    });
                    break;
                case 'waitshoes':
                    template = $("#waitshoesprocess-template").html();
                    html = Mustache.render(template);
                    $("#processInputs").append(html);
                    $("#input-goodsno").val(data.goodsno+'-'+data.goodsname);
                    $('#input-color').empty();
                    $('#input-color').append("<option></option>");
                    $('#input-color').append("<option value='"+data.colordesc+"' selected>"+data.colordesc+"</option>");
                    $('#input-size').empty();
                    $('#input-size').append("<option></option>");
                    $('#input-size').append("<option value='"+data.sku+"' selected>"+data.sizedesc+"</option>");
                    $('#input-issueCode').val(data.issueCode);
                    $('#btn-goodsnoremove').on('click',function(){
                        $('#input-goodsno').val('');
                        $('#input-color').empty();
                        $('#input-size').empty();
                    });
                    $.each(data.postrecord, function(i, item) {
                       if (item.type == 'R') {
                           $('#input-carrierName').val(item.carrierName);
                           $('#input-trackNumber').val(item.trackNumber);
                       }
                    });

                    $("#input-goodsno").typeahead({
                        onSelect: function(item) {
                            $goodsno = getGoodsno(item.value);
                            $.ajax({
                                url: '{{route('mobile.getcolors')}}',
                                type: "get",
                                data: {'goodsno':$goodsno},
                                success: function(data) {
                                    $('#input-color').empty();
                                    $('#input-color').append("<option></option>");
                                    $.each(data, function(i, value){
                                        $('#input-color').append("<option value='"+value.colorcode+"'>"+value.colordesc+"</option>");
                                    });
                                    $('#input-color').attr("selectedIndex",0);
                                    $('#input-color').selectmenu("refresh");
                                }
                            });
                        },
                        ajax: {
                            url: "{{route('mobile.getproducts')}}",
                            triggerLength: 3,
                            scrollBar: true,
                            method: "get"
                        },
                    });

                    $('#input-color').change(function(){
                        $goodsno = getGoodsno($('#input-goodsno').val());
                        $colorcode = $('#input-color').val();
                        $.ajax({
                            url: '{{route('mobile.getsizes')}}',
                            type: "get",
                            data: {'goodsno':$goodsno, 'colorcode':$colorcode},
                            success: function(data) {
                                $('#input-size').empty();
                                $('#input-size').append("<option></option>");
                                $.each(data, function(i, value){
                                    $('#input-size').append("<option value='"+value.sku+"'>"+value.sizedesc+"</option>");
                                });
                                $('#input-size').attr("selectedIndex",0);
                                $('#input-size').selectmenu('refresh');
                            }
                        });
                    });

                    $('input[name="input-serviceType"]').change(function () {
                        if($(this).val() == 'X') { //维修
                            $('#exchangeinfo').removeClass('show');
                            $('#exchangeinfo').addClass('hidden');
                            $('#repairinfo').removeClass('hidden');
                            $('#repairinfo').addClass('show');
                        } else if ($(this).val() == 'H') { //换鞋
                            $('#repairinfo').removeClass('show');
                            $('#repairinfo').addClass('hidden');
                            $('#exchangeinfo').removeClass('hidden');
                            $('#exchangeinfo').addClass('show');
                        } else {
                            $('#exchangeinfo').removeClass('show');
                            $('#exchangeinfo').addClass('hidden');
                            $('#repairinfo').removeClass('show');
                            $('#repairinfo').addClass('hidden');
                        }
                    });
                    if ($("#input-issueCode").val() == 'T001') {
                        $('#carrierinfo').removeClass('show');
                        $('#carrierinfo').addClass('hidden');
                    }
                    $.ajax({
                        url: '{{route('worksheet.getsuppliers')}}',
                        type: "get",
                        success: function(data) {
                            $('#input-supplier').empty();
                            $('#input-supplier').append("<option></option>");
                            $.each(data, function(i, value){
                                $('#input-supplier').append("<option value='"+value.supplierID+"'>"+value.supplierName+"</option>");
                            });
                            $('#input-supplier').attr("selectedIndex",0);
                            //$('#input-carrier').selectmenu("refresh");
                        }
                    });

                    $("#input-sendDate").datepicker({
                        dateFormat: 'yy-mm-dd'
                    });
                    $("#input-expectDate").datepicker({
                        dateFormat: 'yy-mm-dd'
                    });

                    $("#input-newgoodsno").typeahead({
                        onSelect: function(item) {
                            $goodsno = getGoodsno(item.value);
                            $.ajax({
                                url: '{{route('mobile.getcolors')}}',
                                type: "get",
                                data: {'goodsno':$goodsno},
                                success: function(data) {
                                    $('#input-newcolor').empty();
                                    $('#input-newcolor').append("<option></option>");
                                    $.each(data, function(i, value){
                                        $('#input-newcolor').append("<option value='"+value.colorcode+"'>"+value.colordesc+"</option>");
                                    });
                                    $('#input-newcolor').attr("selectedIndex",0);
                                    $('#input-newcolor').selectmenu("refresh");
                                }
                            });
                        },
                        ajax: {
                            url: "{{route('mobile.getproducts')}}",
                            triggerLength: 3,
                            scrollBar: true,
                            method: "get"
                        },
                    });

                    $('#input-newcolor').change(function(){
                        $goodsno = getGoodsno($('#input-newgoodsno').val());
                        $colorcode = $('#input-newcolor').val();
                        $.ajax({
                            url: '{{route('mobile.getsizes')}}',
                            type: "get",
                            data: {'goodsno':$goodsno, 'colorcode':$colorcode},
                            success: function(data) {
                                $('#input-newsize').empty();
                                $('#input-newsize').append("<option></option>");
                                $.each(data, function(i, value){
                                    $('#input-newsize').append("<option value='"+value.sku+"'>"+value.sizedesc+"</option>");
                                });
                                $('#input-newsize').attr("selectedIndex",0);
                                $('#input-newsize').selectmenu('refresh');
                            }
                        });
                    });

                    $("#btn-processSubmit").unbind('click');
                    $("#btn-processSubmit").on('click', function () {
                        if ($('#input-goodsno').val() == '' || $('#input-color').val() == '' || $('#input-size').val() == '') {
                            alert("产品信息必须设置");
                            return false;
                        }
                        if ($('#input-supplier').val() == '') {
                            alert("工厂信息必须设置");
                            return false;
                        }

                        if ($("#input-issueCode").val() != 'T001') {
                            if ($('#input-carrierName').val() == '' || $('#input-fee').val() == '') {
                                alert("快递公司和费用必须设置");
                                return false;
                            }
                        }

                        if ($("input[name='input-serviceType']:checked").val() == 'X') {
                            if ($('#input-sendDate').val() == '' || $('#input-expectDate').val() == '') {
                                alert("提交和预期返回日期必须设置");
                                return false;
                            }
                        } else if ($("input[name='input-serviceType']:checked").val() == 'H') {
                            if ($('#input-newgoodsno').val() == '' || $('#input-newcolor').val() == '' || $('#input-newsize').val() == '') {
                                alert("换货信息必须设置");
                                return false;
                            }
                        }
                        $.ajax({
                            url: '{{route('worksheet.processwaitshoes')}}',
                            type: "post",
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            data: {
                                'sheetCode': processingSheetCode,
                                'sku': $('#input-size').val(),
                                'serviceType': $("input[name='input-serviceType']:checked").val(),
                                'carrierName': $("#input-carrierName").val(),
                                'trackNumber': $("#input-trackNumber").val(),
                                'fee': $("#input-fee").val(),
                                'remark': $('#input-remark').val(),
                                'issueCode': $("#input-issueCode").val(),
                                'supplierID': $('#input-supplier').val(),
                                'restockFlag': $("input[name='input-restockFlag']:checked").val(),
                                'sendDate': $('#input-sendDate').val(),
                                'expectDate': $('#input-expectDate').val(),
                                'newsku': $('#input-newsize').val(),
                            },
                            success: function(data) {
                                $.alert({
                                    title: '工单提交结果',
                                    content: '处理成功!',
                                    buttons: {
                                        ok: function(){
                                            $('#worksheet-popup').modal('hide');
                                            table.draw();
                                        }
                                    }
                                });
                            },
                            error: function(XMLHttpRequest, textStatus) {
                                alert("服务器处理错误: "+XMLHttpRequest.status+", "+
                                    XMLHttpRequest.readyState+", "+textStatus);
                            }
                        });
                    });
                    break;
                case 'repair':
                    template = $("#repairprocess-template").html();
                    html = Mustache.render(template);
                    $("#processInputs").append(html);
                    $('input[name="input-repairResult"]').change(function () {
                        if($(this).val() == "F") {
                            $('#repairinfo').removeClass('hidden');
                            $('#repairinfo').addClass('show');
                        } else {
                            $('#repairinfo').removeClass('show');
                            $('#repairinfo').addClass('hidden');
                        }
                    });
                    $("#input-sendDate").datepicker({
                        dateFormat: 'yy-mm-dd'
                    });
                    $("#input-expectDate").datepicker({
                        dateFormat: 'yy-mm-dd'
                    });
                    $("#btn-processSubmit").unbind('click');
                    $("#btn-processSubmit").on('click', function () {

                        if ($("input[name='input-repairResult']:checked").val() == 'F') {
                            if ($('#input-sendDate').val() == '' || $('#input-expectDate').val() == '') {
                                alert("提交和预期返回日期必须设置");
                                return false;
                            }
                        }
                        $.ajax({
                            url: '{{route('worksheet.processrepair')}}',
                            type: "post",
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            data: {
                                'sheetCode': processingSheetCode,
                                'repairResult': $("input[name='input-repairResult']:checked").val(),
                                'remark': $('#input-remark').val(),
                                'sendDate': $('#input-sendDate').val(),
                                'expectDate': $('#input-expectDate').val(),
                            },
                            success: function(data) {
                                $.alert({
                                    title: '工单提交结果',
                                    content: '处理成功!',
                                    buttons: {
                                        ok: function(){
                                            $('#worksheet-popup').modal('hide');
                                            table.draw();
                                        }
                                    }
                                });
                            },
                            error: function(XMLHttpRequest, textStatus) {
                                alert("服务器处理错误: "+XMLHttpRequest.status+", "+
                                    XMLHttpRequest.readyState+", "+textStatus);
                            }
                        });
                    });
                    break;
                case 'sendback':
                    template = $("#sendbackprocess-template").html();
                    html = Mustache.render(template);
                    $("#processInputs").append(html);

                    $.ajax({
                        url: '{{route('worksheet.getcarriers')}}',
                        type: "get",
                        success: function(data) {
                            $('#input-carrier').empty();
                            $('#input-carrier').append("<option></option>");
                            $.each(data, function(i, value){
                                $('#input-carrier').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            });
                            $('#input-carrier').attr("selectedIndex",0);
                            //$('#input-carrier').selectmenu("refresh");
                        }
                    });
                    $("#btn-processSubmit").unbind('click');
                    $("#btn-processSubmit").on('click', function () {

                        if ($('#input-carrier').val() == '' || $('#input-trackNumber').val() == '' || $('#input-fee').val() == '') {
                            alert("快递单信息必须设置");
                            return false;
                        }

                        $.ajax({
                            url: '{{route('worksheet.processsendback')}}',
                            type: "post",
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            data: {
                                'sheetCode': processingSheetCode,
                                'carrierID': $("#input-carrier").val(),
                                'trackNumber': $("#input-trackNumber").val(),
                                'fee': $("#input-fee").val(),
                            },
                            success: function(data) {
                                $.alert({
                                    title: '工单提交结果',
                                    content: '处理成功!',
                                    buttons: {
                                        ok: function(){
                                            $('#worksheet-popup').modal('hide');
                                            table.draw();
                                        }
                                    }
                                });
                            },
                            error: function(XMLHttpRequest, textStatus) {
                                alert("服务器处理错误: "+XMLHttpRequest.status+", "+
                                    XMLHttpRequest.readyState+", "+textStatus);
                            }
                        });
                    });

                default:
                    break;
            }
        }
        function changeWorksheetStatus(worksheetStatus)
        {
            $.ajax({
                url: '{{route('worksheet.changestatus')}}',
                type: "post",
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: {
                    'sheetCode': processingSheetCode,
                    'status': worksheetStatus,
                },
                success: function(data) {
                    $.alert({
                        title: '工单状态更改结果',
                        content: '处理成功!',
                        buttons: {
                            ok: function(){
                                $('#worksheet-popup').modal('hide');
                                table.draw();
                            }
                        }
                    });
                },
                error: function(XMLHttpRequest, textStatus) {
                    alert("服务器处理错误: "+XMLHttpRequest.status+", "+
                        XMLHttpRequest.readyState+", "+textStatus);
                }
            });
        }
        function getGoodsno(str)
        {
            if (str.charAt(str.indexOf('-') + 1) == '-')
                return str.substring(0,str.indexOf('-')+1);
            else
                return str.substring(0,str.indexOf('-'));
        }
    </script>
@endpush