<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    protected $manajemenUser;

    public function __construct(User $manajemenUser)
    {
        $this->manajemenUser = $manajemenUser;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.auth.register');
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nomor_telepon' => 'required|string|min:10',
            'alamat' => 'required|string',
            'instansi' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $user->assignRole('Customer');

        $pelangganController = app(PelangganController::class);
        $pelangganController->store(new Request([
            'nama' => $validatedData['name'],
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'alamat' => $validatedData['alamat'],
            'instansi' => $validatedData['instansi'],
        ]), $user->id);

        return redirect()->route('login.index')->with('OK', 'Pendaftaran berhasil dilakukan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
