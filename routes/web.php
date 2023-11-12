<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\Backend\DefaultController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin routes
Route::prefix('admin')->group(function () {
    // Auth
    Route::get('login', [AdminController::class, 'AdminLogin'])->name('admin.login');
    Route::post('login', [AdminController::class, 'AdminLoginStore'])->name('store.admin.login');
    Route::get('logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    // Route::get('register', [AdminController::class, 'AdminRegister'])->name('admin_register');
    // Route::post('register', [AdminController::class, 'AdminRegisterStore'])->name('admin_register_store');

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard')->middleware('admin');

    // Admin Management
    Route::middleware(['admin'])->prefix('members')->group(function () {
        Route::get('view', [AdminController::class, 'AdminMemberView'])->name('admin.member.view');
        Route::get('add', [AdminController::class, 'AdminMemberAdd'])->name('admin.member.add');
        Route::post('add', [AdminController::class, 'AdminMemberAddStore'])->name('store.admin.member');
        Route::get('edit/{id}', [AdminController::class, 'AdminMemberEdit'])->name('admin.member.edit');
        Route::post('edit/{id}', [AdminController::class, 'AdminMemberEditStore'])->name('update.admin.member');
        Route::get('delete/{id}', [AdminController::class, 'AdminMemberDelete'])->name('admin.member.delete');
    });

    // App Setting Management
    Route::middleware(['admin'])->prefix('setting')->group(function () {
        Route::get('view', [SettingController::class, 'ModuleView'])->name('module.view');
        Route::get('add', [SettingController::class, 'ModuleAdd'])->name('module.add');
        Route::post('add', [SettingController::class, 'ModuleAddStore'])->name('store.module');//
        Route::get('edit/{id}', [SettingController::class, 'ModuleEdit'])->name('module.edit');
        Route::post('edit/{id}', [SettingController::class, 'ModuleEditStore'])->name('update.module');//
        Route::get('method/view/{id}', [SettingController::class, 'MethodView'])->name('method.view');
        Route::get('method/add/{id}', [SettingController::class, 'MethodAdd'])->name('method.add');
        Route::post('method/add/{id}', [SettingController::class, 'MethodAddStore'])->name('store.method');
        Route::get('method/edit/{id}', [SettingController::class, 'MethodEdit'])->name('method.edit');
        Route::post('method/edit/{id}', [SettingController::class, 'MethodEditStore'])->name('update.method');
    });

    // App Role Management
    Route::middleware(['admin'])->prefix('role')->group(function () {
        Route::get('view', [RoleController::class, 'RoleView'])->name('role.view');
        Route::get('add', [RoleController::class, 'RoleAdd'])->name('role.add');
        Route::post('add', [RoleController::class, 'RoleAddStore'])->name('store.role');
        Route::get('edit/{id}', [RoleController::class, 'RoleEdit'])->name('role.edit');
        Route::post('edit/{id}', [RoleController::class, 'RoleEditStore'])->name('update.role');
        Route::get('update/{id}', [RoleController::class, 'RoleDelete'])->name('role.delete');
    });

    // User Management
    Route::middleware(['admin'])->prefix('users')->group(function () {
        Route::get('view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('add', [UserController::class, 'UserAdd'])->name('user.add');
        Route::post('add', [UserController::class, 'UserAddStore'])->name('store.user');
        Route::get('edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('edit/{id}', [UserController::class, 'UserEditStore'])->name('update.user');
        Route::get('delete/{id}', [UserController::class, 'UserDelete'])->name('delete.user');
    });

    Route::middleware(['admin'])->prefix('profile')->group(function () {
        // Profile
        Route::get('view', [AdminProfileController::class, 'AdminProfileView'])->name('profile.view');
        Route::get('edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('profile.user.add');
        Route::post('edit', [AdminProfileController::class, 'AdminProfileEditStore'])->name('store.user.profile');

        Route::get('change-password', [AdminProfileController::class, 'AdminPasswordView'])->name('password.view');
        Route::post('change-password', [AdminProfileController::class, 'AdminPasswordUpdate'])->name('update.password');
    });

});
// End Admin routes

// Moderator routes
Route::prefix('moderator')->group(function () {
    // Auth
    Route::get('login', [ModeratorController::class, 'ModeratorLogin'])->name('moderator_login');
    Route::post('login', [ModeratorController::class, 'ModeratorLoginStore'])->name('moderator_login_store');
    Route::get('logout', [ModeratorController::class, 'ModeratorLogout'])->name('moderator_logout')->middleware('moderator');
    Route::get('register', [ModeratorController::class, 'ModeratorRegister'])->name('moderator_register');
    Route::post('register', [ModeratorController::class, 'ModeratorRegisterStore'])->name('moderator_register_store');

    // Dashboard
    Route::get('dashboard', [ModeratorController::class, 'ModeratorDashboard'])->name('moderator_dashboard')->middleware('moderator');
});
// End Moderator routes
