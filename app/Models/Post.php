<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'posts_categories', 'post_id', 'category_id');
    }
}
