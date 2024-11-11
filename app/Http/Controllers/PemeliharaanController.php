<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Http\Requests\StorePemeliharaanRequestRequest;
use App\Http\Requests\UpdatePemeliharaanRequest;
use App\Models\AlatBerat;
use Illuminate\Http\Request;

class PemeliharaanController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'alat_id' => 'required|exists:alat_berats,id',
            'tgl_servis' => 'required|date',
            'deskripsi' => 'nullable|string|max:255',
            'biaya_servis' => 'required|integer|min:0',
        ]);

        Pemeliharaan::create([
            'alat_id' => $request->alat_id,
            'tgl_servis' => $request->tgl_servis,
            'deskripsi' => $request->deskripsi,
            'biaya_servis' => $request->biaya_servis,
            'status_pemeliharaan' => 'Dalam Proses',
        ]);

        $alatBerat = AlatBerat::findOrFail($request->alat_id);
        $alatBerat->update(['status_ketersediaan' => 'Maintenance']);

        return redirect()->back()->with('OK', 'Berhasil menambahkan pemeliharaan alat berat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemeliharaan $pemeliharaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemeliharaan $pemeliharaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeliharaan $pemeliharaan)
    {
        $request->validate([
            'tgl_servis' => 'required|date',
            'deskripsi' => 'nullable|string|max:255',
            'biaya_servis' => 'required|integer|min:0',
            'status_pemeliharaan' => 'required|in:Dalam Proses,Selesai',
        ]);

        $pemeliharaan->update([
            'tgl_servis' => $request->tgl_servis,
            'deskripsi' => $request->deskripsi,
            'biaya_servis' => $request->biaya_servis,
            'status_pemeliharaan' => $request->status_pemeliharaan,
        ]);

        if ($request->status_pemeliharaan === 'Selesai') {
            $alatBerat = AlatBerat::findOrFail($pemeliharaan->alat_id);
            $alatBerat->update(['status_ketersediaan' => 'Tersedia']);
        }

        return redirect()->back()->with('OK', 'Pemeliharaan alat berat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemeliharaan $pemeliharaan)
    {
        //
    }
}
