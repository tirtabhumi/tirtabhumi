import fs from 'fs';

const filePath = 'c:/Users/ryano/Herd/tirtabhumi/resources/views/tirtanet.blade.php';
let content = fs.readFileSync(filePath, 'utf8');

// =====================================================
// 1. UPGRADE STYLES - Better neumorphism + transitions
// =====================================================
const oldStyles = `    <style>
        html {
            scroll-behavior: smooth;
        }
        [x-cloak] { display: none !important; }

        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(14, 165, 233, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(14, 165, 233, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        
        /* Premium Reveal Animations */
        .reveal-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .reveal-up.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.9);
            transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .reveal-scale.active {
            opacity: 1;
            transform: scale(1);
        }

        /* Staggered Delays */
        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; }

        /* Blob Animation */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        /* Sticky Mobile CTA */
        .sticky-cta {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        .sticky-cta.show {
            transform: translateY(0);
        }
    </style>`;

const newStyles = `    <style>
        html {
            scroll-behavior: smooth;
        }
        [x-cloak] { display: none !important; }

        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(14, 165, 233, 0.04) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(14, 165, 233, 0.04) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* Premium Reveal Animations */
        .reveal-up {
            opacity: 0;
            transform: translateY(40px);
            transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .reveal-up.active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-scale {
            opacity: 0;
            transform: scale(0.9);
            transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1);
        }
        .reveal-scale.active {
            opacity: 1;
            transform: scale(1);
        }

        /* Staggered Delays */
        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; }

        /* Blob Animation */
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        /* ======== Enhanced Neumorphism Cards ======== */
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

        /* Best Seller Card */
        .neu-card-featured {
            background: #eef2f6;
            box-shadow: 10px 10px 24px #c8d0db, -10px -10px 24px #ffffff;
            border: 2px solid rgba(59, 130, 246, 0.3);
            border-radius: 1.5rem;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .neu-card-featured:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 14px 14px 32px #c0c8d3, -14px -14px 32px #ffffff;
            border-color: rgba(59, 130, 246, 0.5);
        }

        /* Enhanced Neumorphism Button */
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
        .neu-cta:hover {
            transform: translateY(-2px);
            box-shadow: 8px 8px 18px #d1d9e6, -8px -8px 18px #ffffff;
        }
        .neu-cta:active {
            transform: translateY(0);
            box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
        }

        /* Filled CTA button */
        .neu-cta-filled {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff, 0 4px 16px rgba(37, 99, 235, 0.3);
            border: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
            padding: 0.875rem 1rem;
            text-align: center;
            font-weight: 700;
            font-size: 0.875rem;
            color: #ffffff;
        }
        .neu-cta-filled:hover {
            transform: translateY(-2px);
            box-shadow: 8px 8px 18px #d1d9e6, -8px -8px 18px #ffffff, 0 8px 24px rgba(37, 99, 235, 0.4);
        }
        .neu-cta-filled:active {
            transform: translateY(0);
        }

        /* Neumorphism step circles for Alur Pendaftaran */
        .neu-step {
            background: #eef2f6;
            box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        .neu-step:hover,
        .group:hover .neu-step {
            box-shadow: 8px 8px 18px #d1d9e6, -8px -8px 18px #ffffff;
            transform: scale(1.08);
        }

        /* Neumorphism inset for wireless section */
        .neu-wireless-card {
            background: #eef2f6;
            box-shadow: 8px 8px 20px #d1d9e6, -8px -8px 20px #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.6);
            border-radius: 1.5rem;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .neu-wireless-card:hover {
            transform: translateY(-6px);
            box-shadow: 12px 12px 28px #c8d0db, -12px -12px 28px #ffffff;
        }

        /* Divider between sections */
        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(148, 163, 184, 0.2), transparent);
        }

        /* Sticky Mobile CTA */
        .sticky-cta {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        .sticky-cta.show {
            transform: translateY(0);
        }

        /* Smooth connector line */
        .step-connector {
            position: absolute;
            top: 2rem;
            left: calc(50% + 2rem);
            width: calc(100% - 2rem);
            height: 2px;
            background: linear-gradient(to right, #d1d9e6 50%, transparent);
        }
    </style>`;

content = content.replace(oldStyles, newStyles);

// =====================================================
// 2. UPGRADE DEDICATED INTERNET SECTION (Pricing Cards)
// =====================================================

