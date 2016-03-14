<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','Controller@index');

Route::get('/home',['as' => 'home', 'uses' => 'Controller@index']);
//authentication
Route::controllers([
 'auth' => 'Auth\AuthController',
 'password' => 'Auth\PasswordController',
]);
Route::group(['middleware' => ['auth']], function()
{
 // show new post form
 Route::get('new-post','Controller@create');
 // save new post
 Route::post('new-post','Controller@store');
 // edit post form
 Route::get('edit/{slug}','Controller@edit');
 // update post
 Route::post('update','Controller@update');
 // delete post
 Route::get('delete/{id}','Controller@destroy');
 // display user's all posts
 Route::get('my-all-posts','UserController@user_posts_all');
 // display user's drafts
 Route::get('my-drafts','UserController@user_posts_draft');
 // add comment
 Route::post('comment/add','CommentController@store');
 // delete comment
 Route::post('comment/delete/{id}','CommentController@distroy');
});
//users profile
Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');
// display single post
Route::get('/{slug}',['as' => 'post', 'uses' => 'Controller@show'])->where('slug', '[A-Za-z0-9-_]+');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


