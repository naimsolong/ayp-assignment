<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\AllowEditDraftMiddleware;
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

        Route::get('/submit', 'submit');

        Route::post('/draft', 'claimDrafting');

        Route::post('/submit', 'claimSubmission');

        Route::middleware(AllowEditDraftMiddleware::class)->group(function() {
            Route::get('/edit/{claim}', 'edit');
    
            Route::put('/draft/{claim}', 'claimRedraft');
    
            Route::put('/submit/{claim}', 'claimResubmit');
        });
    });

    Route::prefix('admin')->controller(AdminController::class)->group(function() {
        Route::get('/', 'dashboard');

        Route::get('/approval', 'approval');
    });
});