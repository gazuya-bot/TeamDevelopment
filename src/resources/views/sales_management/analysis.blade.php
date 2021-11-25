@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/matsumoto/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/style_M.css')}}">
@stop

@section('title', '売上管理')

@section('page_name','売上管理')

@section('content_header')
<h6 style="text-align: center;"><?php if (isset($member_name)){ echo $member_name->club_name;}else{echo '全て';}?></h6>
@stop

@section('content')


<!-- モーダルウィンドウの中身 -->

@if(Session::has('flashmessage'))
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                {{ session('flashmessage') }}
            </div>
            <div class="modal-footer text-center">
            </div>
        </div>
    </div>
</div>
<script>
    $(window).on('load', function() {
        $('#Modal').modal('show');
    });
</script>
@endif




<div class="row">
    
    <div class="col-12">

        <!-- BAR CHART -->
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">月別売上</h3>

                
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->


    <div class="col-12">
        <div class="card-body">
            <div class="card-header">
                <h3 class="card-title">データ一覧</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        選択してください
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{url('/sales_management')}}" aria-selected="true">全て</a>
                        @foreach($members_lists as $members_list)
                        <a class="dropdown-item" href="{{url('/sales_management',$members_list->id)}}">{{ $members_list->club_name }}</a>
                        @endforeach
                    </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>顧客名</th>
                            <th>売上</th>
                            <th>支払いポイント</th>
                            <th>獲得ポイント</th>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach($points as $point)
                        <tr>
                            <td>{{ $point->club_name }}</td>
                            <td>{{ $point->sale }} 円</td>
                            <td>{{ $point->pay_point }} pt</td>
                            <td>{{ $point->get_point }} pt</td>

                            <td>
                                <div class="text-center">
                                    <a href="{{ url('/price_edit', $point->id) }}">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">編集</button>
                                    </a>
                                    <a href="{{ url('/price_delete', $point->id) }}">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">削除</button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.content-wrapper -->


<!-- ./wrapper -->
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js" ></script>
<script src="{{asset('vendor/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendor/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script>

    var barlabel = <?php echo json_encode($label); ?>;

    var sum_sales = <?php echo json_encode($sum_sales); ?>;





    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            'language': {
                'url': "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
            },

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    var areaChartData = {
        labels: barlabel,
        datasets: [{
            label: '売上',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: sum_sales
        }]
    }




    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    //var temp0 = areaChartData.datasets[0]
    //var temp1 = areaChartData.datasets[1]
    //barChartData.datasets[0] = temp1
    //barChartData.datasets[1] = temp1

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
    }

    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })

</script>
@stop