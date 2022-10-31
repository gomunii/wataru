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
Route::group(['middleware' => 'auth'], function() {

Route::get('/', 'HomeController@index')->name('home');



Route::get('/users', 'UserController@userindex')->name('users.index');
// Log::debug("NO,7");
// Log::debug("NO,22");

Route::get('/user/{id}/edit', 'UserController@userEdit')->name('users.edit');
// Log::debug("NO,12");

Route::post('/user/editsave', 'UserController@userEditSave')->name("users.editForm");
// Log::debug("NO,18");
Route::get('/menu/{id}/make', 'MenuController@menuMake')->name("menus.make");
// Log::debug("NO,13");
Route::post('/menu/makeSave', 'MenuController@menuMakeSave')->name('menus.makeSave');
// Log::debug("NO,25");

Route::post('/menu/{id}/create', 'MenuController@menuCreate')->name("menus.create");
// Log::debug("NO,14");

Route::get('/ordres', 'OrdreController@ordresindex')->name('ordres.index');
// Log::debug("NO,36");
// Log::debug("NO,50");

Route::get('/ordre/log', 'OrdreController@ordreslog')->name('ordres.log');
// Log::debug("NO,43");

Route::get('/store/ordre', 'OrdreController@ordresstore')->name('ordres.store');
// Log::debug("NO,6");
// Log::debug("NO,59");
Route::post('/ordre/createSave', 'OrdreController@ordreCreateSave')->name('ordres.createSave');
// Log::debug("NO,32");

Route::get('/ordre/change/{id}', 'OrdreController@orderChange')->name('ordres.change');
// Log::debug("NO,56");
});
Auth::routes();

Route::get('/hospitals', 'HospitalController@hosupital')->name('hospitals.index');

Route::get('/hospital/num1', 'HospitalController@num1')->name('hospitals.num1');

Route::get('/hospital/num2', 'HospitalController@num2')->name('hospitals.num2');

Route::get('/hospital/num3', 'HospitalController@num3')->name('hospitals.num3');

Route::get('/hospital/num4', 'HospitalController@num4')->name('hospitals.num4');

Route::get('/hospital/num5', 'HospitalController@num5')->name('hospitals.num5');

Route::get('/hospital/num6', 'HospitalController@num6')->name('hospitals.num6');

Route::get('/hospital/num7', 'HospitalController@num7')->name('hospitals.num7');

Route::get('/hospital/num8', 'HospitalController@num8')->name('hospitals.num8');
