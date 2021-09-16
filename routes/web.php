<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;

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

Auth::routes();
Route::resource('/', PublicController::class);
Route::delete('/removemenu/{category}',  [CategoryController::class, 'removemenu'])->name('removemenu');
Route::get('/addmenu/{category}',  [CategoryController::class, 'addmenu'])->name('addmenu');
Route::delete('/unfeature/{post}',  [PostController::class, 'unfeature'])->name('unfeature');
Route::get('/feature/{post}',  [PostController::class, 'feature'])->name('feature');
Route::get('/categorizedpost/{category}', [PostController::class, 'categorizedpost'])->name('categorizedpost');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
Route::get('/adminhome', [App\Http\Controllers\HomeController::class, 'adminhome'])->name('adminhome');
Route::resource('categories', CategoryController::class);
Route::resource('links', LinkController::class);
