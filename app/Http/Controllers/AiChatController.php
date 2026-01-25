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
        
        // System Prompt yang lebih detail
        $systemPrompt = "Anda adalah asisten AI profesional untuk PT Tirta Bhumi Indonesia (Tirtabhumi).
        Tirtabhumi adalah perusahaan solusi digital, infrastruktur IT, dan pengadaan.
        
        Layanan Utama:
        1. Digital: Pembuatan Web & Aplikasi, AI Automation, Digital Marketing (Google Ads, Meta Ads).
        2. Infrastruktur: Instalasi Jaringan (Managed Wi-Fi), CCTV (Keamanan), Server Maintenance.
        3. UpVenture: Platform edukasi teknologi (UI/UX, Coding, Data Science, AI) dengan kurikulum berbasis proyek.
        4. Pengadaan: Penyewaan/Penjualan perangkat IT, Perawatan fasilitas (Gardening/Kebersihan).

        Target Market: B2G (Pemerintah), Enterprise, Universitas/Sekolah, Hotel, dan UMKM.
        
        Tujuan Anda: Memberikan konsultasi awal yang ramah untuk industri '{$industry}'.
        Aturan Penting:
        - Jika ditanya harga, jelaskan ada paket-paket (Starter, Business, Enterprise) dan arahkan untuk konsultasi lebih lanjut via WhatsApp.
        - Jika ditanya hal teknis di luar layanan Tirtabhumi, arahkan kembali ke solusi Tirtabhumi.
        - SELALU gunakan Bahasa Indonesia yang santun.
        - Respons harus ringkas (max 3 kalimat).
        - Anda Sedang mensimulasikan percakapan konsultasi nyata.";

        // Ambil riwayat dari session
        $history = session()->get('ai_chat_history', []);
        $currentIndustry = session()->get('ai_chat_industry');

        // Reset riwayat jika industri berubah
        if ($currentIndustry !== $industry) {
            $history = [];
            session()->put('ai_chat_industry', $industry);
        }

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt]
        ];

        // Tambahkan riwayat ke pesan (maksimal 6 pesan terakhir agar tidak terlalu panjang)
        $history = array_slice($history, -6);
        foreach ($history as $msg) {
            $messages[] = $msg;
        }

        // Tambahkan pesan user saat ini
        $messages[] = ['role' => 'user', 'content' => $request->message];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => $messages,
                'max_tokens' => 200,
                'temperature' => 0.7,
            ]);

            if ($response->successful()) {
                $reply = $response->json('choices.0.message.content');
                
                // Simpan ke riwayat
                $history[] = ['role' => 'user', 'content' => $request->message];
                $history[] = ['role' => 'assistant', 'content' => $reply];
                session()->put('ai_chat_history', $history);

                return response()->json([
                    'reply' => $reply,
                ]);
            }

            return response()->json([
                'error' => 'Gagal terhubung dengan layanan AI.',
                'details' => $response->body(),
            ], 500);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan sistem.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
