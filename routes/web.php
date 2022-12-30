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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/*=====================division====================*/
Route::get('/division/create', 'DivisionController@create');
Route::post('/division/store', 'DivisionController@store');



/*=====================District Route====================*/
Route::get('/district/create', 'DistrictController@create');
Route::post('/district/store', 'DistrictController@store');


/*=====================Upazila Route====================*/
Route::get('/upazila/create', 'UpazilaController@create');
Route::post('/upazila/store', 'UpazilaController@store');



Route::post('district', 'UpazilaController@district')->name('district');
Route::post('upazila', 'UpazilaController@upazila')->name('upazila');



/*=====================Students Route====================*/
Route::get('/students/create', 'StudentController@create');
Route::post('/students/store', 'StudentController@store');
Route::get('all/students', 'StudentController@index');



Route::get('Search', 'StudentController@Search');
