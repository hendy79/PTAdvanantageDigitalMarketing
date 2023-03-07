<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', 'App\Action\Auth\RegisterPage')
                ->name('register');

    Route::post('register', 'App\Action\Auth\RegisterAction');

    Route::get('login', 'App\Action\Auth\LoginPage')
                ->name('login');

    Route::post('login', 'App\Action\Auth\LoginAction');

    Route::get('forgot-password', 'App\Action\Auth\PasswordResetPage')
                ->name('password.request');

    Route::post('forgot-password', 'App\Action\Auth\PasswordResetAction')
                ->name('password.email');

    Route::get('reset-password/{token}', 'App\Action\Auth\NewPasswordPage')
                ->name('password.reset');

    Route::post('reset-password', 'App\Action\Auth\NewPasswordAction')
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', 'App\Action\Auth\EmailVerPrompt')
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', 'App\Action\Auth\VerifyEmailPage')
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', 'App\Action\Auth\EmailVerNotif')
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', 'App\Action\Auth\ConfirmPasswordPage')
                ->name('password.confirm');

    Route::post('confirm-password', 'App\Action\Auth\ConfirmPasswordAction');

    Route::post('logout', 'App\Action\Auth\LogoutAction')
                ->name('logout');
});
