<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use  Illuminate\Database\Eloquent\Factories\HasFactory;
class Author extends Authenticatable
{
    use SoftDeletes,HasFactory;

    protected $fillable = ['code', 'name', 'country', 'library_id', 'password','email'];

    protected $hidden = ['password'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
