<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bookCategory;
use App\Models\Book;
use App\Models\Auther;

class BookAuther extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasMany(Book::class);
    }
    public function autherName()
    {
        return $this->belongsToMany(Auther::class, 'book_authers', 'id', 'auther_id');
    }
    public function givenBy()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
