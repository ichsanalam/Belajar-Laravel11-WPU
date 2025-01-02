<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Notes
// cek jumlah query pada laravel menggunakan laravel debugbar
// yg dikomen merupakan contoh mengatasi n+1 problem manual
// cara yg lebih bagus adalah dengan memasukannya kedalam model
// menggunakan eager loading by default

// Kita juga bisa menggunakan Preventing lazy loading adalah teknik untuk memastikan relasi dimuat secara eksplisit melalui eager loading, membantu menghindari N+1 problem
//  dengan menambahkan prevent ke AppServiceProvider

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
    // $posts = Post::all();

    // jika menggunakan relasi, kita bisa terkena n+1 problem
    // untuk mengatasi lazy loading (n+1 problem), kita menggunakan eager loading dengan menambahkan with
    // misal 1 tabel saja
    // $posts = Post::with('author')->latest()->get();

    // apabila 2 tabel, menggunakan array []
    // $posts = Post::with(['author', 'category'])->latest()->get();
    // return view('posts', [
    //     'title' => 'Blog',
    //     'posts' => $posts,
    // ]);

    $posts = Post::latest()->get();
    return view('posts', [
        'title' => 'Blog',
        'posts' => $posts,
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/author/{user:username}', function (User $user) {
    // ini juga n+1 problem, karena menggunakan relasi
    // karena parentnya sudah dipanggil, kita tidak bisa mengguakan with(eager problem), jadi kita menggunakan lazy eager problem menggunakan load
    // return view('posts', ['title' => count($user->posts) .'Articles by ' . $user->name, 'posts' => $user->posts]);

    // $posts = $user->posts->load(['category', 'author']);
    // return view('posts', ['title' => count($posts) .' Articles by ' . $user->name, 'posts' => $posts]);

    return view('posts', ['title' => count($user->posts) .' Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    // tambahkan lagi lazy eager loadingnya
    // $posts = $category->posts->load(['category', 'author']);
    return view('posts', ['title' => 'Categories by ' . $category->name, 'posts' => $category->posts]);
});