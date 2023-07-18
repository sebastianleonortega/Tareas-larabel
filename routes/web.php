<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodosController;
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

Route::get('/task',[TodosController::class, 'index'])->name('todos');

Route::post('/task', [TodosController::class, 'store'])->name('todos');

Route::get('/task/{id}', [TodosController::class, 'show'])->name('todos-edit');
Route::patch('/task/{id}', [TodosController::class, 'update'])->name('todos-update');
Route::delete('/task/{id}', [TodosController::class, 'destroy'])->name('todos-destroy');

Route::resource('categories', CategoryController::class);
