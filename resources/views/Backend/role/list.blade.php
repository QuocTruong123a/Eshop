@extends('Backend.Main')

@section('index')
<div class="content-wrapper">
<div class="content">
                <div class="row">
                <div class="col-md-12">
                            <a href="{{ asset('admin/role/create') }}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên chức năng</th>
                                <th scope="col">Mô tả chức năng</th>
                            </tr>
                            </thead>
                            @foreach($role as $roles)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$roles -> id}}</th>
                                    <td>{{$roles -> name}}</td>
                                    <td>{{$roles -> display_name}}</td>
                                    <td>
                                        <a href="{{route('role.edit',['id' => $roles-> id])}}"
                                            class="btn btn-default">Edit</a>
                                            <a href="{{route('role.delete',['id' => $roles-> id])}}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        {{$role -> links('Backend.layout.paginationlinks')}}
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
