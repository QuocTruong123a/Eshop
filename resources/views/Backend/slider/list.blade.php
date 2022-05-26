@extends('Backend.Main')

@section('Content')
@section('css')
<link rel="stylesheet" href="AdminLTE/css/add.css"/>
@endsection

@section('index')
<div class="content-wrapper">
    @include('Backend.alert')
<div class="content">
                <div class="row">
                <div class="col-md-12">
                            <a href="{{route('slider.add')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$loop -> index + 1}}</th>
                                    <td>{{$slider -> name}}</td>
                                    <td class="col-md-6">{{$slider -> description}}</td>
                                    <td><img class="produtct_image_150" src="{{$slider -> image_path}}" alt=""/></td>

                                    <td>
                                    <a href="{{route('slider.edit',['id' => $slider -> id])}}"
                                               class="btn btn-default">Edit</a>
                                            <a href="{{route('slider.delete',['id' => $slider -> id])}}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$sliders -> links('Backend.layout.paginationlinks')}}
                    </div>

                </div>
            </div>
        </div>
</div>
@endsection
