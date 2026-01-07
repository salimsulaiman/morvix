<?php

use App\Http\Controllers\XenditWebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello from Laravel API!',
        'status' => 'success'
    ]);
});

Route::get('/ping', fn() => response()->json(['status' => 'ok']));

Route::post('/webhooks/xendit', [XenditWebhookController::class, 'handle']);
