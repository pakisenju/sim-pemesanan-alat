<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('pelanggan')->get();

        return view('admin.pages.customer.index', compact('users'));
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
    public function store(Request $request, $userId)
    {
        $request->validate([
            'nama' => 'required|string',
            'nomor_telepon' => 'required|string|min:10',
            'alamat' => 'required|string',
            'instansi' => 'nullable|string',
        ]);

        $pelanggan = Pelanggan::create([
            'user_id' => $userId,
            'nama' => $request->nama,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
        ]);

        return $pelanggan;
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
