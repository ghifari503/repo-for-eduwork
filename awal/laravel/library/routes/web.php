<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TransactionController;
use App\Models\User;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/catalogs', [CatalogController::class, 'index']);
Route::get('/catalogs/create', [CatalogController::class, 'create']);
Route::post('/catalogs', [CatalogController::class, 'store']);
Route::get('/catalogs/{catalog}/edit', [CatalogController::class, 'edit']);
Route::put('/catalogs/{catalog}', [CatalogController::class, 'update']);
Route::delete('/catalogs/{catalog}', [CatalogController::class, 'destroy']);

Route::resource('books', BookController::class);
Route::get('/api/books', [BookController::class, 'api']);

Route::resource('members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'api']);

Route::resource('authors', AuthorController::class);
Route::get('/api/authors', [AuthorController::class, 'api']);

Route::resource('publishers', PublisherController::class);
Route::get('/api/publishers', [PublisherController::class, 'api']);

Route::resource('transactions', TransactionController::class);
Route::get('/api/transactions', [TransactionController::class, 'api']);

Route::get('/test-spatie', function () {
    // $role = Role::create(['name' => 'admin']);
    // $permission = Permission::create(['name' => 'view transactions']);

    // $role->givePermissionTo($permission);
    // $permission->assignRole($role);

    // $user = auth()->user();
    // $user->assignRole('admin');

    // $user = User::with('roles')->get();
    // return $user;

     // $user = auth()->user();
    // $user->removeRole('admin');
});
