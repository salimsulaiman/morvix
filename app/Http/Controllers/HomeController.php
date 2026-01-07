<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\City;
use App\Models\Vehicle;
use App\Models\VehicleModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cities = City::pluck('name', 'id');
        $now = now();

        $vehicles = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
        ])
            ->where('status', 'available')
            ->whereDoesntHave('bookings', function ($q) use ($now) {
                $q->where('rental_status', 'ongoing')
                    ->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now);
            })
            ->inRandomOrder()
            ->take(3)
            ->get();

        $motorcycles = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
        ])
            ->whereHas('vehicleModel', fn($q) => $q->where('type', 'motorcycle'))
            ->where('status', 'available')
            ->whereDoesntHave('bookings', function ($q) use ($now) {
                $q->where('rental_status', 'ongoing')
                    ->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now);
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        $cars = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
        ])
            ->whereHas('vehicleModel', fn($q) => $q->where('type', 'car'))
            ->where('status', 'available')
            ->whereDoesntHave('bookings', function ($q) use ($now) {
                $q->where('rental_status', 'ongoing')
                    ->where('start_date', '<=', $now)
                    ->where('end_date', '>=', $now);
            })
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('pages.home.index', [
            'title' => 'Home'
        ], compact('cities', 'vehicles', 'motorcycles', 'cars'));
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
    public function show(string $id)
    {
        //
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
