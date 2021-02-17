<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\SupplierController;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Receive;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['guest'])->get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        $total_product = Product::count();
        $total_supplier = Supplier::count();
        $stock = Receive::sum('quantity');
        return Inertia::render('Dashboard',['stock'=>$stock,'total_product'=>$total_product,'total_supplier'=>$total_supplier]);
    })->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('receives', ReceiveController::class);
});
