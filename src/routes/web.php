<?php
use App\Http\Controllers\MemberController;
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
    return view('auth.login');
});

Auth::routes();


// 奥村
Route::get('/members/memberlist','MemberController@members')->name('memberlist')->middleware('auth');
Route::get('/members/sign_up','MemberController@sign_up')->name('sign_up')->middleware('auth');
Route::post('/members/store','MemberController@store')->name('store')->middleware('auth');
Route::get('/members/detail/{id}','MemberController@detail')->name('detail')->middleware('auth');
Route::get('/members/edit/{id}','MemberController@edit')->name('edit')->middleware('auth');
Route::post('/members/update/{id}','MemberController@update')->name('update')->middleware('auth');
Route::get('/members/delete/{id}','MemberController@delete')->name('delete')->middleware('auth');
Route::any('/members/destroy/{id}','MemberController@destroy')->name('destroy')->middleware('auth');


// ホーム画面 OK
Route::get('/home', 'PointSaleController@index')->name('home')->middleware('auth');

// 売上分析画面 OK
Route::get('/sales_management', 'PointSaleController@show_analysis')->name('show_analysis')->middleware('auth');

// 顧客別の売上分析画面
Route::get('/sales_management/{id}', 'PointSaleController@show_analysis_id')->name('show_analysis_id')->middleware('auth');

// 売上編集画面
Route::get('/price_edit/{id}', 'PointSaleController@show_edit_price')->name('show_edit_price')->middleware('auth');

// 売上の変更を登録
Route::post('/price_update{id}', 'PointSaleController@exe_update_price')->name('update_price')->middleware('auth');

// 売上削除画面
Route::get('/price_delete/{id}', 'PointSaleController@show_delete_price')->name('show_delete_price')->middleware('auth');

// 売上を削除
Route::post('/price_exe_delete{id}', 'PointSaleController@exe_delete_price')->name('delete_price')->middleware('auth');

// 松本
// ポイント登録 OK
Route::post('/point_add', 'MotController@add')->middleware('auth');

// ポイント登録画面遷移 OK
Route::get('/inpoint', 'MotController@inpoint')->name('inpoint')->middleware('auth');

// ログアウト OK
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');