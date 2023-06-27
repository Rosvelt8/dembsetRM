<?php

namespace App\Http\Controllers\Demsbet;

use App\Http\Middleware\verifpriv;
use Illuminate\Support\Facades\Route;
use App\Models\Choix;
use App\Models\Pronostique;
use Illuminate\Http\Request;


Route::get('/', [LoginController::class, 'index'])->name('/');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login/login', [LoginController::class, 'login'])->name('login/login');

// ------------ 
Route::middleware([verifpriv::class])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    Route::get('paris', [ParisController::class, 'index'])->name('paris');

    Route::get('compte', [MoneyController::class, 'index'])->name('compte');
    Route::get('token', [MoneyController::class, 'deposit'])->name('token');
    Route::post('retirer', [MoneyController::class, 'retirer'])->name('retirer');
    Route::post('deposer', [MoneyController::class, 'deposer'])->name('deposer');
    
    Route::get('match', [MatchController::class, 'index'])->name('match');
    Route::post('parier', [MatchController::class, 'parier'])->name('parier');

});

Route::get('signup', [SignUpController::class, 'index'])->name('signup');
Route::post('signup/signup', [SignUpController::class, 'signup'])->name('signup/signup');

// ------------ 

Route::get('admin/home', [AdminController::class, 'index'])->name('admin/home');

Route::get('admin/match', [AdminController::class, 'match'])->name('admin/match');
Route::post('admin/match/store', [AdminController::class, 'matchstore'])->name('admin/match/store');

Route::get('admin/pronostique', [AdminController::class, 'pronostique'])->name('admin/pronostique');
Route::post('admin/pronostique/store', [AdminController::class, 'pronostiquestore'])->name('admin/pronostique/store');

Route::get('admin/resultats', [AdminController::class, 'resultats'])->name('admin/resultats');
Route::post('admin/resultats/store', [AdminController::class, 'resultatstore'])->name('admin/resultats/store');

Route::get('admin/choix', [AdminController::class, 'choix'])->name('admin/choix');
Route::post('admin/choix/store', [AdminController::class, 'choixstore'])->name('admin/choix/store');

Route::get('getpronosbymatch', static function(request $request){
    return Pronostique::getAllPronos(['pronostique.idmatch'=> $request->match]);
} );

Route::get('getchoixbypronos', static function(request $request){
    return Choix::getAllChoixEnAttente(['choix.idprono'=> $request->prono]);
} );

    




