<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_apartment = DB::table('tbl_category_apartment')->where('category_status','0')->orderBy('category_id','desc')->get();
        $build_apartment = DB::table('tbl_apartment_building')->where('building_status','0')->orderBy('building_id','desc')->get();

//        $all_apartment = DB::table('tbl_apartment')
//            ->join('tbl_category_apartment','tbl_category_apartment.category_id','=','tbl_apartment.category_id')
//            ->orderBy('tbl_apartment.apartment_id','desc')->get();
//
        $all_apartment = DB::table('tbl_apartment')->where('apartment_status','0')->orderBy('apartment_id','desc')->limit(6)->get();

        return view('pages.home')->with('category',$cate_apartment)->with('building',$build_apartment)->with('all_apartment',$all_apartment);
    }
}
