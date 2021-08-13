@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật phòng
                </header>
                <div class="panel-body">


                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">',$message.'</span>';
                        $message = Session::put('message',null);
                    }
                    ?>


                    <div class="position-center">
                        @foreach($edit_apartment as $key =>$apart)
                        <form role="form" action="{{URL::to('/update-apartment/'.$apart->apartment_id)}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phòng</label>
                                <input type="text" name="apartment_name" class="form-control" id="exampleInputEmail1" value="{{ $apart->apartment_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" name="apartment_address" class="form-control" id="exampleInputEmail1" value="{{ $apart->apartment_address }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" name="apartment_price" class="form-control" id="exampleInputEmail1" value="{{ $apart->apartment_price }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thông Tin về phòng</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="apartment_content" id="exampleInputPassword1" >{{ $apart->apartment_content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thông Tin chi tiết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="apartment_desc" id="exampleInputPassword1" >{{ $apart->apartment_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" name="apartment_image" class="form-control" id="exampleInputEmail1">
                                <img src="{{URL::to('/public/upload/apartment/'.$apart->apartment_image)}}" height="100" width="100">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">loại chung cư</label>
                                <select name="apartment_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_apartment as $key => $cate)
                                        @if($cate->category_id==$apart->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>

                                        @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">loại phòng chung cư</label>
                                <select name="apartment_cate" class="form-control input-sm m-bot15">
                                    @foreach($build_apartment as $key => $build)
                                        @if($build->building_id==$build->building_id)
                                            <option selected value="{{$build->building_id}}">{{$build->building_name}}</option>

                                        @else
                                            <option value="{{$build->building_id}}">{{$build->building_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="apartment_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển Thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_apartment" class="btn btn-info">Cập nhật phòng</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

