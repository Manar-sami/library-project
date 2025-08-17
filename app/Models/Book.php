<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  Illuminate\Database\Eloquent\Factories\HasFactory;
class Book extends Model
{
     use SoftDeletes,HasFactory;
    protected $fillable = ['title', 'library_id', 'price', 'cover_path'];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}

