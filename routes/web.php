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
    return view('welcome');
});

Route::group(['middleware' =>  ['IsAdmin'],'namespace' => 'Admin', 'prefix' => 'admin' ,'as' => 'admin.'], function () {

   Route::resource('users', 'UserController');
   Route::resource('posts', 'PostController');
   Route::resource('media', 'MediaController');
   Route::resource('categories', 'CategoryController');
   Route::resource('comments', 'PostCommentController');
   Route::resource('comment/replies', 'CommentReplyController');

});


Route::view('/404', 'admin.404');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'Project\ProjectController@show')->name('project.show');
Route::get('/posts', 'Project\ProjectController@index')->name('project');
