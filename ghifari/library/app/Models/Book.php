<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // public function Author()
    // {
    //     return $this->belongsTo(Author::class, 'author_id');
    // }

    // public function Publisher()
    // {
    //     return $this->belongsTo(Publisher::class, 'publisher_id');
    // }

    // public function Catalog()
    // {
    //     return $this->belongsTo(Catalog::class, 'catalog_id');
    // }
}
