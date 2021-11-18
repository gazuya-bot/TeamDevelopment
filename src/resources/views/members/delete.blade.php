@extends('adminlte::page')

@section('title', '顧客一覧')

@section('content_header')
<div>
    <h1>削除</h1>
    <!-- <button class="btn btn-outline-primary" style="margin-left: 90%;"><a href="../HTML/sign-up.html">新規登録</a></button> -->
    <span style="color: crimson;">削除しますか？</span>
</div>
@stop


@section('content')
<!-- 削除画面 -->
<!-- <div class="content-wrapper"> -->
<div class="container-fluid">
        <!-- <div class="row"> -->
            <div class="card card-primary">
                <section class="content">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="card-body">
                                
                                    <table id="example2" class="table table-bordered">
                                        <tr style="text-align: center;"><th>ID</th><td>{{ $member->id }}</td></tr>
                                        <tr style="text-align: center;"><th>学校名 / 部活名</th><td>{{ $member->club_name }}</td></tr>
                                        <tr style="text-align: center;"><th>メールアドレス</th><td>{{ $member->email }}</td></tr>
                                        <tr style="text-align: center;"><th>住所</th><td>{{ $member->address }}</td></tr>
                                        <tr style="text-align: center;"><th>顧問名</th><td>{{ $member->name }}</td></tr>
                                        <tr style="text-align: center;"><th>連絡先</th><td>{{ $member->tel }}</td></tr>
                                        <tr style="text-align: center;"><th>FAX</th><td>{{ $member->fax }}</td></tr>
                                        <tr style="text-align: center;"><th>備考</th><td>{{ $member->memo }}</td></tr>
                                    </table>
                                    <!-- /.card-footer -->
                                    <div class="card-footer">
                                    <form method="POST" action="{{ route('destroy', ['id'=>$member->id]) }}">
                                        @csrf
                                        <!-- <input type="hidden" name="id" > -->
                                        <input type="button" id="delete" class="btn btn-outline-danger float-right" value="削除">
                                        </form>
                                        <button type="submit" class="btn btn-outline-secondary float-right"><a href="{{ route('memberlist') }}">キャンセル</a></button>
                                    </div>
                                
                            </div>
                        </div>                                     
                </section>
            </div> 
</div>
<!-- </div> -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 

    $(function () {
        bsCustomFileInput.init();
    });

    $('#delete').click(function(){
        if(!confirm('削除します！')){
        /* キャンセルの時の処理 */
            return false;
        }else{
        /*OKの時の処理 */
            location.href = '{{route('destroy', $member->id )}}';
        }
    });
</script>
@stop