@extends('Backend.Main')
@section('index')
<div class="content-wrapper">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              @include('Backend.alert')
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{asset('Admin/Setting/store')}}" method="post">
              @csrf

                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1">config key</label>
                        <textarea type="" class="form-control  @error ('config_key') is-invalid @enderror" name="config_key" id="exampleInputEmail1" placeholder="config value"></textarea>
                        @error('config_key')
                        <div class=" alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">config value</label>
                    <textarea type="" class="form-control  @error ('config_value') is-invalid @enderror" name="config_value" id="exampleInputEmail1" placeholder="config value"></textarea>
                    @error('config_value')
                    <div class=" alert alert-danger">{{$message}}</div>
                    @enderror
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
