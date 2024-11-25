<?php

namespace App\Http\Controllers;

use App\Models\AlatBerat;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_pendapatan = DB::table('penyewaans')
            ->select(DB::raw('SUM(total_harga) as total_pendapatan'))
            ->first();
        $total_pendapatan = $total_pendapatan ? $total_pendapatan->total_pendapatan : 0;

        $total_pengeluaran = DB::table('pemeliharaans')
            ->select(DB::raw('SUM(biaya_servis) as total_pengeluaran'))
            ->first();
        $total_pengeluaran = $total_pengeluaran ? $total_pengeluaran->total_pengeluaran : 0;

        $pendapatan_per_bulan = DB::table('penyewaans')
            ->select(DB::raw('MONTH(created_at) as bulan'), DB::raw('SUM(total_harga) as total_pendapatan'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $pengeluaran_per_bulan = DB::table('pemeliharaans')
            ->select(DB::raw('MONTH(created_at) as bulan'), DB::raw('SUM(biaya_servis) as total_pengeluaran'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $pendapatan = array_fill(0, 12, 0);
        $pengeluaran = array_fill(0, 12, 0);

        foreach ($pendapatan_per_bulan as $item) {
            $pendapatan[$item->bulan - 1] = $item->total_pendapatan;
        }

        foreach ($pengeluaran_per_bulan as $item) {
            $pengeluaran[$item->bulan - 1] = $item->total_pengeluaran;
        }

        $alatBerats = AlatBerat::all();
        if (auth()->user()->roles->pluck('name')->contains('Customer')) {
            $pelanggan = Pelanggan::where('user_id', auth()->id())->first();

            if (!$pelanggan) {
                return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
            }

            $penyewaans = Penyewaan::with('alat', 'pelanggan')
                ->where('pelanggan_id', $pelanggan->id)
                ->get();
        } else {
            $penyewaans = Penyewaan::with('alat', 'pelanggan')->get();
        }

        $data = compact('total_pendapatan', 'total_pengeluaran', 'alatBerats', 'bulan', 'pendapatan', 'pengeluaran', 'penyewaans');

        return view('admin.pages.dashboard.index', $data);
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
