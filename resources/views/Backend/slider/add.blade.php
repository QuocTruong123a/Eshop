@extends('Backend.Main')
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Slider</h3>
              </div>
              @include('Backend.alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('Admin/Slider/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Slider</label>
                    <input type="" class="form-control @error ('name') is-invalid @enderror" name="name" id="exampleInputEmail1" placeholder="Nhập tên Slider">
                    @error('name')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input type="" class="form-control" name="description" id="exampleInputEmail1" placeholder="Nhập tên mô tả Slider">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh Slider</label>
                    <input type="file" class="form-control-file" name="image_path" >
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
