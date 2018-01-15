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
    return view('login');
});
Auth::routes();

//Route::get('/', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

//Admin route
Route::group(['prefix'=>'admin/dashboard', 'middleware'=>['auth','admin']], function(){
    Route::get('/', 'Admin\AdminController@index');
    Route::resource('tasks', 'Admin\TasksController');
    Route::post('tasks_mass_destroy', ['uses' => 'Admin\TasksController@massDestroy', 'as' => 'tasks.mass_destroy']);
    Route::post('tasks_restore/{id}', ['uses' => 'Admin\TasksController@restore', 'as' => 'tasks.restore']);
    Route::delete('tasks_perma_del/{id}', ['uses' => 'Admin\TasksController@perma_del', 'as' => 'tasks.perma_del']);
    Route::resource('teachers', 'Admin\TeachersController');
    Route::post('authorize','AuthorizeController@create')->name('authorize');;
    Route::resource('student', 'Admin\StudentController');
    Route::resource('class', 'Admin\ClassController');
    Route::get('view', 'Admin\StudentController@view')->name('view');
    Route::resource('notice', 'NoticeController');
    Route::post('teachers/{teacher}','Admin\TeachersController@delete')->name('teachers.delete');
    Route::resource('events', 'Admin\EventController');
    Route::get('view', 'Admin\EventController@view')->name('events.view');
});


//Teachers route
Route::group(['prefix'=>'teacher/dashboard', 'middleware'=>['auth','teacher']], function(){
    Route::get('/', 'Teacher\TeacherController@index')->name('teacher');

});

//Student route
Route::group(['prefix'=>'student/dashboard', 'middleware'=>['auth','student']], function(){
    Route::get('/', 'Student\StudentController@index')->name('student');

});

//parent route
Route::group(['prefix'=>'parent/dashboard', 'middleware'=>['auth','parent']], function(){
    Route::get('/', 'Parent\ParentsController@index')->name('parent');

});