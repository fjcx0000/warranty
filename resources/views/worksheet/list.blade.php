@extends('layouts.master')
@section('heading')
    <h3>运维工单列表</h3>
@stop

@section('content')
    <div class="row clearfix form-inline" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-12 column">
            <div class="row clearfix">
                <div class="col-sm-3 column">
                    <div class="form-group">
                        <label for="sheetCode" class="col-sm-5 control-label text-right">工单号</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control input-sm" id="sheetCode" name="sheetCode"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 column">
                    <div class="form-group">
                        <label for="clientMobile" class="col-sm-5 control-label text-right">手机号</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control input-sm" id="clientMobile" name="clientMobile"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 column">
                    <div class="form-group">
                        <label for="channelID" class="col-sm-5 control-label text-right">渠道编号</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control input-sm" id="channelID" name="channelID"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 column">
                    <div class="form-group">
                        <label for="goodsno" class="col-sm-5 control-label text-right">产品货号</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control input-sm" id="goodsno" name="goodsno"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-sm-6 column">
                    <div class="row">
                        <div class="col-sm-3 column">
                            <label for="startDate" class="control-label pull-right">创建日期</label>
                        </div>
                        <div class=" col-sm-4 column">
                            <input type="text" class="form-control input-sm" id="startDate" name="startDate"/>
                        </div>
                        <div class=" col-sm-1 column">
                            <span>到</span>
                        </div>
                        <div class=" col-sm-4 column">
                            <input type="text" class="form-control input-sm" name="endDate" id="endDate" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="goodsno" class="col-sm-6 control-label text-right">处理阶段</label>
                        <div class="col-sm-6">
                            <select id="processPhase">
                                <option value =""></option>
                                <option value ="init">工单创建</option>
                                <option value ="auth">工单审核</option>
                                <option value ="waitshoes">等待客户寄鞋</option>
                                <option value ="repair">工厂修鞋</option>
                                <option value ="sendback">寄回客户</option>
                                <option value ="refund">退款处理</option>
                                <option value ="finish">处理结束</option>
                                <option value ="All">全部</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" id="enqSubmit" name="enqSubmit" class="btn btn-primary">查询</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix" style="border:1px solid #a1a1a1 ;margin:10px 2px; padding:10px 2px;border-radius: 5px">
        <div class="col-sm-12 column">
            <table id="worksheetTable" class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>工单号</th>
                    <th>渠道编号</th>
                    <th>姓名</th>
                    <th>手机号</th>
                    <th>运维要求</th>
                    <th>处理阶段</th>
                    <th>创建日期</th>
                    <th>工单操作</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('worksheet.worksheet-details')
@stop

@push('links')
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script>
        var processingSheetCode;
        var processingPhase;
        var table;

        $(document).ready(function (){
            $("#startDate").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $("#endDate").datepicker({
                dateFormat: 'yy-mm-dd'
            });

            if('{{$processPhase}}' != 'NOENQ')
                $('#processPhase').val('{{ $processPhase }}');


            table = $('#worksheetTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{route('worksheet.getWorksheets')}}',
                    type: "get",
                    data: function (d) {
                        d.sheetCode = $('#sheetCode').val();
                        d.clientMobile = $('#clientMobile').val();
                        d.channelID = $('#channelID').val(),
                        d.goodsno = $('#goodsno').val(),
                        d.startDate = $('#startDate').val(),
                        d.endDate = $('#endDate').val(),
                        d.processPhase = $('#processPhase').val()=="" ? '{{ $processPhase }}': $('#processPhase').val();
                    }
                },
                drawCallback: function(json) {
                    $('.btnWorksheetDetail').on('click', function() {
                        processingSheetCode = this.getAttribute('data-id');
                        $('#worksheet-popup').modal({show:true, keyboard:false});
                    });
                },
                columns: [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "searchable":     false,
                        "data":           null,
                        "defaultContent": ''
                    },
                    {data: 'sheetCode', name: 'sheetCode'},
                    {data: 'channelID', name: 'channelID'},
                    {data: 'clientName', name: 'clientName'},
                    {data: 'clientMobile', name: 'clientMobile'},
                    {data: 'serviceType', name: 'serviceType'},
                    {data: 'processPhase', name: 'processPhase'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'operations', name: 'operations'},
                ],
                order: [[1, 'asc']]
            });

            // Add event listener for opening and closing details
            $('#worksheetTable tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });
            $('#enqSubmit').on('click',function(){
               table.draw();
            });
        });

        /* Formatting function for row details - modify as you need */
        function format ( d ) {
            // `d` is the original data object for the row
            return '<table class="table" class="table table-bordered">' +
                '<tr>'+
                '<td>货号：</td>'+
                '<td>'+d.goodsno+'</td>'+
                '<td>货名：</td>'+
                '<td>'+d.goodsname+'</td>'+
                '<td>颜色：</td>'+
                '<td>'+d.colordesc+'</td>'+
                '<td>尺码：</td>'+
                '<td>'+d.sizedesc+'</td>'+
                '</tr> <tr>'+
                '<td>问题描述：</td>'+
                '<td colspan="7">'+d.issueDesc+'</td>'+
                '</tr> <tr>'+
                '<td>代理商建议：</td>'+
                '<td colspan="7">'+d.channelServiceReq+'</td>'+
                '</tr> </table>';
        }
    </script>
@endpush
