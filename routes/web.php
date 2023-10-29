<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AquariumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfielController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\CategoriesController;

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
    return view('welcome');
});

//Route::get('/', [HomeController::class, 'home']);
//Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('categories');

Route::get('/categories/{categories}/delete', [CategoriesController::class, 'delete'])->name('categories.delete');

Route::delete('/categories/{categories}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');

Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');

Route::get('/categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('/categories/{category}/update', [CategoriesController::class, 'update'])->name('categories.update');

Route::get('/aquarium', [App\Http\Controllers\Admin\AquariumController::class, 'index'])->name('aquarium');


Route::get('/hello','App\Http\Controllers\HelloController@index')->middleware('auth', 'onlyAdmin');

Route::get('/admin','App\Http\Controllers\AdminController@index');

Route::get('/aquarium/aanzet/{id}', [AquariumController::class, 'aanzet'])->name('aquarium.aanzet');

Route::get('/aquarium/uitzet/{id}', [AquariumController::class, 'uitzet'])->name('aquarium.uitzet');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('auth', 'onlyAdmin');

Route::get('/search', [SearchController::class, 'search'])->name('search.index');


Route::resource('/admin/aquarium', AquariumController::class);

Route::get('admin/aquarium/{aquarium}/delete', [AquariumController::class, 'delete'])
    ->name('aquarium.delete');

//hier ga je naar  de update pagina
Route::get('admin/aquarium/{aquarium}/update', [AquariumController::class, 'update'])
    ->name('aquarium.update');

// hier ga je naar de edit functie
Route::post('admin/aquarium/{aquarium}/edit', [AquariumController::class, 'edit'])
    ->name('aquarium.edit');

// Show user profile
Route::get('/profiel', [ProfielController::class, 'show'])->name('profiel.show');

// Update user profile
Route::put('/profiel', [ProfielController::class, 'update'])->name('profiel.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


