<x-layout title="Wifi Bisnis Premium - Solusi Internet Broadband Kantor & Corporate"
    description="Pilihan utama Business Owner & IT Manager. Layanan Internet Broadband 1:1 stabil untuk operasional perusahaan. Tingkatkan produktivitas tim dengan uptime 99.9% dan support prioritas.">
    
    <style>
        html { scroll-behavior: smooth; }
        [x-cloak] { display: none !important; }
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(99, 102, 241, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(99, 102, 241, 0.04) 1px, transparent 1px);
            background-size: 48px 48px;
        }
        .neu-card {
            background: #eef2f6;
            box-shadow: 8px 8px 20px #d1d9e6, -8px -8px 20px #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 1.5rem;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .neu-card:hover {
            transform: translateY(-6px);
            box-shadow: 12px 12px 28px #c8d0db, -12px -12px 28px #ffffff;
        }
        .neu-cta {
            background: #eef2f6;
            box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            text-align: center;
            font-weight: 700;
            font-size: 0.875rem;
        }
        .neu-cta-filled {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff, 0 4px 16px rgba(99, 102, 241, 0.3);
            border: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.875rem 1rem;
            font-weight: 700;
            font-size: 0.875rem;
            color: #ffffff;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-[#eef2f6] overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-sm font-bold tracking-wide mb-6">WIFI BISNIS TERBAIK</span>
            <h1 class="text-4xl md:text-6xl font-bold text-slate-800 mb-6 leading-tight">Internet Broadband <br/><span class="text-indigo-600">Untuk Bisnis Anda</span></h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto mb-10">Koneksi internet tanpa hambatan dengan bandwidth simetris 1:1. Dirancang untuk performa maksimal operasional bisnis Anda.</p>
            
            @if(session('success'))
                <div class="max-w-xl mx-auto mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-bold italic animate-bounce">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </section>

    <!-- Pricing Section -->
    <!-- Pricing Section -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <section class="py-20 bg-[#eef2f6]" x-data="{ openModal: false }" @keydown.escape.window="openModal = false" x-effect="document.body.classList.toggle('overflow-hidden', openModal)">
        <div class="container mx-auto px-6 text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-xs font-bold tracking-widest mb-4 uppercase">Paket Internet Broadband</span>
            <h2 class="text-3xl font-bold text-slate-800 mb-3">Internet Broadband Rasio 1:1</h2>
            <p class="text-slate-500 max-w-xl mx-auto mb-12">Koneksi internet broadband dengan bandwidth downstream dan upstream seimbang (1:1) untuk performa maksimal.</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $packages = [
                        ['badge' => 'PSB 70% - 50', 'name' => '50 Mbps', 'desc' => 'Bisnis PSB 70% - 50 Mbps', 'price' => '439.000'],
                        ['badge' => 'PSB 70% - 75', 'name' => '75 Mbps', 'desc' => 'Bisnis PSB 70% - 75 Mbps', 'price' => '519.000'],
                        ['badge' => 'PSB 70% - 100', 'name' => '100 Mbps', 'desc' => 'Bisnis PSB 70% - 100 Mbps', 'price' => '669.000'],
                        ['badge' => 'PSB 70% - 150', 'name' => '150 Mbps', 'desc' => 'Bisnis PSB 70% - 150 Mbps', 'price' => '819.000'],
                        ['badge' => 'PSB 70% - 200', 'name' => '200 Mbps', 'desc' => 'Bisnis PSB 70% - 200 Mbps', 'price' => '1.049.000'],
                        ['badge' => 'PSB 70% - 300', 'name' => '300 Mbps', 'desc' => 'Bisnis PSB 70% - 300 Mbps', 'price' => '1.499.000'],
                    ];
                @endphp

                @foreach($packages as $pkg)
                <div class="neu-card p-8 flex flex-col h-full text-left">
                    <!-- Badge -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-block px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-[10px] font-bold tracking-widest uppercase">{{ $pkg['badge'] }}</span>
                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <!-- Speed & Desc -->
                    <h3 class="text-2xl font-bold text-slate-800 mb-1">{{ $pkg['name'] }}</h3>
                    <p class="text-sm text-slate-500 mb-5">{{ $pkg['desc'] }}</p>
                    <!-- Price -->
                    <div class="mb-1">
                        <span class="text-3xl font-extrabold text-slate-800">Rp {{ $pkg['price'] }}</span>
                        <span class="text-slate-500 text-sm"> /bulan</span>
                    </div>
                    <p class="text-xs text-slate-400 mb-6">Harga belum termasuk PPN</p>
                    <!-- Features -->
                    <ul class="space-y-3 mb-8 flex-grow">
                        <li class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            Pengalaman Internet Unlimited
                        </li>
                        <li class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            Bandwidth Download & Upload 1:1
                        </li>
                        <li class="flex items-center gap-2 text-sm text-slate-600">
                            <svg class="w-4 h-4 text-indigo-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            IP Private (Non Public)
                        </li>
                    </ul>
                    <a href="{{ route('wifi.bisnis.register', ['package' => $pkg['name']]) }}" class="neu-cta-filled">Pilih Paket</a>
                    
                    <!-- S&K Trigger -->
                    <button type="button" @click="openModal = true" class="mt-4 text-[10px] text-slate-400 hover:text-indigo-500 underline text-center w-full">
                        *Syarat & Ketentuan Berlaku
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        <!-- T&C Modal -->
        <template x-teleport="body">
            <div x-show="openModal" class="fixed inset-0 z-[9999] flex items-center justify-center p-4 sm:p-6" x-cloak>
                <!-- Overlay -->
                <div x-show="openModal" 
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100" 
                    x-transition:leave="transition ease-in duration-200" 
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0" 
                    class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"
                    style="background-color: rgba(15, 23, 42, 0.6);"
                    @click="openModal = false">
                </div>
                
                <!-- Modal Content -->
                <div x-show="openModal" 
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave="transition ease-in duration-200" 
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    class="bg-[#eef2f6] w-full max-w-2xl rounded-2xl shadow-2xl border border-white/50 max-h-full overflow-y-auto relative z-10 text-left"
                    style="background-color: #eef2f6;">
                    
                    <!-- Header -->
                    <div class="sticky top-0 bg-[#eef2f6]/95 backdrop-blur-md px-6 py-4 border-b border-slate-200 flex justify-between items-center z-20">
                        <h3 class="text-lg font-bold text-slate-800">Syarat & Ketentuan Layanan</h3>
                        <button @click="openModal = false" class="text-slate-400 hover:text-red-500 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="p-6 space-y-6 text-sm text-slate-600 leading-relaxed">
                        
                        <!-- Generated Content -->
                        <div class="prose prose-sm max-w-none prose-slate">
                            <p class="font-bold text-base text-slate-800">1. Ketentuan Umum</p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Layanan Internet Broadband Tirtanet Bisnis ditujukan khusus untuk penggunaan korporasi, kantor, dan instansi komersial.</li>
                                <li>Pelanggan wajib melampirkan dokumen legalitas usaha (NPWP, NIB/SIUP) saat pendaftaran.</li>
                                <li>Harga yang tertera belum termasuk PPN 11%.</li>
                            </ul>

                            <p class="font-bold text-base text-slate-800 mt-4">2. Perjanjian Tingkat Layanan (SLA)</p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Kami menjamin uptime koneksi sebesar <strong>99.9%</strong> setiap bulannya.</li>
                                <li>Dukungan teknis prioritas tersedia 24/7 melalui hotline khusus bisnis.</li>
                                <li>Estimasi waktu penanganan gangguan (MTTR) maksimal 4 jam sejak laporan diterima.</li>
                            </ul>

                            <p class="font-bold text-base text-slate-800 mt-4">3. Instalasi & Perangkat</p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Biaya instalasi (OTC) mungkin berlaku tergantung pada hasil survei lokasi dan tingkat kesulitan pemasangan.</li>
                                <li>Perangkat modem/ONT dipinjamkan selama masa berlangganan aktif. Kerusakan perangkat akibat kelalaian pelanggan (tersambar petir karena grounding buruk elektrikal gedung, terkena air, dll) menjadi tanggung jawab pelanggan.</li>
                            </ul>

                            <p class="font-bold text-base text-slate-800 mt-4">4. Pembayaran & Kontrak</p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Kontrak berlangganan minimal 12 (dua belas) bulan.</li>
                                <li>Pembayaran tagihan dilakukan maksimal tanggal 20 setiap bulannya.</li>
                                <li>Pemutusan layanan sebelum masa kontrak berakhir akan dikenakan denda penalti sebesar sisa bulan kontrak.</li>
                            </ul>

                            <p class="font-bold text-base text-slate-800 mt-4">5. Lain-lain</p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Dilarang menggunakan layanan untuk kegiatan ilegal atau melanggar hukum di Indonesia.</li>
                                <li>Tirtanet berhak melakukan penyesuaian layanan jika ditemukan indikasi penyalahgunaan bandwidth yang mengganggu integritas jaringan utama.</li>
                            </ul>
                        </div>

                        <div class="mt-6 pt-6 border-t border-slate-200 flex justify-end">
                            <button @click="openModal = false" class="px-6 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-lg font-bold transition text-xs">
                                SAYA MENGERTI
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </section>

    <!-- Pain Point Section -->
    <section class="py-16 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <span class="inline-block px-4 py-1.5 rounded-full bg-red-50 border border-red-100 text-red-500 text-xs font-bold tracking-widest mb-4 uppercase">Masalah yang Sering Terjadi</span>
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Internet Lambat = Bisnis Terhambat</h2>
                <p class="text-slate-500">Setiap detik koneksi putus, produktivitas tim Anda ikut terganggu. Apakah ini terasa familiar?</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                @foreach([
                    ['icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'color' => 'text-red-400', 'bg' => 'bg-red-50', 'title' => 'Video Call Putus-Putus', 'desc' => 'Meeting penting dengan klien terganggu karena koneksi tidak stabil di jam sibuk.'],
                    ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'text-amber-400', 'bg' => 'bg-amber-50', 'title' => 'Upload & Download Lambat', 'desc' => 'Kirim file besar, backup data, atau akses cloud terasa seperti menunggu selamanya.'],
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'color' => 'text-indigo-400', 'bg' => 'bg-indigo-50', 'title' => 'Banyak User, Koneksi Drop', 'desc' => 'Semakin banyak karyawan online, internet makin lemot. Tidak ideal untuk operasional kantor.'],
                ] as $pain)
                <div class="neu-card p-6 flex gap-4 items-start">
                    <div class="w-10 h-10 rounded-xl {{ $pain['bg'] }} flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 {{ $pain['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $pain['icon'] }}"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 mb-1">{{ $pain['title'] }}</h3>
                        <p class="text-sm text-slate-500">{{ $pain['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Dedicated Internet Section -->
    <section class="py-16 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Left: Text -->
                    <div>
                        <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-xs font-bold tracking-widest mb-4 uppercase">Solusi Tepat untuk Bisnis</span>
                        <h2 class="text-3xl font-bold text-slate-800 mb-5 leading-snug">Kenapa Bisnis Anda Butuh <span class="text-indigo-600">Internet Broadband?</span></h2>
                        <p class="text-slate-500 mb-6">Internet biasa (shared) membagi bandwidth dengan ratusan pengguna lain. Hasilnya? Koneksi tidak konsisten, terutama di jam sibuk. Internet broadband memberikan jalur eksklusif khusus untuk bisnis Anda — stabil, cepat, dan bisa diandalkan 24/7.</p>
                        <ul class="space-y-3">
                            @foreach([
                                'Bandwidth tidak dibagi dengan pengguna lain',
                                'Kecepatan upload = download (1:1 ratio)',
                                'SLA uptime terjamin untuk operasional kritis',
                                'Cocok untuk VoIP, cloud ERP, video conference',
                                'Dukungan teknis prioritas kapan pun dibutuhkan',
                            ] as $point)
                            <li class="flex items-start gap-3 text-sm text-slate-600">
                                <svg class="w-5 h-5 text-indigo-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                {{ $point }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Right: Stats Cards -->
                    <div class="grid grid-cols-2 gap-4">
                        @foreach([
                            ['val' => '1:1', 'label' => "Rasio Bandwidth\nSimetris", 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'color' => 'text-indigo-500'],
                            ['val' => '99.9%', 'label' => "Uptime\nTerjamin", 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'text-green-500'],
                            ['val' => '24/7', 'label' => "Dukungan\nTeknis", 'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'text-blue-500'],
                            ['val' => 'Broadband', 'label' => "Jalur Eksklusif\nHanya untuk Anda", 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z', 'color' => 'text-purple-500'],
                        ] as $stat)
                        <div class="neu-card p-5 text-center">
                            <svg class="w-7 h-7 {{ $stat['color'] }} mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"></path></svg>
                            <div class="text-2xl font-extrabold text-slate-800">{{ $stat['val'] }}</div>
                            <div class="text-xs text-slate-500 mt-1 whitespace-pre-line">{{ $stat['label'] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who Is This For Section -->
    <section class="py-16 bg-[#eef2f6]">
        <div class="container mx-auto px-6 text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-xs font-bold tracking-widest mb-4 uppercase">Untuk Siapa?</span>
            <h2 class="text-3xl font-bold text-slate-800 mb-3">Solusi Ini Tepat untuk Anda</h2>
            <p class="text-slate-500 max-w-xl mx-auto mb-10">Layanan internet broadband kami dirancang untuk berbagai jenis usaha yang membutuhkan koneksi andal.</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 max-w-4xl mx-auto">
                @foreach([
                    ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'label' => 'Kantor & Perusahaan'],
                    ['icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z', 'label' => 'Toko & Retail'],
                    ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Hotel & Penginapan'],
                    ['icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'label' => 'Sekolah & Kampus'],
                ] as $who)
                <div class="neu-card p-5 flex flex-col items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $who['icon'] }}"></path></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-700 text-center">{{ $who['label'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>


</x-layout>
