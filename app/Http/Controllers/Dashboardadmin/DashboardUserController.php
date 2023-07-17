<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardUserController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.user.index',[
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'nomer_telepon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomer_telepon' => $request->nomer_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/dashboard/user')->with('success','User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.dashboard.user.show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.dashboard.user.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nomer_telepon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
        ];

        // Periksa apakah email berubah
        if ($request->email != $user->email) {
            $rules['email'][] = 'unique:users';
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $user->update($validatedData);

        return redirect('/admin/dashboard/user')->with('success', 'Data pengguna berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/dashboard/user')->with('success','User berhasil dihapus');
    }
}