// Replace card wrappers for all 4 packages to use new neu-card classes
// Package 1: 20 Mbps
content = content.replace(
    '<div class="neu-flat p-6 rounded-3xl border border-slate-200 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">\n                    <div class="mb-4 min-h-[105px]">\n                        <div class="flex justify-between items-start mb-2">\n                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">PAKET TERMURAH</span>',
    '<div class="neu-card p-6 flex flex-col h-full">\n                    <div class="mb-4 min-h-[105px]">\n                        <div class="flex justify-between items-start mb-2">\n                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">PAKET TERMURAH</span>'
);

// Package 2: 50 Mbps Best Seller
content = content.replace(
    '<div class="neu-flat p-6 rounded-3xl border border-slate-200 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300 transform md:scale-105 shadow-xl border-blue-200 relative z-10">',
    '<div class="neu-card-featured p-6 flex flex-col h-full transform md:scale-105 relative z-10">'
);

// Package 3: 50 Mbps Prioritas  
content = content.replace(
    '<div class="neu-flat p-6 rounded-3xl border border-slate-200 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">\n                    <div class="mb-4 min-h-[105px]">\n                        <div class="flex justify-between items-start mb-2">\n                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">PAKET PRIORITAS</span>',
    '<div class="neu-card p-6 flex flex-col h-full">\n                    <div class="mb-4 min-h-[105px]">\n                        <div class="flex justify-between items-start mb-2">\n                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">PAKET PRIORITAS</span>'
);

// Package 4: 75 Mbps Cepat
content = content.replace(
    '<div class="neu-flat p-6 rounded-3xl border border-slate-200 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">\n                    <div class="mb-4 min-h-[105px]">\n                        <div class="flex justify-between items-start mb-2">\n                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">PAKET CEPAT</span>',
    '<div class="neu-card p-6 flex flex-col h-full">\n                    <div class="mb-4 min-h-[105px]">\n                        <div class="flex justify-between items-start mb-2">\n                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">PAKET CEPAT</span>'
);

// =====================================================
// 3. UPGRADE CTA BUTTONS
// =====================================================
// Non-featured package CTA buttons (20mbps, prioritas, 75mbps)
content = content.replaceAll(
    'class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700"',
    'class="neu-cta text-blue-600 hover:text-blue-700"'
);

// Best Seller CTA button
content = content.replace(
    'class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 shadow-lg shadow-blue-200"',
    'class="neu-cta-filled"'
);

// =====================================================
// 4. UPGRADE HERO SECTION
// =====================================================
content = content.replace(
    `    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-32 pb-24 bg-[#eef2f6]">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
             <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>

        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">`,
    `    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-[#eef2f6]">
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-grid-pattern opacity-40"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">`
);

// Simplify hero heading
content = content.replace(
    `            <h1 class="text-5xl md:text-7xl font-bold mb-8 text-slate-900 tracking-tight leading-tight reveal-up delay-100">
                Tirtanet: Melangkah Lebih Cepat ke Masa Depan
            </h1>`,
    `            <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800 tracking-tight leading-tight reveal-up delay-100">
                Mengapa <span class="text-blue-600">Tirtanet</span>?
            </h2>`
);

// Simplify hero subtitle
content = content.replace(
    `            <p class="text-xl md:text-2xl text-slate-600 max-w-4xl mx-auto leading-relaxed mb-10 reveal-up delay-200">
                Bebaskan potensi digital Anda dengan koneksi fiber optic yang super cepat, stabil, dan tanpa batas FUP. Pilihan cerdas untuk produktivitas tanpa gangguan dan hiburan keluarga tanpa batas.
            </p>`,
    `            <p class="text-lg text-slate-500 max-w-3xl mx-auto leading-relaxed mb-8 reveal-up delay-200">
                Koneksi fiber optic 100% tanpa batas FUP. Stabil untuk streaming, gaming, dan produktivitas keluarga Anda.
            </p>
            
            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center gap-6 mb-10 reveal-up delay-200">
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Tanpa Batas FUP</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Support 24 Jam</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span>Fiber Optic 100%</span>
                </div>
            </div>`
);

