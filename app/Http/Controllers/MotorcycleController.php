<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Feature;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = 'motorcycle';

        $categories = VehicleCategory::whereHas(
            'vehicleModels',
            fn($q) => $q->where('type', $type)
        )->get();

        $features = Feature::whereHas(
            'vehicles.vehicleModel',
            fn($q) => $q->where('type', $type)
        )->get();

        $priceRange = Vehicle::whereHas(
            'vehicleModel',
            fn($q) => $q->where('type', $type)
        )
            ->selectRaw('MIN(daily_price) as min, MAX(daily_price) as max')
            ->first();

        $cities = City::pluck('name', 'id');

        $start = $request->filled('start_date')
            ? Carbon::createFromFormat('m/d/Y', $request->start_date)->startOfDay()
            : null;

        $end = $request->filled('end_date')
            ? Carbon::createFromFormat('m/d/Y', $request->end_date)->endOfDay()
            : null;

        $today = now()->startOfDay();

        $motorcycles = Vehicle::query()
            ->with([
                'vehicleModel.brand',
                'images',
                'location',
                'bookings'
            ])
            ->where('status', 'available')
            ->whereHas(
                'vehicleModel',
                fn($q) => $q->where('type', $type)
            )
            ->whereDoesntHave('bookings', function ($qb) use ($start, $end, $today) {
                $qb->where('rental_status', 'ongoing')
                    ->when(
                        $start && $end,
                        fn($q) =>
                        $q->where('start_date', '<=', $end)
                            ->where('end_date', '>=', $start),
                        fn($q) =>
                        $q->whereDate('start_date', '<=', $today)
                            ->whereDate('end_date', '>=', $today)
                    );
            })
            ->when(
                $request->filled('city'),
                fn($q) =>
                $q->whereHas(
                    'location.city',
                    fn($qc) => $qc->where('name', $request->city)
                )
            )
            ->when(
                $request->filled('categories'),
                fn($q) =>
                $q->whereHas(
                    'vehicleModel',
                    fn($qm) =>
                    $qm->whereIn('vehicle_category_id', (array) $request->categories)
                )
            )
            ->when(
                $request->filled('transmissions'),
                fn($q) =>
                $q->whereIn('transmission', (array) $request->transmissions)
            )
            ->when(
                $request->filled('fuel_types'),
                fn($q) =>
                $q->whereIn('fuel_type', (array) $request->fuel_types)
            )
            ->when(
                $request->filled('features'),
                fn($q) =>
                $q->whereHas(
                    'features',
                    fn($fq) =>
                    $fq->whereIn('features.id', (array) $request->features)
                )
            )
            ->when(
                $request->filled('min_price'),
                fn($q) =>
                $q->where('daily_price', '>=', $request->min_price)
            )
            ->when(
                $request->filled('max_price'),
                fn($q) =>
                $q->where('daily_price', '<=', $request->max_price)
            )
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('pages.motorcycle.index', compact(
            'cities',
            'motorcycles',
            'categories',
            'features',
            'priceRange',
            'type'
        ));
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
        $start = Carbon::parse(request('start_date'));
        $end = Carbon::parse(request('end_date'));

        $motorcycle = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings'
        ])->where('code', $code)->firstOrFail();

        $otherMotorcyclesQuery = Vehicle::with([
            'vehicleModel.brand',
            'images',
            'location',
            'bookings'
        ])
            ->where('status', 'available')
            ->where('id', '!=', $motorcycle->id)
            ->whereHas('vehicleModel', function ($query) {
                $query->where('type', 'motorcycle');
            });

        if ($start && $end) {
            $otherMotorcyclesQuery->whereDoesntHave('bookings', function ($query) use ($start, $end) {
                $query->whereIn('rental_status', ['booked', 'ongoing'])
                    ->where(function ($q) use ($start, $end) {
                        $q->whereBetween('start_date', [$start, $end])
                            ->orWhereBetween('end_date', [$start, $end])
                            ->orWhere(function ($q2) use ($start, $end) {
                                $q2->where('start_date', '<=', $start)
                                    ->where('end_date', '>=', $end);
                            });
                    });
            });
        }

        $otherMotorcycles = $otherMotorcyclesQuery->inRandomOrder()
            ->paginate(12)
            ->withQueryString();

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
