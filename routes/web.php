<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Comment_ArticleController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TypeController;
use App\Http\Livewire\User\UserReviewComponent;

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
////home controller
Route::get('/home',[HomeController::class,'redirect'])->middleware(['auth', 'verified']);
Route::get('/',[HomeController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');})->name('dashboard');


Route::get('/show_blog',[ArticleController::class,'show_blog'] );
Route::get('blog/{slug}', [ArticleController::class,'blog']);

//home controller

Route::get('/donation',[HomeController::class,'donation']);
Route::get('/share_post',[HomeController::class,'share_post']);
Route::get('/adopt',[HomeController::class,'adopt']);
Route::get('/show_sitter',[HomeController::class,'sitter']);
Route::get('/missing',[HomeController::class,'miss']);
Route::get('/article',[HomeController::class,'article']);

Route::middleware(['auth','verified'])->group(function () {

//home controller  
Route::get("/search",[HomeController::class,'search']);
Route::post('/sendmail',[HomeController::class,'sendmail']);


//profile controller

Route::get('/profile',[ProfileController::class,'profile']);
Route::get('/user_profile/{id}',[ProfileController::class,'user_profile']);
Route::get('/update/{id}',[ProfileController::class,'update']);
Route::post('/editprofile/{id}',[ProfileController::class,'editprofile']);

//post controller

Route::post('/post',[PostController::class,'post']);
Route::get('/delete_post/{id}',[PostController::class,'delete']);
Route::get('/createpost',[PostController::class,'createpost']);
Route::post('/update_post/{id}',[PostController::class,'update_post']);
Route::get('/post_display',[PostController::class,'post_display']);


////comment controller

Route::post('comment',[commentController::class,'comment'])->name('comments.store');
Route::get('/delete_comment/{id}',[commentController::class,'delete']);
Route::post('update_comment/{id}',[commentController::class,'update_comment']);

////like controller

Route::post('save-likedislike','likeController@save_likedislike');
Route::get('/post/{post}/like/', [likeController::class,'likepl']);
Route::get('/post/{post}/dislike/', [likeController::class,'dislikepl']);
Route::post('/post/{id}/act', [likeController::class,'actOnPost']);

//sitter Controller

Route::post('/create_request', [SitterController::class,'create_request']);
Route::post('/demande', [SitterController::class,'demande']);
Route::post('/create_sitter', [SitterController::class,'create_sitter'])->middleware(['Sitter']);
Route::post('/update_sitter/{id}', [SitterController::class,'update_sitter'])->middleware(['Sitter']);


//task controller

Route::get('/task', [TaskController::class,'task'])->middleware(['Sitter']);
Route::post('/task_create', [TaskController::class,'task_create'])->middleware(['Sitter']);
Route::post('/task_update/{id}', [TaskController::class,'task_update'])->middleware(['Sitter']);
Route::get('/task_delete/{id}',[TaskController::class,'task_delete'])->middleware(['Sitter']);

//comment_article Contoller
  // add comment
  Route::post('comment/add', [Comment_ArticleController::class,'store']);
  // delete comment
  Route::post('comment/delete/{id}', [Comment_ArticleController::class,'destroy']);


#Manage Review
Route::post('/review-store',[ProfileController::class, 'reviewstore'])->name('review.store');

Route::post('/warning/{id}',[AdminController::class,'warningemail']);

});

Route::middleware(['auth','Access'])->group(function ()
{

////admin controller

Route::get('/acces_approved/{id}',[AdminController::class,'acces_approved']);
Route::get('/acces_denied/{id}',[AdminController::class,'acces_denied']);
Route::get('/approved',[AdminController::class,'show_user_approved']);
Route::get('/denied',[AdminController::class,'show_user_denied']);
Route::get('/warned_user',[AdminController::class,'warning']);


//category controller

Route::get('/category', [CategoryController::class,'category']);
Route::post('/category_create', [CategoryController::class,'category_create']);
Route::post('/category_update/{id}', [CategoryController::class,'category_update']);
Route::get('/category_delete/{id}',[CategoryController::class,'category_delete']);

//sitter controller

Route::get('/sitter', [SitterController::class,'sitter']);
Route::get('/download_cin/{id}', [SitterController::class,'download_cin']);
Route::get('/download_certificat/{id}', [SitterController::class,'download_certificat']);
Route::get('/request', [SitterController::class,'request']);
Route::get('/change_role/{id}',[SitterController::class,'change_role']);
Route::get('/request_demande/{id}',[SitterController::class,'request_demande']);
Route::get('/approved_sitter/{id}', [SitterController::class,'approved_sitter']);
Route::get('/refused_sitter/{id}', [SitterController::class,'refused_sitter']);
Route::get('/approved_demande/{id}', [SitterController::class,'approved_demande']);
Route::get('/refused_demande/{id}', [SitterController::class,'refused_demande']);
//article controller

  // show new blog form
  Route::get('new-post', [ArticleController::class,'create'] );
  // save new blog
  Route::post('new-post',[ArticleController::class,'Store'] );
  // update blog
  Route::post('update', [ArticleController::class,'update']);
  // delete blog
  Route::get('delete/{id}', [ArticleController::class,'destroy']);
  // display user's all blogs
  Route::get('my-all-posts', [ArticleController::class,'index']);
  // display user's drafts
  Route::get('my-drafts', [ArticleController::class,'index']);
    // edit blog form
  Route::get('edit/{slug}', [ArticleController::class,'edit']);
  //display all blogs for admin
  Route::get('/index',[ArticleController::class,'index'] );
  // display single blog
  Route::get('/{slug}', [ArticleController::class,'affiche']);

//breed controller

Route::get('/breed', [BreedController::class,'breed']);
Route::post('/breed_create', [BreedController::class,'breed_create']);
Route::post('/breed_update/{id}', [BreedController::class,'breed_update']);
Route::get('/breed_delete/{id}',[BreedController::class,'breed_delete']);

//type controller

Route::get('/type', [TypeController::class,'type']);
Route::post('/type_create', [TypeController::class,'type_create']);
Route::post('/type_update/{id}', [TypeController::class,'type_update']);
Route::get('/type_delete/{id}',[TypeController::class,'type_delete']);


});












