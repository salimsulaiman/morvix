<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings',
        ])->where('status', 'available')->get();

        $motorcycles = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings',
        ])->whereHas('vehicleModel', function ($query) {
            $query->where('type', 'motorcycle');
        })->inRandomOrder()
            ->take(4)->where('status', 'available')
            ->get();

        $cars = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings',
        ])->whereHas('vehicleModel', function ($query) {
            $query->where('type', 'car');
        })->inRandomOrder()
            ->take(4)
            ->where('status', 'available')
            ->get();

        return view('pages.home.index', [
            'title' => 'Home'
        ], compact('vehicles', 'motorcycles', 'cars'));
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
