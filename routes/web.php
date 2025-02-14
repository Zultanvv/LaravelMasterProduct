<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\SampleDataController;

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

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('sample-data', SampleDataController::class);
    Route::get('sample-data-api', [SampleDataController::class, 'indexApi'])->name('sample-data.listapi');
    Route::get('sample-data-export-pdf-default', [SampleDataController::class, 'exportPdf'])->name('sample-data.export-pdf-default');
    Route::get('sample-data-export-excel-default', [SampleDataController::class, 'exportExcel'])->name('sample-data.export-excel-default');
    Route::post('sample-data-import-excel-default', [SampleDataController::class, 'importExcel'])->name('sample-data.import-excel-default');

    Route::resource('master-product', MasterProductController::class);
    Route::get('master-product-api', [MasterProductController::class, 'indexApi'])->name('master-product.listapi');
    Route::get('master-product-export-pdf-default', [MasterProductController::class, 'exportPdf'])->name('master-product.export-pdf-default');
    Route::get('master-product-export-excel-default', [MasterProductController::class, 'exportExcel'])->name('master-product.export-excel-default');
    Route::post('master-product-import-excel-default', [MasterProductController::class, 'importExcel'])->name('master-product.import-excel-default');
});

