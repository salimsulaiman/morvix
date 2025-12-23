<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\Sim\StoreSimRequest;
use App\Http\Requests\Profile\Sim\UpdateSimRequest;
use App\Models\UserSim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SimController extends Controller
{
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
    public function store(StoreSimRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('sim_photo')) {
            $data['sim_photo'] = $request->file('sim_photo')
                ->store('sim_photos', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');
        $data['user_id'] = Auth::id();

        UserSim::create($data);

        return redirect()->back()->with('success', 'SIM berhasil ditambahkan.');
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
    public function update(UpdateSimRequest $request, string $id)
    {
        $sim = UserSim::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        $data = $request->validated();
        if ($request->hasFile('sim_photo')) {
            if ($sim->sim_photo && Storage::exists($sim->sim_photo)) {
                Storage::delete($sim->sim_photo);
            }
            $data['sim_photo'] = $request->file('sim_photo')->store('sim_photos', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $sim->update($data);

        return redirect()->back()->with('success', 'SIM berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sim = UserSim::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        if ($sim->sim_photo && Storage::exists($sim->sim_photo)) {
            Storage::delete($sim->sim_photo);
        }

        $sim->delete();
        return redirect()->back()->with('success', 'SIM berhasil dihapus.');
    }
}
