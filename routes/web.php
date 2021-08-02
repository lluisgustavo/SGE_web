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

    Route::get('/students', 'StudentController@index')->name('students.list');
    Route::post('/create-students', 'StudentController@create')->name('students.create');
    Route::post('/update-students', 'StudentController@update')->name('students.update');
    Route::post('/delete-students', 'StudentController@delete')->name('students.delete');

    Route::get('/teachers', 'TeacherController@index')->name('teachers.list');
    Route::post('/create-teachers', 'TeacherController@create')->name('teachers.create');
    Route::post('/update-teachers', 'TeacherController@update')->name('teachers.update');
    Route::post('/delete-teachers', 'TeacherController@delete')->name('teachers.delete');

    Route::get('/subjects', 'SubjectController@index')->name('subjects.list');
    Route::post('/create-subjects', 'SubjectController@create')->name('subjects.create');
    Route::post('/update-subjects', 'SubjectController@update')->name('subjects.update');
    Route::post('/delete-subjects', 'SubjectController@delete')->name('subjects.delete');

    Route::get('/courses', 'CourseController@index')->name('courses.list');
    Route::post('/create-courses', 'CourseController@create')->name('courses.create');
    Route::post('/update-courses', 'CourseController@update')->name('courses.update');
    Route::post('/delete-courses', 'CourseController@delete')->name('courses.delete');

    Route::get('/departments', 'DepartmentController@index')->name('departments.list');
    Route::post('/create-departments', 'DepartmentController@create')->name('departments.create');
    Route::post('/update-departments', 'DepartmentController@update')->name('departments.update');
    Route::post('/delete-departments', 'DepartmentController@delete')->name('departments.delete');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

