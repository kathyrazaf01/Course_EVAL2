<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassementController;

use Illuminate\Support\Facades\Route;

Route::get('/indexclient', function () {
    return view('equipe/indexclient');
})->name('indexclient');

Route::get('/indexadmin', function () {
    return view('admin/indexadmin');
})->name('indexadmin');

Route::get('/classementbyetape', function () {
    return view('classement/classementbyetape');
})->name('classementbyetape');

Route::get('/equipedetailetape/{idetape}', [EquipeController::class, 'equipedetailetape'])->name('equipedetailetape');

Route::post('/logindata', [LoginController::class, 'logindata'])->name('logindata');

Route::get('/logoutequipe', [EquipeController::class, 'logoutequipe'])->name('logoutequipe');

Route::post('/insertetapecoureur', [EquipeController::class, 'insertetapecoureur'])->name('insertetapecoureur');

Route::get('/logoutadmin', [AdminController::class, 'logoutadmin'])->name('logoutadmin');

Route::get('/equipebyetape/{idetape}', [AdminController::class, 'equipebyetape'])->name('equipebyetape');

Route::get('/coureurbyequipe/{idetape}', [AdminController::class, 'coureurbyequipe'])->name('coureurbyequipe');

Route::post('/insertempscoureur', [AdminController::class, 'insertempscoureur'])->name('insertempscoureur');

Route::get('/equipedetailetape/{idetape}', [EquipeController::class, 'equipedetailetape'])->name('equipedetailetape');

Route::get('/classementdetailetape/{idetape}', [ClassementController::class, 'classementdetailetape'])->name('classementdetailetape');    

Route::get('/classementbyequipe', [ClassementController::class, 'classementbyequipe'])->name('classementbyequipe');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::get('/button', function () {
    return view('button');
})->name('button');

Route::get('/chart', function () {
    return view('chart');
})->name('chart');

Route::get('/element', function () {
    return view('element');
})->name('element');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/', function () {
    return view('signin');
})->name('signin');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/table', function () {
    return view('table');
})->name('table');

Route::get('/typography', function () {
    return view('typography');
})->name('typography');

Route::get('/widget', function () {
    return view('widget');
})->name('widget');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
