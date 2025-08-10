<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'library_id', 'price', 'cover_path'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
