<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ApartmentController extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_apartment(){
        $this->Authlogin();
        $cate_apartment = DB::table('tbl_category_apartment')->orderBy('category_id','desc')->get();
        $build_apartment = DB::table('tbl_apartment_building')->orderBy('building_id','desc')->get();

        return view('admin.add_apartment')->with('cate_apartment',$cate_apartment)->with('build_apartment',$build_apartment);

    }

    public function all_apartment(){
        $this->Authlogin();
        $all_apartment = DB::table('tbl_apartment')
            ->join('tbl_category_apartment','tbl_category_apartment.category_id','=','tbl_apartment.category_id')
            ->join('tbl_apartment_building','tbl_apartment_building.building_id','=','tbl_apartment.building_id')
            ->orderBy('tbl_apartment.apartment_id','desc')->get();

        $manager_apartment = view('admin.all_apartment')->with('all_apartment',$all_apartment);
        return view('admin_layout')->with('admin.all_apartment',$manager_apartment);
    }


    public function save_apartment(Request $request){
        $this->Authlogin();
        $data = array();
        $data['apartment_name'] = $request->apartment_name;
        $data['apartment_address'] = $request->apartment_address;
        $data['apartment_price'] = $request->apartment_price;
        $data['apartment_content'] = $request->apartment_content;
        $data['apartment_desc'] = $request->apartment_desc;
        $data['category_id'] = $request->apartment_cate;
        $data['building_id'] = $request->apartment_build;
        $data['apartment_status'] = $request->apartment_status;
        $data['apartment_image'] = $request->apartment_image;
        $get_image = $request->file('apartment_image');

        if ($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/apartment',$new_image);
            $data['apartment_image'] = $new_image;
            DB::table('tbl_apartment')->insert($data);
            Session::put('message','Thêm trung cư thành công');
            return Redirect::to('add-apartment');
        }
        $data['apartment_image'] = '';
        DB::table('tbl_apartment')->insert($data);
        Session::put('message','Thêm trung cư thành công');
        return Redirect::to('add-apartment');
    }
    public  function unactive_apartment($apartment_id){
        $this->Authlogin();
        DB::table('tbl_apartment')->where('apartment_id',$apartment_id)->update(['apartment_status'=>1]);
        Session::put('message','Không kích hoạt chung cu thành công');
        return Redirect::to('all-apartment');
    }
    public  function active_apartment($apartment_id){
        $this->Authlogin();
        DB::table('tbl_apartment')->where('apartment_id',$apartment_id)->update(['apartment_status'=>0]);
        Session::put('message','kích hoạt chung cư thành công');
        return Redirect::to('all-apartment');
    }
    public function edit_apartment($apartment_id){
        $this->Authlogin();
        $cate_apartment = DB::table('tbl_category_apartment')->orderBy('category_id','desc')->get();
        $build_apartment = DB::table('tbl_apartment_building')->orderBy('building_id','desc')->get();

        $edit_apartment = DB::table('tbl_apartment')->where('apartment_id',$apartment_id)->get();
        $manager_apartment = view('admin.edit_apartment')->with('edit_apartment',$edit_apartment)->with('cate_apartment',$cate_apartment)->with('build_apartment',$build_apartment);
        return view('admin_layout')->with('admin.edit_apartment',$manager_apartment);
    }
    public function update_apartment(Request $request,$apartment_id){
        $this->Authlogin();
        $data = array();
        $data['apartment_name'] = $request->apartment_name;
        $data['apartment_address'] = $request->apartment_address;
        $data['apartment_price'] = $request->apartment_price;
        $data['apartment_content'] = $request->apartment_content;
        $data['apartment_desc'] = $request->apartment_desc;
        $data['category_id'] = $request->apartment_cate;
        $data['building_id'] = $request->apartment_build;
        $data['apartment_status'] = $request->apartment_status;
        $get_image = $request->file('apartment_image');

            if ($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/upload/apartment',$new_image);
                $data['apartment_image'] = $new_image;
                DB::table('tbl_apartment')->where('apartment_id',$apartment_id)->update($data);
                Session::put('message','cập nhật chung cư thành công');
                return Redirect::to('add-apartment');
            }

        DB::table('tbl_apartment')->where('apartment_id',$apartment_id)->update($data);
        Session::put('message','Cập nhật chung cư thành công');
        return Redirect::to('add-apartment');
    }
    public function delete_apartment($apartment_id){
        $this->Authlogin();
        DB::table('tbl_apartment')->where('apartment_id',$apartment_id)->delete();
        Session::put('message','Xóa chung cu thành công');
        return Redirect::to('all-apartment');
    }
}
