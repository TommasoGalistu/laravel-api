<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 100; $i++){

            $post = Post::inRandomOrder()->first();

            $type_id = Type::inRandomOrder()->first()->id;

            $post->types()->attach($type_id);
        }
    }
}
