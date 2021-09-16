<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create 10 categories
        // factory(App\Models\Category::class, 10)->create()->each(function ($category) {

        //     // Create 10 posts for each category
        //     $posts = factory(App\Models\Post::class, 10)->make();
        //     $category->posts()->saveMany($posts);

        // });
        Category::factory()->count(10)->has(Post::factory()->count(10), 'posts')->create();
    }
}
