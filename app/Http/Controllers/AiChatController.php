<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'industry' => 'nullable|string',
        ]);

        $apiKey = env('OPENAI_API_KEY', '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');

        $industry = $request->input('industry', 'General');
        $systemPrompt = "Anda adalah asisten AI yang membantu untuk PT Tirta Bhumi Indonesia, perusahaan solusi digital dan pengadaan. Anda profesional, ramah, dan ringkas. Anda sedang mensimulasikan konsultasi untuk klien di industri '{$industry}'. Sesuaikan respon Anda agar relevan dengan {$industry}. SELALU gunakan Bahasa Indonesia.";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => $systemPrompt,
                    ],
                    [
                        'role' => 'user',
                        'content' => $request->message,
                    ],
                ],
                'max_tokens' => 150,
            ]);

            if ($response->successful()) {
                return response()->json([
                    'reply' => $response->json('choices.0.message.content'),
                ]);
            }

            return response()->json([
                'error' => 'Failed to communicate with AI service.',
                'details' => $response->body(),
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
