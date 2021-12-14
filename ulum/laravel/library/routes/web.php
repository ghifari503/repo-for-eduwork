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
Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/members', [MemberController::class, 'index'])->name('members');
