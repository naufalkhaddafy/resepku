<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {

    $reseps = Recipe::orderBy('created_at', 'desc')->get();
    return view('dashboard', compact('reseps'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resep
    Route::get('/recipe-create', [RecipeController::class, 'create'])->name('recipe.create');
    Route::get('/recipe/{recipe}/detail', [RecipeController::class, 'show'])->name('recipe.show');
    Route::post('/recipe-store', [RecipeController::class, 'store'])->name('recipe.store');
    // Route like
    Route::post('/liking/{id}', [RecipeController::class, 'liking'])->name('liking');
});



require __DIR__ . '/auth.php';
