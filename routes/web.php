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

Route::get('/', function () {
    return view('welcome');
});


//buoi08
Route::get('/trangchu',"App\Http\Controllers\MyController@getindex")-> name("index");


Route::get('/search',"App\Http\Controllers\MyController@searchtry")-> name("trysearch");

Route::get('/slider',"App\Http\Controllers\MyController@slider")-> name("slider");

Route::get('/sanpham/{id}',"App\Http\Controllers\MyController@san_pham")->name("chitiet");
Route::post('sanpham',"App\Http\Controllers\MyController@postsanpham")->name("additems");

Route::get('/loaisp/{type}',"App\Http\Controllers\MyController@loai_san_pham")->name("loaisp");

Route::get('/gioithieu',"App\Http\Controllers\MyController@gioi_thieu")->name("gioithieu");

Route::get('/lienhe',"App\Http\Controllers\MyController@lien_he")->name("lienhe");

Route::get("add-to-cart/{id}", "App\Http\Controllers\MyController@getAddtoCart")->name("themgiohang");
Route::get("delete-carts/{id}", "App\Http\Controllers\MyController@deletecarts")->name("xoagiohang");
Route::get("delete-all-carts/{id}", "App\Http\Controllers\MyController@deleteallcarts")->name("xoa");
Route::get("delete-Session", "App\Http\Controllers\MyController@delall")->name("delall");


Route::get("dathang", "App\Http\Controllers\MyController@dathang")->name("checkout");
Route::post("dathang", "App\Http\Controllers\MyController@getdathang")->name("postdathang");

Route::get("dangki", "App\Http\Controllers\MyController@getdangki")->name("signup");
Route::post("dangki", "App\Http\Controllers\MyController@postdangki")->name("signup");

Route::get("dang-nhap", "App\Http\Controllers\MyController@getdangnhap")->name("login");
Route::post("dang-nhap", "App\Http\Controllers\MyController@postdangnhap")->name("login");

Route::get("dang-xuat", "App\Http\Controllers\MyController@getdangxuat")->name("logout");
Route::get("tim-kiem", "App\Http\Controllers\MyController@getsearch")->name("search");

Route::get("admin", "App\Http\Controllers\MyController@admin")->name("admin");

Route::get("them-nguoi-dung", "App\Http\Controllers\MyController@adduser")->name("adduser");
Route::post("them-nguoi-dung", "App\Http\Controllers\MyController@postadduser")->name("adduser");

Route::get("listuser", "App\Http\Controllers\MyController@listuser")->name("listuser");

Route::get("edit_user/{id}", "App\Http\Controllers\MyController@getedituser")->name("edituser");
Route::post("edit_user/{id}", "App\Http\Controllers\MyController@postedituser")->name("edituser");
Route::get("deluser/{id}", "App\Http\Controllers\MyController@deluser")->name("deluser");


Route::get("listsanpham", "App\Http\Controllers\MyController@listsanpham")->name("listsanpham");

Route::get("addsanpham", "App\Http\Controllers\MyController@addsp")->name("addsp");
Route::post("addsanpham", "App\Http\Controllers\MyController@postaddsp")->name("addsp");

Route::get("delsanpham/{id}", "App\Http\Controllers\MyController@delsp")->name("delsp");

Route::get("editsanpham/{id}", "App\Http\Controllers\MyController@editsp")->name("editsp");
Route::post("editsanpham/{id}", "App\Http\Controllers\MyController@posteditsp")->name("editsp");

Route::get("listloaisp", "App\Http\Controllers\MyController@listloaisp")->name("listloaisp");
Route::get("del_listloaisp/{id}", "App\Http\Controllers\MyController@dellistloaisp")->name("dellistloaisp");

Route::get("addid_type", "App\Http\Controllers\MyController@addidtype")->name("addidtype");
Route::post("addid_type", "App\Http\Controllers\MyController@postaddidtype")->name("addidtype");

Route::get("editidtype/{id}", "App\Http\Controllers\MyController@editidtype")->name("editidtype");
Route::post("editidtype/{id}", "App\Http\Controllers\MyController@posteditidtype")->name("editidtype");

Route::get("listdh", "App\Http\Controllers\MyController@listdh")->name("listdh");
Route::get("eddh/{id}", "App\Http\Controllers\MyController@eddh")->name("eddh");
Route::get("deldh/{id}", "App\Http\Controllers\MyController@deldh")->name("deldh");
