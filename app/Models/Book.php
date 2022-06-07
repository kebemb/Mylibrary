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
        'author_id',
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
    public function author() 
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the category that owns the book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function exemplaire() 
    {
        return $this->hasMany(Examplaire::class);
    }
    public function bookAuthor() 
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function emprunt() 
    {
        return $this->hasMany(Emprunt::class);
    }
}
