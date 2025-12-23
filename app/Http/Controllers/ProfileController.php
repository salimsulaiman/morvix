<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateDetailProfileRequest;
use App\Models\UserSim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.profile.index');
    }

    public function detail()
    {
        $user = Auth::user();
        $user_sim = UserSim::where('user_id', $user->id)->get();
        return view(
            'pages.profile.detail.index',
            compact('user', 'user_sim')
        );
    }

    public function editProfile(UpdateDetailProfileRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->update([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'id_number'     => $request->id_number,
            'date_of_birth' => $request->date_of_birth,
            'gender'        => $request->gender,
        ]);
        return back()->with('success', 'Profil berhasil diperbarui');
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
