<?php

use App\Enums\Language;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;

// ── Auth (no locale prefix; locale applied via cookie/user pref by middleware) ──
Route::middleware('setLocale')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware('signed');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
});

// ── Public routes — default locale (no URL prefix) ──
Route::middleware('setLocale')->group(base_path('routes/public.php'));

// ── Public routes — non-default locales, with URL + name prefix ──
$defaultLocale = config('app.locale');

foreach (Language::enabledLanguages() as $lang) {
    if ($lang->value !== $defaultLocale) {
        Route::prefix($lang->value)
            ->name($lang->value . '.')
            ->middleware('setLocale')
            ->group(base_path('routes/public.php'));
    }
}
