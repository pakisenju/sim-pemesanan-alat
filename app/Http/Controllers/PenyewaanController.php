<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Http\Requests\StorePenyewaanRequest;
use App\Http\Requests\UpdatePenyewaanRequest;
use App\Models\AlatBerat;
use App\Models\Pelanggan;
use DateTime;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alatBerats = AlatBerat::all();
        $pelanggans = Pelanggan::all();

        $penyewaans = Penyewaan::with('alat', 'pelanggan')->get();

        $data = compact('alatBerats', 'penyewaans', 'pelanggans');

        return view('admin.pages.penyewaan.index', $data);
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
        $validated = $request->validate([
            'alat_id' => 'required|exists:alat_berats,id',
            'tgl_sewa' => 'required|date_format:Y-m-d\TH:i',
            'tgl_kembali' => 'required|date_format:Y-m-d\TH:i|after:tgl_sewa',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $pelanggan = auth()->user()->pelanggan;

        if (!$pelanggan) {
            return redirect()->back()->withErrors(['error' => 'Anda belum terdaftar sebagai pelanggan.']);
        }

        $alatBerat = AlatBerat::findOrFail($request->alat_id);

        $start = new DateTime($validated['tgl_sewa']);
        $end = new DateTime($validated['tgl_kembali']);
        $hours = $start->diff($end)->h + ($start->diff($end)->days * 24);

        $totalHarga = $hours * $alatBerat->harga_sewa;

        $buktiPembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayarans', 'public');

        Penyewaan::create([
            'alat_id' => $validated['alat_id'],
            'pelanggan_id' => $pelanggan->id,
            'tgl_sewa' => $validated['tgl_sewa'],
            'tgl_kembali' => $validated['tgl_kembali'],
            'total_harga' => $totalHarga,
            'bukti_pembayaran' => $buktiPembayaranPath,
            'status_penyewaan' => 'Sedang Diproses',
        ]);

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenyewaanRequest $request, Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyewaan $penyewaan)
    {
        //
    }
}
