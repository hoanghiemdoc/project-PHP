@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm phòng
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
                        <form role="form" action="{{URL::to('/save-apartment')}}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên phòng</label>
                                <input type="text" name="apartment_name" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" name="apartment_address" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" name="apartment_price" class="form-control" id="exampleInputEmail1" placeholder="Giá">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thông Tin về phòng</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="apartment_content" id="exampleInputPassword1" placeholder="Thông Tin về phòng"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thông Tin chi tiết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="apartment_desc" id="exampleInputPassword1" placeholder="Thông Tin chi tiết"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh</label>
                                <input type="file" name="apartment_image" class="form-control" id="exampleInputEmail1">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">loại chung cư</label>
                                <select name="apartment_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_apartment as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">loại Phòng chung cư</label>
                                <select name="apartment_build" class="form-control input-sm m-bot15">
                                    @foreach($build_apartment as $key => $build)
                                        <option value="{{$build->building_id}}">{{$build->building_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                <select name="apartment_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển Thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add_apartment" class="btn btn-info">Thêm phòng</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

