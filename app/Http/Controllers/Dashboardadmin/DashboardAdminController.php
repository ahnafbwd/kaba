<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardAdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.admin.index',[
            'admins' => Admin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
            'nomer_telepon' => ['required', 'numeric'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomer_telepon' => $request->nomer_telepon,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/manager')->with('success','Admin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.dashboard.admin.show',[
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.dashboard.admin.edit',[
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $rules = [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nomer_telepon' => ['required', 'numeric'],
        ];

        // Periksa apakah email berubah
        if ($request->email != $admin->email) {
            $rules['email'][] = 'unique:admins';
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $admin->update($validatedData);

        return redirect('/admin/manager')->with('success', 'Data admin berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        Admin::destroy($admin->id);
        return redirect('/admin/manager')->with('success','Admin berhasil dihapus');
    }
}
