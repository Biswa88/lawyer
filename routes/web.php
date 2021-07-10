<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;

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




Route::get('/','publicview\HomeController@index')->name('public.home');
Route::get('/search-lawyer','publicview\LawyersController@search')->name('public.search.lawyer');
Route::get('/about-our-organization','publicview\HomeController@aboutUs')->name('about_us');
Route::get('/contact-us','publicview\HomeController@contactUs')->name('contact_us');




 Auth::routes();
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/dashboard','DashboardController@index');


Route::get('/new-appointment','FrontendController@show')->name('create.appointment');

Route::get('/create-user','Auth\RegisterController@createUser')->name('create_user');

//Login
Route::post('/post-login','Auth\LoginController@postlogin')->name('post.login');
Route::get('/login-user','Auth\LoginController@login')->name('user.login');


Route::group(['prefix'=>'public-lawyer'],function(){  //Lawyer Registration
      Route::get('/create','publicview\LawyersController@create')->name('public_view.create');
      Route::post('/save','publicview\LawyersController@save')->name('public_view.save');
});
Route::group(['prefix'=>'public-client'],function(){ //Client Registration
      Route::get('/create','publicview\ClientsController@create')->name('public_view.create1');
      Route::post('/save','publicview\ClientsController@save')->name('public_view.save1');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
Route::get('/change-password',[App\Http\Controllers\Auth\ChangePasswordController::class,'index'])->name('password.change');
Route::post('/change-password',[App\Http\Controllers\Auth\ChangePasswordController::class,'changePassword'])->name('password.update');

Route::group(['middleware'=>['auth','client']],function(){
    Route::post('/book/appointment','FrontendController@store')->name('booking.appointment');
    Route::get('/my-booking','FrontendController@myBookings')->name('my.booking');

    Route::get('/user-profile','ProfileController@index');
    Route::post('/user-profile','ProfileController@store')->name('user_profile');
  Route::post('/bprofile','ProfileController@store')->name('profile.store');
    Route::post('/profile-pic','ProfileController@profilePic')->name('profile.pic');
    Route::group(['prefix' => 'payment'], function () {
        Route::get('/make-payment', 'PaymentsController@makePayment')->name('make_payment');
        Route::get('/success', 'PaymentsController@success')->name('payment_success');
    });


    
    Route::get('/submit-lawyer-rating', 'LawyerController@submitRating')->name('submit_lawyer_rating');

    });

Route::group(['middleware'=>['auth','admin']],function(){
       Route::resource('lawyer','LawyerController');
     
       
       Route::resource('case_type','Case_typeController');
       Route::group(['prefix'=>'state'],function(){
             Route::get('/','StatesController@index')->name('state.index');
             Route::get('/create','StatesController@create')->name('state.create');
             Route::post('/store','StatesController@store')->name('state.store');
            });
        Route::group(['prefix'=>'district'],function(){
             Route::get('/','DistrictsController@index')->name('district.index');
             Route::get('/create','DistrictsController@create')->name('district.create');
             Route::post('/store','DistrictsController@store')->name('district.store');
             Route::get('/edit/{num}','DistrictsController@edit')->name('district.edit');
             Route::post('/update/{num}','DistrictsController@update')->name('district.update');
           
              Route::get('/show','DistrictsController@show')->name('district.show');
              Route::get('/delete/{num}','DistrictsController@destroy')->name('district.destroy');
            });

            Route::group(['prefix'=>'reports'],function(){
                  Route::get('/commission','Admin\ReportsController@CommisonReport')->name('reports.commission');
            });

            
    
           Route::get('lawyer-details','LawyerController@index1')->name('lawyer.index1');
      Route::get('lawyer-detailss','LawyerController@index2')->name('lawyer.index2');
        });

Route::group(['middleware'=>['auth','lawyer']],function(){

      Route::get('/status/update/{id}','ClientlistController@newStatus')->name('update.status');
      Route::get('/clients','ClientlistController@index')->name('client');
       
      Route::get('/clients/all','ClientlistController@allTimeAppointment')->name('all.appointments');

       Route::resource('appointment','AppointmentController');
       Route::post('/appointment/check','AppointmentController@check')->name('appointment.check');
       Route::post('/appointment/update','AppointmentController@updateTime')->name('update');

       Route::get('lawyer-profile-deactivate','LawyerController@deactivate_lawyer')->name('deactivate_lawyer');

       Route::group(['prefix'=>'my-profile'],function(){
            Route::get('/view_all_appointments','LawyerController@view_all_appointments')->name('lawyer.view_all_appointments');
      });

      Route::resource('lawyer','LawyerController');
      

     });

