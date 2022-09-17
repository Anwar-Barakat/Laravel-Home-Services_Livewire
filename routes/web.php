<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceProvider\ServiceProviderDashboardComponent;
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

Route::get('/', HomeComponent::class)->name('home');

Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->group(function () {
    Route::get('/admin/adshboard',              AdminDashboardComponent::class)->name('admin.dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'isServiceProvider'])->group(function () {
    Route::get('/servicer-provider/adshboard',  ServiceProviderDashboardComponent::class)->name('servicer-provider.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/adshboard',           CustomerDashboardComponent::class)->name('customer.dashboard');
});