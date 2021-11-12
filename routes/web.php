<?php

use App\Http\Controllers\dashbard\CategoryController;
use App\Http\Controllers\dashboard\CategoryController as DashboardCategoryController;
use App\Http\Controllers\dashboard\PostController;
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
})->name('welcome');

Route::get('home/{nombre?}/{apellido?}', function ($nombre  = "Pepe" , $apellido = "Cruz") {
    $nombres= [] ;
    return view('home',['nombre' => $nombre, 'apellido' => $apellido,'nombres' => $nombres]) ;
}) ->name('home');



Route::prefix('dashboard')->group(function () {
    Route::resource('post', PostController::class);
    Route::post('/post/{post}/image','App\Http\Controllers\dashboard\PostController@image')->name('post.image');

    Route::resource('category', DashboardCategoryController::class);
});

