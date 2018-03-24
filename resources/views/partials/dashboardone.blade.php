<br/><br/>
<div class="col-md-12">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h4 class="box-title">
                工单按日统计
            </h4>
        </div>
        <div class="panel">
            <div class="box-body">
                <div>
                    <graphline class="chart" :labels="{{json_encode($createdWorksheetEachDays)}}"
                               :values="{{json_encode($worksheetCreated)}}"
                               :valuesextra="{{json_encode($worksheetCompleted)}}"></graphline>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Info boxes -->
<div class="row movedown">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-wrench"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">维修工单数</span>
                <span class="info-box-number">{{$countServiceRepair}}
                    <small></small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-loop"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">换鞋工单数</span>
                <span class="info-box-number">{{$countExchange}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-refresh"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">退货工单数</span>
                <span class="info-box-number">{{$countRefund}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-android-call"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">协商工单数</span>
                <span class="info-box-number">{{$countNigotiation}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
<!-- /.info-box -->
    
