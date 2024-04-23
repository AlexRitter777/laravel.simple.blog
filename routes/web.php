<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TagController as FrontTagController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article/{slug}', [HomeController::class, 'show'])->name('article.show');
Route::get('/category/{slug}', [FrontCategoryController::class, 'show'])->name('category.show');
Route::get('/tags/{slug}', [FrontTagController::class, 'show'])->name('tag.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/articles', [HomeController::class, 'showAll'])->name('articles.all');


Route::middleware('admin')->group(function (){
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin.index');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/tags', TagController::class);
        Route::resource('/posts', PostController::class);
    } );

});

Route::middleware('guest')->group(function (){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');

});

Route::middleware('auth')->group(function (){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

});



