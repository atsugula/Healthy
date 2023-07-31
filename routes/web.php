<?php

use App\Http\Controllers\Forms\CategoryController;
use App\Http\Controllers\Forms\VideoController;
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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
$controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');
    Route::get('/page-3', $controller_path . '\pages\Page3@index')->name('pages-page-3');
    Route::get('/page-4', $controller_path . '\pages\Page4@index')->name('pages-page-4');
    Route::get('/playvideo', $controller_path . '\pages\playvideo@index')->name('pages-playvideo');
    Route::resource('categories', CategoryController::class);
    Route::resource('videos', VideoController::class);

});
