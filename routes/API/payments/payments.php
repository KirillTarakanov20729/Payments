<?php

use Illuminate\Support\Facades\Route;

Route::prefix('payments')->group(function () {
    Route::get('/index/{page}', [\App\UI\API\Controllers\PaymentController::class, 'index']);

    Route::get('/checkout/{uuid}', [\App\UI\API\Controllers\PaymentController::class, 'checkout']);
    Route::post('/choose/{uuid}', [\App\UI\API\Controllers\PaymentController::class, 'choosePaymentMethod']);
    Route::get('/process/{uuid}', [\App\UI\API\Controllers\PaymentController::class, 'process']);
    Route::post('/complete/{uuid}', [\App\UI\API\Controllers\PaymentController::class, 'complete']);
});
