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

Route::get('/','PostController@index');

Route::get('/home',['as' => 'home', 'uses' => 'PostController@index']);
//authentication
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::group(['middleware' => ['web']], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'PostController@index']);
});
//users profile
Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');
// display list of posts
Route::get('user/{id}/posts','UserController@user_posts')->where('id', '[0-9]+');
// display single post
Route::get('/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');


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


