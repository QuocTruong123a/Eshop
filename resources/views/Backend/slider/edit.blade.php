@extends('Backend.Main')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/AdminLTE/css/add.css"/>
@endsection
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Slider</h3>
              </div>
              @include('Backend.alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('slider.update',['id' => $slider-> id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Slider</label>
                    <input type="" value="{{$slider -> name}}"class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputEmail1" placeholder="Nhập tên Slider">
                    @error('name')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input type="" value="{{$slider -> description}}" class="form-control" name="description" id="exampleInputEmail1" placeholder="Nhập tên mô tả Slider">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh Slider</label>
                    <div class="row">
                    <img class="produtct_image_150 " src="{{$slider -> image_path}}" alt="">
                    </div>
                    <div class="col-md-3">
                    <input type="file" class="form-control-file" name="image_path" >
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa Slider</button>
                </div>
              </form>
            </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
