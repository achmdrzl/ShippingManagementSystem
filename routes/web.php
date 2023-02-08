<?php

use App\Http\Controllers\Internal\AdmTransaksiController;
use App\Http\Controllers\Internal\DashboardController;
use App\Http\Controllers\Internal\DataCustomerController;
use App\Http\Controllers\Internal\DataHistoryController;
use App\Http\Controllers\Internal\DataKaryawanController;
use App\Http\Controllers\Internal\DataTarifController;
use App\Http\Controllers\Internal\DataTransaksiController;
use App\Http\Controllers\Internal\ReportController;
use App\Http\Controllers\ProfileController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('backend.login');
})->name('login');

Route::group(['middleware' => ['role:superadmin|admin', 'auth']], function () {

    // Dashboard
    Route::get('/dashboard', DashboardController::class . '@index')->name('dashboard');

    // Data Tarif
    Route::resource('rates', DataTarifController::class);

    // Data Employee
    Route::resource('employee', DataKaryawanController::class);

    // Data Customer
    Route::resource('customer', DataCustomerController::class);

    // Data Transaction
    Route::resource('transaction', DataTransaksiController::class);

    Route::post('/transactionDelivery/{id}', DataTransaksiController::class. '@updateDelivery')->name('transaction.updateDel');

    Route::get('printBill/{id}', DataTransaksiController::class. '@printBill')->name('printBill');

    // Transaksi Admin
    Route::resource('admTsk', AdmTransaksiController::class);

    // Data History
    Route::resource('history', DataHistoryController::class);

    // Data Report Shipping
    Route::resource('report', ReportController::class);
    Route::post('/setPeriod', ReportController::class . '@setPeriod')->name('set.time.period');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
