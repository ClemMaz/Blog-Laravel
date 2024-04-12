<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;

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

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/publication/creer', [BlogController::class, 'create'])->name('post.create')->middleware('auth');

Route::post('/publication/creer', [BlogController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/publication/{post}', [BlogController::class, 'show'])->name('post.show');
Route::delete('/publication/{post}/supprimer', [BlogController::class, 'destroy'])->name('post.delete')->middleware('auth');
Route::get('/publication/{post}/modifier', [BlogController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::put('/publication/{post}/modifier', [BlogController::class, 'update'])->name('post.update')->middleware('auth');

//search


Route::get('/blog/category/{category}', [BlogController::class, 'searchCategory'])->name('blog.category');




Route::get('/posts', [BlogController::class, 'search'])->name('posts.index');





//Auth

Route::get('/inscription', [AuthController::class, 'showRegister'])->name('auth.register')->middleware('guest');
Route::post('/inscription', [AuthController::class, 'register']);

Route::get('/connexion', [AuthController::class, 'showLogin'])->name('auth.login')->middleware('guest');
Route::post('/connexion', [AuthController::class, 'login']);

Route::delete('/deconnexion', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
