@extends('layouts.mobile')

@section('content')
    <div data-role="page" id="mainPage" data-theme="a">
        <div data-role="header" data-position="fixed" >
            <a href="{{route('mobile.index')}}" data-rel="back" data-role="button" data-icon="back">返回</a>
            <h1>EVER UGG售后服务</h1>
        </div>
        <div data-role="main" class="ui-content">
            <h3>运维工单查询</h3>
            <div class="ui-field-contain">
                <label for="sheetCode">工单号:</label>
                <input type="text" name="sheetCode" id="sheetCode" data-clear-btn="true" value=""  />
            </div>
            <div class="ui-field-contain">
                <label for="clientMobile">或 手机号:</label>
                <input type="number" name="clientMobile" id="clientMobile" data-clear-btn="true" value=""  />
            </div>
            <input type="submit" data-inline="true" value="提交" data-theme="b" id="enqSubmit">
        </div>
    </div>
    <div data-role="page" id="sheetPage" data-theme="a">
        <div data-role="header" data-position="fixed">
            <a href="#mainPage" data-rel="back" data-role="button" data-icon="back">返回</a>
            <h1>EVER UGG售后服务</h1>
        </div>
        <div data-role="main" class="ui-content">
            <h3>运维工单列表</h3>
            <ul data-role="listview" data-inset="true" id="sheetlist">
            </ul>
        </div>
    </div>
    <div data-role="page" id="sheetDetailPage" data-theme="a" >
        <div data-role="header" data-position="fixed">
            <a href="#mainPage" data-rel="back" data-role="button" data-icon="back">返回</a>
            <h1>EVER UGG售后服务</h1>
            <a href="#popup-postrecord" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-transition="pop">快递单录入</a>
            <!--
            <a href="#popupBasic" data-rel="popup" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-transition="pop">Basic Popup</a>
            <div data-role="popup" id="popupBasic">
                <p>This is a completely basic popup, no options set.</p>
            </div>
            -->
            <div data-role="popup" id="popup-postrecord" data-dismissible="false" class="ui-content" data-overlay-theme="a" data-corners="false">
                <div>
                    <label for="carrierName">快递公司名称</label>
                    <input type="text" id="carrierName" data-clear-btn="true" >
                </div>
                <div>
                    <label for="trackNumber">快递单号</label>
                    <input type="text" id="trackNumber" data-clear-btn="true" >
                </div>
                <input type="hidden" id="popup-sheetcode">
                <div align="center">
                    <a data-role="button" data-rel="back" onclick="uploadPostrecord();" data-inline="true" class="ui-btn-active">确认</a>
                    <a data-role="button" data-rel="back" data-inline="true">取消</a>
                </div>
            </div>
        </div>
        <div data-role="main" class="ui-content">
            <h3>运维工单详情</h3>
            <div id="uploadDetails" class="ui-body-d ui-content">
                <div data-role="collapsibleset">
                    <div data-role="collapsible">
                        <h3>工单上传信息</h3>
                        <div>
                            <table data-role="table" class="ui-responsive ui-shadow" id="table-uploadDetail">
                                <thead>
                                <tr></tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>工单号</td>
                                    <td id="td-sheetCode"></td>
                                </tr>
                                <tr>
                                    <td>日期</td>
                                    <td id="td-created_at"></td>
                                </tr>
                                <tr>
                                    <td>姓名</td>
                                    <td id="td-clientName"></td>
                                </tr>
                                <tr>
                                    <td>手机号</td>
                                    <td id="td-clientMobile"></td>
                                </tr>
                                <tr>
                                    <td>地址</td>
                                    <td id="td-address"></td>
                                </tr>
                                <tr>
                                    <td>说明</td>
                                    <td id="td-issueDesc"></td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#popup-picWhole" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-transition="fade">鞋整体图</a>
                            <div data-role="popup" id="popup-picWhole" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15">
                                    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img id="img-whole" src="nopic.jpg" alt="Whole">
                            </div>
                            <a href="#popup-picDamage" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-transition="fade">鞋破损部分图</a>
                            <div data-role="popup" id="popup-picDamage" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15">
                                    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img id="img-damage" src="nopic.jpg" alt="Whole">
                            </div>
                            <a href="#popup-picBottom" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline" data-transition="fade">鞋底图</a>
                            <div data-role="popup" id="popup-picBottom" class="photopopup" data-overlay-theme="a" data-corners="false" data-tolerance="30,15">
                                    <a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn-a ui-icon-delete ui-btn-icon-notext ui-btn-right">Close</a><img id="img-bottom" src="nopic.jpg" alt="Whole">
                            </div>
                        </div>
                    </div>
                    <div data-role="collapsible">
                        <h3>工单处理信息</h3>
                        <div>
                            <table data-role="table" class="ui-responsive ui-shadow" id="table-processDetail">
                                <thead>
                                <tr>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>产品信息</td>
                                    <td id="td-product"></td>
                                </tr>
                                <tr>
                                    <td>服务方式</td>
                                    <td id="td-serviceTypeName"></td>
                                </tr>
                                <tr>
                                    <td>处理阶段</td>
                                    <td id="td-processPhaseName"></td>
                                </tr>
                                </tbody>
                            </table>
                            <div data-role="collapsible">
                                <h4>处理日志</h4>
                                <div>
                                    <table data-role="table" class="ui-responsive ui-shadow" id="table-worklog">
                                        <thead>
                                        <tr>
                                            <th>处理时间</th>
                                            <th>处理阶段</th>
                                            <th>处理说明</th>
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
            </div>
        </div>
    </div>
    <div data-role="popup" id="popup-uploadresult" class="ui-content" data-theme="a">
        <p>快递单上传成功</p>
    </div>

