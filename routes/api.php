<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    $cek_koneksi=DB::connection()->getPdo();
    if($cek_koneksi){
        echo "Koneksi Tersambung";
    }else{
        echo "Koneksi Gagal";
    }
});
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');



Route::post("/insert_toko","tokocontroller@store")->middleware('jwt.verify');
Route::post("/insert_pembeli","pembelicontroller@store")->middleware('jwt.verify');
Route::put("/update_pembeli/{id}","pembelicontroller@update")->middleware('jwt.verify');
Route::delete("delete_pembeli/{id}","pembelicontroller@hapus")->middleware('jwt.verify');
Route::get('/get_pembeli','pembelicontroller@getpembeli')->middleware('jwt.verify');
Route::get('/get_pembelitransaksi','pembelicontroller@getpembelitransaksi')->middleware('jwt.verify');
Route::get('/get_pembelitransaksi_leftjoin','pembelicontroller@getpembelitransaksi_leftjoin')->middleware('jwt.verify');
Route::get('/get_pembelitransaksi_rightjoin','pembelicontroller@getpembelitransaksi_rightjoin')->middleware('jwt.verify');