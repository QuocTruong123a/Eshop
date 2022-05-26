@extends('Backend.Main')
@section('index')
<div class="content-wrapper">
<div class="content">
    @include('Backend.alert')

                <div class="row">
                <div class="col-md-12">
                            <a href="Admin/categories/add" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Danh mục Cha</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                         @foreach($categories as $category)

                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    @if($category -> parent -> count())
                                    @foreach( $category -> parent as $parent_name)
                                    <td>{{$parent_name -> name}}</td>
                                    @endforeach
                                    @else
                                    <td></td>
                                    @endif
                                    <td>
                                            <a href="{{ route('category.edit', ['id'=>$category->id]) }}"
                                               class="btn btn-default">Edit</a>
                                            <a href="{{route('category.delete',['id'=>$category ->id])}}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>

                       @endforeach
                            </tbody>
                        </table>
                        {{$categories-> links('Backend.layout.paginationlinks')}}
                    </div>

                </div>
            </div>
        </div>
</div>
@endsection
