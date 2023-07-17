<?php

namespace App\Http\Controllers\Homepage;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {

        return view('homepage.home');
    }
    public function userdashboard()
    {

        return view('user.dashboard.dashboard');
    }
    public function userkelas()
    {

        return view('user.dashboard.kelas.index');
    }
}
