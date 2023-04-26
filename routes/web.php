<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeletedProjectController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])->name('projects.force-delete');
    Route::patch('/deleted-projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::get('/deleted-projects', [ProjectController::class, 'deleted'])->name('projects.deleted');
    
    Route::resource('deleted-projects', DeletedProjectController::class);
    Route::resource('projects', ProjectController::class)->except('destroy');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::delete('/deleted-projects/{id}', [DeletedProjectController::class, 'destroy'])->name('deleted-projects.destroy');
    


});

require __DIR__.'/auth.php';
