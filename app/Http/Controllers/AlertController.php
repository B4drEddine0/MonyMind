<?php

namespace App\Http\Controllers;

use App\Models\alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alert = alert::where('user_id', auth()->id())->latest()->first(['id','porcentage','user_id']);
        return view('alert.index', compact('alert'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'porcentage' => 'required|integer'
        ]);

        alert::create([
            'porcentage' => $request->porcentage,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('alert.index')->with('success', 'Alerte créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(alert $alert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alert $alert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alert $alert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alert $alert)
    {
        Alert::where('user_id', $alert->user_id)->delete();
        
        return redirect()->route('alert.index')
            ->with('success', 'Configuration d\'alerte réinitialisée avec succès');
    }
}
