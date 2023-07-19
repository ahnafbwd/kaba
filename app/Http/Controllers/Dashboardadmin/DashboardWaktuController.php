<?php

namespace App\Http\Controllers\Dashboardadmin;

use App\Models\Waktu;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DashboardWaktuController extends Controller
{

    public function index()
    {
        return view('admin.dashboard.waktu.index',[
            'waktus' => Waktu::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.waktu.create');
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
        'nama_waktu' => ['required', 'string', 'max:255'],
        'durasi' => ['required', 'numeric'],
        'waktu_mulai' => ['required'],
        'waktu_berakhir' => ['required'],
    ]);

    // Konstruksi format waktu yang sesuai
    $waktuMulaiFormatted = date('H:i:s', strtotime($request->waktu_mulai));
    $waktuBerakhirFormatted = date('H:i:s', strtotime($request->waktu_berakhir));

    $waktu = Waktu::create([
        'nama_waktu' => $request->nama_waktu,
        'durasi' => $request->durasi,
        'waktu_mulai' => $waktuMulaiFormatted,
        'waktu_berakhir' => $waktuBerakhirFormatted,
    ]);

    return redirect('/admin/waktu')->with('success', 'Waktu berhasil ditambahkan');
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function show(Waktu $waktu)
    {
        return view('admin.dashboard.waktu.show',[
            'waktu' => $waktu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function edit(Waktu $waktu)
    {
        return view('admin.dashboard.waktu.edit',[
            'waktu' => $waktu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Waktu $waktu)
{
    $request->validate([
        'nama_waktu' => ['required', 'string', 'max:255', Rule::unique('waktus')->ignore($waktu->id)],
        'durasi' => ['required', 'numeric'],
        'waktu_mulai' => ['required'],
        'waktu_berakhir' => ['required'],
    ]);

    // Konstruksi format waktu yang sesuai
    $waktuMulaiFormatted = date('H:i:s', strtotime($request->waktu_mulai));
    $waktuBerakhirFormatted = date('H:i:s', strtotime($request->waktu_berakhir));

    $waktu->nama_waktu = $request->nama_waktu;
    $waktu->durasi = $request->durasi;
    $waktu->waktu_mulai = $waktuMulaiFormatted;
    $waktu->waktu_berakhir = $waktuBerakhirFormatted;
    $waktu->save();

    return redirect('/admin/waktu')->with('success', 'Waktu berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Waktu  $waktu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Waktu $waktu)
    {
        Waktu::destroy($waktu->id);
        return redirect('/admin/waktu')->with('success','Waktu berhasil dihapus');
    }
}
