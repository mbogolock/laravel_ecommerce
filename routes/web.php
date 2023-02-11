<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdCatController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/a-propos', [HomeController::class, 'apropos'])->name('apropos');
Route::get('/nos-poduits', [HomeController::class, 'nospoduits'])->name('nospoduits');


Route::get('/nous-contacter', [ContactController::class, 'formcontact'])->name('formcontact');
Route::post('/nous-contacter', [ContactController::class, 'formcreate'])->name('formcreate');
Route::get('/listecontact', [ContactController::class, 'listecontact'])->name('listecontact');


Route::get('/nos-categorie', [CategorieController::class, 'formcategorie'])->name('formcategorie');
Route::post('/nos-categorie', [CategorieController::class, 'formcreatecat'])->name('formcreatecat');
Route::get('/listecategorie', [CategorieController::class, 'listecategories'])->name('listecategories');


Route::get('/nos-produits', [ProduitController::class, 'formproduit'])->name('formproduit');
Route::post('/nos-produits', [ProduitController::class, 'formcreateprod'])->name('formcreateprod');
Route::get('/showpro/{id}', [ProduitController::class, 'show'])->name('show');
Route::get('/editpro/{id}', [ProduitController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ProduitController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [ProduitController::class, 'destroy'])->name('destroy');
Route::get('/listeproduit', [ProduitController::class, 'listeproduits'])->name('listeproduits');



Route::get('/list', [ProdCatController::class, 'showData'])->name('showData');




Route::get('/register', [AdminController::class, 'form_register'])->name('form_register');
Route::get('/login', [AdminController::class, 'form_login'])->name('form_login');
Route::post('/register/traitement', [AdminController::class, 'traitement_register'])->name('traitement_register');
Route::post('/login/traitement', [AdminController::class, 'traitement_login'])->name('traitement_login');
Route::get('/logout', [AdminController::class, 'form_logout'])->name('form_logout');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




