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

Route::get('/media', 'VideosController@index');

Route::get('/books', 'BooksController@index');

Route::get('/book/{id}', 'BooksController@show');

Route::get('/articles/{id?}', 'ArticlesController@index');

Route::get('/article/{id}', 'ArticlesController@show');

Route::get('/insights', 'InsightsController@index');

Route::get('/insight/{slug}', 'InsightsController@show');

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

Route::get('/admin/articles/delete/{id}', 'Admin\ArticlesController@destroy');

Route::get('/admin/articles/publish/{id}', 'Admin\ArticlesController@publish');


// Article Groups
Route::get('/admin/articlegroups/create', 'Admin\ArticleGroupsController@create');

Route::get('/admin/articlegroups', 'Admin\ArticleGroupsController@index');

Route::post('/admin/articlegroups', 'Admin\ArticleGroupsController@store');

Route::get('/admin/articlegroups/edit/{id}', 'Admin\ArticleGroupsController@edit');

Route::patch('/admin/articlegroups', 'Admin\ArticleGroupsController@update');

Route::get('/admin/articlegroups/delete/{id}', 'Admin\ArticleGroupsController@destroy');


// Books
Route::get('/admin/books/create', 'Admin\BooksController@create');

Route::get('/admin/books', 'Admin\BooksController@index');

Route::post('/admin/books', 'Admin\BooksController@store');

Route::get('/admin/books/edit/{id}', 'Admin\BooksController@edit');

Route::patch('/admin/books', 'Admin\BooksController@update');

Route::get('/admin/books/delete/{id}', 'Admin\BooksController@destroy');

Route::get('/admin/books/publish/{id}', 'Admin\BooksController@publish');


// Insights
Route::get('/admin/insights/create', 'Admin\InsightsController@create');

Route::get('/admin/insights', 'Admin\InsightsController@index');

Route::post('/admin/insights', 'Admin\InsightsController@store');

Route::get('/admin/insights/edit/{id}', 'Admin\InsightsController@edit');

Route::patch('/admin/insights/{id}', 'Admin\InsightsController@update');

Route::get('/admin/insights/delete/{id}', 'Admin\InsightsController@destroy');

Route::get('/admin/insights/publish/{id}', 'Admin\InsightsController@publish');


// Videos
Route::get('/admin/videos/create', 'Admin\VideosController@create');

Route::get('/admin/videos', 'Admin\VideosController@index');

Route::post('/admin/videos', 'Admin\VideosController@store');

Route::get('/admin/videos/edit/{id}', 'Admin\VideosController@edit');

Route::patch('/admin/videos/{id}', 'Admin\VideosController@update');

Route::get('/admin/videos/delete/{id}', 'Admin\VideosController@destroy');

Route::get('/admin/videos/publish/{id}', 'Admin\VideosController@publish');


// Tags
Route::get('/admin/tags', 'Admin\TagsController@index');

Route::get('/admin/tags/fetch', 'Admin\TagsController@fetch');


// Sort Order
Route::get('/admin/sort/{sortable_type}', 'Admin\SortsController@index');

Route::post('/admin/sort/update', 'Admin\SortsController@update');



// Track down this route and eliminate
Route::get('/home', 'HomeController@index')->name('home');

// UniSharp (from middleware array 'web',)
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
