<?php

use App\Http\Controllers\addBlogCont;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\mainPageController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('mainPage');
// });
Route::get('/',[mainPageController::class,'showAll']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/addBlog',[addBlogCont::class,'addBlog']);
Route::post('/updateBlog',[addBlogCont::class,'updateBlog']);
Route::post('/commentBlog',[CommentController::class,'commentBlog']);


Route::get('/user/dashboard',[dashboardController::class,'showBlog'])->name('dashboard');
Route::get('blog/{blog}/viewBlog',[dashboardController::class,'viewBlog'])->name('viewBlog');
Route::get('blog/{blog}/updateBlog',[dashboardController::class,'updateBlog'])->name('updateBlog');
Route::get('blog/{blog}/deleteBlog',[dashboardController::class,'deleteBlog'])->name('deleteBlog');

Route::get('logout',[dashboardController::class,'logout']);
Route::get('addto',[dashboardController::class,'addto']);

Route::view('main','mainPage');
Route::view('addBlog','addBlog');
Route::view('alfa','loginme');