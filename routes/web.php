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


Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::post('/edit-user-account/{id}', 'UserController@update')->name('users.edit.user');
    Route::post('/edit-user-personal/{id}', 'PeopleController@update')->name('users.edit.person');
    Route::post('/edit-user-address/{id}', 'AddressController@update')->name('users.edit.address');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('/students', 'StudentController@index')->name('students.index');
    Route::get('/students/create', 'StudentController@create')->name('students.create');
    Route::post('/students/edit/{id}', 'StudentController@edit')->name('students.edit');
    Route::post('/students/update/{id}', 'StudentController@update')->name('students.update');
    Route::delete('/students/delete/{id}', 'StudentController@destroy')->name('students.destroy');
    Route::post('/students/store', 'StudentController@store')->name('students.store');

    Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
    Route::get('/teachers/create', 'TeacherController@create')->name('teachers.create');
    Route::get('/teachers/edit/{id}', 'TeacherController@edit')->name('teachers.edit');
    Route::post('/teachers/update/{id}', 'TeacherController@update')->name('teachers.update');
    Route::post('/teachers/delete/{id}', 'TeacherController@destroy')->name('teachers.destroy');
    Route::post('/teachers/store', 'TeacherController@store')->name('teachers.store');

    Route::get('/subjects', 'SubjectController@index')->name('subjects.index');
    Route::get('/subjects/create', 'SubjectController@create')->name('subjects.create');
    Route::get('/subjects/edit/{id}', 'SubjectController@edit')->name('subjects.edit');
    Route::post('/subjects/update/{id}', 'SubjectController@update')->name('subjects.update');
    Route::delete('/subjects/delete/{id}', 'SubjectController@destroy')->name('subjects.destroy');
    Route::post('/subjects/store', 'SubjectController@store')->name('subjects.store');

    Route::get('/courses', 'CourseController@index')->name('courses.index');
    Route::get('/courses/create', 'CourseController@create')->name('courses.create');
    Route::get('/courses/edit/{id}', 'CourseController@edit')->name('courses.edit');
    Route::post('/courses/update/{id}', 'CourseController@update')->name('courses.update');
    Route::delete('/courses/delete/{id}', 'CourseController@destroy')->name('courses.destroy');
    Route::post('/courses/store', 'CourseController@store')->name('courses.store');

    Route::get('/departments', 'DepartmentController@index')->name('departments.index');
    Route::get('/departments/create', 'DepartmentController@create')->name('departments.create');
    Route::get('/departments/edit/{id}', 'DepartmentController@edit')->name('departments.edit');
    Route::post('/departments/update/{id}', 'DepartmentController@update')->name('departments.update');
    Route::delete('/departments/delete/{id}', 'DepartmentController@destroy')->name('departments.destroy');
    Route::post('/departments/store', 'DepartmentController@store')->name('departments.store');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

