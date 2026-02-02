<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil profile pertama atau buat default jika belum ada
        $profile = Profile::firstOrCreate(
            [], // kondisi kosong → hanya 1 row profile
            [
                'first_name' => "Company" ,
                'last_name'  => "Admin",
                'email'      => "test@gmail.com",
                'phone'      => "62 9828 921",
                'bio'        => "Company Profile Bio Saya",
                'facebook'   => "tes",
                'x'          => "test",
                'linkedin'   => "test",
                'instagram'  => "test",
                'country'    => "test",
                'city'       => "test",
            ]
        );

        return view('pages.profile', compact('profile'));
    }

    /**
     * Update profile
     */
    public function update(Request $request)
    {
        // Karena hanya ada 1 profile
        $profile = Profile::firstOrFail();

        $validated = $request->validate([
            'first_name' => 'nullable|string|max:50',
            'last_name'  => 'nullable|string|max:50',
            'email'      => 'nullable|email|max:100',
            'phone'      => 'nullable|string|max:20',
            'bio'        => 'nullable|string|max:255',

            'facebook'   => 'nullable|string|max:255',
            'x'          => 'nullable|string|max:255',
            'linkedin'   => 'nullable|string|max:255',
            'instagram'  => 'nullable|string|max:255',

            'country'    => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:255',
            'code'       => 'nullable|string|max:255',
            'tax'        => 'nullable|string|max:255',
        ]);

        // Konversi string kosong menjadi NULL
        $validated = array_map(
            fn ($value) => $value === '' ? null : $value,
            $validated
        );

        $profile->update($validated);

        return redirect()
            ->route('pages.profile')
            ->with('success', 'Profile berhasil diperbarui!');
    }
}


