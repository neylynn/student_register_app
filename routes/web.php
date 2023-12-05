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

// use Illuminate\Routing\Route;
// use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // return view('welcome');
    return view('frontend/register');
});
Route::get('/success', 'Frontend\HomeController@success')->name('success');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'],function(){
	Route::get('/', function () {
		return redirect('admin/login');
	});
	Auth::routes();
	Route::group(['namespace' => 'Backend'],function(){
		Route::resource('doctor', 'DoctorController');
		Route::resource('appointment', 'AppointmentController');
		Route::resource('qualify', 'QualifyController');
		Route::resource('patient', 'PatientController');
	});
});
