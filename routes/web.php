<?php

use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/filter', [HomeController::class, 'filterMajor'])->name('filter');
Route::get('/result/{student}', [HomeController::class, 'result'])->name('results');
