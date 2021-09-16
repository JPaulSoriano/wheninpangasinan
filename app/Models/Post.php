<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use \Conner\Tagging\Taggable;
    
    protected $fillable = [
        'title', 'content', 'image', 'category_id', 'user_id', 'featured'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
