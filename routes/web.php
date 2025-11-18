<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\ProdutosController;
use App\Http\Controllers\Admin\ClientesController;

// ===================================================
// ROTAS PÚBLICAS / PADRÃO DO SEU SISTEMA
// ===================================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ===================================================
// ROTAS DE CONFIGURAÇÃO (FORTIFY + LIVEWIRE)
// ===================================================
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

// ===================================================
// ÁREA ADMIN
// ===================================================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    // Dashboard Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD Produtos
    Route::resource('produtos', ProdutosController::class);

    // CRUD Categorias
    Route::resource('categorias', CategoriasController::class);

    // CRUD Clientes
    Route::resource('clientes', ClientesController::class);
});