@stop

@push('links')
@endpush
@push('scripts')
    <script>
        $('#sheetPage').bind('pagebeforeshow', function() {
            $('#sheetlist').listview('refresh');
        });
        $('#sheetDetailPage').bind('pagebeforeshow', function() {
            $('#table-uploadDetail').table('refresh');
            $('#table-processDetail').table('refresh');
            $('#table-worklog').table('refresh');
        });
        $('#enqSubmit').on('click',function(event) {
            $('#sheetlist').empty();
            $.ajax({
                url: '{{ route('mobile.getworksheetlist') }}',
                type: "get",
                data: {'sheetCode':$('#sheetCode').val(), 'clientMobile':$('#clientMobile').val()},
                success: function(data) {
                    $.each(data, function(i, item){
                        itemcontent=item.sheetCode+"-"+item.clientName+"-"+item.serviceTypeName+"-"+item.processPhaseName;
                        $('#sheetlist').append("<li><a onclick='showSheetDetails(\""+item.sheetCode+"\")'>"+itemcontent+
                            "</a><a data-icon='info' onclick='showSheetDetails(\""+item.sheetCode+"\")'>查看详情</a></li>");
                    });
                    $.mobile.changePage("#sheetPage");
                }
            });
        });
        function showSheetDetails(sheetCode)
        {

            $.ajax({
                url: '{{ route('mobile.getworksheetdetails') }}',
                type: "get",
                data: {'sheetCode':sheetCode },
                success: function(data) {
                    $('#td-sheetCode').html(sheetCode);
                    $('#popup-sheetcode').val(sheetCode);
                    $('#td-clientName').html(data.clientName);
                    $('#td-created_at').html(data.created_at);
                    $('#td-clientMobile').html(data.clientMobile);
                    $('#td-address').html(data.clientAddressProvince+data.clientAddressCity+data.clientAddressTown+data.clientAddress1+data.clientAddress2);
                    $('#td-issueDesc').html(data.issueDesc);
                    $('#img-whole').attr('src', data.picWhole);
                    $('#img-damage').attr('src', data.picDamage);
                    $('#img-bottom').attr('src', data.picBottom);
                    $('#td-product').html(data.goodsno+"-"+data.goodsname+"-"+data.colordesc+"-"+data.sizedesc);
                    $('#td-serviceTypeName').html(data.serviceTypeName);
                    $('#td-processPhaseName').html(data.processPhaseName);
                    $('#table-worklog tbody').empty();
                    $.each(data.worklog, function(i, item){
                        $('#table-worklog tbody').append("<tr><td>"+item.created_at+"</td><td>"+item.processPhaseName+"</td><td>"+item.remark+"</td></tr>");
                    });
                    $.mobile.changePage("#sheetDetailPage");
                }
            });
        }
        function uploadPostrecord()
        {
            $.ajax({
                url: '{{ route('mobile.uploadpostrecord') }}',
                type: "post",
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: {'sheetCode':$('#popup-sheetcode').val(), 'carrierName':$('#carrierName').val(),'trackNumber':$('#trackNumber').val() },
                success: function(data) {
                    $('#popup-uploadresult').popup();
                    $('#popup-uploadresult').popup('open');
                },
                error: function(data) {
                    alert(data.responseJSON.error);
                }
            });
        }
    </script>
@endpush
