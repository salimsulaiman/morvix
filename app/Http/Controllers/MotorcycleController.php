<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.motorcycle.index');
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
    public function show(string $code)
    {
        $motorcycle = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings'
        ])->where('code', $code)->firstOrFail();

        $otherMotorcycles = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings'
        ])
            ->where('id', '!=', $motorcycle->id)
            ->whereHas('vehicleModel', function ($query) {
                $query->where('type', 'motorcycle');
            })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('pages.motorcycle.detail', compact('motorcycle', 'otherMotorcycles'));
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
