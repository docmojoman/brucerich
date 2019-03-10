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

Route::get('/home', 'PageController@index');

Route::get('/about', 'PageController@about');

Route::get('/media', 'VideosController@index');

Route::get('/video/{video}', 'VideosController@show');

Route::get('/books', 'BooksController@index');

Route::get('/book/{book}', 'BooksController@show');

Route::get('/article/{article}', 'ArticlesController@show');

Route::get('/articles/{id?}/{title?}', 'ArticlesController@index');

Route::get('/insights', 'InsightsController@index');

Route::get('/insight/{insight}', 'InsightsController@show');

Route::get('/tag/{tag}', 'TagsController@index');

Route::get('/tags', 'TagsController@all');

Route::get('/search', 'TagsController@all');

Route::get('/contact', 'ContactController@index');

Route::post('/contact', 'ContactController@send');

Route::get('/success', 'ContactController@success');

Route::get('info', 'PageController@info');



/* Admin Routes */
Auth::routes(['register' => false]);

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('admin/dashboard', 'Admin\DashboardController@index');

// Articles
Route::get('admin/articles/create', 'Admin\ArticlesController@create');

Route::get('admin/articles/{id?}', 'Admin\ArticlesController@index');

Route::get('admin/articles/edit/{id}', 'Admin\ArticlesController@edit');

Route::post('admin/articles', 'Admin\ArticlesController@store');

Route::get('admin/article/{article}', 'Admin\ArticlesController@show');

Route::patch('admin/articles/{id}', 'Admin\ArticlesController@update');

Route::get('/admin/articles/delete/{id}', 'Admin\ArticlesController@destroy');

Route::get('/admin/articles/publish/{id}', 'Admin\ArticlesController@publish');


// Article Groups
Route::get('/admin/articlegroups/create', 'Admin\ArticleGroupsController@create');

Route::get('/admin/articlegroups', 'Admin\ArticleGroupsController@index');

Route::post('/admin/articlegroups', 'Admin\ArticleGroupsController@store');

Route::get('/admin/articlegroups/edit/{id}', 'Admin\ArticleGroupsController@edit');

Route::patch('/admin/articlegroups/{id}', 'Admin\ArticleGroupsController@update');

Route::get('/admin/articlegroups/delete/{id}', 'Admin\ArticleGroupsController@destroy');


// Books
Route::get('/admin/books/create', 'Admin\BooksController@create');

Route::get('/admin/books', 'Admin\BooksController@index');

Route::get('/admin/book/{book}', 'Admin\BooksController@show');

Route::post('/admin/books', 'Admin\BooksController@store');

Route::get('/admin/books/edit/{id}', 'Admin\BooksController@edit');

Route::patch('/admin/books/{id}', 'Admin\BooksController@update');

Route::get('/admin/books/delete/{id}', 'Admin\BooksController@destroy');

Route::get('/admin/books/publish/{id}', 'Admin\BooksController@publish');

// Sections
Route::get('/admin/sections/{id}', 'Admin\SectionsController@index');

Route::get('/admin/sections/delete/{id}', 'Admin\SectionsController@destroy');


// Insights
Route::get('/admin/insights/create', 'Admin\InsightsController@create');

Route::get('/admin/insights', 'Admin\InsightsController@index');

Route::post('/admin/insights', 'Admin\InsightsController@store');

Route::get('/admin/insight/{insight}', 'Admin\InsightsController@show');

Route::get('/admin/insights/edit/{id}', 'Admin\InsightsController@edit');

Route::patch('/admin/insights/{id}', 'Admin\InsightsController@update');

Route::get('/admin/insights/delete/{id}', 'Admin\InsightsController@destroy');

Route::get('/admin/insights/publish/{id}', 'Admin\InsightsController@publish');


// Videos
Route::get('/admin/videos/create', 'Admin\VideosController@create');

Route::get('/admin/videos', 'Admin\VideosController@index');

Route::post('/admin/videos', 'Admin\VideosController@store');

Route::get('/admin/videos/edit/{id}', 'Admin\VideosController@edit');

Route::get('/admin/video/{video}', 'Admin\VideosController@show');

Route::patch('/admin/videos/{id}', 'Admin\VideosController@update');

Route::get('/admin/videos/delete/{id}', 'Admin\VideosController@destroy');

Route::get('/admin/videos/publish/{id}', 'Admin\VideosController@publish');


// Tags
Route::get('/admin/tags', 'Admin\TagsController@index');

Route::get('/admin/tags/fetch', 'Admin\TagsController@fetch');

Route::get('/admin/tags/create', 'Admin\TagsController@create');

Route::post('/admin/tags', 'Admin\TagsController@store');

Route::get('/admin/tags/edit/{id}', 'Admin\TagsController@edit');

Route::patch('/admin/tags/{id}', 'Admin\TagsController@update');

Route::get('/admin/tags/delete/{id}', 'Admin\TagsController@destroy');


// Filemanager
Route::get('/admin/filemanager', 'Admin\FilesController@index');


// Sort Order
Route::get('/admin/sort/{sortable_type}', 'Admin\SortsController@index');

Route::post('/admin/sort/update', 'Admin\SortsController@update');


// UniSharp (from middleware array 'web',)
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });
