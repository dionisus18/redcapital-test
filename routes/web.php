<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\FileManagerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//Route::get('archivos/create', [FileManagerController::class, 'create'])->middleware(['auth']);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/storage/{filename}', [FileManagerController::class, 'download']);

Route::resources([
    'archivos' => FileManagerController::class,
    'usuarios' => UserController::class,
    'menus' => MenuController::class,
    'submenus' => RouteController::class,
]);