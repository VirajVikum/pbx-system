<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Index as SettingsIndex;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use App\Livewire\Settings\Users\Index as UserIndex;
use App\Livewire\Settings\CrmDepartments\Index as DepartmentsIndex;
use App\Livewire\Settings\UserTypes\Index as UserTypesIndex;
use App\Livewire\Settings\Extensions\Index as ExtensionsIndex;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

// Redirect home to login for guests, dashboard for authenticated users
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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

    Route::middleware(['auth'])->prefix('settings')->group(function () {

    Route::get('/', SettingsIndex::class)
        ->name('settings.index');

    Route::get('/users', UserIndex::class)
        ->name('pbx-users.index');

    Route::get('/departments', DepartmentsIndex::class)
        ->name('departments.index');

    Route::get('/user-types', UserTypesIndex::class)
        ->name('user-types.index');

    Route::get('/extensions', ExtensionsIndex::class)
        ->name('extensions.index');
});

});
