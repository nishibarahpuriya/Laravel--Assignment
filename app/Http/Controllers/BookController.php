<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GrahamCampbell\Markdown\Facades\Markdown;
use Session;
use App\Helpers\CommonHelper;
use App\Models\User;
use App\Models\book;
use App\Models\BookCategory;
use App\Models\Auther;
use App\Models\BookAuther;
use App\Models\Review;

class BookController extends Controller
{
    public function __construct(CommonHelper $helper){
        $this->helper = $helper;
    }
     /**
     * List Books.
     *
     * @return Array
     */
    public function list(Request $request){
        try{
            $user = Auth::user();
            $params= $request->all();
            $perPage =  10;
            $page = (int) $request->get('page');
            $page = empty($page) ? 1 : $page;
            $skip = $perPage * ($page-1);
            $booksCount = Book::booksSearch($request, $perPage, $skip, $isCount=true);
            $pagination = $this->createPaginationArray($page, $perPage, $booksCount, $params, 'list.books');
            $books = Book::booksSearch($request, $perPage, $skip);
            return view('books.books_list',['books'=>$books,'pagination'=>$pagination, 'params'=>$params]);
        }catch(\Exception $e){
            return $this->helper->handleException($e);
        }
    }
    /**
     * Show Add form.
     *
     * @return view
     */
    public function create()
    {
        $bookCategory = BookCategory::all();
        $bookAuthors = Auther::all();
        return view('books.create_books',['bookCategory'=>$bookCategory,'bookAuthors'=>$bookAuthors]);
    }
    /**
     * Add Books.
     *
     * @return Array
     */
    public function store(Request $request)
    {
        try{
        $userId = Auth::user()->id;
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required',
            'price' => 'required',
            'author' => 'required',
            'description' => 'required'
        ]);
            $bookObj = new Book();
            $bookObj->title = $request->get('title');
            $bookObj->description = $request->get('description');
            $bookObj->price = $request->get('price');
            $bookObj->category_id = $request->get('category');
            $bookObj->save();
                if(isset($bookObj->id)){
                    $bookAutherObj = new BookAuther();
                    $bookAutherObj->auther_id = $request->get('author');
                    $bookAutherObj->book_id = $bookObj->id;
                    $bookAutherObj->save();
                }

        return redirect()->route('list.books')->with('message', 'Book Created Successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }
    /**
     * Add reviews.
     *
     * @return Array
     */
    public function reviewAdd(Request $request){
        try{
            $userId = Auth::user()->id;
            $request->validate([
                'rating' => 'required',
                'review' => 'required',
            ]);
            $reviewObj = new Review();
            $reviewObj->rating = $request->get('rating');
            $reviewObj->review = $request->get('review');
            $reviewObj->book_id = $request->get('bookId');
            $reviewObj->user_id =  $userId;
            $reviewObj->save();
            return redirect()->route('books.view',[$request->get('bookId')])->with('message', 'Book Created Successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    /**
     * Show view.
     *
     * @return Array
     */
    public function view(Request $request, $bookId){
        try {
            $bookDetail =Book::where('id',$bookId)->first();
            if(!empty(Auth::user()->id)){
                $reviewDone = Review::where('user_id',Auth::user()->id)->where('book_id',$bookId)->first();
            }else{
                $reviewDone=[];
            }
            $reviews = Review::allReviews($request,$bookId);
            return view('books.view_books',['reviewDone'=>$reviewDone,'reviews'=>$reviews,'bookDetail'=>$bookDetail]); 
            
         } catch (Exception $e) {
             return back()->with('error', $e->getMessage());
        }
    }
    /**
     * Pagination.
     *
     * @return Array
     */
    private function createPaginationArray($page, $perPage, $booksCount, $params, $route){

        $totalPages = (int) ceil($booksCount/$perPage);
        $previousPage = ($page == 1) ? 1 : ($page-1);
        $nextPage = ($page == $totalPages) ? $totalPages : ($page+1);
        $totalButtonShow = config('global.number_of_buttons_for_pagination');
        $firstCase = (int) ceil($totalButtonShow/2);
        $secondCase = (int) floor($totalButtonShow/2);
        $thirdCase = (int) floor(($totalButtonShow-4)/2);
        $pageButtonArray = [];
        if($totalPages > $totalButtonShow){
            if($page <= $firstCase){
                for ($i = 1; $i <= $totalButtonShow-2; $i++){
                    $params['page'] = $i;
                    $pageLink = route($route, $params);
                    $pageButtonArray[] = ['page_number'=>$i, 'pageLink'=>$pageLink];
                }
                $pageButtonArray[] = ['page_number'=>'...', 'pageLink'=>'javascript:void(0)'];
                $params['page'] = $totalPages;
                $pageButtonArray[] = ['page_number'=>$totalPages, 'pageLink'=>route($route, $params)];
            }elseif($page >= $totalPages-$secondCase && $page <= $totalPages){
                $params['page'] = 1;
                $pageButtonArray[] = ['page_number'=>1, 'pageLink'=>route($route, $params)];
                $pageButtonArray[] = ['page_number'=>'...', 'pageLink'=>'javascript:void(0)'];
                for ($i = $totalPages-($totalButtonShow-3); $i <= $totalPages; $i++){
                    $params['page'] = $i;
                    $pageLink = route($route, $params);
                    $pageButtonArray[] = ['page_number'=>$i, 'pageLink'=>$pageLink];
                }
            }else{
                $params['page'] = 1;
                $pageButtonArray[] = ['page_number'=>1, 'pageLink'=>route($route, $params)];
                $pageButtonArray[] = ['page_number'=>'...', 'pageLink'=>'javascript:void(0)'];
                for ($i = $page-$thirdCase; $i <= $page+$thirdCase; $i++){
                    $params['page'] = $i;
                    $pageLink = route($route, $params);
                    $pageButtonArray[] = ['page_number'=>$i, 'pageLink'=>$pageLink];
                }
                $pageButtonArray[] = ['page_number'=>'...', 'pageLink'=>'javascript:void(0)'];
                $params['page'] = $totalPages;
                $pageButtonArray[] = ['page_number'=>$totalPages, 'pageLink'=>route($route, $params)];
            }
        }else{

            for ($i = 1; $i <= $totalPages; $i++){

                $params['page'] = $i;
                $pageLink = route($route, $params);
                $pageButtonArray[] = ['page_number'=>$i, 'pageLink'=>$pageLink];
            }
        }

        $pagination = [
            'previousPage'=>$previousPage,
            'nextPage'=>$nextPage,
            'page' => $page,
            'totalPages' => $totalPages,
            'pageButtonArray' => $pageButtonArray
        ];

        return $pagination;
    }
}
