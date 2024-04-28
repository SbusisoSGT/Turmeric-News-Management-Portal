<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Models\Article;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
 
    Route::get('/login', 'showLogin')->name('login');
    
    Route::post('/register', 'register');
 
    Route::post('/login', 'login');

    Route::post('/logout', 'logout')->middleware('auth');
});


Route::controller(ArticleController::class)->group(function () {
    Route::get('/', 'index');

    Route::get('/news/categories/{category}', 'category');

    Route::get('/news/article/{article_link}', 'show');

    Route::get('/news/create', 'create')->can('create', Article::class);

    Route::get('/news/admin', 'admin')->can('approve', Article::class);

    Route::post('/news/article/store', 'store')->middleware('auth');
});


