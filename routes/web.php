<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/about', [UserController::class, 'about'])->name('home.about');
Route::get('/contact', [UserController::class, 'contact'])->name('home.contact');
Route::post('/contact', [UserController::class, 'store'])->name('contact.send');
Route::get('/blog', [UserController::class, 'showBlog'])->name('home.blog');
Route::get('/privacy-policy', [UserController::class, 'privacyPolicy'])->name('home.privacy');

Route::get('/', [UserController::class, 'showDataHome'])->name('home');


Route::get('/dashboard', [UserController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/post/{id}', [UserController::class, 'fullpost'])->name('fullpost');

// Route::get('/admin/dashboard', [UserController::class, 'index'])
// ->middleware(['auth', 'admin'])->name('admin.dashboard');

// Route::get('/admin/dashboard/posts', [UserController::class, 'posts'])
// ->middleware(['auth', 'admin']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
  Route::get('/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
  Route::get('/dashboard/addpost', [AdminController::class, 'addpost'])->name('admin.addpost');
  Route::post('/dashboard/addpost', [AdminController::class, 'createpost'])->name('admin.createpost');
  Route::get('/dashboard/allposts', [AdminController::class, 'allposts'])->name('admin.allposts');
  Route::get('/dashboard/allposts/{id}', [AdminController::class, 'editPost'])->name('admin.editpost');
  Route::post('/dashboard/updatepost', [AdminController::class, 'updatePost'])->name('admin.updatepost');
  Route::delete('/dashboard/deletepost/{id}', [AdminController::class, 'deletePost'])->name('admin.deletepost');
  Route::get('dashboard/viewpost/{id}', [AdminController::class, 'viewPost'])->name('admin.viewpost');
});


//Comment
// create, edit, delete, like
Route::post('/post/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
