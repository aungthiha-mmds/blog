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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');

Route::resource('blog', 'BlogController');

Route::get('serach', function(){
    $query = \App\Blog::whereLike(['title', 'content'], \Request()->get('query'))->get();
    dd($query);
})->name('serach');