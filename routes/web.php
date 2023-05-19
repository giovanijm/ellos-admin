<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerUser\{
    PermissionController,
    RoleController,
    UserController
};
use App\Http\Controllers\Admin\Registrations\{
    CustomerController,
    CustomerContactsController,
    ProviderController,
    ProviderContactsController
};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('manager-user/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('roles.permissions');
    Route::resource('manager-user/roles', RoleController::class);
    Route::resource('manager-user/permissions', PermissionController::class);
    Route::resource('manager-user/users', UserController::class);
    Route::resource('registrations/customers', CustomerController::class);

    Route::post('registrations/contacts', [CustomerContactsController::class, 'store'])->name('contacts.store');
    Route::get('registrations/contacts/{id}/{customerId}', [CustomerContactsController::class, 'destroy'])->name('contacts.destroy');

    Route::post('registrations/providers/contacts', [ProviderContactsController::class, 'store'])->name('providers.contacts.store');
    Route::get('registrations/providers/contacts/{id}/{providerId}', [ProviderContactsController::class, 'destroy'])->name('providers.contacts.destroy');

    Route::get('registrations/customers/{customer}/destroyphoto', [CustomerController::class, 'destroyPhoto'])->name('customers.destroyphoto');
    Route::get('registrations/providers/{provider}/destroyphoto', [ProviderController::class, 'destroyPhoto'])->name('providers.destroyphoto');
    Route::resource('registrations/status', CustomerController::class);
    Route::resource('registrations/providers', ProviderController::class);
    Route::resource('registrations/services', CustomerController::class);
    Route::get('manager-user/users/{user}/notification', [UserController::class, 'sendToMail'])->name('user.notification');
    Route::get('manager-user/users/{user}/destroyphoto', [UserController::class, 'destroyPhoto'])->name('user.destroyphoto');
    Route::get('common/searchpostalcode/{cep}', [CustomerController::class, 'searchPostalCode'])->name('common.searchpostalcode');
    Route::get('manager-user', function () {
        return redirect(route('admin.users.index'));
    })->name('manager-user');
    Route::get('registrations', function () {
        return redirect(route('admin.customers.index'));
    })->name('registrations');
    //Route::resource('manager-reports/reports', CustomerController::class);
    Route::get('manager-reports', function () {
        return redirect(route('admin.reports.index'));
    })->name('manager-reports');
});

require __DIR__.'/auth.php';
