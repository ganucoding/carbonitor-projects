<?php

use App\Http\Controllers\ProjectController;
use App\Livewire\Public\Projects\ProjectsListingLivewire;
use Illuminate\Support\Facades\Route;

/* Laravel */

Route::resource('projects', ProjectController::class)->only('show');

/* Livewire */
Route::get('/', ProjectsListingLivewire::class);
Route::get('/projects-listing', ProjectsListingLivewire::class);
Route::get('/view-certification-documents/{project}', [ProjectController::class, 'viewCertificationDocuments'])->name('projects.viewCertificationDocuments');

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
