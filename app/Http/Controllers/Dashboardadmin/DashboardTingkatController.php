<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Tingkat;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardTingkatController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.tingkat.index',[
            'tingkats' => Tingkat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.tingkat.create');
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
            'nama_tingkat' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'min:30'],
            'ikon' => ['required', 'string'],
        ]);

        $tingkat = Tingkat::create([
            'nama_tingkat' => $request->nama_tingkat,
            'deskripsi' => $request->deskripsi,
            'ikon' => $request->ikon,
        ]);

        return redirect('/admin/dashboard/tingkat')->with('success','Tingkat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function show(Tingkat $tingkat)
    {
        return view('admin.dashboard.tingkat.show',[
            'tingkat' => $tingkat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tingkat $tingkat)
    {
        return view('admin.dashboard.tingkat.edit',[
            'tingkat' => $tingkat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tingkat $tingkat)
    {
        $rules = [
            'nama_tingkat' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'min:30'],
            'ikon' => ['required', 'string'],
        ];

        // Periksa apakah email berubah
        if ($request->nama_tingkat != $tingkat->nama_tingkat) {
            $rules['nama_tingkat'][] = 'unique:tingkats';
        }

        $validatedData = $request->validate($rules);

        // Update data pengguna
        $tingkat->update($validatedData);

        return redirect('/admin/dashboard/tingkat')->with('success', 'Tingkat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tingkat $tingkat)
    {
        Tingkat::destroy($tingkat->id);
        return redirect('/admin/dashboard/tingkat')->with('success',"Tingkat berhasil dihapus");

    }
}
