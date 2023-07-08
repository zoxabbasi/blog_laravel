<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;

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
Route::get('/', [PagesController::class, 'index'])->name('homepage');

Route::controller(PostsController::class)->group( function () {
    Route::get('/blog','index')->name('blog');
    Route::get('/blog/create', 'create')->name('blog.create');
    Route::post('/blog', 'store');
    Route::get('/blog/{slug}', 'show')->name('blog.show');
    Route::get('/blog/{slug}/edit', 'edit')->name('blog.edit');
    Route::post('/blog/{slug}', 'update');
    Route::get('/blog/{slug}/destroy', 'destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
