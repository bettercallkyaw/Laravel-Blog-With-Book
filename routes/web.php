<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/posts',function(){
//     return 'Post List';
// });

// Route::get('/posts/show',function(){
//     return 'Post Show';
// })->name('posts.show');

//dynamic route
// Route::get('/posts/show/{id}',function($id){
//     return "Post Show-$id";
// });

// Route::get('/posts/more',function(){
//     //return redirect('/posts/show');
//     return redirect()->route('posts.show');
// });

Route::get('/',[PostController::class,'index'])->name('all.posts');
Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/show/{id}',[PostController::class,'show']);
Route::get('/posts/create',[PostController::class,'create']);
Route::post('/posts/create',[PostController::class,'store']);
Route::get('/posts/delete/{id}',[PostController::class,'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
