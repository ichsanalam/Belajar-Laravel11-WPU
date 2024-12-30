<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create();
        // atau buat manual
        Category::create([
            'name' => 'Web Design',
            'Slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'UI UX',
            'Slug' => 'ui-ux'
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'Slug' => 'machine-learning'
        ]);

        Category::create([
            'name' => 'Data Science',
            'Slug' => 'data-science'
        ]);
    }
}
