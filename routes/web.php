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

// route when user login 
// Route::get('/login', 'LoginController@get');
// Route::post('/login', 'LoginController@post');
// register
// Route::get('/register', 'registerController@register');
// Route::post('/register', 'registerController@register');
Auth::routes();

Route::get('/','blogController@index')->name('blog');




// hak ases untuk yang sudah login 
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    
    
    // Route halaman Admin
    Route::resource('/category', 'CategoryController');
    Route::resource('/tags', 'TagsController');

    Route::get('/posts/hapus', 'PostController@trashed')->name('posts.hapus');
    Route::get('/posts/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::delete('/posts/delete-permanen/{id}', 'PostController@deletePermanen')->name('posts.delete-permanen');
    Route::resource('/posts', 'PostController');

    // users route

    Route::resource('/users', 'UserController');

});











// Route::group(['middleware' => ['admin']], function() {
//     Route::resource('/category', 'CategoryController');
//     Route::resource('/tags', 'TagsController');
// });



