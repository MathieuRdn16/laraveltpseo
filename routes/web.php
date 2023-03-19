<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/ajoutArticle', [ArticleController::class, 'index'])->name("ajoutArticle");
Route::get('/insertArticle', [ArticleController::class, 'insert'])->name("ajouterArticle");
Route::get('/listeArticle', [ArticleController::class, 'liste'])->name("listeArticle");
Route::get('/ficheArticle/{id}', [ArticleController::class, 'fiche'])->name('ficheArticle');
Route::get('/', [ArticleController::class, 'liste'])->name("listeArticle");


