<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Home;
use App\Models\Misi;
use App\Models\Service;
use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::paginate(12);
        return view('pages.dashboard.home.index', compact('homes'));
    }

    public function create()
    {
        return view('pages.dashboard.home.create');
    }

    public function store(Request $request)
    {
        // $request->merge([
        //     'slug' => str_replace(['.', ','], '', $request->slug)
        // ]);

        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Home::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName()
        ]);

        return redirect()->route('home.index')->with('success', 'Add Home Success');
    }


    public function edit(Home $home)
    {
        return view('pages.dashboard.home.edit', compact('home'));
    }

    public function update(Request $request, Home $home)
    {
        // $request->merge([
        //     'slug' => str_replace(['.', ','], '', $request->slug)
        // ]);

        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
        ]);

        $home->title = $request->title;
        $home->slug = $request->slug;
        $home->deskripsi = $request->deskripsi;

        if ($request->file('foto')) {

            if ($home->foto !== "noimage.png") {
                Storage::disk('public')->delete('public/' . $home->foto);
            }

            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $home->foto = $foto->hashName();
        }

        $home->update();

        return redirect()->route('home.index')->with('success', 'Update Home Success');
    }


    public function destroy(Home $home)
    {
        if ($home->foto !== "noimage.png") {
            Storage::disk('public')->delete($home->foto);
        }

        $home->delete();

        return redirect()->route('home.index')->with('success', 'Delete Home Success');
    }


    // view leading page 
    public function landing_thumbnails()
    {
        $homes = Home::all();
        $clients = Client::all();
        $services = Service::all();
        $visis = Visi::all();
        $misis = Misi::all();

        return view('pages.leading.index', compact('homes', 'clients', 'services','visis', 'misis'));
    }



}
