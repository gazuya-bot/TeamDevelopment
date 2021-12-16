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
    <div class="container-fluid">
        <div class="card card-primary">
            <section class="content">
                <div class="col-12">
                <button class="btn btn-outline-primary float-right" style="position: relative; bottom: -15px;"><a href="{{ route('sign_up') }}">{{ __('新規登録') }}</a></button>
                    <div class="card-body">
                        <table id="example1" class="table table-striped">
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
                                        {{ $member->created_at }}
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>

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
</script>
@stop