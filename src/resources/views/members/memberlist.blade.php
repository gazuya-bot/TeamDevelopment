@extends('adminlte::page')

@section('title', '顧客一覧')

@section('content_header')
<div>
    <h1>顧客一覧</h1>
    <button class="btn btn-outline-primary" style="margin-left: 90%;"><a href="{{ route('sign_up') }}">{{ __('新規登録') }}</a></button>
</div>
@stop


@section('content')
    <!-- 顧客一覧 -->
<!-- <div class="content-wrapper"> -->
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <div class="card card-primary">
                <section class="content">
                    <div class="col-12">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                     <th>ID</th>
                                     <th>学校名 / 部活名</th>
                                     <th>最終購入日</th>
                                     <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    
                                    <tr data-href="{{ route('detail', ['id'=>$member->id]) }}">
                                    
                                        <td>
                                            <a href="{{ route('detail', ['id'=>$member->id]) }}">
                                            {{ $member->id }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $member->club_name }}
                                        </td>
                                        <td>
                                            {{ $member->updated_at }}
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="{{ route('edit',['id'=>$member->id]) }}">{{ __('編集') }}</a></button>
                                           <button class="btn btn-outline-danger"><a href="{{ route('delete',['id'=>$member->id]) }}">{{ __('削除') }}</a></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- <tr data-href="../HTML/detail.html">
                                        <td>2</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>3</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>4</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>5</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>6</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>7</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>8</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr>
                                    <tr data-href="../HTML/detail.html">
                                        <td>9</td>
                                        <td>
                                           テック中学校ソフトテニス部
                                        </td>
                                        <td>2012/9/24</td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="../HTML/edit.html">編集</a></button>
                                            <button class="btn btn-outline-danger"><a href=".../HTML/delete.html">削除</a></button>
                                        </td>
                                    </tr> -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>学校名 / 部活名</th>
                                        <th>最終購入日</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
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