<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\UserSim;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{

    private function isProfileComplete($user): bool
    {
        return filled([
            $user->phone,
            $user->address,
            $user->gender,
            $user->date_of_birth,
            $user->id_number,
            $user->id_photo,
        ]);
    }

    private function hasActiveSim($user): bool
    {
        return UserSim::where('user_id', $user->id)
            ->where('is_active', true)
            ->whereNotNull('sim_number')
            ->whereNotNull('sim_photo')
            ->whereNotNull('expired_at')
            ->exists();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Vehicle $vehicle)
    {

        $user = Auth::user();

        if (! $this->isProfileComplete($user) || ! $this->hasActiveSim($user)) {
            return redirect()->route('profile.detail')
                ->withErrors(['profile' => 'Lengkapi data profil dan SIM terlebih dahulu']);
        }

        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'start_time' => 'required',
            'daily_price' => 'required|integer|min:1',
            'total_days' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $startDateTime = Carbon::createFromFormat(
            'm/d/Y H:i',
            $request->start . ' ' . $request->start_time
        );

        $totalDays = max(1, (int) $request->total_days);

        $endDateTime = (clone $startDateTime)->addDays($totalDays);

        $isBooked = Booking::where('vehicle_id', $vehicle->id)
            ->where('rental_status', 'ongoing')
            ->where(function ($q) use ($startDateTime, $endDateTime) {
                $q->whereBetween('start_date', [$startDateTime, $endDateTime])
                    ->orWhereBetween('end_date', [$startDateTime, $endDateTime])
                    ->orWhere(function ($q2) use ($startDateTime, $endDateTime) {
                        $q2->where('start_date', '<=', $startDateTime)
                            ->where('end_date', '>=', $endDateTime);
                    });
            })
            ->exists();

        if ($isBooked) {
            return back()->withErrors(['date' => 'Mobil sudah dibooking pada tanggal tersebut']);
        }

        $subtotal = $request->total_price;

        $adminFee = 5000 + ($subtotal * 0.02);

        $adminFee = min(ceil($adminFee), 25000);

        $total = $subtotal + $adminFee;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $vehicle->id,
            'booking_code' => 'BK-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5)),
            'start_date' => $startDateTime,
            'end_date' => $endDateTime,
            'total_days' => $request->total_days,
            'daily_price' => $request->daily_price,
            'admin_fee' => $adminFee,
            'subtotal' => $subtotal,
            'total_price' => $total,
            'deposit_amount' => $request->total_price * 0.3,
            'pickup_location' => 'Pool Rental',
            'return_location' => 'Pool Rental',
        ]);

        return redirect()->route('booking.payment', $booking);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
