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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/members/memberlist','MemberController@members')->name('memberlist');
Route::get('/members/sign_up','MemberController@sign_up')->name('sign_up');
Route::post('/members/store','MemberController@store')->name('store');
Route::get('/members/detail/{id}','MemberController@detail')->name('detail');
Route::get('/members/edit/{id}','MemberController@edit')->name('edit');
Route::post('/members/update/{id}','MemberController@update')->name('update');
Route::get('/members/delete/{id}','MemberController@delete')->name('delete');
Route::any('/members/destroy/{id}','MemberController@destroy')->name('destroy');

