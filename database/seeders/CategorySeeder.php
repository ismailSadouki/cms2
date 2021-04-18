<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'تكنولوجيا',
            'slug' => 'تكنولوجيا',
            'parent_id' => null,
        ]);

        Category::create([
            'title' => 'فن',
            'slug' => 'فن',
            'parent_id' => null,
        ]);

        Category::create([
            'title' => 'بايوغرافي',
            'slug' => 'بايوغرافي',
            'parent_id' => null,
        ]);

        Category::create([
            'title' => 'اخبار',
            'slug' => 'اخبار',
            'parent_id' => null,
        ]);

        Category::create([
            'title' => 'اقتصاد',
            'slug' => 'اقتصاد',
            'parent_id' => null,
        ]);

        Category::create([
            'title' => 'رياضة',
            'slug' => 'رياضة',
            'parent_id' => null,
        ]);

        Category::create([
            'title' => 'برمجة',
            'slug' => 'برمجة',
            'parent_id' => 1,
        ]);

        Category::create([
            'title' => 'ذكاء اصطناعي',
            'slug' => 'ذكاء اصطناعي',
            'parent_id' => 1,
        ]);


    }
}
