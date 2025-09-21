<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
      // load projects with only 1 image for listing
        $projects = Project::with(['images' => function($q) {
            $q->limit(1);
        }])->get();
       return view('welcome', compact('projects'));
});
Route::get('/project', function () {
    return view('project')->name('project');
});
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
