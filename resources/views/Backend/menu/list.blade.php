@extends('Backend.Main')
@section('index')
<div class="content-wrapper">
<div class="content">
    @include('Backend.alert')
    <div class="row">
                <div class="col-md-12">
                         <a href="Admin/Menu/add" class="btn btn-success float-right m-2">Add</a>
                       </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $menu)
                             <tr>
                                    <th scope="row">{{$loop -> index +1}}</th>
                                    <td>{{$menu -> name}}</td>
                                    <td>
                                         <a href="{{ route('menu.edit', ['id' => $menu->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href="{{ route('menu.delete', ['id' => $menu->id]) }}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$menus -> links('Backend.layout.paginationlinks')}}
                </div>
            </div>
        </div>
</div>
@endsection
