<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/posts', function () {
    $posts = Post::all();
    return view('posts', [
        'title' => 'Blog',
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/author/{user}', function (User $user) {
    return view('posts', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]);
});
