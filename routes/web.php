<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts',function(){
    return 'Post List';
});

Route::get('/posts/show',function(){
    return 'Post Show';
})->name('posts.show');

//dynamic route
Route::get('/posts/show/{id}',function($id){
    return "Post Show-$id";
});

Route::get('/posts/more',function(){
    //return redirect('/posts/show');
    return redirect()->route('posts.show');
});
