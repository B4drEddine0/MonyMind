<?php

namespace App\Http\Controllers;

use App\Models\Souhait;
use Illuminate\Http\Request;

class SouhaitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $souhaits = Souhait::where('user_id', auth()->id())->get();
        return view('souhait.index', compact('souhaits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('souhait.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'montant_estime' => 'required|numeric|min:0',
            'categorie' => 'required|string|max:255',
        ]);

        Souhait::create([
            'titre' => $request->titre,
            'montant_estime' => $request->montant_estime,
            'user_id' => auth()->id(),
            'categorie' => $request->categorie,
        ]);

        return redirect()->route('souhait.index')->with('success', 'Souhait créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Souhait $souhait)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Souhait $souhait)
    {
        return view('souhait.edit', compact('souhait'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Souhait $souhait)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'montant_estime' => 'required|numeric|min:0',
            'categorie' => 'required|string|max:255',
        ]);

        $souhait->update([
            'titre' => $request->titre,
            'montant_estime' => $request->montant_estime,
            'categorie' => $request->categorie,
        ]);

        return redirect()->route('souhait.index')->with('success', 'Souhait modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Souhait $souhait)
    {
        $souhait->delete();
        return redirect()->route('souhait.index')->with('success', 'Souhait supprimé avec succès');
    }
}
