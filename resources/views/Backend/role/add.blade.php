@extends('Backend.Main')

@section('index')
<div class="content-wrapper">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm chức năng</h3>
        </div>
        @include('Backend.alert')
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{asset('Admin/Role/store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên chức năng</label>
                    <input type="" class="form-control" name="name" id="exampleInputEmail1"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả chức năng</label>
                    <input type="" class="form-control" name="display_name" id="exampleInputEmail1"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="row">
                  @foreach($permissions as $perission)
                <div class="card boder-primary  mb-3 col-md-12" >
                  <div class="card-header bg-dark">
                    <label>
                      <input type="checkbox" value="" class="checkbox_wrapper">
                    </label>
                  Module {{$perission -> name}}</div>
                  <div class = "row">
                    @foreach($perission -> permissionChildrent as $pr)
                  <div class="card-body text- col-md-3">
               <label>
                      <input type="checkbox" name="permission_id[]" value=" {{$pr -> id}}" class="checkbox_childrent">
                    </label>
                        {{$pr -> name}}
                  </div>
                  @endforeach
                  </div>
                   </div>
                   @endforeach
                </div>

            </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </div>
    </form>
</div>
</div>

@endsection
