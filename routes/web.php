<?php

use App\Http\Controllers\Produksi\Produksi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [Produksi::class, "index"])
//     ->name('produksi');

// Route::post('dataTable', [Produksi::class, "dataTable"])
//     ->name('dataTable');

Route::get('/', [Produksi::class, 'index'])->name('produksiList');
Route::post('/datatable', [Produksi::class, 'datatable'])->name('produksiDataTable');

Route::get('/create', [Produksi::class, 'create'])->name('produksiCreate');
Route::post('/insert', [Produksi::class, 'insert'])->name('produksiInsert');

Route::get('/edit{id}', [Produksi::class, 'edit'])->name('produksiEdit');
Route::post('/update{id}', [Produksi::class, 'update'])->name('produksiUpdate');

Route::post('/delete{id}', [Produksi::class, 'delete'])->name('produksiDelete');
