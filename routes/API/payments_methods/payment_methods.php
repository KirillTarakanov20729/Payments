<?php

use Illuminate\Support\Facades\Route;

Route::prefix('payment_methods')->group(function() {
    Route::get('/index', [\App\UI\API\Controllers\PaymentMethodController::class, 'index']);

    Route::get('{payment_uuid}/getDriver', [\App\UI\API\Controllers\PaymentMethodController::class, 'getDriver']);
});
