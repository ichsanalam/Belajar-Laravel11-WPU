<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'judul artikel 1',
                'author' => 'Ichsan Alam Fadillah',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum facere consequatur, sint consequuntur obcaecati quibusdam necessitatibus, perferendis error tenetur rerum voluptatibus, voluptas dolorum ipsam aperiam. Facilis nesciunt velit fuga soluta!',
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'judul artikel 2',
                'author' => 'Dadang',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea, cupiditate nostrum beatae adipisci eos optio repellat, incidunt cum laboriosam id aliquid molestiae amet! Adipisci expedita suscipit delectus autem inventore debitis.'
            ]
        ]
    ]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/posts/{slug}', function ($slug) {
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'judul artikel 1',
            'author' => 'Ichsan Alam Fadillah',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum facere consequatur, sint consequuntur obcaecati quibusdam necessitatibus, perferendis error tenetur rerum voluptatibus, voluptas dolorum ipsam aperiam. Facilis nesciunt velit fuga soluta!',
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'judul artikel 2',
            'author' => 'Dadang',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea, cupiditate nostrum beatae adipisci eos optio repellat, incidunt cum laboriosam id aliquid molestiae amet! Adipisci expedita suscipit delectus autem inventore debitis.'
        ]
    ];

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
