<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerUser\PermissionController;
use App\Http\Controllers\Admin\ManagerUser\RoleController;
use App\Http\Controllers\Admin\ManagerUser\UserController;
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
    Route::get('manager-user/users/{user}/notification', [UserController::class, 'sendToMail'])->name('user.notification');
});

/* Route::get('envio-email', function(){
    $usuario1 = new User();
    $usuario1->name = "Giovani Júlio Mariano";
    $usuario1->email = "giovanijm@gmail.com";
    $usuario1->role_id = 2;

    return new MailNewUser($usuario1);

    //Mail::send(new newSistemaEllos($usuario1));
}); */

require __DIR__.'/auth.php';
