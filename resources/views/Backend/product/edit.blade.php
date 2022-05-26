@extends('Backend.Main')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/AdminLTE/css/add.css"/>
@endsection

@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('product.update',['id' => $products -> id]) }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="" value="{{$products -> name}}"class="form-control @error('name') is-invalid @enderror" name="name" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm">
                    @error('name')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                    <input value="{{$products -> price}}" type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="exampleInputEmail1" >
                    @error('price')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                    <div class="row">
                    <img class="produtct_image_150 " src="{{$products -> feature_image_path}}" alt="">
                    </div>
                    <input type="file" class="form-control-file" name="feature_image_path" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh chi tiet</label>
                    <input type="file" multiple="multiple"  class="form-control-file" name="image_path[]" >
                    <div class="row image_detail">
                    @foreach($products->images as $productImages)
                    <div class="col-md-3">
                    <img class="image_path" src="{{$productImages -> image_path}}" alt="">
                    </div>
                    @endforeach
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="menu">Danh mục cha</label>
                    <select name="category_id" class="form-control select2_init">
                    <option value="">Danh Mục Cha </option>
                    {!!$htmlOption!!}

                </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea row="3" class="form-control "id="mytextarea" name="content">{{$products -> content}}</textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">sửa</button>
                </div>
              </form>
            </div>
</div>
@endsection
@section('js')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script >
    $(function(){
      $(".tags_select_choose").select2({
         tags:true,
         tokenSeparators:[',']

   });
        $(".select2_init").select2({
            placeholder: "chọn danh mục",
    allowClear: true
   })
    })
</script>
<strong><script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script></strong>
    <script>
      tinymce.init({
        selector: "#mytextarea"
      });
    </script>
@endsection
