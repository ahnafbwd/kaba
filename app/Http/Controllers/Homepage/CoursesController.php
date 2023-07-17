<?php

namespace App\Http\Controllers\Homepage;

use App\Models\Program;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controller;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Program::all();

        return view('homepage.program', compact('courses'));
    }
    public function show(Program $program)
{
    $program->load('tingkat', 'materi', 'jadwal');
    return view('homepage.detailprogram', compact('program'));

}


}
