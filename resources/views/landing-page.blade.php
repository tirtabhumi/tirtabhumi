<x-layout
    description="Paket Web Bundling & Google Ads All-in-One. Solusi praktis untuk Go Online dan tingkatkan penjualan bisnis Anda.">
    <x-slot:title>
        {{ __('messages.wb_title') }}
        </x-slot>

        <!-- Custom Styles -->
        <style>
            html {
                scroll-behavior: smooth;

                html,
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

            .glass-card-dark {
                background: rgba(30, 41, 59, 0.7);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            /* FAQ Accordion */
            .faq-item {
                transition: all 0.3s ease;
            }

            .faq-answer {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-out;
            }

            .faq-answer.active {
                max-height: 500px;
            }

            .faq-icon {
                transition: transform 0.3s ease;
            }

            .faq-icon.active {
                transform: rotate(45deg);
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

            /* Scroll Reveal Animation */
            .reveal {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s ease-out;
            }
            .reveal-active {
                opacity: 1;
                transform: translateY(0);
            }
        </style>

        <!-- Pricing Section -->
        <section class="relative py-24 bg-[#eef2f6]">

            <!-- Background Glow -->
            <!-- <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-indigo-200/30 rounded-full blur-[120px] pointer-events-none">
            </div> -->

            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">{{ __('messages.pricing_title') }}
                    </h2>
                    <p class="text-slate-500 text-lg">{{ __('messages.pricing_subtitle') }}</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
                    <!-- Basic -->
                    <!-- Basic -->
                    <div class="neu-flat border border-white/50 rounded-3xl p-8 hover:-translate-y-1 transition-all reveal">
                        <h3 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.pricing_basic_title') }}</h3>
                        <p class="text-slate-500 text-sm mb-6">{{ __('messages.pricing_basic_desc') }}</p>
                        <div class="text-3xl font-bold text-slate-900 mb-1">{{ __('messages.pricing_basic_price') }}
                        </div>
                        <div class="text-xs text-slate-400 mb-8 italic">{{ __('messages.pricing_basic_note') }}</div>
                        <ul class="space-y-4 mb-8 text-slate-700 text-sm">
                            <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                {{ __('messages.pricing_basic_list_1') }}</li>
                            <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                {{ __('messages.pricing_basic_list_2') }}</li>
                            <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                {{ __('messages.pricing_basic_list_3') }}</li>
                        </ul>
                        <a href="https://wa.me/6282229046099?text=Info%20Paket%20Rintisan"
                            class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-slate-700 text-center transition-all font-medium">{{ __('messages.pricing_btn_choose') }}</a>
                    </div>

                    <!-- Pro (Highlighted) -->
                    <div
                        class="neu-flat rounded-3xl p-8 relative transform md:scale-110 shadow-2xl z-10 border-2 border-indigo-500 reveal">
                        <div
                            class="absolute top-0 right-0 bg-indigo-100 text-indigo-700 px-6 py-2 rounded-bl-3xl rounded-tr-3xl text-xs font-bold shadow-sm whitespace-nowrap border-b border-l border-indigo-200">
                            {{ __('messages.pricing_pro_badge') }}
                        </div>
                        <h3 class="text-2xl font-bold mb-2 text-slate-800">{{ __('messages.pricing_pro_title') }}</h3>
                        <p class="text-slate-500 text-sm mb-8 font-medium">{{ __('messages.pricing_pro_desc') }}</p>
                        <div class="text-4xl font-bold text-slate-900 mb-1">{{ __('messages.pricing_pro_price') }}</div>
                        <div class="text-xs text-slate-400 mb-8 italic">{{ __('messages.pricing_pro_note') }}</div>
                        <ul class="space-y-5 mb-10 text-slate-700 text-sm font-medium">
                            <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                <strong>{{ __('messages.pricing_pro_list_1') }}</strong>
                            </li>
                            <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                <strong>{{ __('messages.pricing_pro_list_2') }}</strong>
                            </li>
                            <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                {{ __('messages.pricing_pro_list_3') }}</li>
                            <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span>
                                {{ __('messages.pricing_pro_list_4') }}</li>
                        </ul>
                        <a href="https://wa.me/6282229046099?text=Info%20Paket%20Juragan"
                            class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-indigo-700 font-bold text-center transition-all">{{ __('messages.pricing_btn_choose') }}</a>
                    </div>

                    <!-- Custom -->
                    <div class="neu-flat border border-white/50 rounded-3xl p-8 hover:-translate-y-1 transition-all reveal">
                        <h3 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.pricing_custom_title') }}</h3>
                        <p class="text-slate-500 text-sm mb-6">{{ __('messages.pricing_custom_desc') }}</p>
                        <div class="text-3xl font-bold text-slate-900 mb-8">{{ __('messages.pricing_custom_price') }}
                        </div>
                        <ul class="space-y-4 mb-8 text-slate-700 text-sm">
                            <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                {{ __('messages.pricing_custom_list_1') }}</li>
                            <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                {{ __('messages.pricing_custom_list_2') }}</li>
                            <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span>
                                {{ __('messages.pricing_custom_list_3') }}</li>
                        </ul>
                        <a href="https://wa.me/6282229046099?text=Info%20Paket%20Sultan"
                            class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-slate-700 text-center transition-all font-medium">{{ __('messages.pricing_btn_consult') }}</a>
                    </div>
                </div>
            </div>
        </section>




        <!-- Hero Section -->
        <section class="relative bg-[#eef2f6] flex items-center overflow-hidden py-24">
            <div class="relative container mx-auto px-6 text-center z-10 reveal">
                <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full neu-flat border border-white/50 text-indigo-700 text-sm font-medium mb-8">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                    </span>
                    {{ __('messages.wb_hero_badge') }}
                </div>

                <!-- Headline -->
                <h1 class="text-4xl md:text-5xl font-bold tracking-tight mb-6 text-black leading-tight">
                    {{ __('messages.wb_hero_headline_1') }}<br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600">
                        {{ __('messages.wb_hero_headline_2') }}
                    </span>
                </h1>

                <!-- Subheadline -->
                <p class="text-lg md:text-xl text-slate-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                    {{ __('messages.wb_hero_subheadline') }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col md:flex-row gap-6 justify-center">
                    <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20pindahkan%20toko%20saya%20ke%20Google."
                        class="px-8 py-4 neu-btn font-bold text-indigo-600">
                        {{ __('messages.wb_hero_cta_1') }}
                    </a>
                    <a href="#comparison"
                        class="px-8 py-4 neu-flat hover:shadow-none transition-all text-slate-600 rounded-full font-medium border border-slate-200/50">
                        {{ __('messages.wb_hero_cta_2') }}
                    </a>
                </div>
            </div>
        </section>

        <!-- Reality Check (Comparison) -->
        <section id="comparison" class="py-24 bg-[#eef2f6]">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
                        {{ __('messages.wb_comparison_title') }}
                    </h2>
                    <p class="text-slate-500 text-lg">{{ __('messages.wb_comparison_subtitle') }}</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <!-- The Old Way -->
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 reveal">
                        <div
                            class="inline-block bg-slate-200 text-slate-600 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide mb-6">
                            {{ __('messages.wb_old_way_badge') }}
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-6">{{ __('messages.wb_old_way_title') }}</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3 text-slate-600">
                                <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>{!! __('messages.wb_old_way_1') !!}</span>
                            </li>
                            <li class="flex items-start gap-3 text-slate-600">
                                <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>{{ __('messages.wb_old_way_2') }}</span>
                            </li>
                            <li class="flex items-start gap-3 text-slate-600">
                                <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>{!! __('messages.wb_old_way_3') !!}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- The New Way -->
                    <div class="neu-flat p-8 rounded-3xl border-2 border-indigo-400 reveal">
                        <div
                            class="inline-block bg-slate-200 text-slate-600 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide mb-6">
                            {{ __('messages.wb_new_way_badge') }}
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-6">{{ __('messages.wb_new_way_title') }}</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3 text-slate-700">
                                <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{!! __('messages.wb_new_way_1') !!}</span>
                            </li>
                            <li class="flex items-start gap-3 text-slate-700">
                                <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{!! __('messages.wb_new_way_2') !!}</span>
                            </li>
                            <li class="flex items-start gap-3 text-slate-700">
                                <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{!! __('messages.wb_new_way_3') !!}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Social Proof / Testimonials -->
        <section class="py-24 bg-[#eef2f6]">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">{{ __('messages.wb_social_title') }}
                    </h2>
                    <p class="text-indigo-600 text-lg font-semibold">{{ __('messages.wb_social_subtitle') }}</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                    <!-- Testimonial 1 -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
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
                            {{ __('messages.wb_testi_1_text') }}
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">
                                B</div>
                            <div>
                                <div class="font-bold text-slate-800 text-sm">{{ __('messages.wb_testi_1_author') }}
                                </div>
                                <div class="text-xs text-slate-500">{{ __('messages.wb_testi_1_role') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
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
                            {{ __('messages.wb_testi_2_text') }}
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold">
                                S</div>
                            <div>
                                <div class="font-bold text-slate-800 text-sm">{{ __('messages.wb_testi_2_author') }}
                                </div>
                                <div class="text-xs text-slate-500">{{ __('messages.wb_testi_2_role') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
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
                            {{ __('messages.wb_testi_3_text') }}
                        </p>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold">
                                A</div>
                            <div>
                                <div class="font-bold text-slate-800 text-sm">{{ __('messages.wb_testi_3_author') }}
                                </div>
                                <div class="text-xs text-slate-500">{{ __('messages.wb_testi_3_role') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Value Proposition -->
        <section class="py-24 bg-[#eef2f6] overflow-hidden">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center gap-16">
                    <div class="w-full md:w-1/2 order-2 md:order-1">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">
                            {{ __('messages.wb_value_title') }}
                        </h2>
                        <p class="text-slate-500 text-lg mb-10 leading-relaxed">
                            {{ __('messages.wb_value_desc') }}
                        </p>

                        <div class="space-y-6">
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 shrink-0 mt-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-base mb-1">
                                        {{ __('messages.wb_value_1_title') }}
                                    </h4>
                                    <p class="text-slate-600 text-sm">{{ __('messages.wb_value_1_desc') }}</p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 shrink-0 mt-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-base mb-1">
                                        {{ __('messages.wb_value_2_title') }}
                                    </h4>
                                    <p class="text-slate-600 text-sm">{{ __('messages.wb_value_2_desc') }}</p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 shrink-0 mt-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-base mb-1">
                                        {{ __('messages.wb_value_3_title') }}
                                    </h4>
                                    <p class="text-slate-600 text-sm">{{ __('messages.wb_value_3_desc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 order-1 md:order-2">
                        <div class="relative">
                            <!-- Glow Effect -->
                            <div
                                class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-[2rem] opacity-30 blur-2xl animate-pulse">
                            </div>

                            <!-- Chat Container -->
                            <div class="relative neu-flat p-6 md:p-8 rounded-[2rem] shadow-2xl border border-white/50">
                                <!-- Header -->
                                <div class="flex items-center justify-between border-b border-slate-100 pb-6 mb-6">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 rounded-full bg-black flex items-center justify-center shadow-lg shadow-green-200 overflow-hidden">
                                            <img src="{{ asset('images/buyer-profile.png') }}" alt="Buyer"
                                                loading="lazy" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-800 text-lg">
                                                {{ __('messages.wb_chat_buyer') }}
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                                <span
                                                    class="text-xs text-slate-500 font-medium">{{ __('messages.wb_chat_online') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs text-slate-400">{{ __('messages.wb_chat_today') }}</div>
                                </div>

                                <!-- Chat Bubbles -->
                                <div class="space-y-6">
                                    <!-- Incoming -->
                                    <div class="flex gap-3">
                                        <div
                                            class="bg-slate-100 p-4 rounded-2xl rounded-tl-none max-w-[85%] text-slate-700 shadow-sm">
                                            <p class="text-sm leading-relaxed">{{ __('messages.wb_chat_1') }}</p>
                                            <span class="text-[10px] text-slate-400 mt-1 block">10:42</span>
                                        </div>
                                    </div>

                                    <!-- Outgoing -->
                                    <div class="flex gap-3 justify-end">
                                        <div
                                            class="bg-indigo-600 p-4 rounded-2xl rounded-tr-none max-w-[85%] text-white shadow-md shadow-indigo-200">
                                            <p class="text-sm leading-relaxed">{{ __('messages.wb_chat_2') }}</p>
                                            <span class="text-[10px] text-indigo-200 mt-1 block text-right">10:43</span>
                                        </div>
                                    </div>

                                    <!-- Incoming -->
                                    <div class="flex gap-3">
                                        <div
                                            class="bg-slate-100 p-4 rounded-2xl rounded-tl-none max-w-[85%] text-slate-700 shadow-sm">
                                            <p class="text-sm leading-relaxed">{{ __('messages.wb_chat_3') }}</p>
                                            <span class="text-[10px] text-slate-400 mt-1 block">10:45</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div class="mt-6 pt-4 border-t border-slate-100 text-center">
                                    <p class="text-xs text-slate-400 font-medium italic">
                                        {{ __('messages.wb_chat_note') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-24 bg-[#eef2f6]">
            <div class="container mx-auto px-6 max-w-4xl">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">{{ __('messages.wb_faq_title') }}
                    </h2>
                    <p class="text-indigo-600 text-lg font-semibold">{{ __('messages.wb_faq_subtitle') }}</p>
                </div>

                <div class="flex flex-col gap-12">
                    <!-- FAQ 1 -->
                    <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left flex items-center justify-between hover:bg-indigo-50 transition-colors">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-bold text-slate-800 text-lg">{{ __('messages.wb_faq_1_q') }}</span>
                            </div>
                            <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                        <div class="faq-answer px-6 pb-6">
                            <div class="pl-12 text-slate-600 leading-relaxed">
                                {!! __('messages.wb_faq_1_a') !!}
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left flex items-center justify-between hover:bg-indigo-50 transition-colors">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600 shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-bold text-slate-800 text-lg">{{ __('messages.wb_faq_2_q') }}</span>
                            </div>
                            <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                        <div class="faq-answer px-6 pb-6">
                            <div class="pl-12 text-slate-600 leading-relaxed">
                                {!! __('messages.wb_faq_2_a') !!}
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left flex items-center justify-between hover:bg-indigo-50 transition-colors">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-bold text-slate-800 text-lg">{{ __('messages.wb_faq_3_q') }}</span>
                            </div>
                            <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                        <div class="faq-answer px-6 pb-6">
                            <div class="pl-12 text-slate-600 leading-relaxed">
                                {!! __('messages.wb_faq_3_a') !!}
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                        <button onclick="toggleFAQ(this)"
                            class="w-full p-6 text-left flex items-center justify-between hover:bg-indigo-50 transition-colors">
                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0 mt-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="font-bold text-slate-800 text-lg">{{ __('messages.wb_faq_4_q') }}</span>
                            </div>
                            <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"></path>
                            </svg>
                        </button>
                        <div class="faq-answer px-6 pb-6">
                            <div class="pl-12 text-slate-600 leading-relaxed">
                                {!! __('messages.wb_faq_4_a') !!}
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
                    {{ __('messages.wb_final_cta_title') }}
                </h2>
                <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">{{ __('messages.wb_final_cta_desc') }}</p>
                <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20amankan%20slot%20Google%20Ads."
                    class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center">
                    <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    {{ __('messages.wb_final_cta_btn') }}
                </a>
            </div>
        </section>

        <!-- Sticky Mobile CTA -->
        <div
            class="sticky-cta md:hidden bg-white border-t border-slate-200 shadow-2xl p-4 left-0 right-0 w-full max-w-[100vw] overflow-x-hidden">
            <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20konsultasi%20tentang%20website%20dan%20Google%20Ads."
                class="flex items-center justify-center w-full max-w-full px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all active:scale-95">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                </svg>
                {{ __('messages.wb_sticky_cta') }}
            </a>
        </div>

        <!-- JavaScript -->
        <script>
            // FAQ Accordion
            function toggleFAQ(button) {
                const faqItem = button.closest('.faq-item');
                const answer = faqItem.querySelector('.faq-answer');
                const icon = button.querySelector('.faq-icon');
                const isActive = answer.classList.contains('active');

                // Close all FAQs
                document.querySelectorAll('.faq-answer').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.faq-icon').forEach(item => {
                    item.classList.remove('active');
                });

                // Toggle current FAQ
                if (!isActive) {
                    answer.classList.add('active');
                    icon.classList.add('active');
                }
            }

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

            // Scroll Reveal Animation Script
            document.addEventListener('DOMContentLoaded', function() {
                const reveals = document.querySelectorAll('.reveal');

                const revealOnScroll = () => {
                    const windowHeight = window.innerHeight;
                    const elementVisible = 150;

                    reveals.forEach((reveal) => {
                        const elementTop = reveal.getBoundingClientRect().top;
                        if (elementTop < windowHeight - elementVisible) {
                            reveal.classList.add('reveal-active');
                        }
                    });
                }

                window.addEventListener('scroll', revealOnScroll);
                // Trigger once on load
                revealOnScroll();
            });
        </script>
</x-layout>