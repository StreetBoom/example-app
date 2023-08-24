<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use SleepingOwl\Admin\Http\Controllers\AdminController;

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
    return view('welcome');
});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('admin');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('admin');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('admin');

Route::post('/posts/comment', [PostController::class, 'commentForm'])->name('comment');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');


    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');
});




Route::middleware('auth:admin')->group(function () {
    Route::get('/logout_admin', [AuthAdminController::class, 'logout'])->name('logout_admin');
});
Route::get('/login_admin', [AuthAdminController::class, 'showLoginForm'])->name('login_admin');
Route::post('/login_process_admin', [AuthAdminController::class, 'login'])->name('login_process_admin');

Route::get('/register_admin', [AuthAdminController::class, 'showRegisterForm'])->name('register_admin');
Route::post('/register_process_admin', [AuthAdminController::class, 'register'])->name('register_process_admin');



Route::get('/contacts', [PostController::class, 'showContactForm'])->name('contacts');
Route::post('/contact_form_process', [PostController::class, 'contactForm'])->name('contact_form_process');




//Route::post('/posts', [PostController::class,'store'])->name('posts.store');

