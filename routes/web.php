<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', [DocumentController::class, 'index'])->name('documents.index');

Route::get('/upload', function () {
    return view('upload');
})->name('documents.upload.form');

Route::post('/upload', [DocumentController::class, 'upload'])->name('documents.upload');

Route::get('/search', [DocumentController::class, 'showSearchForm'])->name('documents.search.form');

Route::post('/search', [DocumentController::class, 'performSearch'])->name('documents.search');
