<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryApartment extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_apartment(){
        $this->Authlogin();
        return view('admin.add_category_apartment');
    }


    public function all_category_apartment(){
        $this->Authlogin();
        $all_category_apartment = DB::table('tbl_category_apartment')->get();
        $manager_category_apartment = view('admin.all_category_apartment')->with('all_category_apartment',$all_category_apartment);
        return view('admin_layout')->with('admin.all_category_apartment',$manager_category_apartment);
    }


    public function save_category_apartment(Request $request){
        $this->Authlogin();
        $data = array();
        $data['category_name'] = $request->category_apartment_name;
        $data['category_desc'] = $request->category_apartment_desc;
        $data['category_status'] = $request->category_apartment_status;

        DB::table('tbl_category_apartment')->insert($data);
        Session::put('message','Thêm loại trung cư thành công');
        return Redirect::to('add-category-apartment');
    }
    public  function unactive_category_apartment($category_apartment_id){
        $this->Authlogin();
        DB::table('tbl_category_apartment')->where('category_id',$category_apartment_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục loại nhà thành công');
        return Redirect::to('all-category-apartment');
    }
    public  function active_category_apartment($category_apartment_id){
        $this->Authlogin();
        DB::table('tbl_category_apartment')->where('category_id',$category_apartment_id)->update(['category_status'=>0]);
        Session::put('message','kích hoạt danh mục loại nhà thành công');
        return Redirect::to('all-category-apartment');
    }
    public function edit_category_apartment($category_apartment_id){
        $this->Authlogin();
        $edit_category_apartment = DB::table('tbl_category_apartment')->where('category_id',$category_apartment_id)->get();
        $manager_category_apartment = view('admin.edit_category_apartment')->with('edit_category_apartment',$edit_category_apartment);
        return view('admin_layout')->with('admin.edit_category_apartment',$manager_category_apartment);
    }
    public function update_category_apartment(Request $request,$category_apartment_id){
        $this->Authlogin();
        $data = array();
        $data['category_name'] = $request->category_apartment_name;
        $data['category_desc'] = $request->category_apartment_desc;
        DB::table('tbl_category_apartment')->where('category_id',$category_apartment_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('all-category-apartment');
    }
    public  function delete_category_apartment($category_apartment_id){
        $this->Authlogin();
        DB::table('tbl_category_apartment')->where('category_id',$category_apartment_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-category-apartment');
    }

    //end

    public function show_category_home($category_apartment_id){
//        $cate_apartment = DB::table('tbl_category_apartment')->where('category_status','0')->orderBy('category_id','desc')->get();
//        $build_apartment = DB::table('tbl_apartment_building')->where('building_status','0')->orderBy('building_id','desc')->get();

        return view('pages.category.show_category');
    }
}
