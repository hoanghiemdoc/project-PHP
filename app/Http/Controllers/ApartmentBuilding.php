<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ApartmentBuilding extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_apartment_building(){
        $this->Authlogin();
        return view('admin.add_apartment_building');
    }

    public function all_apartment_building(){
        $this->Authlogin();
        $all_apartment_building = DB::table('tbl_apartment_building')->get();
        $manager_apartment_building = view('admin.all_apartment_building')->with('all_apartment_building',$all_apartment_building);
        return view('admin_layout')->with('admin.all_apartment_building',$manager_apartment_building);
    }


    public function save_apartment_building(Request $request){
        $this->Authlogin();
        $data = array();
        $data['building_name'] = $request->building_name;
        $data['building_desc'] = $request->building_desc;
        $data['building_status'] = $request->building_status;

        DB::table('tbl_apartment_building')->insert($data);
        Session::put('message','Thêm loại trung cư thành công');
        return Redirect::to('add-apartment-building');
    }
    public  function unactive_apartment_building($apartment_building_id){
        $this->Authlogin();
        DB::table('tbl_apartment_building')->where('building_id',$apartment_building_id)->update(['building_status'=>1]);
        Session::put('message','Không kích hoạt danh mục loại nhà thành công');
        return Redirect::to('all-apartment-building');
    }
    public  function active_apartment_building($apartment_building_id){
        $this->Authlogin();
        DB::table('tbl_apartment_building')->where('building_id',$apartment_building_id)->update(['building_status'=>0]);
        Session::put('message','kích hoạt danh mục loại nhà thành công');
        return Redirect::to('all-apartment-building');
    }
    public function edit_apartment_building($apartment_building_id){
        $this->Authlogin();
        $edit_apartment_building = DB::table('tbl_apartment_building')->where('building_id',$apartment_building_id)->get();
        $manager_apartment_building = view('admin.edit_apartment_building')->with('edit_apartment_building',$edit_apartment_building);
        return view('admin_layout')->with('admin.edit_apartment_building',$manager_apartment_building);
    }
    public function update_apartment_building(Request $request,$apartment_building_id){
        $this->Authlogin();
        $data = array();
        $data['building_name'] = $request->building_name;
        $data['building_desc'] = $request->building_desc;
        DB::table('tbl_apartment_building')->where('building_id',$apartment_building_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('all-apartment-building');
    }
    public  function delete_apartment_building($apartment_building_id){
        $this->Authlogin();
        DB::table('tbl_apartment_building')->where('building_id',$apartment_building_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-apartment-building');
    }
}
