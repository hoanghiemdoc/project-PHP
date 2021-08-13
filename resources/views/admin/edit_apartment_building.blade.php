@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Loại chung Cư
                </header>
                <div class="panel-body">

                    @foreach($edit_apartment_building as $key => $edit_value)

                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">',$message.'</span>';
                            $message = Session::put('message',null);
                        }
                        ?>

                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-apartment-building/'.$edit_value->building_id)}}" method="post">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Loại phòng chung cư</label>
                                    <input type="text" value="{{ $edit_value->building_name }}" name="building_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Loại phòng chung cư">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Loại phòng chung cư</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="building_desc" id="exampleInputPassword1">{{ $edit_value->building_desc }}</textarea>
                                </div>
                                <button type="submit" name="add_apartment_building" class="btn btn-info">Cập nhật</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection

