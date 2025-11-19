<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['title','author','description','available'];
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
}
