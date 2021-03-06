<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examplaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_exemplaires',
        'book_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
