<?php

use Illuminate\Http\Request;
use App\Http\Controllers\XenditWebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => response()->json(['status' => 'ok']));

Route::post('/webhooks/xendit', [XenditWebhookController::class, 'handle']);
