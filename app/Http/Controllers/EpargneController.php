<?php

namespace App\Http\Controllers;

use App\Models\Epargne;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EpargneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $epargnes = Epargne::where('user_id', auth()->id())->orderBy('month_year', 'desc')->get();
        return view('epargner.index', compact('epargnes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentMonth = Carbon::now()->startOfMonth();
        $existingGoal = Epargne::where('user_id', auth()->id())
            ->whereDate('month_year', $currentMonth)
            ->first();

        if ($existingGoal) {
            return redirect()->route('epargner.index')
                ->with('error', 'Un objectif existe déjà pour ce mois.');
        }

        return view('epargner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'target_amount' => 'required|numeric|min:0',
        ]);

        $epargne = new Epargne();
        $epargne->user_id = auth()->id();
        $epargne->target_amount = $validated['target_amount'];
        $epargne->month_year = Carbon::now()->startOfMonth();
        $epargne->saved_amount = 0;
        $epargne->is_completed = false;
        $epargne->save();

        return redirect()->route('epargner.index')
            ->with('success', 'Objectif d\'épargne créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Epargne $epargner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Epargne $epargner)
    {
        return view('epargner.edit', compact('epargner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Epargne $epargner)
    {
        if ($epargner->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'target_amount' => 'required|numeric|min:0',
            'saved_amount' => 'required|numeric|min:0',
            'is_completed' => 'boolean',
        ]);

        $epargner->target_amount = $validated['target_amount'];
        $epargner->saved_amount = $validated['saved_amount'];
        $epargner->is_completed = $request->has('is_completed');

       
        if ($epargner->saved_amount >= $epargner->target_amount) {
            $epargner->is_completed = true;
        }

        $epargner->save();

        return redirect()->route('epargner.index')
            ->with('success', 'Objectif d\'épargne mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Epargne $epargner)
    {
  
        if ($epargner->user_id !== auth()->id()) {
            abort(403);
        }

        $epargner->delete();

        return redirect()->route('epargner.index')
            ->with('success', 'Objectif d\'épargne supprimé avec succès.');
    }
}
