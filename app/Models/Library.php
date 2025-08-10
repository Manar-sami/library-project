<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
   protected $fillable = ['name', 'country_code'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
