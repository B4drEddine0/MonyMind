<?php

namespace App\Http\Controllers;

use App\Models\Depences;
use App\Models\User;
use App\Models\Epargne;
use App\Models\Category;
use Illuminate\Http\Request;


class DepencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Depences $depence , Epargne $epargne)
    {
        $depences = auth()->user()->depences()->latest()->paginate(8);
        return view('depences.index', compact('depences'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('depences.create', compact('categories'));
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
        // if(!$request->is_recurring){
            $user = auth()->user();
            $user->budget = $user->budget - $validated['amount'];
            $user->save();
        // }
        
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
        $categories = Category::all();
        return view('depences.edit', compact('depence','categories'));
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
    public function destroy(Depences $depence, User $user)
    {
        $depence->delete();
        $user = auth()->user();
        $user->budget = $user->budget + $depence->amount;
        $user->save();
        return redirect()->route('depences.index');
    }
}
