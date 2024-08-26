<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeminiAIController extends Controller
{
    protected $geminiService;

    // public function __construct(GeminiService $geminiService){
    //     $this->geminiService = $geminiService;
    // }

    public function handleChat(Request $request){
        $input = $request->input('question');

        // construct API dengan Key
        $url = env('GEMINI_API_BASE_URL').env('GEMINI_API_KEY');

        $payload = [
            "contents"=>[
                [
                    "parts"=>[
                        [
                            "text"=>$input
                        ]
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ]
        )->post($url, $payload);
        // DD seperti echo response
            // dd($response->json());
        $chatBotResponse = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No Response';

        return redirect()->back()->with([
            'response'=> $chatBotResponse,
            'inputan' => $input
        ]);
    }
}
