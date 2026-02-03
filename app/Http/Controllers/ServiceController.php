<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(12);
        return view('pages.dashboard.service.index', compact('services'));
    }

    public function create()
    {
        return view('pages.dashboard.service.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'price' => str_replace(['.', ','], '', $request->price)
        ]);

        $request->validate([
            'nama'           => 'required|string',
            'subnama'        => 'required|string',
            'price'          => 'required|numeric',
            'description'    => 'required|string',
            'billing_period' => 'required|string',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Service::create([
            'nama' => $request->nama,
            'subnama' => $request->subnama,
            'price' => $request->price,
            'description' => $request->description,
            'billing_period' => $request->billing_period,
            'foto' => $foto->hashName()
        ]);

        return redirect()->route('service.index')->with('success', 'Add Service Success');
    }

    public function edit(Service $service)
    {
        return view('pages.dashboard.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->merge([
            'price' => str_replace(['.', ','], '', $request->price)
        ]);

        $validated = $request->validate([
            'nama'           => 'required|string',
            'subnama'        => 'required|string',
            'price'          => 'required|numeric',
            'description'    => 'required|string',
            'billing_period' => 'required|string',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($service->foto !== "noimage.png") {
                Storage::disk('public')->delete('public/' . $service->foto);
            }

            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $service->foto = $foto->hashName();
        }

        $service->update($validated);

        return redirect()
            ->route('service.index')
            ->with('success', 'Update service success');
    }

    public function destroy(Service $service)
    {
        if ($service->foto !== 'noimage.png') {
            Storage::disk('public')->delete($service->foto);
        }

        $service->delete();

        return redirect()
            ->route('service.index')
            ->with('success', 'Delete service success');
    }
}
