@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/style_M.css')}}">
@stop

@section('title', '売上削除')

@section('page_name','売上削除')

@section('content')
<!-- <div class="container-fluid"> -->
<!-- <div class="row"> -->
<!-- left column -->
<!-- <div class="col-12"> -->
<!-- general form elements -->
<div class="card">
    <div class="col-12">
        <div class="card-body">

            <!-- <h3 class="card-title">テックアイエス高校バドミントン部</h3> -->
            <!-- /.card-header -->
            <!-- form start -->

                <div class="card-body">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">学校名/部活名</label>
                        <p class="form-control col-3">{{ $point->club_name }}</p>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">売上</label>
                        <p class="form-control col-10">{{ $point->sale }}</p>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">支払いポイント</label>
                        <p class="form-control col-10">{{ $point->pay_point }}</p>
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">付与ポイント</label>
                        <p class="form-control col-10">{{ $point->get_point }}</p>
                    </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <form action="{{route('delete_price', $point->id)}}" method="POST">
                    @csrf
                    <button type="submit"  class="btn btn-outline-danger float-left" onclick="return confirm('削除します！')">削除</button>
                    <a href="{{ route('show_analysis') }}">
                    <button type="button" class="btn btn-outline-secondary float-right">キャンセル</button>
                    </a>
                    </form>
                </div>


        </div>


    </div>
</div>
</section>
</div>


<!-- /.card -->
</div>
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->

<!-- /.control-sidebar -->



@stop