<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function()
{
Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::post('/category/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::post('/category/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::post('/product/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::post('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');

Route::get('/product-categories', [\App\Http\Controllers\ProductController::class, 'productCategories'])->name('product-categories');


});
