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
        DB::beginTransaction();
        try {
            $request->validate([
                'username' => 'required|string',
                'email' => 'required|string|email',
                'name' => 'required|string',
                'password' => 'required|string|min:6',
            ]);

            $usernameTersedia = $this->manajemenUser->where('username', $request->username)->first();
            if ($usernameTersedia !== null) {
                return redirect()->back()->with('ERR', 'Username Telah Dipakai!')->withInput();
            }

            $emailTersedia = $this->manajemenUser->where('email', $request->email)->first();
            if ($emailTersedia !== null) {
                return redirect()->back()->with('ERR', 'Email Telah Dipakai!')->withInput();
            }

            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];

            $user = $this->manajemenUser->create($data);
            $user->syncRoles('Customer');

            DB::commit();

            return redirect()->route('login.index')->with('OK', 'Berhasil melakukan pendaftaran!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('ERR', 'Gagal melakukan pendaftaran: ' . $e->getMessage())->withInput();
        }
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
