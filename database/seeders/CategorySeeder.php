<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Function\Helper;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'Css', 'Javascript', 'PHP', 'Laravel'];

        foreach($data as $category){
            $nw_category = new Category;
            $nw_category->name = $category;
            $nw_category->slug = Helper::generateSlug($nw_category->name, Category::class);
            $nw_category->save();

        }
    }
}
