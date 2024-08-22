<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tincoff')->group(function() {
    Route::get('/config', [\App\UI\API\Controllers\TincoffController::class, 'config']);

    Route::post('/payment', [\App\UI\API\Controllers\TincoffController::class, 'createPayment']);
});
