<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function books() {
        return $this->belongToMany(Book::class, 'book_authors', 'book_id', 'author_id');
    }
}
