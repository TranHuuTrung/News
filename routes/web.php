<?php

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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/dangxuat', 'UserController@getDangXuatAdmin');

Route::group(['prefix' => 'admin', 'middleware'=>'adminLogin'], function () {
    // Route::get('trangchu', 'UserController@getInfoAdmin');
    Route::get('trangchu',[
        'uses'=>'UserController@getInfoAdmin',
        'as'=>'admin.index'
    ]);
    //admin/theloai/danhsach
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');

        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');

        Route::get('xoa/{id}', 'TheLoaiController@getXoa');
    });

    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('danhsach', 'LoaiTinController@getDanhSach');

        Route::get('them', 'LoaiTinController@getThem');
        Route::post('them', 'LoaiTinController@postThem');

        Route::get('sua/{id}', 'LoaiTinController@getSua');
        Route::post('sua/{id}', 'LoaiTinController@postSua');

        Route::get('xoa/{id}', 'LoaiTinController@getXoa');
    });

    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('danhsach', 'TinTucController@getDanhSach');

        Route::get('them', 'TinTucController@getThem');
        Route::post('them', 'TinTucController@postThem');

        Route::get('sua/{id}', 'TinTucController@getSua');
        Route::post('sua/{id}', 'TinTucController@postSua');

        Route::get('xoa/{id}', 'TinTucController@getXoa');
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('xoa/{idTinTuc}/{id}', 'CommentController@getXoa');
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('danhsach', 'SlideController@getDanhSach');

        Route::get('them', 'SlideController@getThem');
        Route::post('them', 'SlideController@postThem');

        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('sua/{id}', 'SlideController@postSua');

        Route::get('xoa/{id}', 'SlideController@getXoa');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('xoa/{id}', 'UserController@getXoa');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheloai}', 'AjaxController@getLoaiTin');
    });
});


Route::get('trangchu', 'PagesController@trangchu');
Route::get('lienhe', 'PagesController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@tintuc');

Route::get('dangnhap', 'PagesController@getDangNhap');
Route::post('dangnhap', 'PagesController@postDangNhap');
Route::post('comment/{id}', 'CommentController@postComment');
Route::get('nguoidung', 'PagesController@getNguoiDung');
Route::post('nguoidung', 'PagesController@postNguoiDung');
Route::get('dangki', 'PagesController@getDangKi');
Route::post('dangki', 'PagesController@postDangKi');
Route::get('timkiem', 'PagesController@getTimkiem');

Route::get('dangxuat', 'PagesController@getDangXuat');
