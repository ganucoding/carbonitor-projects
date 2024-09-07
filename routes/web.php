<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Livewire\Public\Projects\ProjectsListingLivewire;
use App\Livewire\Public\Projects\ViewCertificationDocumentsLivewire;
use Illuminate\Support\Facades\Route;

/* Laravel */

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/projects/learn-more', [HomeController::class, 'projectsLearnMore'])->name('home.projects.learn-more');

Route::resource('projects', ProjectController::class)->only('show');

/* Livewire */
Route::get('/projects-listing', ProjectsListingLivewire::class);
Route::get('/view-certification-documents/{project}', ViewCertificationDocumentsLivewire::class)->name('projects.viewCertificationDocuments');

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