// =====================================================
// 5. UPGRADE ALUR PENDAFTARAN - use neumorphism
// =====================================================
const oldAlur = `    <!-- Alur Pendaftaran Section -->
    <section id="registration-flow" class="relative py-24 bg-white overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-[10%] right-[5%] w-[400px] h-[400px] bg-indigo-500/5 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[10%] left-[5%] w-[400px] h-[400px] bg-cyan-500/5 rounded-full blur-[100px]"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-sm font-bold tracking-wide mb-4">MUDAH & CEPAT</span>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-6 leading-tight">Alur Pendaftaran</h2>
                <p class="text-slate-500 text-lg leading-relaxed max-w-2xl mx-auto">Proses pendaftaran yang simple dan transparan. Dari pemilihan paket hingga internet aktif hanya dalam hitungan hari.</p>
            </div>
            <div class="max-w-5xl mx-auto">
                <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-6">
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">1</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Pilih Paket</h3>
                        <p class="text-sm text-slate-500">Tentukan paket yang sesuai kebutuhan</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">2</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Verifikasi</h3>
                        <p class="text-sm text-slate-500">Tim kami akan verifikasi data Anda</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">3</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Tunggu 1-2 Hari</h3>
                        <p class="text-sm text-slate-500">Proses persiapan pemasangan</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">4</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Pemasangan</h3>
                        <p class="text-sm text-slate-500">Router wifi dipasang oleh teknisi</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-blue-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform duration-300">5</div>
                        <div class="absolute top-8 left-[calc(50%+2rem)] w-[calc(100%-2rem)] h-0.5 bg-blue-500/30 hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-2">Bayar</h3>
                        <p class="text-sm text-slate-500">Bayar biaya awal sesuai paket</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl bg-green-600 flex items-center justify-center text-white font-bold text-xl mb-4 shadow-lg shadow-green-500/30 group-hover:scale-110 transition-transform duration-300">✓</div>
                        <h3 class="font-bold text-slate-800 mb-2">Internet Aktif</h3>
                        <p class="text-sm text-slate-500">Nikmati koneksi internet Anda</p>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <a href="https://wa.me/6282229046099?text=Halo,%20saya%20ingin%20mendaftar%20Tirtanet." class="inline-flex items-center gap-2 px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-blue-500/30">
                        <span>Mulai Pendaftaran</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>`;

const newAlur = `    <!-- Alur Pendaftaran Section -->
    <section id="registration-flow" class="relative py-24 bg-[#eef2f6] overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-sm font-bold tracking-wide mb-4">MUDAH & CEPAT</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6 leading-tight">Alur Pendaftaran</h2>
                <p class="text-slate-500 text-lg leading-relaxed max-w-2xl mx-auto">Proses pendaftaran yang simple dan transparan. Dari pemilihan paket hingga internet aktif hanya dalam hitungan hari.</p>
            </div>
            <div class="max-w-5xl mx-auto">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl neu-step flex items-center justify-center text-blue-600 font-bold text-xl mb-4">1</div>
                        <div class="step-connector hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-1 text-sm">Pilih Paket</h3>
                        <p class="text-xs text-slate-500">Tentukan paket sesuai kebutuhan</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl neu-step flex items-center justify-center text-blue-600 font-bold text-xl mb-4">2</div>
                        <div class="step-connector hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-1 text-sm">Verifikasi</h3>
                        <p class="text-xs text-slate-500">Tim kami verifikasi data Anda</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl neu-step flex items-center justify-center text-blue-600 font-bold text-xl mb-4">3</div>
                        <div class="step-connector hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-1 text-sm">Tunggu 1-2 Hari</h3>
                        <p class="text-xs text-slate-500">Persiapan pemasangan</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl neu-step flex items-center justify-center text-blue-600 font-bold text-xl mb-4">4</div>
                        <div class="step-connector hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-1 text-sm">Pemasangan</h3>
                        <p class="text-xs text-slate-500">Router wifi dipasang teknisi</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl neu-step flex items-center justify-center text-blue-600 font-bold text-xl mb-4">5</div>
                        <div class="step-connector hidden lg:block"></div>
                        <h3 class="font-bold text-slate-800 mb-1 text-sm">Bayar</h3>
                        <p class="text-xs text-slate-500">Bayar biaya awal sesuai paket</p>
                    </div>
                    <div class="relative flex flex-col items-center text-center group">
                        <div class="w-16 h-16 rounded-2xl neu-step flex items-center justify-center text-green-600 font-bold text-xl mb-4">✓</div>
                        <h3 class="font-bold text-slate-800 mb-1 text-sm">Internet Aktif</h3>
                        <p class="text-xs text-slate-500">Nikmati koneksi Anda</p>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <a href="https://wa.me/6282229046099?text=Halo,%20saya%20ingin%20mendaftar%20Tirtanet." class="neu-cta-filled inline-flex items-center justify-center gap-2 !w-auto px-8 py-4 !rounded-xl">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        <span>Mulai Pendaftaran via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>`;

