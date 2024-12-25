<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Post
{
    public static function all() {
        return [
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
    }

    public static function find($slug) {
        // public static function find($slug) :array {} untuk memastikan bahwa nilai yang dikembalikan dari fungsi tersebut adalah array jika tidak, maka akan error
        // digunakan untuk debugging

        // untuk mengakses variabel di luar func, bisa memakai use atau memakai arrow func
        // kalo di satu fungsi yg sama tidak perlu pakai Post::all(), bisa pakai static:all()
        $result = Arr::first(static::all(), function($post) use ($slug) {
            return $post['slug'] == $slug;
        });
        // jika link url tidak ada
        if (!$result) {
            abort(404);
        }

        return $result;
    }
}
