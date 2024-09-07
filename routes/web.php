<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Livewire\Public\Projects\CommentsSectionLivewire;
use App\Livewire\Public\Projects\ProjectsListingLivewire;
use App\Livewire\Public\Projects\ViewCertificationDocumentsLivewire;
use App\Livewire\Public\Projects\ViewIssuanceLivewire;
use App\Livewire\Public\Projects\ViewRetirementLivewire;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/projects/learn-more', [HomeController::class, 'projectsLearnMore'])->name('home.projects.learn-more');
Route::resource('projects', ProjectController::class)->only('show');

/* Livewire */
Route::get('/projects-listing', ProjectsListingLivewire::class)->name('projects.projectsListingLivewire');
Route::get('/view-issuance/{project}/{issuance}', ViewIssuanceLivewire::class)->name('projects.viewIssuanceLivewire');
Route::get('/view-certification-documents/{project}', ViewCertificationDocumentsLivewire::class)->name('projects.viewCertificationDocumentsLivewire');
Route::get('/view-retirement/{project}/{retirement}', ViewRetirementLivewire::class)->name('projects.viewRetirementLivewire');
Route::get('/comments-section/{project}', CommentsSectionLivewire::class)->name('projects.commentsSectionLivewire');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
