<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Generator as Faker;
use App\Function\Helper;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 100; $i++) {
            $nw_post = new Post();
            $nw_post->title = $faker->text(20);
            $nw_post->category_id = Category::inRandomOrder()->first()->id;
            $nw_post->slug = Helper::generateSlug($nw_post->title, Post::class);
            $nw_post->description = $faker->text(99);
            $nw_post->added_at = $faker->date('d/m/Y');
            $nw_post->save();

        }
    }
}
