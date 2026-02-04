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

        $apiKey = config('openai.api_key');

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
                        'model' => config('openai.model', 'gpt-3.5-turbo'),
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

            // Fallback jika API gagal (Non-200 OK)
            \Log::warning('OpenAI API Failed, using fallback.', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return $this->getFallbackResponse($industry, $request->message);

        } catch (\Exception $e) {
            \Log::error('AI System Error, using fallback: ' . $e->getMessage());

            return $this->getFallbackResponse($industry, $request->message);
        }
    }

    private function getFallbackResponse($industry, $message)
    {
        $message = strtolower($message);
        $reply = "";

        // Logika Respons Simulasi Berbasis Keyword
        if (str_contains($message, 'harga') || str_contains($message, 'biaya') || str_contains($message, 'price')) {
            $reply = "Untuk harga, kami memiliki paket Starter, Business, dan Enterprise yang fleksibel. Sebaiknya kita diskusikan detail kebutuhan Anda via WhatsApp agar penawarannya akurat.";
        } elseif (str_contains($message, 'kontak') || str_contains($message, 'hubungi') || str_contains($message, 'wa')) {
            $reply = "Anda bisa menghubungi tim ahli kami langsung melalui WhatsApp di nomor 0822-2904-6099. Kami siap membantu!";
        } elseif (str_contains($message, 'lokasi') || str_contains($message, 'alamat')) {
            $reply = "Kantor kami berbasis di lokasi strategis. Namun, layanan digital kami mencakup seluruh Indonesia. Kami juga bisa menjadwalkan kunjungan jika diperlukan.";
        } else {
            // Respons spesifik industri
            switch ($industry) {
                case 'Logistics':
                    if (str_contains($message, 'tracking') || str_contains($message, 'lacak')) {
                        $reply = "Tirtabhumi dapat mengimplementasikan sistem IoT GPS Tracking realtime untuk armada logistik Anda, terintegrasi dengan dashboard monitoring terpusat.";
                    } elseif (str_contains($message, 'gudang') || str_contains($message, 'warehouse')) {
                        $reply = "Kami memiliki solusi Warehouse Management System (WMS) yang dapat mengotomatisasi pencatatan stok dan alur barang masuk/keluar menggunakan barcode/RFID.";
                    } else {
                        $reply = "Untuk industri Logistik, kami fokus pada efisiensi rute, tracking armada, dan manajemen gudang digital. Apa tantangan logistik terbesar Anda saat ini?";
                    }
                    break;

                case 'Manufacture':
                    if (str_contains($message, 'produksi') || str_contains($message, 'mesin')) {
                        $reply = "Kami bisa membantu memonitor kinerja mesin produksi menggunakan sensor IoT (OEE Monitoring) untuk mencegah downtime yang tidak terencana.";
                    } elseif (str_contains($message, 'karyawan') || str_contains($message, 'absen')) {
                        $reply = "Solusi HRIS dan absensi berbasis wajah (Face Recognition) kami sangat cocok untuk lingkungan pabrik dengan ribuan karyawan.";
                    } else {
                        $reply = "Di Manufaktur, Tirtabhumi membantu digitalisasi lantai produksi (Shop Floor) dan integrasi data inventaris. Bagian mana yang ingin Anda optimalkan?";
                    }
                    break;

                case 'Edukasi':
                    if (str_contains($message, 'siswa') || str_contains($message, 'belajar')) {
                        $reply = "Platform e-learning kami mendukung pembelajaran hibrida (online/offline) manajemen tugas, dan ujian online yang aman.";
                    } elseif (str_contains($message, 'wifi') || str_contains($message, 'internet')) {
                        $reply = "Kami menyediakan Managed Wi-Fi Service khusus sekolah/kampus dengan filter konten positif dan manajemen bandwidth yang adil untuk ribuan siswa.";
                    } else {
                        $reply = "Kami membantu transformasi digital sekolah & kampus, mulai dari PPDB Online, Sistem Akademik, hingga Laboratorium Komputer. Layanan apa yang sekolah Anda butuhkan?";
                    }
                    break;

                case 'Pelatihan':
                    if (str_contains($message, 'materi') || str_contains($message, 'kurikulum')) {
                        $reply = "Melalui UpVenture, kami menyediakan kurikulum teknologi terkini (Coding, Data, AI) yang siap pakai untuk lembaga pelatihan Anda.";
                    } else {
                        $reply = "Kami mendukung lembaga pelatihan dengan Platform LMS (Learning Management System) white-label yang bisa menggunakan brand Anda sendiri.";
                    }
                    break;

                case 'Wifi':
                    if (str_contains($message, 'lemot') || str_contains($message, 'cepat')) {
                        $reply = "Layanan Managed Service kami menjamin kestabilan koneksi dengan perangkat Enterprise Grade (Aruba/Ruckus/Ubiquiti) dan monitoring 24/7.";
                    } else {
                        $reply = "Solusi Wi-Fi Tirtabhumi mencakup desain coverage area, instalasi rapi, hingga manajemen user hotspot/voucher. Berapa luas area yang ingin dicover?";
                    }
                    break;

                default: // General
                    $reply = "Tirtabhumi menyediakan solusi Digital, Infrastruktur IT, dan Pengadaan. Apakah Anda ingin mendiskusikan pembuatan Website, Aplikasi, atau instalasi Jaringan?";
                    break;
            }
        }

        return response()->json([
            'reply' => $reply . " (Demo Simulation)",
        ]);
    }
}
