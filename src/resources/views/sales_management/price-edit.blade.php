@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/style_M.css')}}">
@stop

@section('title', '売上編集')

@section('page_name','売上編集')

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

            <form action="{{route('update_price', $point->id)}}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">学校名/部活名</label>
                        <select class="form-control col-3" name="members_id">
                            @foreach($members_lists as $members_list)
                            <option <?php if ($point->members_id === $members_list->id) {
                                        echo ' selected';
                                    } ?> value="{{$members_list->id}}">{{$members_list->club_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">売上</label>
                        <input type="text" class="form-control col-sm-10"  value="{{  $point->sale }}" name="sale">
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">支払いポイント</label>
                        <input type="text" class="form-control col-sm-10" value="{{  $point->pay_point }}" name="pay_point">
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">付与ポイント</label>
                        <input type="text" class="form-control col-sm-10" value="{{  $point->get_point }}" name="get_point" disabled>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary float-right">変更</button>
                    <a href="{{ route('show_analysis') }}">
                    <button type="button" class="btn btn-outline-secondary float-left">キャンセル</button>
                    </a>
                </div>


            </form>

            <!-- <button class="btn btn-outline-danger float-right">削除</button>
                    <a href="{{route('show_analysis')}}">
                        <button class="btn btn-outline-secondary float-right">キャンセル</button>
                    </a> -->
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