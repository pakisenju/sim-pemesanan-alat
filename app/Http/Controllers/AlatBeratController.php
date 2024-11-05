<?php

namespace App\Http\Controllers;

use App\Models\AlatBerat;
use App\Http\Requests\StoreAlatBeratRequest;
use App\Http\Requests\UpdateAlatBeratRequest;

class AlatBeratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.alat-berat.index');
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
    public function store(StoreAlatBeratRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AlatBerat $alatBerat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlatBerat $alatBerat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlatBeratRequest $request, AlatBerat $alatBerat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlatBerat $alatBerat)
    {
        //
    }
}
