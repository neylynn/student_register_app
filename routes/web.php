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

Route::get('/', function () {
    return view('frontend/welcome');
});
Route::get('/register-form', function () {
    return view('frontend/register-form');
});
Route::get('/success', function () {
    return view('frontend/success');
});
Route::post('/register-form', 'Frontend\HomeController@register')->name('frontend.register-form');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'],function(){
	Route::get('/', function () {
		return redirect('admin/login');
	});
	Auth::routes();
	Route::group(['namespace' => 'Backend'],function(){
		Route::resource('student', 'StudentController');
		Route::post('/student/download', 'StudentController@download');
	});
});
