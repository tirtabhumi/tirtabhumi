<x-layout title="{{ __('messages.network_title') }} - {{ config('app.name') }}">
    <!-- Custom Styles -->
    <style>
        .text-glow {
            text-shadow: 0 0 30px rgba(99, 102, 241, 0.6);
        }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-24 overflow-hidden bg-[#eef2f6]">
        <!-- Background Elements -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 w-[500px] h-[500px] bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000 transform -translate-x-1/2 -translate-y-1/2"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <!-- Breadcrumb -->
            <x-breadcrumb :paths="[
                __('messages.services') => '/#services',
                __('messages.service_infrastructure_title') => route('services.infrastructure')
            ]" :current="__('messages.network_title')" />

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full neu-flat border border-white/50 text-indigo-700 text-sm font-medium mb-8 mt-6">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                </span>
                {{ __('messages.network_subtitle') }}
            </div>

            <h1 class="text-5xl md:text-7xl font-black mb-8 text-slate-900 tracking-tight leading-tight">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-600 animate-gradient-x">
                    {{ __('messages.network_title') }}
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-600 max-w-3xl mx-auto leading-relaxed mb-10">
                {{ __('messages.network_hero_desc') }}
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="#contact" class="neu-btn px-8 py-4 font-bold text-indigo-600">
                    {{ __('messages.get_started') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Pain Point Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="neu-flat p-8 md:p-16 rounded-[2.5rem] border border-white/50 flex flex-col lg:flex-row items-center gap-16">
                <div class="flex-1">
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
                        <li class="flex items-start gap-3 text-slate-700 text-lg">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.network_pain_point_1') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700 text-lg">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.network_pain_point_2') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700 text-lg">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.network_pain_point_3') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="flex-1 w-full max-w-lg">
                    <div class="aspect-video bg-[#eef2f6] rounded-3xl flex items-center justify-center p-4 neu-pressed overflow-hidden">
                        <img src="{{ asset('images/network-coverage.png') }}" alt="Network Coverage Heatmap" class="w-full h-full object-cover rounded-2xl hover:scale-[1.02] transition-transform duration-700 ease-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us / Benefits Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800">{{ __('messages.network_benefit_title') }}</h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Speed -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-cyan-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_benefit_1_title') }}</h3>
                    <p class="text-slate-500 text-lg leading-relaxed">
                        {{ __('messages.network_benefit_1_desc') }}
                    </p>
                </div>

                <!-- Secure -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-indigo-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_benefit_2_title') }}</h3>
                    <p class="text-slate-500 text-lg leading-relaxed">
                        {{ __('messages.network_benefit_2_desc') }}
                    </p>
                </div>
                
                <!-- Scalable -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-rose-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_benefit_3_title') }}</h3>
                    <p class="text-slate-500 text-lg leading-relaxed">
                        {{ __('messages.network_benefit_3_desc') }}
                    </p>
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

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Access Point -->
                <div class="neu-flat p-10 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center text-cyan-600 mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_1_title') }}</h3>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        {{ __('messages.network_sol_1_desc') }}
                    </p>
                </div>

                <!-- Switch & Cabling -->
                <div class="neu-flat p-10 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center text-indigo-600 mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_2_title') }}</h3>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        {{ __('messages.network_sol_2_desc') }}
                    </p>
                </div>

                <!-- Network Design -->
                <div class="neu-flat p-10 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center text-purple-600 mb-8">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.network_sol_3_title') }}</h3>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        {{ __('messages.network_sol_3_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTS Section -->
    <section id="contact" class="py-24 bg-[#eef2f6] text-center">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold mb-8 leading-tight text-slate-800">{{ __('messages.network_cta_title') }}</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">
                {{ __('messages.network_cta_desc') }}
            </p>
            
            <a href="https://wa.me/6282229046099" target="_blank" class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center">
                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                {{ __('messages.get_started') }}
            </a>
        </div>
    </section>
</x-layout>
