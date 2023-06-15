<?php

    use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function() {
    Route::get('/', [\App\Http\Controllers\MainController::class, 'index'] )->name('home');
    Route::get('/top_author', [\App\Http\Controllers\MainController::class, 'topAuthor'] )->name('topAuthor');
    Route::get('/top_works', [\App\Http\Controllers\MainController::class, 'topWorks'] )->name('topWorks');
    Route::resource('user', \App\Http\Controllers\Main\User\UserController::class);
    Route::resource('work', \App\Http\Controllers\Main\Work\WorkController::class);
    Route::get('category/{category}', [\App\Http\Controllers\Main\Category\CategoryController::class, 'show'])->name('category.show');
    Route::patch('like/{work}', [\App\Http\Controllers\Main\Work\WorkController::class, 'like'])->name('like');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
