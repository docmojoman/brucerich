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

/* Guest Routes */

Route::get('/', 'PageController@index');

Route::get('/about', 'PageController@about');

Route::get('/media', 'PageController@media');

Route::get('/contact', 'PageController@contact');

Route::get('/articles', 'ArticlesController@index');





/* Admin Routes */
Auth::routes();

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Articles
Route::get('admin/articles/create', 'Admin\ArticlesController@create');

Route::get('admin/articles/{id?}', 'Admin\ArticlesController@index');

Route::get('admin/articles/edit/{id}', 'Admin\ArticlesController@edit');

Route::post('admin/articles', 'Admin\ArticlesController@store');

Route::patch('admin/articles/{id}', 'Admin\ArticlesController@update');


// Article Groups
Route::get('/admin/articlegroups/create', 'Admin\ArticleGroupController@create');

Route::get('/admin/articlegroups', 'Admin\ArticleGroupController@index');

Route::post('/admin/articlegroups', 'Admin\ArticleGroupController@store');

Route::get('/admin/articlegroups/edit/{id}', 'Admin\ArticleGroupController@edit');

Route::patch('/admin/articlegroups', 'Admin\ArticleGroupController@update');

Route::get('/home', 'HomeController@index')->name('home');

// UniSharp
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
