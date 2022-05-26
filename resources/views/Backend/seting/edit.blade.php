@extends('Backend.Main') 
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Menu</h3>
              </div>
              @include('Backend.alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('setting.update',['id' => $setting -> id]) }}" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Menu</label>
                    <input type="" value="{{$setting -> config_key}}" class="form-control" name="config_key" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">config value</label>
                    <textarea type=""  class="form-control" name="config_value" id="exampleInputEmail1" placeholder="config value">{{$setting -> config_value}}</textarea>
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