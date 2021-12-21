<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index']);
Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);//untuk menampilkan form add input
Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);//proses penambahan catalog
Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);//untuk menampilkan form edit
Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);//untuk menampilkan form edit
Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);//proses delete


// Route::get('/publishers', [App\Http\Controllers\PublisherController::class, 'index']);
// Route::get('/publishers/create', [App\Http\Controllers\PublisherController::class, 'create']);
// Route::post('/publishers', [App\Http\Controllers\PublisherController::class, 'store']);
// Route::get('/publishers/{publisher}/edit', [App\Http\Controllers\PublisherController::class, 'edit']);
// Route::put('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
// Route::delete('/publishers/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);

//route ini untuk menggantikan 6 routes default yg ada di controller publisher
Route::resource('/publishers', App\Http\Controllers\PublisherController::class); 
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']); 


//route ini untuk menggantikan 6 routes default yg ada di controller author
Route::resource('/authors', App\Http\Controllers\AuthorController::class); 
Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']); 


Route::get('/members', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']); 

Route::get('/books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transactionDetails', [App\Http\Controllers\TransactionDetailController::class, 'index']);
