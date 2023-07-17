<?php

namespace App\Http\Controllers\Dashboarduser;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class PembayaranController extends Controller
{
    public function bayar(Request $request)
    {
        // Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-Nam6rFTxQxQnxTaQ6mQ5DM7c';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
    ),
    'customer_details' => array(
        'first_name' => 'budi',
        'last_name' => 'pratama',
        'email' => 'budi.pra@example.com',
        'phone' => '08111222333',
    ),
);

$snapToken = Snap::getSnapToken($params);
    }
}
