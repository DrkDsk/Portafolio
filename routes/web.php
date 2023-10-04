<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TechnologiesController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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
Route::get('project/{project}', [ProjectController::class, 'show'])->name('project.show');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['role:administrador'])->group(function () {
    Route::resource('projects', AdminProjectController::class)->only(['index', 'show', 'store', 'create'])
    ->names([
        'index'  => 'admin.projects.index',
        'show'   => 'admin.projects.show',
        'store'  => 'admin.projects.store',
        'create' => 'admin.projects.create'
    ]);

    Route::prefix('cv')->group(function () {
        Route::resource('/', CVController::class)->only(['index', 'create', 'store'])->names([
            'index'  => 'admin.cv.index',
            'create' => 'admin.cv.create',
            'store'  => 'admin.cv.store'
        ]);
    });

    Route::resource('technologies', TechnologiesController::class)->only(['index','create', 'store', 'edit', 'update'])
    ->names([
        'index'  => 'admin.technologies.index',
        'create' => 'admin.technologies.create',
        'store'  => 'admin.technologies.store',
        'edit'   => 'admin.technologies.edit',
        'update' => 'admin.technologies.update'
    ]);
});

Route::get('download', [CVController::class, 'download'])->name('cv.download');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
