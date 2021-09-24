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

// ルートのURLは新規設定する
Route::get('/test', [App\Http\Controllers\TaskController::class, 'index'])->name('test');

Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task');

// tasks という URL で delete というhttp メソッドの時、TaskController の destroy メソッド を呼び出す。
Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('/task/{task}');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
