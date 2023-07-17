<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Angkatan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardAngkatanController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.angkatan.index',[
            'angkatans' => Angkatan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.angkatan.create');
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
            'angkatan' => ['required', 'numeric', 'unique:'.Angkatan::class],
            'tanggal_masuk' => ['required', 'date'],
            'tanggal_lulus' => ['nullable','date'],
        ]);

        $angkatan = Angkatan::create([
            'angkatan' => $request->angkatan,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_lulus' => $request->tanggal_lulus,
        ]);

        return redirect('/admin/dashboard/angkatan')->with('success','Angkatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function show(Angkatan $angkatan)
    {
        return view('admin.dashboard.angkatan.show',[
            'angkatan' => $angkatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Angkatan $angkatan)
    {
        return view('admin.dashboard.angkatan.edit',[
            'angkatan' => $angkatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        $rules = [
            'angkatan' => ['required', 'numeric'],
            'tanggal_masuk' => ['required', 'date'],
            'tanggal_lulus' => ['date'],
        ];

        // Periksa apakah email berubah
        if ($request->angkatan != $angkatan->angkatan) {
            $rules['angkatan'][] = 'unique:angkatans';
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $angkatan->update($validatedData);

        return redirect('/admin/dashboard/angkatan')->with('success', 'Angkatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angkatan $angkatan)
    {
        Angkatan::destroy($angkatan->id);
        return redirect('/admin/dashboard/angkatan')->with('success','Angkatan berhasil dihapus');
    }
}
