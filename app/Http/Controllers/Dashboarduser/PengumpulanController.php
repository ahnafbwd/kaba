<?php

namespace App\Http\Controllers\Dashboarduser;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PengumpulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all pengumpulans
        $pengumpulans = Pengumpulan::all();
        return view('user.dashboard.pengumpulan.index', compact('pengumpulans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form for creating a new pengumpulan
        return view('dashboardpengajar.pengumpulan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Define your validation rules for each field here
        ]);

        // Create a new pengumpulan record with the validated data
        Pengumpulan::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('pengumpulan.index')->with('success', 'Pengumpulan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumpulan $pengumpulan)
    {
        // Show the details of the specified pengumpulan
        return view('dashboardpengajar.pengumpulan.show', compact('pengumpulan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumpulan $pengumpulan)
    {
        // Show the edit form for the specified pengumpulan
        return view('dashboardpengajar.pengumpulan.edit', compact('pengumpulan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumpulan $pengumpulan)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Define your validation rules for each field here
        ]);

        // Update the pengumpulan record with the validated data
        $pengumpulan->update($validatedData);

        // Redirect back to the show page with success message
        return redirect()->route('pengumpulan.show', $pengumpulan)->with('success', 'Pengumpulan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumpulan  $pengumpulan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumpulan $pengumpulan)
    {
        // Delete the pengumpulan record from the database
        $pengumpulan->delete();

        // Redirect back to the index page with success message
        return redirect()->route('pengumpulan.index')->with('success', 'Pengumpulan deleted successfully.');
    }
}

