<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeContrller;
use App\Http\Controllers\AuthorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeContrller::class,'index'])->name('/');
Route::get('/blog-details/{slug}',[HomeContrller::class,'blogDetails'])->name('blog.details');
Route::get('/blogUser-register',[HomeContrller::class,'blogUserRegister'])->name('blogUser.register');

Route::post('/new-user',[HomeContrller::class,'saveUser'])->name('new.user');
Route::get('/customer-logout',[HomeContrller::class,'customerLogout'])->name('customer.logout');
Route::get('/customer-login',[HomeContrller::class,'customerLogIn'])->name('customer.login');
Route::post('/customer-login',[HomeContrller::class,'customerLogInCheck'])->name('customer.login');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');


    Route::get('/add-category',[CategoryController::class,'addCategory'])->name('add.category');
    Route::get('/manage-category',[CategoryController::class,'manageCategory'])->name('manage.category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');
    Route::post('/delete-category/{id}',[CategoryController::class,'deleteCategory'])->name('delete.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update.category');

    Route::get('/add-blog',[BlogController::class,'addBlog'])->name('add.blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');
    Route::get('/manageBlog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/blogState/{id}',[BlogController::class,'changeState']) ->name('state.blog');
    Route::get('/editBlog/{id}',[BlogController::class,'editBlog']) ->name('edit.blog');
    Route::post('/updateBlog',[BlogController::class,'updateBlog']) ->name('update.blog');
    Route::post('/deleteBlog',[BlogController::class,'deleteBlog']) ->name('delete.blog');

    Route::get('/author',[AuthorController::class,'index'])->name('add.author');
    Route::post('/author',[AuthorController::class,'saveAuthor'])->name('new.author');

});























