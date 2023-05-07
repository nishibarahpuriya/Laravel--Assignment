<?php

namespace App\Models;
use App\Models\BookAuther;
use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auther extends Model
{
    use HasFactory;
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authers', 'auther_id','book_id');
    }
}
