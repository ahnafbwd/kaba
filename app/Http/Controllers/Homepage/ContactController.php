<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller;
class ContactController extends Controller
{
    public function submitForm(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ]);

    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'message' => $request->input('message'),
    ];

    $userEmail = $request->input('email');
    Mail::to($userEmail)->send(new ContactMail($data));

    return response()->json(['message' => 'Your message has been sent. Thank you!']);
}


}
