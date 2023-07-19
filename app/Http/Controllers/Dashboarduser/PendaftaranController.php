<?php

namespace App\Http\Controllers\Dashboarduser;

use App\Models\Kelompok;
use App\Models\Pendaftaran;
use App\Models\Program;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;
use Midtrans\Snap;

class PendaftaranController extends Controller
{
    public function index()
    {
        $kodeUser = Auth::guard('web')->user()->kode_user;
$datapendaftar = Pendaftaran::where('kode_user', $kodeUser)->first();

if (!$datapendaftar) {
    // Tidak ada data pendaftaran, tampilkan tampilan gagal atau pesan yang sesuai
    return view('user.dashboard.transaksi.gagal');
} else {
    $pendaftaran = Pendaftaran::where('kode_user', $kodeUser)->first()->get();
    return view('user.dashboard.transaksi.index', [
        'pendaftarans' => $pendaftaran,
    ]);
}

    }

    public function create()
    {

    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'kode_kelas' => 'required',
        ]);

        $kodeUser = Auth::guard('web')->user()->kode_user;
        $validatedData['kode_user'] = $kodeUser;
        $kelompok = Kelompok::with('program')->where('kode_kelas', $validatedData['kode_kelas'])->first();
        $validatedData['jumlah_pembayaran'] = $kelompok->program->harga;


        $pendaftaran = Pendaftaran::create($validatedData);

         // Melakukan penambahan 1 pada jumlah siswa pada tabel Kelompok
        // $kodeKelas = $validatedData['kode_kelas'];
        // $kelompok = Kelompok::where('kode_kelas', $kodeKelas)->first();
        // $kelompok->increment('jumlah_siswa');

        // return dd([$request,$validatedData]);


        // Lakukan operasi lain yang Anda perlukan, misalnya mengirim email pemberitahuan, dll.

        return $this->show($pendaftaran);
    }


    public function show(Pendaftaran $pendaftaran)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pendaftaran->kode_pendaftaran,
                'gross_amount' => $pendaftaran->kelompok->program->harga,
            ),
            'customer_details' => array(
                'fisrt_name' => Auth::guard('web')->user()->nama_lengkap,
                'last_name' => '',
                'phone' => Auth::guard('web')->user()->nomer_telepon,
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        return view('user.dashboard.transaksi.detail', compact('pendaftaran','snapToken'));

    }


    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }


    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        //
    }

   
    public function destroy(Pendaftaran $pendaftaran)
    {
        $programe = $pendaftaran->kelompok->program->kode_program;
        Pendaftaran::destroy($pendaftaran->id);
        return redirect('/user/program/'. $programe)->with('success','Pendaftaran berhasil dibatalkan');
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $pendaftaran = Pendaftaran::where('kode_pendaftaran', $request->order_id)->first();
                $pendaftaran->update(['status_pendaftaran' => 'Berhasil','status_pembayaran' => 'Berhasil']);
                // Membuat data siswa baru
                $siswa = new Siswa();
                $siswa->kode_user = $pendaftaran->kode_user;
                $siswa->kode_pendaftaran = $pendaftaran->kode_pendaftaran;
                $siswa->kode_kelas = $pendaftaran->kelompok->kode_kelas;
                $siswa->tanggal_masuk = now();
                $siswa->save();
                $kodeKelas = $pendaftaran->kelompok->kode_kelas;
                $kelompok = Kelompok::where('kode_kelas', $kodeKelas)->first();
                $kelompok->increment('jumlah_siswa');
            }
        }
    }
//     public function checkout(Pendaftaran $pendaftaran)
// {
//     $transaction_details = [
//         'order_id' => $pendaftaran->kode_pendaftaran, // Ganti dengan order ID unik Anda
//         'gross_amount' => $pendaftaran->kelompok->program->harga, // Ganti dengan jumlah pembayaran yang diinginkan
//     ];

//     $snapToken = Snap::getSnapToken($transaction_details);

//     return view('user.dashboard.transaksi.checkout', compact('snapToken'));
// }
//     public function checkout(Pendaftaran $pendaftaran)
// {
//         // Set your Merchant Server Key
//         \Midtrans\Config::$serverKey = config('midtrans.server_key');
//         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
//         \Midtrans\Config::$isProduction = false;
//         // Set sanitization on (default)
//         \Midtrans\Config::$isSanitized = true;
//         // Set 3DS transaction for credit card to true
//         \Midtrans\Config::$is3ds = true;

//         $params = array(
//             'transaction_details' => array(
//                 'order_id' => $pendaftaran->kode_pendaftaran,
//                 'gross_amount' => $pendaftaran->kelompok->program->harga,
//             ),
//             'customer_details' => array(
//                 'name' => Auth::guard('web')->user()->nama_lengkap,
//                 'email' => Auth::guard('web')->user()->email,
//                 'phone' => Auth::guard('web')->user()->nomer_lengkap,
//             ),
//         );

//         $snapToken = Snap::getSnapToken($params);
//         return view('user.dashboard.transaksi.checkout', compact('snapToken'));
// }

}
