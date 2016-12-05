<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('welcome');
    return view('pages.index');
});
Route::get('/admin',function(){
	return view('pages.index');
});
/*room sanga associated routes */
Route::get('schedule','ScheduleController@index');
Route::get('c_room','RoomController@create');
Route::post('c_room','RoomController@store');
Route::get('e_room/{room}','RoomController@create');
Route::post('e_room/{room}','RoomController@store');
Route::get('v_room','RoomController@show');
Route::get('a_tenant/{room}','RoomController@assign_tenant');
Route::post('a_tenant/{room}','RoomController@tenantentry');
Route::get('d_tenant/{room}','RoomController@deallocate_tenant');
Route::get('d_room/{room}','RoomController@del_room');
/*tenant sanga associate routes */
Route::get('c_tenant','TenantController@create');
Route::post('c_tenant','TenantController@store');
Route::get('v_tenant','TenantController@show');
Route::get('de_room/{room}','TenantController@deallocate_Room');
Route::get('a_room/{tenant}','TenantController@assign_room');
Route::post('a_room/{tenant}','TenantController@roomentry');
Route::get('a_facility/{tenant}','TenantController@assign_facility');
Route::post('a_facility/{tenant}','TenantController@facility_entry');
Route::get('/de_facility/{tenant}/{extra}','TenantController@deallocate_facility');
Route::get('e_tenant/{tenant}','TenantController@create');
Route::post('e_tenant/{tenant}','TenantController@store');
Route::get('del_tenant/{tenant}','TenantController@del_tenant');

/*extras */
Route::get('c_facility','FacilityController@create');
Route::post('c_facility','FacilityController@store');
Route::get('v_facility','FacilityController@show');
Route::get('/extras/a_tenant/{extra}','FacilityController@assign_tenant');
Route::post('/extras/a_tenant/{extra}','FacilityController@tenant_entry');
Route::get('/extras/de_tenant/{tenant}/{extra}','FacilityController@deallocate_tenant');
Route::get('/extras/e_facility/{extra}','FacilityController@create');
Route::post('/extras/e_facility/{extra}','FacilityController@store');
Route::get('/extras/d_facility/{extra}','FacilityController@del_facility');

Route::get('/select',function(){
	return view('pages.selecttenant');
});
Route::get('/payment','PaymentController@select');
Route::post('/confirmpayment','PaymentController@store');


Auth::routes();

Route::get('/home', 'HomeController@index');
