<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerUser\PermissionController;
use App\Http\Controllers\Admin\ManagerUser\RoleController;
use App\Http\Controllers\Admin\ManagerUser\UserController;
use App\Http\Controllers\Admin\ManagerCustomers\CustomerController;
use App\Http\Controllers\Admin\ManagerCustomers\CustomerContactsController;
use App\Http\Controllers\ProfileController;
use App\Mail\MailNewUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
    Route::resource('manager-customers/customers', CustomerController::class);
    Route::post('manager-customers/contacts', [CustomerContactsController::class, 'store'])->name('contacts.store');
    Route::get('manager-customers/contacts/{id}/{customerId}', [CustomerContactsController::class, 'destroy'])->name('contacts.destroy');
    Route::resource('manager-customers/status', CustomerController::class);
    Route::resource('manager-providers/providers', CustomerController::class);
    Route::resource('manager-services/services', CustomerController::class);
    Route::get('manager-user/users/{user}/notification', [UserController::class, 'sendToMail'])->name('user.notification');
    Route::get('manager-user/users/{user}/destroyphoto', [UserController::class, 'destroyPhoto'])->name('user.destroyphoto');
    Route::get('manager-user', function () {
        return redirect(route('admin.users.index'));
    })->name('manager-user');
    Route::get('manager-customers', function () {
        return redirect(route('admin.customers.index'));
    })->name('manager-customers');
    //Route::resource('manager-reports/reports', CustomerController::class);
    Route::get('manager-reports', function () {
        return redirect(route('admin.reports.index'));
    })->name('manager-reports');
});

require __DIR__.'/auth.php';
