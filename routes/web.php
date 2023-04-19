<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', BaseController::class);

Route::get('/test', function () {
    return Inertia::render('Test');
});

Route::prefix('dashboard')->group(function() {
    Route::prefix('employee')->controller(EmployeeController::class)->group(function() {
        Route::get('/', 'dashboard');
    });

    Route::prefix('admin')->controller(AdminController::class)->group(function() {
        Route::get('/', 'dashboard');
    });
});