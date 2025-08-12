<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Library extends Model
{
        use SoftDeletes;
   protected $fillable = ['name', 'country_code'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }
}
