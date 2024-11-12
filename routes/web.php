<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('list.user');
Route::get('admin/create-user', [\App\Http\Controllers\AdminController::class, 'create'])->name('create.user');
Route::post('admin/save-user', [\App\Http\Controllers\AdminController::class, 'save'])->name('save.user');

Route::get('admin/edit-user/{id}', [\App\Http\Controllers\AdminController::class, 'edit'])->name('edit.user');
Route::post('admin/update-user', [\App\Http\Controllers\AdminController::class, 'update'])->name('update.user');

Route::get('admin/delete-user/{id}', [\App\Http\Controllers\AdminController::class, 'delete'])->name('delete.user');
Route::get('admin/activate-user/{id}', [\App\Http\Controllers\AdminController::class, 'activate'])->name('activate.user');
Route::get('admin/force-delete-user/{id}', [\App\Http\Controllers\AdminController::class, 'forceDelete'])->name('force.delete.user');
