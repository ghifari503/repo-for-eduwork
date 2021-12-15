<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/members', [MemberController::class, 'index'])->name('members');


Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
Route::get('/catalogs/create', [CatalogController::class, 'create'])->name('createCatalogs');
Route::post('/catalogs', [CatalogController::class, 'store'])->name('storeCatalogs');
Route::get('/catalogs/{catalog}/edit', [CatalogController::class, 'edit'])->name('editCatalogs');
Route::put('/catalogs/{catalog}', [CatalogController::class, 'update'])->name('updateCatalogs');
Route::delete('/catalogs/{catalog}', [CatalogController::class, 'destroy'])->name('deleteCatalogs');

Route::resource('publishers', PublisherController::class, [
    'except' => 'show'
]);

Route::resource('authors', AuthorController::class, [
    'except' => 'show'
]);
