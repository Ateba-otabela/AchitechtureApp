<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/', function () {
      // load projects with only 1 image for listing
       $projects = Project::with(['images' => function($q) {
        $q->orderBy('id')->limit(1); // first image only
    }])
    ->latest() // order by created_at desc
    ->take(4)  // only 4 recent
    ->get();

       return view('welcome', compact('projects'));
});
Route::get('/project', function () {
    return view('project')->name('project');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
