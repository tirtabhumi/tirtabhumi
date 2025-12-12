<x-layout title="{{ __('messages.server_title') }} - {{ config('app.name') }}" description="{{ __('messages.server_hero_desc') }}">
    <!-- Custom Styles (Copied from Network for consistency) -->
    <style>
        html { scroll-behavior: smooth; }
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(99, 102, 241, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(99, 102, 241, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .reveal-up { opacity: 0; transform: translateY(40px); transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1); }
        .reveal-up.active { opacity: 1; transform: translateY(0); }
        .reveal-scale { opacity: 0; transform: scale(0.9); transition: all 1s cubic-bezier(0.2, 0.8, 0.2, 1); }
        .reveal-scale.active { opacity: 1; transform: scale(1); }
        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; }
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob { animation: blob 7s infinite; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }
        .sticky-cta {
            position: fixed; bottom: 0; left: 0; right: 0; z-index: 50;
            transform: translateY(100%); transition: transform 0.3s ease;
        }
        .sticky-cta.show { transform: translateY(0); }
    </style>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-32 pb-24 bg-[#eef2f6]">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
             <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>
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
                    {{ __('messages.server_stat_1') }}
                </span>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const stats = [
                        "{{ __('messages.server_stat_1') }}",
                        "{{ __('messages.server_stat_2') }}",
                        "{{ __('messages.server_stat_3') }}"
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
                    {{ __('messages.server_title') }}
                </span>
            </h1>
            <p class="text-xl md:text-2xl text-slate-600 max-w-3xl mx-auto leading-relaxed mb-10 reveal-up delay-200">
                {{ __('messages.server_hero_desc') }}
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center reveal-up delay-300">
                <a href="#contact" class="neu-btn px-8 py-4 font-bold text-indigo-600">
                    {{ __('messages.get_started') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Pain Point Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 reveal-up">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-slate-200 text-slate-600 text-xs font-bold tracking-wide mb-6">
                        {{ __('messages.server_pain_badge') }}
                    </span>
                    <h2 class="text-4xl font-bold text-slate-900 mb-6 leading-tight">
                        {{ __('messages.server_pain_title') }}
                    </h2>
                    <p class="text-xl text-slate-600 leading-relaxed mb-8">
                        {{ __('messages.server_pain_desc') }}
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-700 text-lg reveal-up delay-100">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.server_pain_point_1') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700 text-lg reveal-up delay-200">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.server_pain_point_2') }}</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700 text-lg reveal-up delay-300">
                            <svg class="w-6 h-6 text-red-500 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>{{ __('messages.server_pain_point_3') }}</span>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/2 relative reveal-scale delay-200">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-orange-500 rounded-[2rem] opacity-20 blur-2xl animate-pulse"></div>
                    <div class="relative aspect-video bg-[#eef2f6] rounded-3xl flex items-center justify-center p-4 neu-pressed overflow-hidden border border-white/50">
                        <img src="{{ asset('images/server-room.jpg') }}" alt="Server Room Maintenance" loading="lazy" class="w-full h-full object-cover rounded-2xl hover:scale-[1.02] transition-transform duration-700 ease-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800">{{ __('messages.server_benefit_title') }}</h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Uptime -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-100">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-cyan-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_benefit_1_title') }}</h3>
                    <p class="text-slate-500 text-lg leading-relaxed">{{ __('messages.server_benefit_1_desc') }}</p>
                </div>
                <!-- Security -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-200">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-indigo-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_benefit_2_title') }}</h3>
                    <p class="text-slate-500 text-lg leading-relaxed">{{ __('messages.server_benefit_2_desc') }}</p>
                </div>
                <!-- Performance -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-300">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-rose-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_benefit_3_title') }}</h3>
                    <p class="text-slate-500 text-lg leading-relaxed">{{ __('messages.server_benefit_3_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-24 bg-[#eef2f6]">
         <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800">{{ __('messages.server_services_title') }}</h2>
                <p class="text-xl text-slate-500 max-w-3xl mx-auto">{{ __('messages.server_services_desc') }}</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Regular Maintenance -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-100">
                    <div class="w-20 h-20 mx-auto bg-cyan-50 rounded-2xl border border-cyan-100 flex items-center justify-center text-cyan-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_service_1_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">{{ __('messages.server_service_1_desc') }}</p>
                    </div>
                </div>

                <!-- Data Backup -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-200">
                    <div class="w-20 h-20 mx-auto bg-indigo-50 rounded-2xl border border-indigo-100 flex items-center justify-center text-indigo-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_service_2_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">{{ __('messages.server_service_2_desc') }}</p>
                    </div>
                </div>

                <!-- Emergency Support -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-300">
                    <div class="w-20 h-20 mx-auto bg-purple-50 rounded-2xl border border-purple-100 flex items-center justify-center text-purple-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_service_3_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">{{ __('messages.server_service_3_desc') }}</p>
                    </div>
                </div>

                <!-- Performance Tuning -->
                <div class="group neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-2 transition-transform duration-300 reveal-up delay-400">
                    <div class="w-20 h-20 mx-auto bg-orange-50 rounded-2xl border border-orange-100 flex items-center justify-center text-orange-600 mb-6 transform group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div class="text-center">
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">{{ __('messages.server_service_4_title') }}</h3>
                        <p class="text-slate-600 leading-relaxed text-lg">{{ __('messages.server_service_4_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTS Section -->
    <section id="contact" class="py-24 bg-[#eef2f6] text-center">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold mb-8 leading-tight text-slate-800">{{ __('messages.server_cta_title') }}</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">
                {{ __('messages.server_cta_desc') }}
            </p>
            
            <div>
                <a href="https://wa.me/6282229046099?text=Halo,%20saya%20butuh%20maintenance%20server." target="_blank" class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ __('messages.get_started') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Sticky Mobile CTA -->
    <div class="sticky-cta md:hidden bg-white border-t border-slate-200 shadow-2xl p-4">
        <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20konsultasi%20tentang%20Server%20Maintenance." class="flex items-center justify-center w-full px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all active:scale-95">
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
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            });
            revealElements.forEach(el => observer.observe(el));
        });
    </script>
</x-layout>
