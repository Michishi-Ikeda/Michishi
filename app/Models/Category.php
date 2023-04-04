<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    public function posts()   
    {
    return $this->hasMany(Post::class);  
    }
    use HasFactory;
    
    public function getByCategory(int $limit_count = 5)
    {
     return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

?>