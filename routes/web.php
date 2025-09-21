<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/project', function () {
    return view('project')->name('project');
});
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');