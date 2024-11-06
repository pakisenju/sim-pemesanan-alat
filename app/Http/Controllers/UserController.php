<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan; 
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.pages.pengguna.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|array',
        ]);

        $user = User::create(array_merge($validatedData, ['password' => bcrypt($validatedData['password'])]));
        $user->assignRole($request->role);

        if (in_array('Customer', $request->role)) {
            Pelanggan::create([
                'user_id' => $user->id,
                'nama' => $validatedData['name'],
                'nomor_telepon' => $request->nomor_telepon ?? null,
                'alamat' => $request->alamat ?? null,
                'instansi' => $request->instansi ?? null,
            ]);
        }

        return redirect()->route('user.index')->with('OK', 'Pengguna berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|array',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        $user->syncRoles($request->role);

        if (in_array('Customer', $request->role)) {
            Pelanggan::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nama' => $validatedData['name'],
                    'nomor_telepon' => $request->nomor_telepon ?? null,
                    'alamat' => $request->alamat ?? null,
                    'instansi' => $request->instansi ?? null,
                ]
            );
        } else {
            Pelanggan::where('user_id', $user->id)->delete();
        }

        return redirect()->route('user.index')->with('OK', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        Pelanggan::where('user_id', $user->id)->delete();
        $user->delete();
        return redirect()->route('user.index')->with('OK', 'Pengguna berhasil dihapus.');
    }
}
