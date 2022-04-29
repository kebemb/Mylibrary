<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'year_publication',
        'edition_home',
        'edition_date',
        'category_id'
    ];

     /**
     * Get the auther that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author() {
        return $this->belongToMany(Author::class, 'book_authors', 'author_id', 'book_id');
    }

    /**
     * Get the category that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function exemplaire() {
        return $this->hasMany(Examplaire::class, 'book_id');
    }
}
