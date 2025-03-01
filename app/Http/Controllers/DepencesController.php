<?php

namespace App\Http\Controllers;

use App\Models\Depences;
use Illuminate\Http\Request;


class DepencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depences = auth()->user()->depences()->latest()->get();
        return view('depences.index', compact('depences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('depences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'is_recurring' => 'boolean',
            'recurrence_schedule' => 'required_if:is_recurring,true|string',
            'notes' => 'nullable|string'
        ]);

        $validated['is_recurring'] = (bool) $request->input('is_recurring');

        if (!$validated['is_recurring']) {
            $validated['recurrence_schedule'] = null;
        }

        auth()->user()->depences()->create($validated);

        return redirect()->route('depences.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Depences $depences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depences $depence)
    {
        return view('depences.edit', compact('depence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depences $depence)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'is_recurring' => 'boolean',
            'recurrence_schedule' => 'required_if:is_recurring,true|string',
            'notes' => 'nullable|string'
        ]);

        $validated['is_recurring'] = (bool) $request->input('is_recurring');

        if (!$validated['is_recurring']) {
            $validated['recurrence_schedule'] = null;
        }

        $depence->update($validated);

        return redirect()->route('depences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depences $depence)
    {
        $depence->delete();
        return redirect()->route('depences.index');
    }
}
