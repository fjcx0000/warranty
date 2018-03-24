@extends('layouts.master')

@section('content')
@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip(); //Tooltip on icons top

            $('.popoverOption').each(function () {
                var $this = $(this);
                $this.popover({
                    trigger: 'hover',
                    placement: 'left',
                    container: $this,
                    html: true,

                });
            });

            $("#statPeriod option[value='{{$statPeriod}}']").attr("selected", true);
        });
    </script>
@endpush
    <div class="div">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{ $countAuth }}
                        </h3>

                        <p>待审核</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-eye-outline"></i>
                    </div>
                    <a href="{{route('worksheet.list', ['processPhase' => 'auth'])}}" class="small-box-footer">处理工单 <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{ $countWaitshoes }}
                        </h3>

                        <p>待客户寄鞋</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-download-outline"></i>
                    </div>
                    <a href="{{route('worksheet.list', ['processPhase' => 'waitshoes'])}}" class="small-box-footer">处理工单 <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$countRepair}}</h3>

                        <p>待工厂维修</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-wrench"></i>
                    </div>
                    <a href="{{route('worksheet.list', ['processPhase' => 'repair'])}}" class="small-box-footer">处理工单 <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            {{$countSendback}}
                        </h3>

                        <p>待寄回客户</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-upload-outline"></i>
                    </div>
                    <a href="{{route('worksheet.list', ['processPhase' => 'sendback'])}}" class="small-box-footer">处理工单 <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->


        <?php $createdWorksheetEachDays = array(); $worksheetCreated = array();?>
        @foreach($createdWorksheetDaily as $worksheet)
            <?php $createdWorksheetEachDays[] = date('m-d', strTotime($worksheet->created_at)) ?>
            <?php $worksheetCreated[] = $worksheet->daily;?>
        @endforeach

        <?php $completedWorksheetEachDays = array(); $worksheetCompleted = array();?>

        @foreach($completedWorksheetDaily as $worksheet)
            <?php $completedWorksheetEachDays[] = date('m-d', strTotime($worksheet->updated_at)) ?>
            <?php $worksheetCompleted[] = $worksheet->daily;?>
        @endforeach
        <div class="row">
            <div class="md-col-12i pull-right">
                <form class="form-inline" action="{{route('dashboard')}}">
                    <div class="form-group">
                        <label for="statPeriod">统计周期</label>
                        <select name="statPeriod" id="statPeriod">
                            <option value="7">7天</option>
                            <option value="30">30天</option>
                            <option value="90">90天</option>
                            <option value="180">180天</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xs">提交</button>
                </form>
            </div>
        </div>
        <div class="row">

            @include('partials.dashboardone')


        </div>
@endsection
