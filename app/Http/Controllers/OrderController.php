<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $orders = Booking::with([
            'user:id,name,email',
            'vehicle:id,vehicle_model_id,license_plate',
            'vehicle.vehicleModel:id,name',
            'payment:id,booking_id,status,paid_at',
        ])
            ->where('user_id', Auth::id())
            ->when($search, function ($query) use ($search) {
                $query->where('booking_code', 'like', "%{$search}%");
            })

            ->when($status && $status !== 'all', function ($query) use ($status) {

                if ($status === 'PAID') {
                    $query->whereHas('payment', function ($q) {
                        $q->whereIn('status', ['PAID', 'SETTLED']);
                    });
                }

                if ($status === 'PENDING') {
                    $query->where(function ($q) {
                        $q->whereDoesntHave('payment')
                            ->orWhereHas('payment', function ($q2) {
                                $q2->where('status', 'PENDING');
                            });
                    });
                }

                if ($status === 'EXPIRED') {
                    $query->whereHas('payment', function ($q) {
                        $q->where('status', 'EXPIRED');
                    });
                }

                if ($status === 'REFUNDED') {
                    $query->where('payment_status', 'refunded');
                }
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.profile.order.index', compact('orders'));
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
    public function show(string $bookingCode)
    {
        $booking = Booking::with([
            'vehicle.images',
            'vehicle.vehicleModel.brand',
            'vehicle.vehicleModel.category',
        ])
            ->where('booking_code', $bookingCode)
            ->firstOrFail();

        return view('pages.profile.order.detail', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        abort_if($booking->user_id !== Auth::id(), 403);

        if (in_array($booking->payment_status, ['paid', 'refunded']) || $booking->rental_status === 'completed') {
            abort(403);
        }

        $booking->update([
            'rental_status' => 'cancelled',
            'payment_status' => 'refunded',
        ]);

        return redirect()
            ->route('orders.show', $booking->booking_code)
            ->with('success', 'Pesanan berhasil dibatalkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
