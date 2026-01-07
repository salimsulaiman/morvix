<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Service\XenditInvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pay(Request $request, Booking $booking, XenditInvoiceService $xendit)
    {
        $validated = $request->validate([
            'payment_type' => 'required|in:dp,full',
        ]);

        $hasPendingPayment = Payment::where('booking_id', $booking->id)->whereIn('status', ['PENDING'])->exists();;

        if ($hasPendingPayment) {
            return back()->withErrors([
                'payment' => 'Masih ada pembayaran yang belum diselesaikan'
            ]);
        }

        $paymentType = $validated['payment_type'];

        $amount = $paymentType === 'dp' ? $booking->deposit_amount : $booking->total_price;

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'external_id' => $booking->booking_code . '-' . Str::uuid(),
            'payment_gateway' => 'xendit',
            'payment_type' => $paymentType,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        $invoice = $xendit->createInvoice([
            'external_id' => $payment->external_id,
            'amount' => $payment->amount,
            'description' => sprintf(
                'Pembayaran %s Booking %s',
                strtoupper($paymentType),
                $booking->booking_code
            ),
        ]);

        $payment->update([
            'gateway_transaction_id' => $invoice->getId(),
            'payment_url' => $invoice->getInvoiceUrl(),
            'gateway_response' => $invoice,
        ]);

        return redirect($invoice->getInvoiceUrl());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {

        abort_if($booking->user_id !== Auth::id(), 403);
        return view('pages.payment.detail', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
