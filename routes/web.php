<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AquariumController;
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

Route::get('/',[AquariumController::class, 'index']);

Route::get('/aquarium', [App\Http\Controllers\Admin\AquariumController::class, 'index'])->name('aquarium');


Route::get('/hello','App\Http\Controllers\HelloController@index');

Route::get('/admin','App\Http\Controllers\AdminController@index');

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
//    Route::get('/logout', 'logout')->name('logout');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::get('/search', 'SearchController@index')->name('search');

Route::resource('/admin/aquarium', AquariumController::class);

Route::get('admin/aquarium/{aquarium}/delete', [AquariumController::class, 'delete'])
    ->name('aquarium.delete');

//hier ga je naar  de update pagina
Route::get('admin/aquarium/{aquarium}/update', [AquariumController::class, 'update'])
    ->name('aquarium.update');
// hier ga je naar de edit functie
Route::post('admin/aquarium/{aquarium}/edit', [AquariumController::class, 'edit'])
    ->name('aquarium.edit');
