<?php

use App\Http\Controllers\External\FrontController;
use App\Http\Controllers\Internal\AdmTransaksiController;
use App\Http\Controllers\Internal\DashboardController;
use App\Http\Controllers\Internal\DataCustomerController;
use App\Http\Controllers\Internal\DataHistoryController;
use App\Http\Controllers\Internal\DataKaryawanController;
use App\Http\Controllers\Internal\DataKuesioner;
use App\Http\Controllers\Internal\DataTarifController;
use App\Http\Controllers\Internal\DataTransaksiController;
use App\Http\Controllers\Internal\ReportController;
use App\Http\Controllers\ProfileController;
use App\Models\Rates;
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

Route::get('/login', function () {
    return view('backend.login');
})->name('login');

Route::resource('front', FrontController::class);

Route::get('/kuesioners', function () {
    return view('frontend.kuesioner');
})->name('kuesioner.view');

Route::get('/', FrontController::class . '@index')->name('home.index');
Route::post('/storeKuesioner', FrontController::class . '@storeKuesioner')->name('store.kuesioner');


Route::group(['middleware' => ['role:superadmin|admin', 'auth']], function () {

    // Dashboard
    Route::get('/dashboard', DashboardController::class . '@index')->name('dashboard');

    // Data Tarif
    Route::resource('rates', DataTarifController::class);

    // Data Kuesioner
    Route::resource('kuesioner', DataKuesioner::class);

    Route::get('/saran', DataKuesioner::class. '@saran')->name('saran.index');

    // Data Employee
    Route::resource('employee', DataKaryawanController::class);

    // Data Customer
    Route::resource('customer', DataCustomerController::class);

    // Data Transaction
    Route::resource('transaction', DataTransaksiController::class);

    Route::post('/transactionDelivery/{id}', DataTransaksiController::class . '@updateDelivery')->name('transaction.updateDel');

    Route::get('printBill/{id}', DataTransaksiController::class . '@printBill')->name('printBill');

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

Route::get('/coba', function () {
    $rates = Rates::with(['province'])->get();
    return $rates;
});

require __DIR__ . '/auth.php';
