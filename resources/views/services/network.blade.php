<x-layout title="{{ __('messages.network_title') }} - {{ config('app.name') }}" description="{{ __('messages.network_hero_desc') }}">
    <!-- Custom Styles -->
    <!-- Custom Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        [x-cloak] { display: none !important; }

        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(99, 102, 241, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(99, 102, 241, 0.05) 1px, transparent 1px);
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
    </style>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-32 pb-24 bg-[#eef2f6]">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
             <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>
             <!-- Radial Gradient for depth -->
             <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/40 to-white/60 pointer-events-none"></div>
             
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 w-[500px] h-[500px] bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000 transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <!-- Rotating Stats -->
            <div class="inline-flex items-center px-4 py-2 rounded-full neu-flat border border-white/50 text-indigo-600 text-sm font-bold reveal-up mb-8 hover:scale-105 transition-transform duration-300">
                <span class="relative flex h-3 w-3 mr-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                </span>
                <span id="rotating-stat" class="transition-opacity duration-500">
                    {{ __('messages.network_stat_1') }}
                </span>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const stats = [
                        "{{ __('messages.network_stat_1') }}",
                        "{{ __('messages.network_stat_2') }}",
                        "{{ __('messages.network_stat_3') }}"
                    ];
                    const statElement = document.getElementById('rotating-stat');
                    let currentIndex = 0;

                    if (stats.length > 1) {
                        setInterval(() => {
                            statElement.style.opacity = '0';
                            setTimeout(() => {
                                currentIndex = (currentIndex + 1) % stats.length;
                                statElement.textContent = stats[currentIndex];
                                statElement.style.opacity = '1';
                            }, 500);
                        }, 3000);
                    }
                });
            </script>

            <h1 class="text-5xl md:text-7xl font-bold mb-8 text-black tracking-tight leading-tight reveal-up delay-100">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600">
                    {{ __('messages.network_hero_desc') }}
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-600 max-w-3xl mx-auto leading-relaxed mb-10 reveal-up delay-200">
                {{ __('messages.network_title') }}
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center reveal-up delay-300">
                <a href="#contact" class="neu-btn px-8 py-4 font-bold text-indigo-600">
                    {{ __('messages.get_started') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Dedicated Internet Section -->
    <section id="dedicated-internet" class="relative overflow-hidden py-24 bg-gradient-to-br from-[#eef2f6] to-[#e0e7ef]">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-purple-200/30 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-purple-600 font-bold tracking-wider uppercase text-sm mb-2 block">{{ __('messages.network_dedicated_badge') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">{{ __('messages.network_dedicated_title') }}</h2>
                <p class="text-slate-500 text-lg mb-8">{{ __('messages.network_dedicated_desc') }}</p>
            </div>
            
            <!-- Dedicated Internet Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- 100 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">DASHBOARD MONITORING 100</span><span class="text-purple-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">100 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_dedicated_bandwidth_ratio') }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 695.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400">{{ __('messages.network_dedicated_price_note') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_3') }}</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20INET%20DASHBOARD%20MONITORING%201:1%20100%20Mbps." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-purple-600 hover:text-purple-700">{{ __('messages.network_dedicated_cta') }}</a></div>
                </div>
                
                <!-- 150 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">DASHBOARD MONITORING 150</span><span class="text-purple-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">150 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_dedicated_bandwidth_ratio') }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 845.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400">{{ __('messages.network_dedicated_price_note') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_3') }}</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20INET%20DASHBOARD%20MONITORING%201:1%20150%20Mbps." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-purple-600 hover:text-purple-700">{{ __('messages.network_dedicated_cta') }}</a></div>
                </div>
                
                <!-- 200 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">DASHBOARD MONITORING 200</span><span class="text-purple-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">200 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_dedicated_bandwidth_ratio') }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 1.100.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400">{{ __('messages.network_dedicated_price_note') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_3') }}</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20INET%20DASHBOARD%20MONITORING%201:1%20200%20Mbps." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-purple-600 hover:text-purple-700">{{ __('messages.network_dedicated_cta') }}</a></div>
                </div>
                
                <!-- 300 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300 transform md:scale-105 shadow-xl border-blue-200">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-200 px-3 py-1 rounded-full shadow-sm">DASHBOARD MONITORING 300</span><span class="text-purple-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">300 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_dedicated_bandwidth_ratio') }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 1.500.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400">{{ __('messages.network_dedicated_price_note') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-purple-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_dedicated_feat_3') }}</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20INET%20DASHBOARD%20MONITORING%201:1%20300%20Mbps." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-purple-600 hover:text-purple-700">{{ __('messages.network_dedicated_cta') }}</a></div>
                </div>
            </div>
            
        </div>
    </section>
  
    <!-- Managed Service Access Point Section -->
    <section id="managed-wifi-pricing" class="relative overflow-hidden py-24 bg-[#eef2f6]">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-indigo-200/30 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm mb-2 block">{{ __('messages.network_managed_label') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">{{ __('messages.network_managed_title') }}</h2>
                <p class="text-slate-500 text-lg mb-8">{{ __('messages.network_managed_desc') }}</p>
                <div class="inline-flex bg-slate-200/50 p-1.5 rounded-full relative">
                    <button id="btn-basic" onclick="switchScheme('basic')" class="relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-sm bg-white text-cyan-600">{{ __('messages.network_managed_scheme_basic') }}</button>
                    <button id="btn-premium" onclick="switchScheme('premium')" class="relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-indigo-600">{{ __('messages.network_managed_scheme_premium') }}</button>
                    <button id="btn-bundling" onclick="switchScheme('bundling')" class="relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-purple-600">Bundling</button>
                </div>
                <div class="mt-6 flex justify-center px-4">
                    <div id="note-container" class="max-w-3xl text-slate-500 text-center">
                        <p class="text-sm leading-relaxed">
                            <span id="label-basic" class="">{{ __('messages.network_managed_basic_note') }}</span>
                            <span id="label-premium" class="hidden">{{ __('messages.network_managed_premium_note') }}</span>
                            <span id="label-bundling" class="hidden">
                                {!! str_replace(
                                    ['Managed Infrastructure Packages', 'PAKET INET DEDICATED', 'DEDICATED INET PACKAGE'], 
                                    [
                                        '<span class="text-indigo-600 font-bold underline decoration-indigo-200 underline-offset-2">Managed Infrastructure Packages</span>', 
                                        '<span class="text-purple-600 font-bold underline decoration-purple-200 underline-offset-2">PAKET INET DEDICATED</span>',
                                        '<span class="text-purple-600 font-bold underline decoration-purple-200 underline-offset-2">DEDICATED INET PACKAGE</span>'
                                    ], 
                                    __('messages.network_managed_bundling_note')
                                ) !!}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- BASIC SCHEME GRID -->
            <div id="grid-basic" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Small -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-cyan-600 border border-cyan-200 bg-cyan-50 px-3 py-1 rounded-full">BASIC SMALL</span><span class="text-cyan-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">3 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 100]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 1.650.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 59.400.000</div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_router_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_rd_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Basic%20Small%20(3%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                <!-- Medium -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-cyan-600 border border-cyan-200 bg-cyan-50 px-3 py-1 rounded-full">BASIC MEDIUM</span><span class="text-cyan-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">7 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 300]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 2.336.040  <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 84.097.440</div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_router_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_rd_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_switch_es209') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Basic%20Medium%20(7%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                <!-- Large -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-cyan-600 border border-cyan-200 bg-cyan-50 px-3 py-1 rounded-full">BASIC LARGE</span><span class="text-cyan-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">10 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 300]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 2.847.480 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 102.509.280</div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_router_3') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_rd_3') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_switch_es209') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Basic%20Large%20(10%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                <!-- Enterprise -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-cyan-600 border border-cyan-200 bg-cyan-50 px-3 py-1 rounded-full">BASIC ENTERPRISE</span><span class="text-cyan-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">15 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 300]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 3.622.800 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 130.420.800</div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_router_4') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_basic_rd_4') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_switch_es220') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup_2') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Basic%20Enterprise%20(15%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
            </div>
            
            <!-- PREMIUM SCHEME GRID -->
            <div id="grid-premium" class="hidden grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Small -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-indigo-500 px-3 py-1 rounded-full shadow-sm">PREMIUM SMALL</span><span class="text-indigo-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">3 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 100]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 1.524.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 54.864.000 </div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_prem_router_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_prem_rd_1') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_monitoring') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Premium%20Small%20(3%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-indigo-600 hover:text-indigo-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                <!-- Medium -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-indigo-500 px-3 py-1 rounded-full shadow-sm">PREMIUM MEDIUM</span><span class="text-indigo-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">7 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 100]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 2.400.960 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 86.434.560 </div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_prem_router_2') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_gateway_ruijie') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_switch_es209') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Premium%20Medium%20(7%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-indigo-600 hover:text-indigo-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                <!-- Large -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-indigo-500 px-3 py-1 rounded-full shadow-sm">PREMIUM LARGE</span><span class="text-indigo-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">10 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 200]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 2.883.000  <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 103.788.000 </div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_prem_router_3') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_gateway_ruijie') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_switch_es209') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Premium%20Large%20(10%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-indigo-600 hover:text-indigo-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                <!-- Enterprise -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300 transform md:scale-105 shadow-xl border-indigo-200">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-indigo-600 px-3 py-1 rounded-full shadow-sm">PREMIUM ENTERPRISE</span><span class="text-indigo-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">15 Access Point</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_managed_concurrent', ['count' => 200]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 3.658.440  <span class="text-sm font-normal text-slate-500">{{ __('messages.network_managed_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_managed_total_contract') }} Rp 131.703.840 </div><div class="text-xs text-slate-400">{{ __('messages.network_managed_vat_excluded') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_prem_router_4') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_gateway_ruijie') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_switch_es220') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_wallmount') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_cable') }}</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> {{ __('messages.network_feat_backup_2') }}</li>
                    </ul>
                    <div class="mt-auto border-t border-slate-100 pt-4 relative"><div class="mb-4"><button type="button" onclick="openModal('{{ __('messages.network_managed_terms_title') }}', ['{{ __('messages.network_managed_term_1') }}', '{{ __('messages.network_managed_term_2') }}', '{{ __('messages.network_managed_term_3') }}', '{{ __('messages.network_managed_term_4') }}', '{{ __('messages.network_managed_term_5') }}'])" class="flex items-center justify-between w-full text-sm font-bold text-slate-500 hover:text-cyan-600 transition-colors z-20 relative">{{ __('messages.network_managed_terms_btn') }}<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button></div><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Premium%20Enterprise%20(15%20AP)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-indigo-600 hover:text-indigo-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
            </div>
            
            <!-- BUNDLING GRID -->
            <div id="grid-bundling" class="hidden grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Paket 1: 3 AP + 100 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-gradient-to-r from-cyan-500 to-indigo-500 px-3 py-1 rounded-full shadow-sm">BUNDLING 1</span><span class="text-cyan-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">3 AP + 100 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_bundling_concurrent', ['count' => 100]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 2.345.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_bundling_lease_term') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Router RG-EG105G-V3</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> RG-RAP2260(G) Reyee Wi-Fi 6 AX1800</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Wallmount Rack 4U</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Cabling UTP Cat 6</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> 1 unit backup access point</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Bundling%201%20(3%20AP%20+%20100%20Mbps)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                
                <!-- Paket 2: 7 AP + 150 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-gradient-to-r from-cyan-500 to-indigo-500 px-3 py-1 rounded-full shadow-sm">BUNDLING 2</span><span class="text-cyan-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">7 AP + 150 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_bundling_concurrent', ['count' => 300]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 3.245.960 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_bundling_lease_term') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Router RG-EG310GH-P-E</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> RG-RAP2260(G) Reyee Wi-Fi 6 AX1800</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Switch RG-ES209GC-P</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Wallmount Rack 4U</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Cabling UTP Cat 6</li>
                        <li class="flex items-start gap-2"><span class="text-cyan-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> 1 unit backup access point</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Bundling%202%20(7%20AP%20+%20150%20Mbps)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-cyan-600 hover:text-cyan-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                
                <!-- Paket 3: 10 AP + 200 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-gradient-to-r from-cyan-600 to-indigo-600 px-3 py-1 rounded-full shadow-sm">BUNDLING 3</span><span class="text-indigo-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">10 AP + 200 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_bundling_concurrent', ['count' => 300]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 3.983.000 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_bundling_lease_term') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Router RG-EG310GH-P-E</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> RG-RAP2260(G) Reyee Wi-Fi 6 AX1800</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Switch RG-ES209GC-P</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Wallmount Rack 4U</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Cabling UTP Cat 6</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> 1 unit backup access point</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Bundling%203%20(10%20AP%20+%20200%20Mbps)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-indigo-600 hover:text-indigo-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
                
                <!-- Paket 4: 15 AP + 300 Mbps -->
                <div class="neu-flat p-6 rounded-3xl border border-white/50 flex flex-col h-full hover:-translate-y-2 transition-transform duration-300 transform md:scale-105 shadow-xl border-indigo-200">
                    <div class="mb-4"><div class="flex justify-between items-start mb-2"><span class="text-sm font-bold text-white bg-gradient-to-r from-cyan-600 to-indigo-600 px-3 py-1 rounded-full shadow-sm">BUNDLING 4</span><span class="text-indigo-600"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg></span></div><h3 class="text-xl font-bold text-slate-800">15 AP + 300 Mbps</h3><p class="text-sm text-slate-500 font-medium">{{ __('messages.network_bundling_concurrent', ['count' => 300]) }}</p></div>
                    <div class="mb-6"><div class="text-3xl font-extrabold text-slate-800">Rp 5.158.440 <span class="text-sm font-normal text-slate-500">{{ __('messages.network_dedicated_per_month') }}</span></div><div class="text-xs text-slate-400 mt-1">{{ __('messages.network_bundling_lease_term') }}</div></div>
                    <ul class="space-y-3 text-sm text-slate-600 mb-8 flex-grow">
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Router RG-EG310GH-P-E</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> RG-RAP2260(G) Reyee Wi-Fi 6 AX1800</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Switch RG-ES220GS-LP</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Wallmount Rack 4U</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> Cabling UTP Cat 6</li>
                        <li class="flex items-start gap-2"><span class="text-indigo-500"><svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span> 2 unit backup access point</li>
                    </ul>
                    <div class="mt-auto"><a href="https://wa.me/6282229046099?text=Halo,%20saya%20berminat%20dengan%20Paket%20Bundling%204%20(15%20AP%20+%20300%20Mbps)." class="neu-btn block w-full py-3 rounded-xl text-center text-sm font-bold text-indigo-600 hover:text-indigo-700">{{ __('messages.network_managed_btn_choose') }}</a></div>
                </div>
            </div>
        </div>
        

    </section>

    <!-- SCRIPT_PLACEHOLDER -->

    <script>
        function switchScheme(scheme) {
            const gridBasic = document.getElementById('grid-basic');
            const gridPremium = document.getElementById('grid-premium');
            const gridBundling = document.getElementById('grid-bundling');
            const btnBasic = document.getElementById('btn-basic');
            const btnPremium = document.getElementById('btn-premium');
            const btnBundling = document.getElementById('btn-bundling');
            const labelBasic = document.getElementById('label-basic');
            const labelPremium = document.getElementById('label-premium');
            const labelBundling = document.getElementById('label-bundling');

            if(scheme === 'basic') {
                gridBasic.classList.remove('hidden');
                gridPremium.classList.add('hidden');
                gridBundling.classList.add('hidden');
                btnBasic.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-sm bg-white text-cyan-600';
                btnPremium.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-indigo-600';
                btnBundling.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-purple-600';
                labelBasic.classList.remove('hidden');
                labelPremium.classList.add('hidden');
                labelBundling.classList.add('hidden');
            } else if(scheme === 'premium') {
                gridBasic.classList.add('hidden');
                gridPremium.classList.remove('hidden');
                gridBundling.classList.add('hidden');
                btnBasic.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-cyan-600';
                btnPremium.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-sm bg-white text-indigo-600';
                btnBundling.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-purple-600';
                labelBasic.classList.add('hidden');
                labelPremium.classList.remove('hidden');
                labelBundling.classList.add('hidden');
            } else if(scheme === 'bundling') {
                gridBasic.classList.add('hidden');
                gridPremium.classList.add('hidden');
                gridBundling.classList.remove('hidden');
                btnBasic.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-cyan-600';
                btnPremium.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-indigo-600';
                btnBundling.className = 'relative z-10 px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 shadow-sm bg-white text-purple-600';
                labelBasic.classList.add('hidden');
                labelPremium.classList.add('hidden');
                labelBundling.classList.remove('hidden');
            }
        }

        function openModal(title, items) {
            // FIX: Ensure modal is at root of body to solve z-index issues
            const modal = document.getElementById('snk-modal');
            if (modal && modal.parentNode !== document.body) {
                document.body.appendChild(modal);
            }

            document.getElementById('modal-title').textContent = title;
            const list = document.getElementById('modal-list');
            list.innerHTML = '';
            items.forEach(item => {
                const li = document.createElement('li');
                li.className = 'flex items-start gap-3 text-slate-600 text-sm';
                li.innerHTML = `<span class="text-indigo-500 font-bold mt-0.5">&bull;</span><span>${item}</span>`;
                list.appendChild(li);
            });
            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('snk-modal').classList.add('hidden');
        }
    </script>

    <!-- Pain Point Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 reveal-up">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-slate-200 text-slate-600 text-xs font-bold tracking-wide mb-6">
                        {{ __('messages.network_pain_badge') }}
                    </span>
                    <h2 class="text-4xl font-bold text-slate-900 mb-6 leading-tight">
                        {{ __('messages.network_pain_title') }}
                    </h2>
                    <p class="text-xl text-slate-600 leading-relaxed mb-8">
                        {{ __('messages.network_pain_desc') }}
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-700 text-lg reveal-up delay-100">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.network_pain_point_1') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700 text-lg reveal-up delay-200">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.network_pain_point_2') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700 text-lg reveal-up delay-300">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.network_pain_point_3') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/2 relative reveal-scale delay-200">
                     <!-- Glow Effect -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-orange-500 rounded-[2rem] opacity-20 blur-2xl animate-pulse"></div>
                    
                    <div class="relative aspect-video bg-[#eef2f6] rounded-3xl flex items-center justify-center p-4 neu-pressed overflow-hidden border border-white/50">
                        <img src="{{ asset('images/network-coverage.png') }}" alt="Network Coverage Heatmap" loading="lazy" class="w-full h-full object-cover rounded-2xl hover:scale-[1.02] transition-transform duration-700 ease-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solution Section -->
    <section class="py-24 bg-[#eef2f6]">
         <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800">{{ __('messages.network_sol_title') }}</h2>
                <p class="text-xl text-slate-500 max-w-3xl mx-auto">
                    {{ __('messages.network_sol_desc') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Access Point -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-100">
                    <div class="w-20 h-20 mx-auto bg-cyan-50 rounded-2xl border border-cyan-100 flex items-center justify-center text-cyan-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_1_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            {{ __('messages.network_sol_1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Switch & Cabling -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-200">
                    <div class="w-20 h-20 mx-auto bg-indigo-50 rounded-2xl border border-indigo-100 flex items-center justify-center text-indigo-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_2_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            {{ __('messages.network_sol_2_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Network Design -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-300">
                    <div class="w-20 h-20 mx-auto bg-purple-50 rounded-2xl border border-purple-100 flex items-center justify-center text-purple-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_3_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            {{ __('messages.network_sol_3_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Mikrotik/Cisco (New) -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-400">
                    <div class="w-20 h-20 mx-auto bg-orange-50 rounded-2xl border border-orange-100 flex items-center justify-center text-orange-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_4_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">
                            {{ __('messages.network_sol_4_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CTS Section -->
    <section id="contact" class="py-24 bg-[#eef2f6] text-center">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold mb-8 leading-tight text-slate-800">{{ __('messages.network_cta_title') }}</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">{{ __('messages.network_cta_desc') }}</p>
            <div>
                <a href="https://wa.me/6282229046099" target="_blank" class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ __('messages.get_started') }}
                </a>
            </div>
        </div>
    </section>
    <!-- Sticky Mobile CTA -->
    <div class="sticky-cta md:hidden bg-white border-t border-slate-200 shadow-2xl p-4">
        <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20konsultasi%20tentang%20Network%20Solutions." class="flex items-center justify-center w-full px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            {{ __('messages.contact_us') }}
        </a>
    </div>

    <!-- JavaScript -->
    <script>
        // Sticky Mobile CTA
        window.addEventListener('scroll', () => {
             const stickyCTA = document.querySelector('.sticky-cta');
             if (!stickyCTA) return;
             
             const scrollPosition = window.scrollY;
             const windowHeight = window.innerHeight;
             
             // Show sticky CTA after scrolling past hero (about 1 screen height)
             if (scrollPosition > windowHeight * 0.8) {
                 stickyCTA.classList.add('show');
             } else {
                 stickyCTA.classList.remove('show');
             }
        });

        // Reveal Animations on Scroll
        document.addEventListener('DOMContentLoaded', () => {
            const revealElements = document.querySelectorAll('.reveal-up, .reveal-scale');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        // Optional: Stop observing once revealed
                        // observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1, // Trigger when 10% of element is visible
                rootMargin: "0px 0px -50px 0px" // Trigger slightly before bottom
            });

            revealElements.forEach(el => observer.observe(el));
        });
    </script>
@push('modals')
    <!-- S&K Modal (Moved for Z-Index) -->
    <div id="snk-modal" style="z-index: 99999;" class="hidden fixed inset-0 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm transition-opacity duration-300">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full shadow-2xl neu-flat relative transform transition-all duration-300">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-slate-400 hover:text-red-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <h3 class="text-xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                <span class="p-2 rounded-xl bg-indigo-50 text-indigo-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </span>
                <span id="modal-title">{{ __('messages.network_managed_terms_title') }}</span>
            </h3>
            <ul id="modal-list" class="space-y-3"></ul>
            <div class="mt-8 pt-6 border-t border-slate-100">
                <button onclick="closeModal()" class="w-full py-3 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-200">{{ __('messages.network_managed_terms_understand') }}</button>
            </div>
        </div>
    </div>
@endpush
</x-layout>
