<?php

namespace App\Http\Controllers;

use App\Models\AlatBerat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlatBeratController extends Controller
{
    public function index()
    {
        $alatBerats = AlatBerat::all();
        return view('admin.pages.alat-berat.index', compact('alatBerats'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:100',
            'harga_sewa' => 'required|integer',
            'status_ketersediaan' => 'required|in:Tersedia,Disewakan,Maintenance',
            'tahun_pembuatan' => 'required|string|max:4',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        AlatBerat::create($validatedData);

        return redirect()->route('alat-berat.index')->with('OK', 'Alat berat berhasil ditambahkan.');
    }

    public function update(Request $request, AlatBerat $alatBerat)
    {
        $validatedData = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'kapasitas' => 'required|string|max:100',
            'harga_sewa' => 'required|integer',
            'status_ketersediaan' => 'required|in:Tersedia,Disewakan,Maintenance',
            'tahun_pembuatan' => 'required|string|max:4',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($alatBerat->thumbnail && Storage::exists('public/' . $alatBerat->thumbnail)) {
                Storage::delete('public/' . $alatBerat->thumbnail);
            }

            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $alatBerat->update($validatedData);

        return redirect()->route('alat-berat.index')->with('OK', 'Alat berat berhasil diperbarui.');
    }

    public function destroy(AlatBerat $alatBerat)
    {
        if ($alatBerat->thumbnail && Storage::exists('public/' . $alatBerat->thumbnail)) {
            Storage::delete('public/' . $alatBerat->thumbnail);
        }

        $alatBerat->delete();

        return redirect()->route('alat-berat.index')->with('OK', 'Alat berat berhasil dihapus.');
    }
}
