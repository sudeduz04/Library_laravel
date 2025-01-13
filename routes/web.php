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
        Route::get('/updateCategory/{id}', [AdminPanelController::class, 'updateCategory'])->name('panel.updateCategory');
        Route::post('/updateCategoryPost', [AdminPanelController::class, 'updateCategoryPost'])->name('panel.updateCategoryPost');
        Route::get('/deleteCategory/{id}', [AdminPanelController::class, 'deleteCategory'])->name('panel.deleteCategory');
        Route::get('/createBook', [AdminPanelController::class, 'createBook'])->name('panel.createBook');
        Route::post('/createBookPost', [AdminPanelController::class, 'createBookPost'])->name('panel.createBookPost');
        Route::get('/listBook', [AdminPanelController::class, 'listBook'])->name('panel.listBook');
        Route::get('/updateBook/{id}', [AdminPanelController::class, 'updateBook'])->name('panel.updateBook');
        Route::post('/updateBookPost', [AdminPanelController::class, 'updateBookPost'])->name('panel.updateBookPost');
        Route::get('/deleteBook/{id}', [AdminPanelController::class, 'deleteBook'])->name('panel.deleteBook');
    });
