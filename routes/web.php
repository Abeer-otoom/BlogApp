<?php

use App\Http\Controllers\DashboardCotroller;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard',  [DashboardCotroller::class , 'index'])->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {

        // Route::get('home')

Route::group(['middleware' => ['permissions:create_post']], function () {
        Route::get('posts/create' , 'PostController@create')->name('posts.create');
        Route::post('posts/store' , [PostController::class , 'store'])->name('posts.store');

    });
});
