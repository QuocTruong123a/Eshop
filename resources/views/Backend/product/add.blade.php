@extends('Backend.Main')


@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              @include('Backend.alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="" class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                    @error('name')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputEmail1" >
                    @error('price')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh dai dien</label>
                    <input type="file" class="form-control-file" name="feature_image_path" >
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh chi tiet</label>
                    <input type="file" multiple="multiple"  class="form-control-file" name="image_path[]" >
                  </div>
                  <div class="form-group">
                    <label for="menu">Danh mục cha</label>
                    <select name="category_id" class="form-control select2_init">
                    <option value="">Danh Mục Cha </option>
                      {!!$htmlOption!!}
                      <div class="form-group">
                </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea row="3" class="form-control "id="mytextarea" name="content"></textarea>
                  </div>
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

