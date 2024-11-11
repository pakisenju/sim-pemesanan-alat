<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewaans = Penyewaan::with('alat', 'pelanggan')->get();
        $maintenances = Pemeliharaan::with('alat')->get();

        return view('admin.pages.rekapitulasi.index', compact('penyewaans', 'maintenances'));
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
