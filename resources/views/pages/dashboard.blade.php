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

        <?php $createdTaskEachMonths = array(); $taskCreated = array();?>
        @foreach($createdTasksMonthly as $task)
            <?php $createdTaskEachMonths[] = date('F', strTotime($task->created_at)) ?>
            <?php $taskCreated[] = $task->month;?>
        @endforeach

        <?php $completedTaskEachMonths = array(); $taskCompleted = array();?>

        @foreach($completedTasksMonthly as $tasks)
            <?php $completedTaskEachMonths[] = date('F', strTotime($tasks->updated_at)) ?>
            <?php $taskCompleted[] = $tasks->month;?>
        @endforeach

        <?php $completedLeadEachMonths = array(); $leadsCompleted = array();?>
        @foreach($completedLeadsMonthly as $leads)
            <?php $completedLeadEachMonths[] = date('F', strTotime($leads->updated_at)) ?>
            <?php $leadsCompleted[] = $leads->month;?>
        @endforeach

        <?php $createdLeadEachMonths = array(); $leadCreated = array();?>
        @foreach($createdLeadsMonthly as $lead)
            <?php $createdLeadEachMonths[] = date('F', strTotime($lead->created_at)) ?>
            <?php $leadCreated[] = $lead->month;?>
        @endforeach
        <div class="row">

            @include('partials.dashboardone')


        </div>
@endsection
