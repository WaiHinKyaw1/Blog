<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeAuthUser;
use App\Http\Middleware\MustBeGusetUser;
use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(MustBeAuthUser::class)->group(function(){
    Route::get('/',[BlogController::class,'index']);
    Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->name('blogs.show');
    Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
    Route::post('/blogs/{blog:slug}/handle-subscribe',[SubscribeController::class,'toggle']);
    Route::get('/comments/{comment}/edit',[CommentController::class,'edit']);
    Route::patch('/comments/{comment}/update',[CommentController::class,'update']);
    Route::delete('/comments/{comment}/delete',[CommentController::class,'destory']);
    Route::post('/logout',[LogoutController::class,'destroy']);
    Route::post('/blog/subscribe/emailstore',[SubscribeController::class,'emailStore']);
});

Route::middleware(MustBeAdminUser::class)->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::get('/admin/blog/create',[AdminController::class,'create']);
    Route::post('/admin/blogs/store',[AdminController::class,'store']);
    Route::delete('/admin/blogs/{blog}/delete',[AdminController::class,'destory'])->middleware('can:edit,blog');
    Route::put('/admin/blogs/{blog}/update',[AdminController::class,'update'])->middleware('can:edit,blog');
    Route::get('/admin/blogs/{blog}/edit',[AdminController::class,'edit'])->middleware('can:edit,blog');
    Route::get('/admin/blog/categoryShow',[AdminController::class,'categoryShow'])->name('adminCategory');
    Route::get('/admin/blog/categoryCreate',[AdminController::class,'categoryCreate']);
    Route::post('/admin/category/store',[AdminController::class,'categoryStore']);
    Route::get('/admin/category/{category}/categoryEdit',[AdminController::class,'categoryEdit']);
    Route::put('/admin/category/{category}/categoryUpate',[AdminController::class,'categoryUpdate']);
    Route::delete('/admin/category/{category}/categoryDelete',[AdminController::class,'categoryDestory']);
});



Route::middleware(MustBeGusetUser::class)->group(function(){
    Route::get('/register',[RegisterController::class,'create']);
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('/login',[LoginController::class,'loginPage']);
    Route::post('/login',[LoginController::class,'store']);
});

// Route::get('/categories/{category:slug}',[CategoryController::class,'categoryShow']);
// Route::get('/users/{author:username}',[UserController::class,'userShow']);



