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
            // 'title' => 'required|string',
            // 'subtitle' => 'required|string',
            'nama' => 'required|string',
            'subnama' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Service::create([
            // 'title' => $request->title,
            // 'subtitle' => $request->subtitle,
            'nama' => $request->nama,
            'subnama' => $request->subnama,
            'price' => $request->price,
            'description' => $request->description,
            'foto' => $foto->hashName()
        ]);

       

        return redirect()->route('service.index')->with('success', 'Add service Success');
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

        $request->validate([
            // 'title' => 'required|string',
            // 'subtitle' => 'required|string',
            'nama' => 'required|string',
            'subnama' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);

            $service->title = $request->title;
            $service->subtitle = $request->subtitle;
            $service->nama = $request->nama;
            $service->subnama = $request->subnama;
            $service->price = $request->price;
            $service->description = $request->description;

        if ($request->file('foto')) {

            if ($service->foto !== "noimage.png") {
                Storage::disk('public')->delete('public/' . $service->foto);
            }

            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $service->foto = $foto->hashName();
        }

        $service->update();

        return redirect()->route('service.index')->with('success', 'Update service Success');
    }


    public function destroy(Service $service)
    {
        if ($service->foto !== "noimage.png") {
            Storage::disk('public')->delete($service->foto);
        }

        $service->delete();

        return redirect()->route('service.index')->with('success', 'Delete service Success');
    }
}
