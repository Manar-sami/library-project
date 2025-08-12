<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'country', 'library_id', 'password'];

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
