<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoryController;
  
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
  
Route::group(['middleware' => ['guest']], function () {
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('users', [UserController::class, 'userList'])->name('users');
    Route::get('create-stories',[StoryController::class, 'create'])->name('create.stories');
    Route::get('edit-stories/{slug}',[StoryController::class,'edit'])->name('stories.edit');
    Route::get('delete-stories/{id}',[StoryController::class,'destory'])->name('stories.delete');
    Route::get('view-story/{username}/{slug}',[StoryController::class,'view'])->name('stories.view');
    Route::post('update-stories/{slug}',[StoryController::class,'update'])->name('story.update');
    Route::get('list-stories',[StoryController::class, 'list'])->name('list.stories');
    Route::post('store-stories',[StoryController::class, 'store'])->name('story.store');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});