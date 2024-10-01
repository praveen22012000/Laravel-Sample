<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\MyStudent;
use App\Http\Controllers\CommentController;
use App\Models\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mytest', function () {
    return view('layouts/admin/master');
});

Route::get('/dashboard',[PostController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test',[PostController::class,'test'])->middleware(['auth', 'verified'])->name('test');
Route::get('/comment',[CommentController::class,'index'])->middleware(['auth', 'verified'])->name('comment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware('auth')->prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('post.add');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');

    Route::group(['prefix'=>'{post}'],function(){
        Route::get('/edit',[PostController::class,'edit'])->name('post.edit');
        Route::post('/update',[PostController::class,'update'])->name('post.update');
        Route::get('/delete',[PostController::class,'delete'])->name('post.delete');
        Route::post('/destroy',[PostController::class,'destroy'])->name('post.destroy');

        Route::get('/addComment',[CommentController::class,'create'])->name('comment.add');
    });

     //   Route::post('comment/store',[CommentController::class,'store'])->name('comment.store');

/*
    Route::group(['prefix'=>'{comment}'],function(){
        Route::get('comment/edit',[CommentController::class,'edit'])->name('comment.edit');
        Route::post('comment/update',[CommentController::class,'update'])->name('comment.update');
        Route::get('comment/delete',[CommentController::class,'delete'])->name('comment.delete');
        Route::post('comment/destroy',[CommentController::class,'destroy'])->name('comment.destroy');


    });*/
/*    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('post.edit');
    Route::post('posts/update/{id}',[PostController::class,'update'])->name('post.update');
    Route::get('Delete/{id}',[PostController::class,'delete']);
    Route::get('list',[PostController::class,'list']);*/

});



Route::middleware('auth')->prefix('comment')->group(function () {

    Route::post('/store',[CommentController::class,'store'])->name('comment.store');

    Route::group(['prefix'=>'{comment}'],function(){
        Route::get('/edit',[CommentController::class,'edit'])->name('comment.edit');
        Route::post('/update',[CommentController::class,'update'])->name('comment.update');
        Route::get('/delete',[CommentController::class,'delete'])->name('comment.delete');
        Route::post('/destroy',[CommentController::class,'destroy'])->name('comment.destroy');


    });




});







require __DIR__.'/auth.php';
