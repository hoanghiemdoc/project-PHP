@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt Kê chung Cư
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive">

                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">',$message.'</span>';
                    $message = Session::put('message',null);
                }
                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên phòng</th>
                        <th>Địa chỉ</th>
                        <th>Giá</th>
                        <th>Thông tin về phòng</th>
                        <th>Thông Tin chi tiết</th>
                        <th>Hình ảnh</th>
                        <th>loại chung cư</th>
                        <th>loại phòng chung cư</th>
                        <th>Hiển thị</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($all_apartment as $key => $apart)

                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>

                            <td>{{ $apart -> apartment_name}}</td>
                            <td>{{ $apart -> apartment_address }}</td>
                            <td>{{ $apart -> apartment_price }}</td>
                            <td>{{ $apart -> apartment_content }}</td>
                            <td>{{ $apart -> apartment_desc }}</td>
                            <td><img src="public/upload/apartment/{{ $apart -> apartment_image }}" height="100" width="100"></td>
                            <td>{{ $apart -> category_name }}</td>

                            <td>{{ $apart -> building_name }}</td>

                            <td><span class="text-ellipsis">
                            <?php
                                    if( $apart ->apartment_status==0){
                                    ?>
                                <a href="{{URL::to('/unactive-apartment/'.$apart->apartment_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
                                    }else{
                                    ?>
                                <a href="{{URL::to('/active-apartment/'.$apart->apartment_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                            <?php
                                    }
                                    ?>
                            </span></td>
                            <td>
                                <a href="{{URL::to('/edit-apartment/'.$apart->apartment_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a onclick="return confirm('Bạn có chắc muốn xóa không?')" href="{{URL::to('/delete-apartment/'.$apart->apartment_id)}}" class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection

