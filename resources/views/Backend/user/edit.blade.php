@extends('Backend.Main') 
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa tài khoản</h3>
              </div>
              @include('Backend.alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('user.update',['id' => $user -> id]) }}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input value="{{$user -> name}}" type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên ">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="{{$user -> email}}" type="" class="form-control" name="email" id="exampleInputEmail1" placeholder="Nhập email">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu</label>
                    <input type="password" value="" class="form-control "  name="password"  id="changePassword" placeholder="Nhập mật khẩu">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn vai trò</label>
                    <select name="role_id[]" class="form-control select2_init" multiple> 
                      @foreach($roles as $role) 
                      <option 
                      {{$rolesofuser->contains('id',$role -> id) ? 'selected':'' }}
                      value="{{$role -> id}}">{{$role -> name}}</option>
                     @endforeach
                    </select>
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
@section('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script >
    $(function(){
        $(".select2_init").select2({
            placeholder: "Chọn vai trò",
   
   })
    })
</script>

@endsection