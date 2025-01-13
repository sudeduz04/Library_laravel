<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Relationship with Category
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with Publisher (Publicator)
    public function publicators()
    {
        return $this->belongsTo(Publicator::class, 'pub_id'); // Assuming 'pub_id' is the foreign key
    }

    // Relationship with Author
    public function authors()
    {
        return $this->belongsTo(Author::class, 'author_id'); // Assuming 'author_id' is the foreign key
    }
}

