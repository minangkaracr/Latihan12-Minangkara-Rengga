<?php

namespace App\Http\Controllers;

use App\Models\HistoryChat;
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

    public function index(){
        $response =  HistoryChat::orderBy('id', 'desc')->get();
        return view("chatbot.index")->with("history_chat", $response);
    }

    public function store(Request $request){
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

        HistoryChat::insert([
            'send_chat' => $input,
            'get_chat'=> $chatBotResponse,
            'created_at'=> now()->format('Y-m-d H:i:s'),
            'updated_at'=> now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->back();
    }
}
