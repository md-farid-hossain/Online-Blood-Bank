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
Route::get('/sortpost', 'HomeController@sortpost');


//Doner Route
Route::get('/live_search', 'DonerController@index');
Route::get('/live_search/action', 'DonerController@action')->name('live_search.action');
Route::get('create', 'DonerController@create');
Route::post('store', 'DonerController@store');


//show my profile after reg
Route::get('/myprofile', 'HomeController@myprofile')->name('myprofile');


// all request 
Route::get('/allrequest', 'AllRequestController@post');
Route::get('/allrequest/action', 'AllRequestController@action')->name('allrequest.action');

Route::get('index', 'DonerController@index');
Route::get('create', 'DonerController@create');
Route::post('store', 'DonerController@store');
//<!-- profile route -->
Route::get('/updateprofile', 'ProfileController@updateprofile');
//Route::get('/myprofile', 'ProfileController@myprofile');
Route::post('/addProfile', 'ProfileController@addProfile');
//Route::post('/about', 'AboutController@about');
Route::get('/about','AboutController@about')->name('about');

//<!-- Blood Request Route -->

Route::post('/addPost', 'PostController@addPost');
Route::get('/post', 'PostController@post');

//<!-- Category Route -->
//Route::get('/category', 'CategoryController@category');
//Route::post('/addCategory', 'CategoryController@addCategory');

//<!-- Status Route -->
//Route::get('/status', 'StatusController@Status');
//Route::post('/addStatus', 'StatusController@addStatus');

Route::get('/view/{id}', 'PostController@view');
Route::get('/edit/{id}', 'PostController@edit');
Route::get('/delete/{id}', 'PostController@deletePost');

Route::get('/category/{id}', 'PostController@category');


Route::post('/comment/{id}', 'PostController@comment');
// community route
Route::get('/community', 'CommunityController@index');
Route::get('/community/action', 'CommunityController@action')->name('community.action');
