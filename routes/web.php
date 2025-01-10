<?php

use App\Http\Controllers\AdminPanelController;
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

Route::get('', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->prefix('panel')
    ->group(function () {
        Route::get('', [AdminPanelController::class, 'index'])->name('panel.index');
        Route::get('/createCategory', [AdminPanelController::class, 'createCategory'])->name('panel.createCategory');
        Route::post('/createCategoryPost', [AdminPanelController::class, 'createCategoryPost'])->name('panel.createCategoryPost');
        Route::get('/listCategory', [AdminPanelController::class, 'listCategory'])->name('panel.listCategory');
    });
