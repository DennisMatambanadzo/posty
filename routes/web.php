<?php

use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/users/{user:username}/posts', [UserPostController::class,'index'])->name('users.posts');

Route::get('/dashboard', [DashboardController::class,'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/', function(){
    return view('home');
})->name('home');

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/posts', function () {
    return view('posts.index');
});


Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);


Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
Route::post('/posts', [PostController::class,'store']);
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');


Route::post('/post/{post}/likes', [PostLikeController::class,'store'])->name('posts.likes');
Route::delete('/post/{post}/likes', [PostLikeController::class,'destroy'])->name('posts.likes');


