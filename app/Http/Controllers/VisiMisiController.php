<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visimisis = Visi::paginate(12);
        return view('pages.dashboard.client.index', compact('visimisis'));
    }

    public function create()
    {
        return view('pages.dashboard.client.create');
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

        Visi::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName()
        ]);

        return redirect()->route('home.index')->with('success', 'Add Home Success');
    }


    public function edit(Visi $visi)
    {
        return view('pages.dashboard.client.edit', compact('home'));
    }

    public function update(Request $request, Visi $visi)
    {
        // $request->merge([
        //     'slug' => str_replace(['.', ','], '', $request->slug)
        // ]);

        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
        ]);

        $visi->title = $request->title;
        $visi->slug = $request->slug;
        $visi->deskripsi = $request->deskripsi;

        if ($request->file('foto')) {

            if ($visi->foto !== "noimage.png") {
                Storage::disk('public')->delete('public/' . $visi->foto);
            }

            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $visi->foto = $foto->hashName();
        }

        $visi->update();

        return redirect()->route('home.index')->with('success', 'Update Home Success');
    }


    public function destroy(Visi $visi)
    {
        if ($visi->foto !== "noimage.png") {
            Storage::disk('public')->delete($visi->foto);
        }

        $visi->delete();

        return redirect()->route('home.index')->with('success', 'Delete Home Success');
    }
}