content = content.replace(oldAlur, newAlur);

// =====================================================
// 6. UPGRADE WIRELESS SECTION - Neumorphism cards
// =====================================================
content = content.replace(
    `    <!-- EZNET Wireless Section -->
    <section id="eznet-wireless" class="relative py-24 bg-[#f8fafc] overflow-hidden">`,
    `    <!-- Wifi Wireless Section -->
    <section id="eznet-wireless" class="relative py-24 bg-[#eef2f6] overflow-hidden">`
);

// 10 Mbps card
content = content.replace(
    '<div class="bg-white border border-slate-200 p-8 rounded-3xl hover:border-cyan-500/50 transition-colors group shadow-sm">',
    '<div class="neu-wireless-card p-8 group">'
);

// 15 Mbps card
content = content.replace(
    '<div class="bg-white border border-slate-200 p-8 rounded-3xl hover:border-blue-500/50 transition-colors group shadow-sm">',
    '<div class="neu-wireless-card p-8 group">'
);

// 10 Mbps button
content = content.replace(
    'class="block w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-center rounded-xl transition-all shadow-lg shadow-blue-100">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n\n                <!-- Paket 15 Mbps',
    'class="neu-cta text-blue-600 hover:text-blue-700">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n\n                <!-- Paket 15 Mbps'
);

// 15 Mbps button
content = content.replace(
    'class="block w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-center rounded-xl transition-all shadow-lg shadow-blue-100">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n            </div>',
    'class="neu-cta text-blue-600 hover:text-blue-700">\n                        Pilih Paket Ini\n                    </a>\n                </div>\n            </div>'
);

// Wireless additional info cards
content = content.replace(
    '<div class="bg-white/50 p-6 rounded-2xl border border-slate-200">',
    '<div class="neu-card p-6">'
);
content = content.replace(
    '<div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-6 rounded-2xl border border-cyan-200 relative overflow-hidden">',
    '<div class="neu-card p-6 relative overflow-hidden">'
);

// Fix Perbulan positioning for wireless (appears after price, should be before)
content = content.replace(
    `                    <div class="mb-8">
                        <div class="text-4xl font-bold text-slate-800">Rp 190.000<span class="text-lg text-slate-400 font-normal">/bln</span></div>
                        <div class="text-sm text-slate-400 font-medium">Perbulan</div>
                    </div>`,
    `                    <div class="mb-8">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Biaya Perbulan</p>
                        <div class="text-4xl font-bold text-slate-800">Rp 190.000<span class="text-lg text-slate-400 font-normal">/bln</span></div>
                        <p class="text-[10px] text-slate-400 mt-1 italic">Harga belum termasuk PPN 11%</p>
                    </div>`
);

content = content.replace(
    `                    <div class="mb-8">
                        <div class="text-4xl font-bold text-slate-800">Rp 250.000<span class="text-lg text-slate-400 font-normal">/bln</span></div>
                        <div class="text-sm text-slate-400 font-medium">Perbulan</div>
                    </div>`,
    `                    <div class="mb-8">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Biaya Perbulan</p>
                        <div class="text-4xl font-bold text-slate-800">Rp 250.000<span class="text-lg text-slate-400 font-normal">/bln</span></div>
                        <p class="text-[10px] text-slate-400 mt-1 italic">Harga belum termasuk PPN 11%</p>
                    </div>`
);

// =====================================================
// 7. UPGRADE CTA SECTION
// =====================================================
content = content.replace(
    'class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center"',
    'class="neu-cta-filled inline-flex items-center justify-center gap-2 !w-auto px-8 py-4 !rounded-xl"'
);

// Write back
fs.writeFileSync(filePath, content, 'utf8');
console.log('✅ Design overhaul complete!');
console.log('Changes applied:');
console.log('1. Enhanced neumorphism CSS system (neu-card, neu-cta, etc.)');
console.log('2. Pricing cards now use proper neumorphism');
console.log('3. Alur Pendaftaran steps use neumorphic circles');
console.log('4. Wireless cards match neumorphism theme');
console.log('5. Hero section simplified and refined');
console.log('6. CTA buttons consistent with neumorphism');
console.log('7. All backgrounds unified to #eef2f6');
console.log('8. Perbulan label fixed in wireless cards');
