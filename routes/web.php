<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
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

//Route d'entrée du site
Route::get('/', function () {
    return view('welcome');
});

//Route pour la connection
// Route::get('login',function(){
//     return "connection";
// })-> name('login');

//Routes de tests d'une catégorie
// Route::get('categories',[CategoryController::class, 'index'])->name('categories.name');
// Route::get('categories/create',[CategoryController::class, 'create'])->name('categories.create');
// Route::get('categories/{category}',[CategoryController::class, 'show']);

// Route::post('categories/',[CategoryController::class, 'store'])->name('categories.store');


//Route qui reprends toutes celle avant en une seule
Route::resource('categories', CategoryController::class);