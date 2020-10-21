<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/articles', function () {
    return view('articles.index');
});

Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index')->middleware('auth');
Route::post('/articles', [ArticleController::class, 'store']);
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show')->middleware('auth');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);
Route::put('/articles/{article}', [ArticleController::class, 'update']);
Route::delete('/articles/{article}', [ArticleController::class, 'destroy']);

Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');

