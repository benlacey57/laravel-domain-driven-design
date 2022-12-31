<?php

use App\Http\Controllers\SystemConfigController;
use Illuminate\Support\Facades\Route;

Route::get('system-config', [SystemConfigController::class, 'show'])->name('system-config');
Route::post('system-config/update', [SystemConfigController::class, 'update'])->name('system-config.update');
