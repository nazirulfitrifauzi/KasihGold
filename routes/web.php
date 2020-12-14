<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockManagementController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\IncidentReportingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\StockMovementController;

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

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::view('/mengenai-kami', 'about')->name('aboutUs');


    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');
    Route::get('password/confirm', Confirm::class)->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware(['auth', 'passScreen'])->group(function () {
    Route::get('home', [DashboardController::class, 'index'])->name('home');
    Route::get('stock/management', [StockManagementController::class, 'index'])->name('stock-management');
    Route::get('stock/movement', [StockMovementController::class, 'index'])->name('stock-movement');
    Route::get('incident-reporting', [IncidentReportingController::class, 'index'])->name('incidentReporting');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('reporting', [ReportingController::class, 'index'])->name('reporting');
    Route::get('tracking', [TrackingController::class, 'index'])->name('tracking');
    
});

Route::middleware('auth.admin')->group(function () {
    Route::get('admin/screening', [ScreeningController::class, 'index'])->name('admin.screening');
    Route::get('admin/incident-reporting', [IncidentReportingController::class, 'admin'])->name('admin.incidentReporting');
    Route::get('admin/suppliers', [SuppliersController::class, 'index'])->name('admin.suppliers');
});
