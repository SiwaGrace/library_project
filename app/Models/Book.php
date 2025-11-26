<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['title','author','description','available','category_id'];
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function borrows()
{
    return $this->hasMany(Borrow::class);
}

}
