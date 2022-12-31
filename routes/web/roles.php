<?php

use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Roles Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for the HHF admin portal features
| related to Roles. These routes are loaded by the RouteServiceProvider
| within a group that contains the "web" middleware group .
|
*/

Route::get('/roles', [RolesController::class, 'index'])->name('roles');
Route::post('/roles', [RolesController::class, 'store'])->name('role.store');
Route::get('/roles/{id}', [RolesController::class, 'show'])->name('role.show');
Route::put('/roles/{id}', [RolesController::class, 'update'])->name('role.update');
