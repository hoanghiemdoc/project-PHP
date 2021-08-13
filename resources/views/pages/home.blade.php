@extends('welcome')
@section('content')

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Chung Cư Mới Nhất</h2>
        @foreach($all_apartment as $key =>$apartment)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{URL::to('public/upload/apartment/'.$apartment->apartment_image)}}" alt="" />
                        <h2>{{number_format($apartment->apartment_price).' '.'Vnđ'}}</h2>
                        <p>{{$apartment->apartment_name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu Thích</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>So Sánh</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--features_items-->

@endsection
