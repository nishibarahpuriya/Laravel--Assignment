<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('books',[BookController::class, 'list'])->name('list.books');
Route::get('view-book/{id}',[BookController::class,'view'])->name('books.view');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('users', [UserController::class, 'userList'])->name('users');
    Route::get('create-books',[BookController::class, 'create'])->name('create.books');
    Route::get('edit-stories/{slug}',[BookController::class,'edit'])->name('stories.edit');
    Route::get('delete-stories/{id}',[BookController::class,'destory'])->name('stories.delete');
    // Route::get('view-book/{id}',[BookController::class,'view'])->name('books.view');
    Route::post('update-stories/{slug}',[BookController::class,'update'])->name('story.update');
    // Route::get('books',[BookController::class, 'list'])->name('list.books');
    Route::post('store-stories',[BookController::class, 'store'])->name('story.store');
    Route::post('review-add',[BookController::class, 'reviewAdd'])->name('review-add');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});