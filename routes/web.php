<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StafApotekController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pelanggan', PelangganController::class);
Route::resource('staf', StafApotekController::class);
Route::resource('obat', ObatController::class);

// Export Routes
Route::get('pelanggan-export-excel', [PelangganController::class, 'exportExcel'])->name('pelanggan.export_excel');
Route::get('staf-export-excel', [StafApotekController::class, 'exportExcel'])->name('staf.export_excel');
Route::get('obat-export-excel', [ObatController::class, 'exportExcel'])->name('obat.export_excel');

// Pelanggan Import
Route::get('pelanggan-import', [PelangganController::class, 'showImportForm'])->name('pelanggan.show_import_form');
Route::post('pelanggan-import', [PelangganController::class, 'importExcel'])->name('pelanggan.import_excel');

// Staf Apotek Import
Route::get('staf-import', [StafApotekController::class, 'showImportForm'])->name('staf.show_import_form');
Route::post('staf-import', [StafApotekController::class, 'importExcel'])->name('staf.import_excel');

// Obat Import
Route::get('obat-import', [ObatController::class, 'showImportForm'])->name('obat.show_import_form');
Route::post('obat-import', [ObatController::class, 'importExcel'])->name('obat.import_excel');
