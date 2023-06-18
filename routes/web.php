<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;

use App\Http\Controllers\ProfileController;
use App\Models\Projects;
use App\Models\Tasks;
use Illuminate\Foundation\Application;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Begin Custom Routes for WCS_PM Site
 */
Route::resource('tasks', TasksController::class)->only(['index', 'store'])->middleware(['auth', 'verified']);
Route::resource('projects', ProjectsController::class)->only(['index', 'store'])->middleware(['auth', 'verified']);

 /**
 * End Custom Routes for WCS_PM Site
 */



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
