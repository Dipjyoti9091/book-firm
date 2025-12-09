<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Book
    // Route::resource('books', BookController::class);
    Route::get('books/add_page',[BookController::class,'add_page'])->name('add_page');
    Route::get('books/logout',[BookController::class,'logout'])->name('logout');
    Route::post('books/store_page',[BookController::class,'store_page'])->name('store_page');
    Route::get('books/getSubcategories',[BookController::class,'getSubcategories'])->name('getSubcategories');
    Route::get('books/edit_page/{id}',[BookController::class,'edit_page'])->name('edit_page');
    Route::post('books/update_page',[BookController::class,'update_page'])->name('update_page');
    Route::get('books/list_page',[BookController::class,'list_page'])->name('list_page');
    Route::get('books/delete_page/{id}',[BookController::class,'delete_page'])->name('delete_page');
    //Book

    //Category
    Route::get('category/add_category', [CategoryController::class,'add_category'])->name('add_category');
    Route::post('category/store_category', [CategoryController::class,'store_category'])->name('store_category');
    Route::get('category/edit_category/{id}', [CategoryController::class,'edit_category'])->name('edit_category');
    Route::post('category/update_category', [CategoryController::class,'update_category'])->name('update_category');
    Route::get('category/list_category', [CategoryController::class,'list_category'])->name('list_category');
    Route::get('category/delete_category/{id}', [CategoryController::class,'delete_category'])->name('delete_category');
    //Category

    //Subcategory
    Route::get ('subcategory/add_subcategory', [SubcategoryController::class,'add_subcategory'])->name('add_subcategory');
    Route::post('subcategory/store_subcategory', [SubcategoryController::class,'store_subcategory'])->name('store_subcategory');
    Route::get ('subcategory/edit_subcategory/{id}', [SubcategoryController::class,'edit_subcategory'])->name('edit_subcategory');
    Route::post('subcategory/update_subcategory', [SubcategoryController::class,'update_subcategory'])->name('update_subcategory');
    Route::get ('subcategory/list_subcategory', [SubcategoryController::class,'list_subcategory'])->name('list_subcategory');
    Route::get ('subcategory/delete_subcategory/{id}', [SubcategoryController::class,'delete_subcategory'])->name('delete_subcategory');
    //Subcategory
});

require __DIR__.'/auth.php';
