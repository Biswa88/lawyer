<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\FrontendController;


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


Route::get('/','FrontendController@index');
Route::get('/new-appointment/{lawyerId}/{date}','FrontendController@show')->name('create.appointment');

Route::group(['middleware'=>['auth','client']],function(){
Route::post('/book/appointment','FrontendController@store')->name('booking.appointment');
Route::get('/my-booking','FrontendController@myBookings')->name('my.booking');
Route::get('/user-profile','ProfileController@index');
Route::post('/bprofile','ProfileController@store')->name('profile.store');
Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');
Route::get('/search',[SearchController::class,'search'])->name('web.search');
});




Route::get('/dashboard','DashboardController@index');
 





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change-password',[App\Http\Controllers\Auth\ChangePasswordController::class,'index'])->name('password.change');
Route::post('/change-password',[App\Http\Controllers\Auth\ChangePasswordController::class,'changePassword'])->name('password.update');

Route::group(['middleware'=>['auth','admin']],function(){
Route::resource('lawyer','LawyerController');
Route::get('/clients','ClientlistController@index')->name('client');
Route::get('/clients/all','ClientlistController@allTimeAppointment')->name('all.appointments');
Route::get('/status/update/{id}','ClientlistController@newStatus')->name('update.status');
Route::resource('case_deal','Case_dealController');
});
Route::group(['middleware'=>['auth','lawyer']],function(){

Route::resource('appointment','AppointmentController');
Route::post('/appointment/check','AppointmentController@check')->name('appointment.check');
Route::post('/appointment/update','AppointmentController@updateTime')->name('update');
});

