<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::controller(HomeController::class)->group(function(){
    Route::get('/' , 'index');
});

Route::controller(BlogController::class)->group(function(){
    Route::get('blog/{slug}' , 'index')->name('blog.show');
});
Route::controller(CategoriesController::class)->group(function(){
    Route::get('category/{id}' , 'index')->name('category.show');
});
