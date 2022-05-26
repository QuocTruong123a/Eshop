@extends('Backend.Main')

@section('Content')
@section('css')
<link rel="stylesheet" href="AdminLTE/css/add.css"/>
@endsection

@section('index')
<div class="content-wrapper">
<div class="content">
    @include('Backend.alert')
                <div class="row">
                <div class="col-md-12">
                            <a href="{{route('product.add')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table  class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Danh Mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$loop -> index +1}}</th>
                                    <td>{{$product -> name}}</td>
                                    <td>{{number_format($product -> price)}}</td>
                                    <td><img class="produtct_image_150 " src="{{$product -> feature_image_path}}" alt=""/></td>
                                    <td>{{$product->category->name }}</td>
                                    <td>
                                           <a href="{{route('product.edit',['id' => $product -> id])}}"
                                               class="btn btn-default">Edit</a>
                                            <a href="{{route('product.delete',['id' => $product -> id])}}"
                                            data-url=""
                                               class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                      @endforeach
                            </tbody>
                        </table>
                        {{$products -> links('Backend.layout.paginationlinks')}}
                    </div>

                </div>
            </div>
        </div>
</div>
@endsection
