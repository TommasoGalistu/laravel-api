<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'category_id',
        'path_img',
        'original_name_img'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
