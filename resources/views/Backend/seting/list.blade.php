@extends('Backend.Main')
@section('index')
<div class="content-wrapper">
    @include('Backend.alert')
    <div class="content">
        <div class="row">
            <div class="col-md-12">

            </div>
            <div class="col-md-12">
                <div class="btn-group card-body float-right ">
                    <button type="button" class="btn btn-primary">Add Setting</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('setting.add')}}">Text</a>

                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">config_key</th>
                            <th scope="col">config_value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($setting as $settings)
                        <tr>
                            <th scope="row">{{$settings -> id}}</th>
                            <td>{{$settings -> config_key}}</td>
                            <td>{{$settings -> config_value}}</td>
                            <td>
                                <a href="{{route('setting.edit',['id' => $settings -> id])}}" class="btn btn-default">Edit</a>
                                <a href="{{route('setting.delete',['id' => $settings -> id])}}" data-url="" class="btn btn-danger action_delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$setting -> links('Backend.layout.paginationlinks')}}
            </div>

        </div>
    </div>
</div>
</div>
@endsection
