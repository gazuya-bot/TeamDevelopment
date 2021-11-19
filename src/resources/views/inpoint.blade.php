@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary inbox-size">
                    <div class="card-body">                   
                        <form class="form-horizontal" method="POST" action="/point_add">
                            @csrf
                            <div class="form-group row">
                                <label for="members_id" class="col-sm-2 col-form-label">顧客名</label>
                                <div class="col-sm-10">
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="members_id" required>
                                    <option></option>
                                    <option>A高校</option>
                                    <option>B高校</option>
                                    <option>C高校</option>
                                    <option>D高校</option>
                                    <option>E高校</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sale" class="col-sm-2 col-form-label">売上金額</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="sale" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pay_point" class="col-sm-2 col-form-label">ポイント支払い</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="pay_point" value=0>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="get_point" class="col-sm-2 col-form-label">獲得ポイント</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="売上の１％進呈" disabled="disabled" name="get_point">
                                </div>
                            </div>
                            </div>
                            <div class="card-footer container-fluid">
                            <div class="row">
                                <div class="col-sm-6"><button type="submit" class="btn btn-outline-secondary col-sm-12">クリア</button></div>
                                <div class="col-sm-6"><button type="submit" class="btn btn-outline-primary col-sm-12">登録</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop