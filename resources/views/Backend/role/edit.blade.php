@extends('Backend.Main')
@section('js')
<script>
  // all check box
  $('.checkbox_wrapper').on('click',function(){
    $(this).parents('.boder-primary').find('.checkbox_childrent').prop('checked',$(this).prop('checked'));
  });
</script>
@endsection
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa chức năng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('role.update',['id' => $role -> id]) }}" method="post">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên chức năng</label>
                    <input value="{{$role -> name}}" type="" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả chức năng</label>
                    <input value="{{$role -> display_name}}" type="" class="form-control" name="display_name" id="exampleInputEmail1"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="row">
                  @foreach($permissions as $perission)
                <div class="card boder-primary  mb-3 col-md-12" >
                  <div class="card-header bg-dark">
                    <label>
                      <input type="checkbox" value="" class="checkbox_wrapper">
                    </label>
                  Modul {{$perission -> name}}</div>
                  <div class = "row">
                    @foreach($perission -> permissionChildrent as $pr)
                  <div class="card-body text- col-md-3">
               <label>
                      <input type="checkbox" name="permission_id[]" value=" {{$pr -> id}}" 
                      {{$permissionchecked -> contains('id',$pr -> id)? 'checked':''}}
                      class="checkbox_childrent">
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
                  <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
              </form>
            </div>
</div>
@endsection