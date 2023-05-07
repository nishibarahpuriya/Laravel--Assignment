<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\bookCategory;
use App\Models\BookAuther;
use App\Models\Auther;
use App\Models\User;
use App\Models\Book;

class Review extends Model
{
    use HasFactory;
    public function Book()
    {
        return $this->hasOne(Book::class,'book_id','id');
    }
    public function givenBy()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public static function allReviews($request,$bookId){
        $user = Auth::user();
        $reviews = new Review();
        if(!empty($bookId)){
            $reviews = $reviews->where('book_id',$bookId);
        }
        $reviews = $reviews->orderBy('id','DESC')->get();
        return $reviews;

    }
}
