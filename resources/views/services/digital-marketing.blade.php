<x-layout>
    <div class="pb-24 md:pb-0 overflow-x-hidden">
        <x-slot:title>
            {{ __('messages.dm_title') }}
            </x-slot>

            <!-- Custom Styles -->
            <style>
                html {
                    scroll-behavior: smooth;

                    body {
                        overflow-x: hidden;
                    }
                }

                .bg-grid-pattern {
                    background-image: linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                        linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
                    background-size: 40px 40px;
                }

                .text-glow {
                    text-shadow: 0 0 30px rgba(99, 102, 241, 0.6);
                }

                .glass-card {
                    background: rgba(255, 255, 255, 0.7);
                    backdrop-filter: blur(12px);
                    -webkit-backdrop-filter: blur(12px);
                    border: 1px solid rgba(255, 255, 255, 0.5);
                }

                /* Sticky Mobile CTA */
                .sticky-cta {
                    position: fixed;
                    bottom: env(safe-area-inset-bottom);
                    left: 0;
                    right: 0;
                    z-index: 50;
                    transform: translateY(100%);
                    transition: transform 0.3s ease;
                }

                .sticky-cta.show {
                    transform: translateY(0);
                }

                /* Fade in animations */
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(30px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .fade-in-up {
                    animation: fadeInUp 0.6s ease-out forwards;
                }
            </style>

            <!-- Pricing Section (Moved to Top) -->
            <section id="pricing" class="relative overflow-hidden py-24 bg-[#eef2f6]">
                <!-- Background Glow -->
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-indigo-200/30 rounded-full blur-[120px] pointer-events-none">
                </div>

                <div class="container mx-auto px-6 relative z-10">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Pilihan Paket</h2>
                        <p class="text-slate-500 text-lg">Pilih solusi yang paling sesuai dengan kebutuhan bisnis Anda.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
                        <!-- Package 1: Basic Ads Setup -->
                        <div
                            class="neu-flat border border-white/50 rounded-3xl p-8 hover:-translate-y-1 transition-all">
                            <h3 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.dm_pkg_1_title') }}</h3>
                            <p class="text-slate-500 text-sm mb-6">{{ __('messages.dm_pkg_1_desc') }}</p>

                            <ul class="space-y-4 mb-8 text-slate-700 text-sm">
                                <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_1_feat_1') }}</li>
                                <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_1_feat_2') }}</li>
                                <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_1_feat_3') }}</li>
                            </ul>
                            <a href="https://wa.me/6282229046099?text=Info%20Paket%20Basic%20Ads"
                                class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-slate-700 text-center transition-all font-medium">{{ __('messages.contact_us') }}</a>
                        </div>

                        <!-- Package 2: Strategic Ads (Highlighted) -->
                        <div
                            class="neu-flat rounded-3xl p-8 relative transform md:scale-110 shadow-2xl z-10 border-2 border-indigo-500">
                            <div
                                class="absolute top-0 right-0 bg-indigo-100 text-indigo-700 px-6 py-2 rounded-bl-3xl rounded-tr-3xl text-xs font-bold shadow-sm whitespace-nowrap border-b border-l border-indigo-200">
                                Recommended
                            </div>
                            <h3 class="text-2xl font-bold mb-2 text-slate-800">{{ __('messages.dm_pkg_2_title') }}</h3>
                            <p class="text-slate-500 text-sm mb-8 font-medium">{{ __('messages.dm_pkg_2_desc') }}</p>

                            <ul class="space-y-5 mb-10 text-slate-700 text-sm font-medium">
                                <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                    <strong>{{ __('messages.dm_pkg_2_feat_1') }}</strong></li>
                                <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                    <strong>{{ __('messages.dm_pkg_2_feat_2') }}</strong></li>
                                <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_2_feat_3') }}</li>
                            </ul>
                            <a href="https://wa.me/6282229046099?text=Info%20Paket%20Strategic%20Ads"
                                class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-indigo-700 font-bold text-center transition-all">{{ __('messages.contact_us') }}</a>
                        </div>

                        <!-- Package 3: Comprehensive Growth -->
                        <div
                            class="neu-flat border border-white/50 rounded-3xl p-8 hover:-translate-y-1 transition-all">
                            <h3 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.dm_pkg_3_title') }}</h3>
                            <p class="text-slate-500 text-sm mb-6">{{ __('messages.dm_pkg_3_desc') }}</p>

                            <ul class="space-y-4 mb-8 text-slate-700 text-sm">
                                <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_3_feat_1') }}</li>
                                <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_3_feat_2') }}</li>
                                <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                    {{ __('messages.dm_pkg_3_feat_3') }}</li>
                            </ul>
                            <a href="https://wa.me/6282229046099?text=Info%20Paket%20Comprehensive%20Growth"
                                class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-slate-700 text-center transition-all font-medium">{{ __('messages.contact_us') }}</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Hero Section (Moved to Second Position) -->
            <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
                <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
                    <div
                        class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
                    </div>
                    <div
                        class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
                    </div>
                    <div
                        class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000">
                    </div>
                </div>

                <div class="relative container mx-auto px-6 text-center z-10">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full neu-flat border border-white/50 text-indigo-700 text-sm font-medium mb-8">
                        <span class="relative flex h-3 w-3">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                        </span>
                        Digital Marketing Services
                    </div>

                    <!-- Headline -->
                    <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-black leading-tight">
                        {{ __('messages.dm_title') }}<br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600">
                            Grow Your Business
                        </span>
                    </h1>

                    <!-- Subheadline -->
                    <p class="text-lg md:text-xl text-slate-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                        {{ __('messages.dm_subtitle') }}
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col md:flex-row gap-6 justify-center">
                        <a href="https://wa.me/6282229046099?text=Halo,%20saya%20tertarik%20dengan%20jasa%20Digital%20Marketing."
                            class="px-8 py-4 neu-btn font-bold text-indigo-600">
                            {{ __('messages.contact_us') }}
                        </a>
                        <a href="#pricing"
                            class="px-8 py-4 neu-flat hover:shadow-none transition-all text-slate-600 rounded-full font-medium border border-slate-200/50">
                            Lihat Paket
                        </a>
                    </div>
                </div>
            </section>

            <!-- Product Knowledge Section -->
            <section class="py-24 bg-white relative overflow-hidden">
                <div class="container mx-auto px-6 relative z-10">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">{{ __('messages.dm_pk_title') }}
                        </h2>
                        <p class="text-slate-500 text-lg">{{ __('messages.dm_pk_subtitle') }}</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                        <!-- Google Ads -->
                        <div class="neu-flat p-8 rounded-3xl border border-blue-100 bg-blue-50/30">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center">
                                    <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M44.5 20H24V28.5H35.8C34.7 31.8 31.5 34.5 24 34.5C17.9 34.5 13 29.6 13 23.5C13 17.4 17.9 12.5 24 12.5C27.1 12.5 30 13.6 32.1 15.5L38.3 9.3C34.5 5.8 29.6 3.5 24 3.5C12.9 3.5 3.5 12.9 3.5 24C3.5 35.1 12.9 44.5 24 44.5C35.8 44.5 45 36 45 24C45 22.7 44.8 21.3 44.5 20Z"
                                            fill="#4285F4" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-800">
                                        {{ __('messages.dm_pk_google_title') }}</h3>
                                    <span
                                        class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full mt-1">{{ __('messages.dm_pk_google_badge') }}</span>
                                </div>
                            </div>
                            <p class="text-slate-600 text-lg leading-relaxed">
                                {{ __('messages.dm_pk_google_desc') }}
                            </p>
                        </div>

                        <!-- Meta Ads -->
                        <div class="neu-flat p-8 rounded-3xl border border-purple-100 bg-purple-50/30">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center">
                                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2.04c-5.5 0-10 4.49-10 10.02c0 5 3.66 9.15 8.44 9.9v-7H7.9v-2.9h2.54V9.85c0-2.51 1.49-3.89 3.78-3.89c1.09 0 2.23.19 2.23.19v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.45 2.9h-2.33v7a10 10 0 0 0 8.44-9.9c0-5.53-4.5-10.02-10-10.02Z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-slate-800">{{ __('messages.dm_pk_meta_title') }}
                                    </h3>
                                    <span
                                        class="inline-block px-3 py-1 bg-purple-100 text-purple-700 text-xs font-bold rounded-full mt-1">{{ __('messages.dm_pk_meta_badge') }}</span>
                                </div>
                            </div>
                            <p class="text-slate-600 text-lg leading-relaxed">
                                {{ __('messages.dm_pk_meta_desc') }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Testimonials Section -->
            <section class="py-24 bg-white">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
                            {{ __('messages.dm_testi_title') }}</h2>
                        <p class="text-indigo-600 text-lg font-semibold">{{ __('messages.dm_testi_subtitle') }}</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                        <!-- Testimonial 1 -->
                        <div class="neu-flat p-6 rounded-2xl border border-slate-100">
                            <div class="flex gap-1 mb-4">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-700 text-base mb-5 italic leading-relaxed font-medium">
                                {{ __('messages.dm_testi_1_text') }}</p>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                    S</div>
                                <div>
                                    <div class="font-bold text-slate-800 text-sm">{{ __('messages.dm_testi_1_author') }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('messages.dm_testi_1_role') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="neu-flat p-6 rounded-2xl border border-slate-100">
                            <div class="flex gap-1 mb-4">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-700 text-base mb-5 italic leading-relaxed font-medium">
                                {{ __('messages.dm_testi_2_text') }}</p>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold">
                                    B</div>
                                <div>
                                    <div class="font-bold text-slate-800 text-sm">{{ __('messages.dm_testi_2_author') }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('messages.dm_testi_2_role') }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="neu-flat p-6 rounded-2xl border border-slate-100">
                            <div class="flex gap-1 mb-4">
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-700 text-base mb-5 italic leading-relaxed font-medium">
                                {{ __('messages.dm_testi_3_text') }}</p>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold">
                                    D</div>
                                <div>
                                    <div class="font-bold text-slate-800 text-sm">{{ __('messages.dm_testi_3_author') }}
                                    </div>
                                    <div class="text-xs text-slate-500">{{ __('messages.dm_testi_3_role') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Final CTA -->
            <section class="py-24 bg-[#eef2f6] text-center">
                <div class="container mx-auto px-6 relative z-10">
                    <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-8 leading-tight">
                        {{ __('messages.footer_cta_title') }}</h2>
                    <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">{{ __('messages.footer_cta_desc') }}</p>
                    <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20konsultasi%20Digital%20Marketing."
                        class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center">
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                        {{ __('messages.contact_us') }}
                    </a>
                </div>
            </section>

            <!-- Sticky Mobile CTA -->
            <div
                class="sticky-cta md:hidden bg-white border-t border-slate-200 shadow-2xl p-4 left-0 right-0 w-full max-w-[100vw] overflow-x-hidden">
                <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20konsultasi%20Digital%20Marketing."
                    class="flex items-center justify-center w-full max-w-full px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all active:scale-95">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
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
            </script>
    </div>
</x-layout>