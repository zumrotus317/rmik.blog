<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\PortalController;
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
Route::get('/search', [PortalController::class, 'search']); 
Route::get('/menu/{id}', [PortalController::class, 'menu']);
Route::get('/category/{id}', [PortalController::class, 'category']);
Route::get('/post-detail/{id}', [PortalController::class, 'postDetail']);
Route::get('/post', [PortalController::class, 'post']);
Route::get('/about', [PortalController::class, 'about']);
Route::get('/', [PortalController::class, 'index']);

Route::get('/register',[AdminController::class,'register']);
Route::post('/register',[AdminController::class,'postRegister']);

Route::get('/login',[AdminController::class,'login']);
Route::post('/login',[AdminController::class,'postLogin']);
Route::get('logout', [AdminController::class, 'logout']);

Route::middleware('checkAdmin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [AdminController::class, 'index']);
        Route::prefix('category')->group(function(){
            Route::get('/edit/{id}', [CategoriesController::class, 'edit']);
            Route::post('/edit/{id}',[CategoriesController::class, 'update']);
            Route::get('/', [CategoriesController::class, 'index']);
            Route::get('/create', [CategoriesController::class, 'create']);
            Route::post('/create', [CategoriesController::class, 'insert']);
            Route::get('/delete/{id}', [CategoriesController::class, 'delete']);
        });
        Route::prefix('slider')->group(function(){
            Route::get('/edit/{id}', [SliderController::class, 'edit']);
            Route::post('/edit/{id}', [SliderController::class, 'update']);
            Route::get('/', [SliderController::class, 'index']);
            Route::get('/create', [SliderController::class, 'create']);
            Route::post('/create', [SliderController::class, 'insert']);
            Route::get('/delete/{id}', [SliderController::class, 'delete']);
        });
        Route::prefix('post')->group(function(){
            Route::get('/edit/{id}', [PostController::class, 'edit']);
            Route::post('/edit/{id}', [PostController::class, 'update']);
            Route::get('/delete/{id}', [PostController::class, 'delete']);
            Route::get('/', [PostController::class, 'index']);
            Route::get('/create', [PostController::class, 'create']);
            Route::post('/create', [PostController::class, 'insert']);
        });
        Route::prefix('mainmenu')->group(function(){
            Route::get('/edit/{id}', [MainmenuController::class, 'edit']);
            Route::post('/edit/{id}', [MainmenuController::class, 'update']);
            Route::get('/delete/{id}', [MainmenuController::class, 'delete']);
            Route::get('/', [MainmenuController::class, 'index']);
            Route::get('/create', [MainmenuController::class, 'create']);
            Route::post('/create', [MainmenuController::class, 'insert']);
        });
    });
});