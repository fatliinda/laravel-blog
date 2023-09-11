<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class,'index']);
Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
Route::resource('/blog',PostsController::class);
Route::get('/posts/{slug}', [PostsController::class, 'show'])->name('posts.show');
Route::get('/posts/{slug}/edit', [PostsController::class, 'edit'])->name('posts.edit');



require __DIR__.'/auth.php';

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
