<?php

namespace App\Http\Controllers\Pengajarauth;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('pengajar.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Pengajar::class],
            'nomer_telepon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Pengajar::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomer_telepon' => $request->nomer_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('pengajar')->login($user);

        return redirect(RouteServiceProvider::PENGAJAR_HOME);
    }
}
