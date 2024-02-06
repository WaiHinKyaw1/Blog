<?php

use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeAuthUser;
use App\Http\Middleware\MustBeGusetUser;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;


Route::middleware(MustBeAuthUser::class)->group(function(){
    
    Route::get('/',[BlogController::class,'index'])->name('user');
    Route::get('/blogs/{blog:slug}',[BlogController::class,'show'])->name('blogs.show');
    Route::post('/blog/subscribe/emailstore',[SubscribeController::class,'emailStore']);
    Route::post('/blogs/{blog:slug}/handle-subscribe',[SubscribeController::class,'toggle']);

    // comment routes
    Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
    Route::get('/comments/{comment}/edit',[CommentController::class,'edit']);
    Route::patch('/comments/{comment}/update',[CommentController::class,'update']);
    Route::delete('/comments/{comment}/delete',[CommentController::class,'destory']);

    // logout route
    Route::post('/logout',[LogoutController::class,'destroy']);


});

Route::middleware(MustBeAdminUser::class)->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin');
    Route::get('/admin/blog/create',[AdminController::class,'create']);
    Route::post('/admin/blogs/store',[AdminController::class,'store']);
    Route::delete('/admin/blogs/{blog}/delete',[AdminController::class,'destory'])->middleware('can:edit,blog');
    Route::put('/admin/blogs/{blog}/update',[AdminController::class,'update'])->middleware('can:edit,blog');
    Route::get('/admin/blogs/{blog}/edit',[AdminController::class,'edit'])->middleware('can:edit,blog');

    //  category routes
    Route::get('/admin/blog/categoryShow',[AdminController::class,'categoryShow'])->name('adminCategory');
    Route::get('/admin/blog/categoryCreate',[AdminController::class,'categoryCreate']);
    Route::post('/admin/category/store',[AdminController::class,'categoryStore']);
    Route::get('/admin/category/{category}/categoryEdit',[AdminController::class,'categoryEdit']);
    Route::put('/admin/category/{category}/categoryUpate',[AdminController::class,'categoryUpdate']);
    Route::delete('/admin/category/{category}/categoryDelete',[AdminController::class,'categoryDestory']);

    // admin comment
    Route::get('/admin/comment',[AdminCommentController::class,'index'])->name('commentIndex');
    Route::get('/admin/comment/{comment}/edit',[AdminCommentController::class,'edit']);
    Route::put('/admin/comment/{comment}/update',[AdminCommentController::class,'update']);
});



Route::middleware(MustBeGusetUser::class)->group(function(){
    Route::get('/register',[RegisterController::class,'create']);
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('/login',[LoginController::class,'loginPage']);
    Route::post('/login',[LoginController::class,'store']);
});





