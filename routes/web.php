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
});

Route::middleware(MustBeAdminUser::class)->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/blog/create',[AdminController::class,'create']);
    Route::post('/admin/blogs/store',[AdminController::class,'store']);
    Route::put('/admin/blogs/{blog}/update',[AdminController::class,'update']);
    Route::delete('/admin/blogs/{blog}/delete',[AdminController::class,'destory']);
    Route::get('/admin/blogs/{blog}/edit',[AdminController::class,'edit']);
});



Route::middleware(MustBeGusetUser::class)->group(function(){
    Route::get('/register',[RegisterController::class,'create']);
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('/login',[LoginController::class,'loginPage']);
    Route::post('/login',[LoginController::class,'store']);
});

// Route::get('/categories/{category:slug}',[CategoryController::class,'categoryShow']);
// Route::get('/users/{author:username}',[UserController::class,'userShow']);



