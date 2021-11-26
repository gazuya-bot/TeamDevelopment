@extends('adminlte::page')

<<<<<<< Updated upstream
@section('title', '顧客一覧')
=======
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/style_M.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@stop
>>>>>>> Stashed changes

@section('content_header')
<div>
    <h1>新規登録</h1>
    <!-- <button class="btn btn-outline-primary" style="margin-left: 90%;"><a href="../HTML/sign-up.html">新規登録</a></button> -->
</div>
@stop


@section('content')
<!-- 登録フォーム -->
<!-- <div class="content-wrapper"> -->
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <div class="card card-primary">
                <section class="content">
                    <div class="col-12">
                        <div class="card-body">
                        <!-- form start -->
                        <form method="POST" action="{{ route('store') }}" class="form-horizontal">
                        @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputclubname" class="col-sm-2 col-form-label">学校名 / 部活名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="club_name" id="inputclubname" placeholder="学校名 / 部活名" value="{{ old('club_name') }}">

                                        @error('club_name')
                                        <p class="error_message" style="color:red">{{ $message}}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputemail" class="col-sm-2 col-form-label">メールアドレス</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="inputemail" placeholder="メールアドレス" value="{{ old('tel')}}">

                                        @error('email')
                                        <p class="error_message" style="color:red">{{ $message}}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputaddress" class="col-sm-2 col-form-label">住所</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="inputaddress" placeholder="住所" value="{{ old('address') }}">

                                        @error('address')
                                        <p class="error_message" style="color:red">{{ $message}}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputname" class="col-sm-2 col-form-label">顧問名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="inputname" placeholder="名前" value="{{ old('name') }}">

                                        @error('name')
                                        <p class="error_message" style="color:red">{{ $message}}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputtel" class="col-sm-2 col-form-label">連絡先</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="tel" id="inputtel" placeholder="連絡先" value="{{ old('tel') }}">

                                        @error('tel')
                                        <p class="error_message" style="color:red">{{ $message}}</p>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputfax" class="col-sm-2 col-form-label">FAX</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="fax" id="inputfax" placeholder="FAX">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputmemo" class="col-sm-2 col-form-label">備考</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="memo" id="inputmemo">
                                    </div>
                                </div>
                            </div>
                        <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-secondary float-right"><a href="{{ route('memberlist') }}">{{ __('キャンセル') }}</a></button>
                                <button type="submit" class="btn btn-outline-primary">登録</button>  
                            </div>
                    <!-- /.card-footer -->
                        </form>
                        </div>
                    </div>                                     
                </section>
            </div> 
        <!-- </div> -->
    </div>
<!-- </div> -->

<!-- フラッシュメッセージ -->
<script>
    @if (session('flash_message'))
        $(function () {
                toastr.success('{{ session('flash_message') }}');
        });
    @endif
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop