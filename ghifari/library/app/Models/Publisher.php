<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone_number','address','email'];
    // protected $fillable = ['name', 'email', 'phone', 'address', '[_token]'];

    public function books()
{
    return $this->hasMany(Book::class, 'publisher_id');
}
}
