@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/style_M.css')}}">
@stop

@section('title', '売上ポイント登録')

@section('page_name','売上ポイント登録')

@section('content')
    
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
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="members_id">
                                    <option></option>
                                    <option value="A高校" @if(old('members_id')=="A高校")selected @endif>A高校</option>
                                    <option value="B高校" @if(old('members_id')=="B高校")selected @endif>B高校</option>
                                    <option value="C高校" @if(old('members_id')=="C高校")selected @endif>C高校</option>
                                    <option value="D高校" @if(old('members_id')=="D高校")selected @endif>D高校</option>
                                    <option value="E高校" @if(old('members_id')=="E高校")selected @endif>E高校</option>
                                </select>
                                @if(!empty($errors->first('members_id')))
                                    <p class="error_message" style="color:red">{{ $errors->first('members_id') }}</p>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sale" class="col-sm-2 col-form-label">売上金額</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="sale" id="sale" value="{{ old('sale') }}">
                                @if(!empty($errors->first('sale')))
                                    <p class="error_message" style="color:red">{{ $errors->first('sale') }}</p>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pay_point" class="col-sm-2 col-form-label">ポイント支払い</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="" name="pay_point" id="pay_point" value="{{ old('pay_point') }}">
                                @if(!empty($errors->first('pay_point')))
                                    <p class="error_message" style="color:red">{{ $errors->first('pay_point') }}</p>
                                @endif
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
                                <div class="col-sm-6"><button type="submit" class="btn btn-outline-secondary col-sm-12" name="clear_data" onclick="clearText()">クリア</button></div>
                                <div class="col-sm-6"><button type="submit" class="btn btn-outline-primary col-sm-12" name="write_data">登録</button></div>
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