<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiAiServices
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function generateResponse($prompt)
    {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$this->apiKey}";
        
        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ]
        ];

        $response = Http::withoutVerifying()->post($url, $data);
        
        if ($response->successful()) {
            return $response->json();
        }

        return [
            'error' => 'Failed to generate response',
            'details' => $response->json()
        ];
    }
}