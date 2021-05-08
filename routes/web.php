<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\STUCON;
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
Route::group(['middleware'=>'auth'],function(){
Route::get('/', [STUCON::class, 'main']);
Route::get('/class', [STUCON::class, 'class']);
Route::get('/classdetail/{id}', [STUCON::class, 'classdetail']);
Route::get('/tclass', [STUCON::class, 'tclass']);
Route::get('/view/{id}', [STUCON::class, 'view']);
Route::get('/tclassdetail', [STUCON::class, 'tclassdetail']);

Route::get('/signin', [STUCON::class, 'signin']);
Route::match(['get','post' ],'/addstu', [STUCON::class, 'addstu']);
//Route::match(['get','post' ],'/upload/{id}', [STUCON::class, 'file3']);
Route::match(['get','post' ],'/upload1/{id}', [STUCON::class, 'file2']);
Route::match(['get','post' ],'/upload/{id}', [STUCON::class, 'showupload']);
Route::match(['get','post' ],'/supload/{id}', [STUCON::class, 'supload']);
Route::match(['get','post' ],'/stu/{id}', [STUCON::class, 'stuassign']);
Route::match(['get','post' ],'/block/{id}/{id2}', [STUCON::class, 'block']);
Route::match(['get','post' ],'/stufile/{id}', [STUCON::class, 'stufile']);
Route::match(['get','post' ],'/addclass', [STUCON::class, 'addclass']);
Route::match(['get','post' ],'/download/{id}', [STUCON::class, 'downloadFile']);
Route::match(['get','post' ],'/download1/{id}', [STUCON::class, 'downloadFile1']);

Route::match(['get','post' ],'/delete/{id}', [STUCON::class, 'deleteFile']);
Route::match(['get','post' ],'/leave/{id}', [STUCON::class, 'leave']);
Route::match(['get','post' ],'/delete1/{id}', [STUCON::class, 'deleteclass']);
Route::match(['get','post' ],'/showstu', [STUCON::class, 'showstu']);
Route::match(['get','post' ],'/showstu1/{id}', [STUCON::class, 'showstu1']);
Route::match(['get','post' ],'/showclass', [STUCON::class, 'showclass']);
Route::match(['get','post' ],'/search', [STUCON::class, 'search']);
Route::match(['get','post' ],'/tshowclass', [STUCON::class, 'tshowclass']);
Route::match(['get','post' ],'/showclass/athDB/{id}', [STUCON::class, 'athDB']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
