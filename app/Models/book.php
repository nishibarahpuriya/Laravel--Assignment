<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable =[
        'title','description','price','category_id'
    ];
    public function category()
    {
        return $this->belongsTo(bookCategory::class);
    }

    public function author()
    {
        return $this->belongsToMany(Book::class, 'book_authers', 'auther_id', 'book_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
        /*
    |Search books
    */
    public static function booksSearch($request, $perPage, $skip, $isCount=false, $status=NULL){
        $books = new Book();
        $books = $books->select('books.*');
        if($isCount)
            $books = $books->count();
        else
            $books = $books->skip($skip)->take($perPage)->orderBy('books.created_at', 'DESC')->get();

        return $books;
    }

    /*
    get avg rating
    */
    public function avgRating(){
        $avgRating = Review::where('book_id',$this->id)->avg('rating');
        return round($avgRating,1);
    }
}
