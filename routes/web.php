<?php

use App\Http\Livewire\Admin\AddServiceCategoryComponent;
use App\Http\Livewire\Admin\AddServiceComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\EditServiceCategoryComponent;
use App\Http\Livewire\Admin\EditServiceComponent;
use App\Http\Livewire\Admin\ServiceCategoryComponent;
use App\Http\Livewire\Admin\ServiceDetailComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceByCategoryComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
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

Route::get('service-categories',                        ServiceCategoriesComponent::class)->name('service.categories');
Route::get('/{category_slug}',                          ServiceByCategoryComponent::class)->name('services_by_category');
Route::get('service/{service_slug}/detail',             ServiceDetailComponent::class)->name('service-detail');


Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->prefix('/admin/')->as('admin.')->group(function () {
    Route::get('adshboard',                                 AdminDashboardComponent::class)->name('dashboard');
    Route::get('service-categories',                        ServiceCategoryComponent::class)->name('service.categories');
    Route::get('service-categories/create',                 AddServiceCategoryComponent::class)->name('add.service.categories');
    Route::get('service-categories/{category_id}/edit',     EditServiceCategoryComponent::class)->name('edit.service.categories');
    Route::get('services',                                  AdminServicesComponent::class)->name('services.index');
    Route::get('{category_slug}/services',                  AdminServicesByCategoryComponent::class)->name('services_by_category');
    Route::get('service/create',                            AddServiceComponent::class)->name('add.service');
    Route::get('service/{service_slug}/edit',               EditServiceComponent::class)->name('edit.service');
});

Route::middleware(['auth:sanctum', 'verified', 'isServiceProvider'])->group(function () {
    Route::get('/servicer-provider/adshboard',              ServiceProviderDashboardComponent::class)->name('servicer-provider.dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/adshboard',                       CustomerDashboardComponent::class)->name('customer.dashboard');
});
