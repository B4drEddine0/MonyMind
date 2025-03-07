<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Depences;
use App\Models\Epargne;
use App\Models\Souhait;
use App\Services\GeminiAiServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiAiServices $geminiService)
    {
        $this->geminiService = $geminiService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reccurents = Depences::where('user_id', auth()->user()->id)->where('is_recurring', true)->limit(3)->get();
        $souhaits = Souhait::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->limit(3)->get();
        $depences = Depences::where('user_id', auth()->user()->id)->orderBy('date', 'desc')->limit(4)->get();
        $depence = Depences::where('user_id', auth()->user()->id)->get();
        $totalDepences = $depence->sum('amount'); 
        $epargne = Epargne::where('user_id', auth()->user()->id)->get();
        $totalEpargne = $epargne->sum('saved_amount');
        $user = User::find(auth()->user()->id);

        $categoryCounts = Depences::select('category', DB::raw('count(*) as count'))
                            ->where('user_id', auth()->user()->id)
                            ->groupBy('category')
                            ->get()
                            ->map(function($item) {
                                return [
                                    'name' => $item->category,
                                    'count' => $item->count
                                ];
                            });

        $aianswer = $this->generateText();
    
        return view('dashboard', compact('user', 'totalDepences', 'totalEpargne', 'depences', 'souhaits', 'reccurents', 'categoryCounts', 'aianswer'));
    
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateText(){

        $prompt = "hi my name is badr";
        $response = $this->geminiService->generateResponse($prompt);
        return $response['candidates'][0]['content']['parts'][0]['text'];

    }

    
}
