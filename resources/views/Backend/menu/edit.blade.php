@extends('Backend.Main')
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('menu.update',['id' => $menu -> id]) }}" method="post">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên Menu</label>
                    <input value="{{$menu -> name}}" type="" class="form-control  @error ('name') is-invalid @enderror" name="name" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="menu">Menu Cha</label>
                    <select name="parent_id" class="form-control" name="parent_id">
                    <option value="0"> Menu Cha </option>
                       {!!$optionSelect!!}
                </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
              </form>
            </div>
</div>
@endsection
