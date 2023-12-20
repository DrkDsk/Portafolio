<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TechnologiesController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [ProjectController::class, 'index'])->name('home');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('project.show');
Route::get('download', [CVController::class, 'download'])->name('cv.download');
Route::post('contact', [ContactController::class, 'contact'])->name('contact.email');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:administrador']], function () {
    Route::resource('projects', AdminProjectController::class)->except(['edit']);
    Route::resource('cv', CVController::class)->only(['index', 'create', 'store']);
    Route::resource('technologies', TechnologiesController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/foo', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

require __DIR__.'/auth.php';
