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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('post/{id}',['as'=>'home.post','uses'=>'AdminPostController@post']);
Route::get('admin',function(){
  return view('admin.index');
});

Route::group(['middleware'=>'admin'],function(){

  Route::resource('admin/users','AdminUsersController');
  Route::resource('admin/posts','AdminPostController');
  Route::resource('admin/categories','AdminCategoriesController');
  Route::resource('admin/media','MediaController');
  Route::resource('admin/comments','PostCommentsController');
  Route::resource('admin/comments/replies','CommentRepliesController');
  Route::delete('admin/delete/media','MediaController@deleteMedia');
});


Route::group(['middleware'=>'auth'],function(){
  Route::post('comment/reply','CommentRepliesController@createReply');
  });
