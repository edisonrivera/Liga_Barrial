<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PlayerAuthController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\presidentTeamController;
use App\Http\Controllers\AdminController;
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
Route::get('/teams', [TeamsController::class, 'viewMatches'])->name('teams');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [PostController::class,'index'])->name('posts.index');

require __DIR__.'/auth.php';


Route::middleware(['auth', 'rol:1'])->group(function () {
    //! ========================================== SECRETARIOS ===========================================
    Route::get('secretaries/index', [SecretaryController::class, 'index'])->name('secretaries.index');
    Route::post('secretaries/create', [SecretaryController::class, 'store'])->name('secretaries.register');
    Route::get('secretaries/create', [SecretaryController::class, 'create'])->name('secretaries.create');

    //! ====================================== PRESIDENTE EQUIPO ==========================================
    Route::get('president/index', [presidentTeamController::class, 'index'])->name('president.index');
    Route::post('president/create', [presidentTeamController::class, 'store'])->name('president.register');
    Route::get('president/create', [presidentTeamController::class, 'create'])->name('president.create');

    //! ========================================== EQUIPOS ================================================
    Route::get('/teams/index',[TeamsController::class, 'index'])->name('teams.index');
    Route::post('/teams/create',[TeamsController::class, 'store'])->name('teams.register');
    Route::get('/teams/create',[TeamsController::class, 'create'])->name('teams.create');

    //! ========================================== ADMIN ================================================
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');

    //! ========================================== JUGADOR =======================================
    Route::get('player/index', [PlayerAuthController::class, 'index'])->name('player.index');
    Route::post('player/create', [PlayerAuthController::class, 'store'])->name('player.register');
    Route::get('player/create', [PlayerAuthController::class, 'create'])->name('player.create');
});