<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SocialController;

use Illuminate\Support\Facades\Password;


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

//-----------------------------------ADMIN----------------------------------------------------

Route::get('admin/login',[UserController::class,'getdangnhapAdmin']);
Route::post('admin/login',[UserController::class,'postdangnhapAdmin']);

Route::get('admin/logout',[UserController::class,'getdangxuatAdmin']);

Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function (){

    Route::group(['prefix' => 'theloai'], function () {
        Route::get('/danhsach',[TheLoaiController::class,'getDanhSach']);
        
        Route::get('/sua/{id}',[TheLoaiController::class,'getSua']);
        Route::post('/sua/{id}',[TheLoaiController::class,'postSua']);

        Route::get('/them',[TheLoaiController::class,'getThem']);
        Route::post('/them',[TheLoaiController::class,'postThem']);

        Route::get('/xoa/{id}',[TheLoaiController::class,'getXoa']);
    });


    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('/danhsach',[LoaiTinController::class,'getDanhSach']);
        
        Route::get('/sua/{id}',[LoaiTinController::class,'getSua']);
        Route::post('/sua/{id}',[LoaiTinController::class,'postSua']);

        Route::get('/them',[LoaiTinController::class,'getThem']);
        Route::post('/them',[LoaiTinController::class,'postThem']);

        Route::get('/xoa/{id}',[LoaiTinController::class,'getXoa']);
    });


    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('/danhsach',[TinTucController::class,'getDanhSach']);
        
        Route::get('/sua/{id}',[TinTucController::class,'getSua']);
        Route::post('/sua/{id}',[TinTucController::class,'postSua']);

        Route::get('/them',[TinTucController::class,'getThem']);
        Route::post('/them',[TinTucController::class,'postThem']);

        Route::get('/xoa/{id}',[TinTucController::class,'getXoa']);
    });


    Route::group(['prefix' => 'comment'], function () {
        Route::get('/xoa/{id}/{idTinTuc}',[CommentController::class,'getXoa']);
    });


    Route::group(['prefix' => 'slide'], function () {
        Route::get('/danhsach',[SlideController::class,'getDanhSach']);
        
        Route::get('/sua/{id}',[SlideController::class,'getSua']);
        Route::post('/sua/{id}',[SlideController::class,'postSua']);

        Route::get('/them',[SlideController::class,'getThem']);
        Route::post('/them',[SlideController::class,'postThem']);

        Route::get('/xoa/{id}',[SlideController::class,'getXoa']);
    });


    Route::group(['prefix' => 'user'], function () {
        Route::get('/danhsach',[UserController::class,'getDanhSach']);
        
        Route::get('/sua/{id}',[UserController::class,'getSua']);
        Route::post('/sua/{id}',[UserController::class,'postSua']);

        Route::get('/them',[UserController::class,'getThem']);
        Route::post('/them',[UserController::class,'postThem']);

        Route::get('/xoa/{id}',[UserController::class,'getXoa']);
    });

    
    //ajax ch???n lo???i tin
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai}', [AjaxController::class,'getLoaiTin']);
    });
});


//-----------------------------------------FRONT_END------------------------------------------




Route::get('trangchu',[PagesController::class,'trangchu']);

Route::get('lienhe',[PagesController::class,'lienhe']);

Route::get('loaitin/{id}/{TenKhongDau}.html',[PagesController::class,'loaitin']);

Route::get('tintuc/{id}/{TieuDeKhongDau}.html',[PagesController::class,'tintuc']);

Route::get('dangnhap',[PagesController::class,'getDangnhap']);
Route::post('dangnhap',[PagesController::class,'postDangnhap']);

Route::get('redirect/{provider}', [SocialController::class,'redirect']);
Route::get('callback/{provider}', [SocialController::class,'callback']);

Route::get('quen', [PagesController::class,'getQuen']);
Route::post('quen', [PagesController::class,'postQuen']);

Route::get('thaydoi', [PagesController::class,'getThayDoi'])->name('resetpassword');
Route::post('thaydoi', [PagesController::class,'postThayDoi']);

Route::get('dangxuat',[PagesController::class,'getDangxuat']);

Route::post('comment/{id}',[CommentController::class,'postComment']);

Route::get('nguoidung',[PagesController::class,'getNguoidung']);
Route::post('nguoidung',[PagesController::class,'postNguoidung']);

Route::get('dangky',[PagesController::class,'getDangky']);
Route::post('dangky',[PagesController::class,'postDangky']);

Route::any('timkiem',[PagesController::class,'timkiem']);


