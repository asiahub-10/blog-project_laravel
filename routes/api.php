<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('demo', function () {
    return 'Hello Laravel Api';
});

Route::get('/all-published-category', [
    'uses'  =>  'ApiController@allPublishedCategory',
    'as'    =>  'all-published-category'
]);

Route::get('/all-published-blog', [
    'uses'  =>  'ApiController@allPublishedBlog',
    'as'    =>  'all-published-blog'
]);

Route::get('/blog-by-category-id/{id}', [
    'uses'  =>  'ApiController@blogByCategoryId',
    'as'    =>  'blog-by-category-id'
]);

Route::get('/blog-by-id/{id}', [
    'uses'  =>  'ApiController@blogById',
    'as'    =>  'blog-by-id'
]);


