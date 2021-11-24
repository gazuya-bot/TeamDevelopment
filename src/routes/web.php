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
    return view('welcome');
});

Auth::routes();



Route::get('/members/memberlist','MemberController@members')->name('memberlist');
Route::get('/members/sign_up','MemberController@sign_up')->name('sign_up');
Route::post('/members/store','MemberController@store')->name('store');
Route::get('/members/detail/{id}','MemberController@detail')->name('detail');
Route::get('/members/edit/{id}','MemberController@edit')->name('edit');
Route::post('/members/update/{id}','MemberController@update')->name('update');
Route::get('/members/delete/{id}','MemberController@delete')->name('delete');
Route::any('/members/destroy/{id}','MemberController@destroy')->name('destroy');


// ホーム画面
Route::get('/home', 'PointSaleController@index')->name('home');

// 売上分析画面
Route::get('/sales_management', 'PointSaleController@show_analysis')->name('show_analysis');

// 顧客別の売上分析画面
Route::get('/sales_management/{id}', 'PointSaleController@show_analysis_id')->name('show_analysis_id');

// 売上編集画面
Route::get('/price_edit/{id}', 'PointSaleController@show_edit_price')->name('show_edit_price');

// 売上の変更を登録
Route::post('/price_update{id}', 'PointSaleController@exe_update_price')->name('update_price');

// 売上削除画面
Route::get('/price_delete/{id}', 'PointSaleController@show_delete_price')->name('show_delete_price');

// 売上を削除
Route::post('/price_exe_delete{id}', 'PointSaleController@exe_delete_price')->name('delete_price');


