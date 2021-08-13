@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Loại phòng chung Cư
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
                    <form role="form" action="{{URL::to('/save-category-apartment')}}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Loại phòng chung cư</label>
                            <input type="text" name="category_apartment_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Loại phòng chung cư">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả Loại phòng chung cư</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="category_apartment_desc" id="exampleInputPassword1" placeholder="Mô tả Loại phòng chung cư"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select name="category_apartment_status" class="form-control input-sm m-bot15">
                                <option value="0">Hiển Thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" name="add_category_apartment" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

