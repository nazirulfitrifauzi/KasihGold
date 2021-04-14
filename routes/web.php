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
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\ProductSellController;
use App\Http\Controllers\ProductAddController;
use App\Http\Controllers\ProductEditController;
use App\Http\Controllers\NewOrdersController;
use App\Http\Controllers\ProductBuyController;
use App\Http\Controllers\OwnershipController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\MyNetworkController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\UplineController;
use App\Http\Controllers\CartController;

Route::middleware('guest')->group(function () {
    /** Landing Page */
    Route::view('/', 'welcome')->name('home');
    Route::view('/mengenai-kami', 'about')->name('aboutUs');

    /** Authentication */
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    Route::get('password/reset', Email::class)->name('password.request');
    Route::get('password/reset/{token}', Reset::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    /** Authentication */
    Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');
    Route::get('password/confirm', Confirm::class)->name('password.confirm');
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)->middleware('signed')->name('verification.verify');
    Route::post('logout', LogoutController::class)->name('logout');

    Route::middleware('passScreen')->group(function () {
        Route::get('home', [DashboardController::class, 'index'])->name('home');
        Route::get('stock/management', [StockManagementController::class, 'index'])->name('stock-management');
        Route::get('stock/movement', [StockMovementController::class, 'index'])->name('stock-movement');
        Route::get('incident-reporting', [IncidentReportingController::class, 'index'])->name('incidentReporting');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('reporting', [ReportingController::class, 'index'])->name('reporting');
        Route::get('tracking', [TrackingController::class, 'index'])->name('tracking');
        Route::get('product/detail', [ProductDetailController::class, 'index'])->name('product-detail');
        Route::get('product/buy', [ProductBuyController::class, 'index'])->name('product-buy');
        Route::get('product/view', [ProductViewController::class, 'index'])->name('product-view');
        Route::get('product/sell', [ProductSellController::class, 'index'])->name('product-sell');
        Route::get('product/sell-add', [ProductAddController::class, 'index'])->name('product-add');
        Route::get('product/sell-edit', [ProductEditController::class, 'index'])->name('product-edit');
        Route::get('new-orders', [NewOrdersController::class, 'index'])->name('new-orders');
        Route::get('tracking/ownership', [OwnershipController::class, 'index'])->name('ownership');
        Route::get('tracking/delivery', [DeliveryController::class, 'index'])->name('delivery');
        Route::get('analytics', [AnalyticsController::class, 'index'])->name('analytics');
        Route::get('order/my-order', [MyOrderController::class, 'index'])->name('my-order');
        Route::get('order/customer-order', [CustomerOrderController::class, 'index'])->name('customer-order');
        Route::get('shipment', [ShipmentController::class, 'index'])->name('shipment');
        Route::get('my-network', [MyNetworkController::class, 'index'])->name('my-network');
        Route::get('commission', [CommissionController::class, 'index'])->name('commission');
        Route::get('upline-detail', [UplineController::class, 'index'])->name('upline-detail');
        Route::get('cart', [CartController::class, 'index'])->name('cart');
    });

    Route::middleware('auth.admin')->group(function () {
        Route::get('admin/screening', [ScreeningController::class, 'index'])->name('admin.screening');
        Route::get('admin/incident-reporting', [IncidentReportingController::class, 'admin'])->name('admin.incidentReporting');
        Route::get('admin/suppliers', [SuppliersController::class, 'index'])->name('admin.suppliers');
        Route::get('product/admin/product/sell', [ProductAddController::class, 'admin'])->name('admin.product-sell-hq');
        Route::get('product/admin/product/sell-add', [ProductAddController::class, 'adminAdd'])->name('admin.product-add-hq');
    });
});
