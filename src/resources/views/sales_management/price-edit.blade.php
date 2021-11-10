@extends('adminlte::page')

@section('title', 'Dashboard')
@section('page_name','売上編集画面')
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
                        <label for="exampleInputPassword1" class="col-sm-2 col-form-label">学校名/部活名</label>
                        <select class="form-control col-3" name="member_id">
                            @foreach($members_lists as $members_list)
                            <option <?php if ($point->member_id === $members_list->id) {
                                        echo ' selected';
                                    } ?> value="{{$members_list->id}}">{{$members_list->club_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row ">
                        <label for="date" class="col-sm-2 col-form-label">日時</label>
                        <input type="date" name="date" class="form-control col-3" value="{{ $point->date}}">
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">売上</label>
                        <input type="text" class="form-control col-sm-10" id="exampleInputEmail1" value="{{  $point->sale }}" name="sale">
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">利用ポイント</label>
                        <input type="text" class="form-control col-sm-10" id="exampleInputEmail1" value="0">
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">付与ポイント</label>
                        <input type="text" class="form-control col-sm-10" id="exampleInputEmail1" value="{{  $point->get_point }}" name="get_point">
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword1" class="col-sm-2 col-form-label">商品カテゴリー</label>
                        <select class="form-control col-3" name="category_id">
                            @foreach($item_categories as $item_category)
                            <option <?php if ($point->category_id === $item_category->id) {
                                        echo ' selected';
                                    } ?> value="{{$item_category->id}}">{{$item_category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-primary float-left">変更</button>
                    <a href="{{ route('show_analysis') }}">
                    <button type="button" class="btn btn-outline-secondary float-right">キャンセル</button>
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