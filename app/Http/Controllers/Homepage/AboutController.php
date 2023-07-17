<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }
}
