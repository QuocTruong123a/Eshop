<div class="row">
    @foreach ($products as $product )
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{$product ->feature_image_path}}">

                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href=""><i class="fa fa-retweet"></i></a></li>
                        <li><a class="add" data-url="{{route('cart.index',['id'=>$product -> id])}}"  ><i class="fa fa-shopping-cart"></i></a></li>
            </div>
            <div class="product__item__text">
                <h6><a href="{{route('detail',['slug'=>$product->name,'id'=>$product->id])}}">{{$product ->name}}</a></h6>
                <h5>{{number_format($product ->price) }}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="product__pagination">
    {{$products-> links('Backend.layout.paginationlinks')}}
</div>
