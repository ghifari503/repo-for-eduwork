<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    // protected $fillable = ['Name'];
    protected $fillable = ['name', 'email', 'phone', 'address', '[_token]'];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }
}
