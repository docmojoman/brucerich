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

Route::get('/books/{id?}', 'BooksController@index');

Route::get('/articles/{id?}', 'ArticlesController@index');

Route::get('/article/{id}', 'ArticlesController@show');

Route::get('/insights', 'InsightsController@index');

Route::get('/insight/{id}', 'InsightsController@show');

Route::get('/contact', 'PageController@contact');



/* Admin Routes */
Auth::routes();

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
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


// Books
Route::get('/admin/books/create', 'Admin\BooksController@create');

Route::get('/admin/books', 'Admin\BooksController@index');

Route::post('/admin/books', 'Admin\BooksController@store');

Route::get('/admin/books/edit/{id}', 'Admin\BooksController@edit');

Route::patch('/admin/books', 'Admin\BooksController@update');


// Insights
Route::get('/admin/insights/create', 'Admin\InsightsController@create');

Route::get('/admin/insights', 'Admin\InsightsController@index');

Route::post('/admin/insights', 'Admin\InsightsController@store');

Route::get('/admin/insights/edit/{id}', 'Admin\InsightsController@edit');

Route::patch('/admin/insights', 'Admin\InsightsController@update');


// Videos
Route::get('/admin/videos/create', 'Admin\VideosController@create');

Route::get('/admin/videos', 'Admin\VideosController@index');

Route::post('/admin/videos', 'Admin\VideosController@store');

Route::get('/admin/videos/edit/{id}', 'Admin\VideosController@edit');

Route::patch('/admin/videos', 'Admin\VideosController@update');



Route::get('/home', 'HomeController@index')->name('home');

// UniSharp (from middleware array 'web',)
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
