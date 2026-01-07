<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class XenditWebhookController extends Controller
{
    public function handle(Request $request)
    {
        if ($request->header('x-callback-token') !== config('services.xendit.webhook_token')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $payload = $request->all();

        $payment = Payment::where('external_id', $payload['external_id'])->first();

        if (! $payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        if (in_array($payment->status, ['PAID', 'SETTLED', 'REFUNDED'])) {
            return response()->json(['message' => 'Payment already finalized']);
        }

        DB::transaction(function () use ($payload, $payment) {
            if (in_array($payload['status'], ['PAID', 'SETTLED'])) {
                $payment->update([
                    'status' => 'PAID',
                    'paid_at' => now(),
                    'gateway_response' => $payload,
                ]);

                $payment->booking->update([
                    'payment_status' => 'paid',
                    'rental_status' => 'booked',
                ]);

                $payment->booking->vehicle->update([
                    'status' => 'rented',
                ]);
            }

            if (in_array($payload['status'], ['EXPIRED', 'UNKNOWN_ENUM_VALUE'])) {
                $payment->update([
                    'status' => $payload['status'] === 'EXPIRED' ? 'EXPIRED' : 'UNKNOWN_ENUM_VALUE',
                    'gateway_response' => $payload,
                ]);

                $payment->booking->update([
                    'payment_status' => 'pending',
                    'rental_status' => 'cancelled',
                ]);

                $payment->booking->vehicle->update([
                    'status' => 'available',
                ]);
            }
        });

        return response()->json(['message' => 'ok']);
    }
}
