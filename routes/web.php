<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PlayerAuthController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\presidentTeamController;
use App\Http\Controllers\PresidentAsoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [PostController::class,'index'])->name('posts.index');

require __DIR__.'/auth.php';

Route::get('president/index', [presidentTeamController::class, 'index'])->name('president.index');
Route::get('player/index', [PlayerAuthController::class, 'index'])->name('player.index');
Route::get('/teams/index',[TeamsController::class, 'index'])->name('teams.index');


//! ADMINISTRADOR
Route::middleware(['auth', 'rol:1'])->group(function () {
    //? ====================================== PRESIDENTE EQUIPO ==========================================
    // Route::post('president/create', [presidentTeamController::class, 'store'])->name('president.register');
    // Route::get('president/create', [presidentTeamController::class, 'create'])->name('president.create');

    //? ========================================== EQUIPOS ================================================
    // Route::post('/teams/create',[TeamsController::class, 'store'])->name('teams.register');
    // Route::get('/teams/create',[TeamsController::class, 'create'])->name('teams.create');

    //? ========================================== ADMIN ================================================
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');

    //? ========================================== JUGADOR =======================================
    Route::post('player/create', [PlayerAuthController::class, 'store'])->name('player.register');
    Route::get('player/create', [PlayerAuthController::class, 'create'])->name('player.create');

    //? ====================================== PRESIDENTE ASO ==========================================
    Route::get('presidentaso/index', [presidentAsoController::class, 'index'])->name('presidentaso.index');
    Route::post('presidentaso/create', [presidentAsoController::class, 'store'])->name('presidentaso.register');
    Route::get('presidentaso/create', [presidentAsoController::class, 'create'])->name('presidentaso.create');
});

//! PRESIDENTE EQUIPOS
Route::middleware(['auth', 'rol:2'])->group(function () {
    //? ========================================== JUGADOR =======================================
    Route::post('player/create', [PlayerAuthController::class, 'store'])->name('player.register');
    Route::get('player/create', [PlayerAuthController::class, 'create'])->name('player.create');
});

//! PRESIDENTE ASOCIACIÓN
Route::middleware(['auth', 'rol:3'])->group(function () {
    //? ========================================== JUGADOR =======================================
    Route::post('/teams/create',[TeamsController::class, 'store'])->name('teams.register');
    Route::get('/teams/create',[TeamsController::class, 'create'])->name('teams.create');

    //? ====================================== PRESIDENTE EQUIPO ==========================================
    Route::post('president/create', [presidentTeamController::class, 'store'])->name('president.register');
    Route::get('president/create', [presidentTeamController::class, 'create'])->name('president.create');
});

//! JUGADOR
Route::middleware(['auth', 'rol:4'])->group(function () {
    
});