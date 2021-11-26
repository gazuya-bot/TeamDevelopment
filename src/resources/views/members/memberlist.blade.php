@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/matsumoto/style_M.css')}}">
@stop

@section('title', '顧客一覧')

@section('page_name','顧客一覧')

@section('content')


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
<<<<<<< HEAD
<<<<<<< Updated upstream
                                            {{ $member->updated_at }}
=======
                                            {{ $nsd[$member->id] }}
>>>>>>> Stashed changes
=======
                                            {{ $nsd[$member->id] }}
>>>>>>> 52e2e99259e23098873fa3c5fadcc3fc2376dca6
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary"><a href="{{ route('edit',['id'=>$member->id]) }}">{{ __('編集') }}</a></button>
                                            <button class="btn btn-outline-danger"><a href="{{ route('delete',['id'=>$member->id]) }}">{{ __('削除') }}</a></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
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