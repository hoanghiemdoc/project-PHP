<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/','App\Http\Controllers\HomeController@index');

Route::get('/trang-chu','App\Http\Controllers\HomeController@index');

//danh muc phong trang chu
Route::get('/show-category/{category_id}','App\Http\Controllers\CategoryApartment@show_category_home');


//backend
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@Show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

//Category Apartment
Route::get('/add-category-apartment','App\Http\Controllers\CategoryApartment@add_category_apartment');
Route::get('/edit-category-apartment/{category_apartment_id}','App\Http\Controllers\CategoryApartment@edit_category_apartment');
Route::get('/delete-category-apartment/{category_apartment_id}','App\Http\Controllers\CategoryApartment@delete_category_apartment');
Route::get('/all-category-apartment','App\Http\Controllers\CategoryApartment@all_category_apartment');

Route::get('/unactive-category-apartment/{category_apartment_id}','App\Http\Controllers\CategoryApartment@unactive_category_apartment');
Route::get('active-category-apartment/{category_apartment_id}','App\Http\Controllers\CategoryApartment@active_category_apartment');

Route::post('/save-category-apartment','App\Http\Controllers\CategoryApartment@save_category_apartment');
Route::post('/update-category-apartment/{category_apartment_id}','App\Http\Controllers\CategoryApartment@update_category_apartment');

//Apartment Building
Route::get('/add-apartment-building','App\Http\Controllers\ApartmentBuilding@add_apartment_building');
Route::get('/edit-apartment-building/{apartment_building_id}','App\Http\Controllers\ApartmentBuilding@edit_apartment_building');
Route::get('/delete-apartment-building/{apartment_building_id}','App\Http\Controllers\ApartmentBuilding@delete_apartment_building');
Route::get('/all-apartment-building','App\Http\Controllers\ApartmentBuilding@all_apartment_building');

Route::get('/unactive-apartment-building/{apartment_building_id}','App\Http\Controllers\ApartmentBuilding@unactive_apartment_building');
Route::get('active-apartment-building/{apartment_building_id}','App\Http\Controllers\ApartmentBuilding@active_apartment_building');

Route::post('/save-apartment-building','App\Http\Controllers\ApartmentBuilding@save_apartment_building');
Route::post('/update-apartment-building/{apartment_building_id}','App\Http\Controllers\ApartmentBuilding@update_apartment_building');

//Apartment
Route::get('/add-apartment','App\Http\Controllers\ApartmentController@add_apartment');
Route::get('/edit-apartment/{apartment_id}','App\Http\Controllers\ApartmentController@edit_apartment');
Route::get('/delete-apartment/{apartment_id}','App\Http\Controllers\ApartmentController@delete_apartment');
Route::get('/all-apartment','App\Http\Controllers\ApartmentController@all_apartment');

Route::get('/unactive-apartment/{apartment_id}','App\Http\Controllers\ApartmentController@unactive_apartment');
Route::get('active-apartment/{apartment_id}','App\Http\Controllers\ApartmentController@active_apartment');

Route::post('/save-apartment','App\Http\Controllers\ApartmentController@save_apartment');
Route::post('/update-apartment/{apartment_id}','App\Http\Controllers\ApartmentController@update_apartment');


