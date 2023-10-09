<?php

use App\Http\Controllers\WebBookController;
use App\Http\Controllers\WebReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/books/detail/{id}', [WebBookController::class,'detail']);

Route::get('/', [WebBookController::class, 'index']);

Route::post('/reviews/add', [WebReviewController::class, 'create']);

Route::get('/reviews/delete/{id}', [WebReviewController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
