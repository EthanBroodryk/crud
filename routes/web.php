<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiskprofileController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\ImageController;
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



// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::post('/imagestore',[ImageController::class,'storeImages'])->name('storeImage');

    Route::post('/Add Risk Owner',[RiskprofileController::class,'create'])->name('addRiskOwner');
    Route::get('/',[FrontPageController::class,'index'])->name('home');
    Route::post('/Delete Risk',[RiskprofileController::class,'destroy'])->name('riskProfileDelete');
    Route::post('/Update Risk',[RiskprofileController::class,'update'])->name('riskProfileUpdate');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
