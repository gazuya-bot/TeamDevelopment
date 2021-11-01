@extends('adminlte::page')

@section('title', '顧客一覧')

@section('content_header')
<div>
    <h1>編集</h1>
    <!-- <button class="btn btn-outline-primary" style="margin-left: 90%;"><a href="../HTML/sign-up.html">新規登録</a></button> -->
</div>
@stop


@section('content')
<!-- 編集フォーム -->
<!-- <div class="content-wrapper"> -->
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <div class="card card-primary">
                <section class="content">
                    <div class="col-12">
                        <div class="card-body">
                        <!-- form start -->
                            <form method="POST" action="{{ route('update', ['id'=>$member->id]) }}" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputclubname" class="col-sm-2 col-form-label">学校名 / 部活名</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputclubname" name="club_name" value="{{ $member->club_name }}">

                                            @error('name')
                                            {{$message}}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputemail" class="col-sm-2 col-form-label">メールアドレス</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputemail" name="email" value="{{ $member->email }}">

                                            @error('name')
                                            {{$message}}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputemail" class="col-sm-2 col-form-label">住所</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputaddress" name="address" value="{{ $member->address }}">

                                            @error('name')
                                            {{$message}}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputname" class="col-sm-2 col-form-label">顧問名</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputname" name="name" value="{{ $member->name }}">

                                            @error('name')
                                            {{$message}}
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputtel" class="col-sm-2 col-form-label">連絡先</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="inputtel" name="tel" value="{{ $member->tel }}">

                                            @error('name')
                                            {{$message}}
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputfax" class="col-sm-2 col-form-label">FAX</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="inputfax" name="fax" value="{{ $member->fax }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputmemo" class="col-sm-2 col-form-label">備考</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputmemo" name="memo" value="{{ $member->memo }}">
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-outline-primary">更新</button>
                                    <button id="delete" type="submit" class="btn btn-outline-danger float-right"><a href="{{ route('delete', ['id'=>$member->id]) }}">削除</a></button>
                                    <button type="submit" class="btn btn-outline-secondary float-right"><a href="{{ route('detail', ['id'=>$member->id]) }}">キャンセル</a></button>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop