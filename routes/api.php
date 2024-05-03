<?php

use App\Http\Controllers\AnalisisPenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\InteraksiController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Save Data
Route::post('/save/pelanggan', [PelangganController::class, 'store']);
Route::post('/save/lead', [LeadController::class, 'store']);
Route::post('/save/penjualan', [PenjualanController::class, 'store']);
Route::post('/save/produk', [ProdukController::class, 'store']);
Route::post('/save/sales', [SalesController::class, 'store']);
Route::post('/save/detail-penjualan', [DetailPenjualanController::class, 'store']);
Route::post('/save/analisis-penjualan', [AnalisisPenjualanController::class, 'store']);
Route::post('/save/interaksi', [InteraksiController::class, 'store']);

// Update Data
Route::put('/update/pelanggan/{pelanggan}', [PelangganController::class, 'update']);
Route::put('/update/lead/{lead}', [LeadController::class, 'update']);
Route::put('/update/penjualan/{penjualan}', [PenjualanController::class, 'update']);
Route::put('/update/produk/{produk}', [ProdukController::class, 'update']);
Route::put('/update/sales/{sales}', [SalesController::class, 'update']);
Route::put('/update/detail-penjualan/{detailPenjualan}', [DetailPenjualanController::class, 'update']);
Route::put('/update/analisis-penjualan/{analisisPenjualan}', [AnalisisPenjualanController::class, 'update']);
Route::put('/update/interaksi/{interaksi}', [InteraksiController::class, 'update']);

// Delete Data
Route::delete('/destroy/pelanggan/{pelanggan}', [PelangganController::class, 'destroy']);
Route::delete('/destroy/lead/{lead}', [LeadController::class, 'destroy']);
Route::delete('/destroy/penjualan/{penjualan}', [PenjualanController::class, 'destroy']);
Route::delete('/destroy/produk/{produk}', [ProdukController::class, 'destroy']);
Route::delete('/destroy/sales/{sales}', [SalesController::class, 'destroy']);
Route::delete('/destroy/detail-penjualan/{detailPenjualan}', [DetailPenjualanController::class, 'destroy']);
Route::delete('/destroy/analisis-penjualan/{analisisPenjualan}', [AnalisisPenjualanController::class, 'destroy']);
Route::delete('/destroy/interaksi/{interaksi}', [InteraksiController::class, 'destroy']);

// List Data
Route::get('/list/pelanggan', [PelangganController::class, 'index']);
Route::get('/list/lead', [LeadController::class, 'index']);
Route::get('/list/penjualan', [PenjualanController::class, 'index']);
Route::get('/list/produk', [ProdukController::class, 'index']);
Route::get('/list/sales', [SalesController::class, 'index']);
Route::get('/list/detail-penjualan', [DetailPenjualanController::class, 'index']);
Route::get('/list/analisis-penjualan', [AnalisisPenjualanController::class, 'index']);
Route::get('/list/interaksi', [InteraksiController::class, 'index']);