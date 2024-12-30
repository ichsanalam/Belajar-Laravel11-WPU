<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // default dari laravel
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // membaut seeder custom sendiri (manual)
        // User::create([
        //     'name' => 'Ichsan Alam Fadillah',
        //     'username' => 'ichsanalam',
        //     'email' => 'ichsanalam@gmail.com',
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-desgin',
        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => "Laravel 11 introduces a streamlined application structure for new Laravel applications, without requiring any changes to existing applications. The new application structure is intended to provide a leaner, more modern experience, while retaining many of the concepts that Laravel developers are already familiar with. Below we will discuss the highlights of Laravel's new application structure.",
        // ]);

        // membuat seeder otomatis menggunakan factory
        // Post::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     User::factory(5)->create()
        // ])->create();
        // bisa juga menambahkan seeder custom kedalam factory, dengan menyisipkan variabel
        // php artisan migrate:fresh --seed

        // bisa juga dipisahkan seedernya agar lebih rapih
        // 1. panggil dulu seedernya
        $this->call([CategorySeeder::class, UserSeeder::class]);
        // 2. setelah itu di recycle, kita panggil semua
        Post::factory(100)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
