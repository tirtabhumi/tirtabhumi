<x-layout title="Home - PT Tirta Bhumi Indonesia"
    description="PT Tirta Bhumi Indonesia adalah perusahaan penyedia solusi terpadu yang berfokus pada transformasi digital, infrastruktur IT, pengadaan barang & jasa, serta pengembangan SDM.">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex flex-col overflow-hidden pt-32">
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

        <!-- Main Hero Content (Shifted Down) -->
        <div class="relative container mx-auto px-6 text-center z-20 flex-grow flex flex-col justify-center pt-40">
            <!-- Rotating Badge -->
            <div
                class="inline-flex items-center gap-3 px-8 py-2.5 rounded-full bg-white/60 border border-white/60 backdrop-blur-md shadow-sm mb-8 hover:scale-105 transition-transform duration-300 cursor-default animate-fade-in-up mx-auto">
                <span class="relative flex h-3 w-3">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
                <span id="rotating-text" class="text-sm font-semibold text-slate-700 transition-opacity duration-500">
                    {{ __('messages.hero_rotating_text.0') }}
                </span>
            </div>

            <h1
                class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-black animate-fade-in-up animation-delay-100">
                {{ __('messages.hero_title_1') }}
                <br />
                {{ __('messages.hero_title_2') }}
            </h1>
            <p
                class="text-lg md:text-xl text-slate-500 mb-12 max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                {{ __('messages.hero_subtitle') }}
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center animate-fade-in-up animation-delay-300">
                <a href="{{ route('contacts.index') }}"
                    class="px-8 py-4 neu-flat text-indigo-600 font-bold hover:scale-105 transition-transform duration-300">
                    {{ __('messages.footer_cta_btn') }}
                </a>
                <a href="#services" class="px-8 py-4 neu-btn-dark font-bold">
                    {{ __('messages.our_services') }}
                </a>
            </div>

            <div class="h-32 md:h-40"></div>
        </div>

        <!-- Partners Section (Anchored to Bottom) -->
        <div class="relative container mx-auto px-6 text-center z-20 pb-12 animate-fade-in-up animation-delay-400">
            <p class="text-sm font-bold text-black uppercase tracking-wider mb-4">Trusted by Global Leaders</p>

            <div class="relative flex w-full flex-col items-center justify-center overflow-hidden">
                <!-- Marquee Container -->
                <div class="group relative flex overflow-hidden py-10 px-4 gap-8 flex-row w-full max-w-6xl mx-auto">

                    <!-- First Row (Original) -->
                    <div
                        class="flex shrink-0 justify-start gap-8 animate-marquee-scroll flex-row group-hover:[animation-play-state:paused] py-4">
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-1.png') }}" alt="Partner 1" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-2.png') }}" alt="Partner 2" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-3.png') }}" alt="Partner 3" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner 4" loading="lazy"
                                class="h-14 w-auto object-contain transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-5.png') }}" alt="Partner 5" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                    </div>

                    <!-- Second Row (Duplicate for seamless loop) -->
                    <div
                        class="flex shrink-0 justify-start gap-8 animate-marquee-scroll flex-row group-hover:[animation-play-state:paused] py-4">
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-1.png') }}" alt="Partner 1" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-2.png') }}" alt="Partner 2" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-3.png') }}" alt="Partner 3" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner 4" loading="lazy"
                                class="h-14 w-auto object-contain transition-all duration-300">
                        </div>
                        <div
                            class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                            <img src="{{ asset('images/partners/partner-5.png') }}" alt="Partner 5" loading="lazy"
                                width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                        </div>
                    </div>

                    <!-- Gradient Masks -->
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#eef2f6] to-transparent z-10">
                    </div>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-[#eef2f6] to-transparent z-10">
                    </div>
                </div>
            </div>

            <style>
                .animate-marquee-scroll {
                    animation: marquee-scroll 25s linear infinite;
                }

                @keyframes marquee-scroll {
                    from {
                        transform: translateX(0);
                    }

                    to {
                        transform: translateX(calc(-100% - 2rem));
                    }
                }

                @keyframes wiggle {

                    0%,
                    100% {
                        transform: rotate(-3deg);
                    }

                    50% {
                        transform: rotate(3deg);
                    }
                }

                .animate-wiggle {
                    animation: wiggle 1s ease-in-out infinite;
                }

                @keyframes float {

                    0%,
                    100% {
                        transform: translateY(0);
                    }

                    50% {
                        transform: translateY(-10px);
                    }
                }

                .animate-float {
                    animation: float 3s ease-in-out infinite;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Rotating Text Logic
                    const texts = @json(__('messages.hero_rotating_text'));
                    const textElement = document.getElementById('rotating-text');
                    let currentIndex = 0;

                    if (texts.length > 1) {
                        setInterval(() => {
                            // Fade out
                            textElement.style.opacity = '0';

                            setTimeout(() => {
                                currentIndex = (currentIndex + 1) % texts.length;
                                textElement.textContent = texts[currentIndex];
                                // Fade in
                                textElement.style.opacity = '1';
                            }, 500); // Wait for fade out
                        }, 2500); // Change every 2.5s (2s visible + 0.5s transition)
                    }

                    // Spotlight Effect Logic - Desktop Only
                    if (window.matchMedia('(pointer: fine)').matches) {
                        const cards = document.querySelectorAll('.spotlight-card');
                        cards.forEach(card => {
                            card.addEventListener('mousemove', (e) => {
                                const rect = card.getBoundingClientRect();
                                const x = e.clientX - rect.left;
                                const y = e.clientY - rect.top;

                                card.style.setProperty('--mouse-x', `${x}px`);
                                card.style.setProperty('--mouse-y', `${y}px`);
                            });
                        });
                    }
                });
            </script>
        </div>
    </section>

    <!-- Upventure Section -->
    <section id="upventure" class="py-24 bg-slate-50 relative">
        <div class="container mx-auto px-6">
            @php
                $trainings = \App\Models\Training::where('is_active', true)
                    ->where(function ($q) {
                        $q->where('event_date', '>=', now())
                            ->orWhereNull('event_date');
                    })
                    ->orderByRaw('event_date IS NULL DESC, event_date ASC')
                    ->take(3)
                    ->get();
            @endphp

            <div class="mb-12 reveal-bottom">
                <h2 class="text-xl font-bold text-slate-500 mb-2">{{ __('messages.training_title') }}</h2>
                <h3 class="text-3xl md:text-5xl font-bold text-slate-800 mb-4 leading-tight">
                    {{ __('messages.class_title') }}
                </h3>
                <p class="text-slate-500 text-lg mb-8">
                    {{ __('messages.class_desc') }}
                </p>

                <div class="flex flex-col md:flex-row justify-end items-center gap-6">
                    <a href="{{ route('trainings.list') }}"
                        class="neu-flat px-6 py-2 rounded-full text-sm font-bold text-slate-700 hover:text-indigo-600 transition-colors flex items-center">
                        {{ __('messages.see_all') }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            @if($trainings->count() > 0)
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($trainings as $training)
                        <x-training-card :training="$training" />
                    @endforeach
                </div>
            @else
                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100 shadow-sm">
                    <div
                        class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-6 text-indigo-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.class_empty_title') }}</h3>
                    <p class="text-slate-500">{{ __('messages.class_empty_desc') }}</p>
                </div>
            @endif
        </div>
    </section>

    <!-- News & Blog Section -->
    <section class="py-24 bg-white" id="news-blog">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="mb-12 reveal-bottom">
                <h2 class="text-xl font-bold text-slate-500 mb-2">{{ __('messages.news_blog_title') }}</h2>
                <h3 class="text-3xl md:text-5xl font-bold text-slate-800 mb-4 leading-tight">
                    {{ __('messages.news_blog_subtitle') }}
                </h3>
                <p class="text-slate-500 text-lg mb-8">
                    {{ __('messages.news_blog_desc') }}
                </p>

                <!-- Filter & See All -->
                <div class="flex flex-col md:flex-row justify-end items-center gap-6">
                    <!-- See All Button -->
                    <a id="see-all-btn" href="{{ route('blog.index') }}"
                        class="neu-flat px-6 py-2 rounded-full text-sm font-bold text-slate-700 hover:text-indigo-600 transition-colors flex items-center">
                        {{ __('messages.see_all') }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Content Container -->
            <div class="relative min-h-[400px] reveal-bottom delay-200">
                <!-- Blog Grid -->
                <div id="content-blog">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach(\App\Models\Post::with('category')->latest()->take(4)->get() as $post)
                            <a href="{{ route('blog.show', $post) }}"
                                class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                                <div class="relative aspect-video overflow-hidden bg-slate-100">
                                    @php
                                        $blogImage = (!empty($post->images) && isset($post->images[0]))
                                            ? Storage::url($post->images[0])
                                            : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image';
                                    @endphp
                                    <img src="{{ $blogImage }}" alt="{{ $post->title }}" loading="lazy"
                                        class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="text-xs font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600">
                                            {{ $post->category->name }}
                                        </span>
                                        <span
                                            class="text-xs text-slate-500">{{ $post->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <h3
                                        class="text-xl font-bold mb-3 text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="text-slate-500 text-sm line-clamp-3 mb-4">
                                        {{ Str::limit(strip_tags($post->content), 100) }}
                                    </p>
                                    <div
                                        class="mt-auto flex items-center text-indigo-600 font-bold text-sm group-hover:gap-2 transition-all">
                                        {{ __('messages.read_more') }}
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 relative overflow-hidden bg-[#eef2f6] scroll-mt-24">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 reveal-bottom">
                <span
                    class="inline-block px-4 py-1.5 rounded-full bg-white/60 text-indigo-600 font-bold tracking-wider uppercase text-xs mb-4 border border-white/60 shadow-sm">
                    Our Expertise
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 tracking-tight leading-snug">
                    {{ __('messages.services_title') }}
                </h2>
                <p class="text-slate-500 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                    {{ __('messages.services_desc') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1: Digital Services -->
                @php
                    $s1_icon = 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z';
                @endphp
                <a href="{{ route('services.digital') }}"
                    class="group neu-flat overflow-hidden p-4 hover:scale-[1.02] transition-all duration-500 flex flex-col relative">
                    <!-- Decorative background icon -->
                    <div
                        class="absolute -right-6 -bottom-6 text-indigo-600 opacity-[0.1] group-hover:scale-110 transition-transform duration-500 pointer-events-none z-0">
                        <svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="{{ $s1_icon }}"></path>
                        </svg>
                    </div>

                    <!-- Image Header -->
                    <div class="relative h-44 rounded-2xl overflow-hidden mb-5 z-10">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Digital Services"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div
                            class="absolute top-3 left-3 w-10 h-10 rounded-xl bg-white/90 backdrop-blur-sm flex items-center justify-center text-indigo-600 shadow-sm z-20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $s1_icon }}"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="px-2 flex-grow flex flex-col z-20">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors relative z-20">
                            {{ __('messages.service_digital_title') }}
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-4 flex-grow relative z-20">
                            {{ __('messages.service_digital_desc') }}
                        </p>
                        <span
                            class="inline-flex items-center text-xs font-bold text-indigo-600 group-hover:translate-x-1 transition-transform duration-300 relative z-20">
                            Learn More <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </div>
                </a>
                <!-- Service 2: Infrastructure -->
                @php
                    $s2_icon = 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4';
                @endphp

                <a href="{{ route('services.infrastructure') }}"
                    class="group neu-flat overflow-hidden p-4 hover:scale-[1.02] transition-all duration-500 flex flex-col relative">
                    <!-- Decorative background icon -->
                    <div
                        class="absolute -right-6 -bottom-6 text-purple-600 opacity-[0.1] group-hover:scale-110 transition-transform duration-500 pointer-events-none z-0">
                        <svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="{{ $s2_icon }}"></path>
                        </svg>
                    </div>

                    <!-- Image Header -->
                    <div class="relative h-44 rounded-2xl overflow-hidden mb-5 z-10 bg-slate-200">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Infrastructure"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-transparent"></div>

                        <!-- Icon Badge -->
                        <div
                            class="absolute top-3 left-3 w-10 h-10 rounded-xl bg-white/90 backdrop-blur-sm flex items-center justify-center text-purple-600 shadow-sm z-20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $s2_icon }}"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="px-2 flex-grow flex flex-col z-20">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-2 group-hover:text-purple-600 transition-colors relative z-20">
                            {{ __('messages.service_infra_title') }}
                        </h3>

                        <p class="text-slate-500 text-xs leading-relaxed mb-4 flex-grow relative z-20">
                            {{ __('messages.service_infra_desc') }}
                        </p>

                        <span
                            class="inline-flex items-center text-xs font-bold text-purple-600 group-hover:translate-x-1 transition-transform duration-300 relative z-20">
                            {{ __('messages.learn_more') }}
                            <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </div>
                </a>


                <!-- Service 3: UpVenture -->
                @php
                    $s3_icon = 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253';
                @endphp
                <a href="{{ route('trainings.index') }}"
                    class="group neu-flat overflow-hidden p-4 hover:scale-[1.02] transition-all duration-500 flex flex-col relative">
                    <!-- Decorative background icon -->
                    <div
                        class="absolute -right-6 -bottom-6 text-cyan-600 opacity-[0.1] group-hover:scale-110 transition-transform duration-500 pointer-events-none z-0">
                        <svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="{{ $s3_icon }}"></path>
                        </svg>
                    </div>

                    <!-- Image Header -->
                    <div class="relative h-44 rounded-2xl overflow-hidden mb-5 z-10">
                        <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="UpVenture"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div
                            class="absolute top-3 left-3 w-10 h-10 rounded-xl bg-white/90 backdrop-blur-sm flex items-center justify-center text-cyan-600 shadow-sm z-20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $s3_icon }}"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="px-2 flex-grow flex flex-col z-20">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-2 group-hover:text-cyan-600 transition-colors relative z-20">
                            {{ __('messages.service_people_title') }}
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-4 flex-grow relative z-20">
                            {{ __('messages.service_people_desc') }}
                        </p>
                        <span
                            class="inline-flex items-center text-xs font-bold text-cyan-600 group-hover:translate-x-1 transition-transform duration-300 relative z-20">
                            Learn More <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </div>
                </a>

                <!-- Service 4: Procurement -->
                @php
                    $s4_icon = 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z';
                @endphp
                <a href="{{ route('services.procurement') }}"
                    class="group neu-flat overflow-hidden p-4 hover:scale-[1.02] transition-all duration-500 flex flex-col relative">
                    <!-- Decorative background icon -->
                    <div
                        class="absolute -right-6 -bottom-6 text-emerald-600 opacity-[0.1] group-hover:scale-110 transition-transform duration-500 pointer-events-none z-0">
                        <svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path d="{{ $s4_icon }}"></path>
                        </svg>
                    </div>

                    <!-- Image Header -->
                    <div class="relative h-44 rounded-2xl overflow-hidden mb-5 z-10">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Procurement"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div
                            class="absolute top-3 left-3 w-10 h-10 rounded-xl bg-white/90 backdrop-blur-sm flex items-center justify-center text-emerald-600 shadow-sm z-20">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $s4_icon }}"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="px-2 flex-grow flex flex-col z-20">
                        <h3
                            class="text-lg font-bold text-slate-900 mb-2 group-hover:text-emerald-600 transition-colors relative z-20">
                            {{ __('messages.service_procurement_title') }}
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed mb-4 flex-grow relative z-20">
                            {{ __('messages.service_procurement_desc') }}
                        </p>
                        <span
                            class="inline-flex items-center text-xs font-bold text-emerald-600 group-hover:translate-x-1 transition-transform duration-300 relative z-20">
                            Learn More <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Us Part 1: Branding Intro -->
    <section id="why-us" class="py-24 bg-white relative overflow-hidden group">
        <!-- Background Texture -->
        <div
            class="absolute inset-x-0 top-0 h-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:24px_24px] opacity-40 -z-0">
        </div>
        <!-- Decorative Blob -->
        <div
            class="absolute top-0 right-0 w-96 h-96 bg-indigo-50/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 opacity-70">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-center reveal-bottom">
                <div class="lg:w-6/12">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">
                        {{ __('messages.why_us_title') }}
                    </h2>
                    <p class="text-slate-500 text-lg leading-relaxed mb-8">
                        {{ __('messages.why_us_main_desc') }}
                    </p>
                    <div class="flex flex-wrap gap-4 mt-10">
                        <div
                            class="neu-flat px-6 py-3 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider leading-tight">
                                Expert<br>Professional Team</div>
                        </div>
                        <div
                            class="neu-flat px-6 py-3 flex items-center gap-4 hover:-translate-y-1 transition-transform duration-300">
                            <div
                                class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 shadow-sm">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <div class="text-[11px] font-black text-slate-700 uppercase tracking-wider leading-tight">
                                Integrated<br>Quality Solutions</div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-6/12">
                    <div
                        class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-slate-50 group-hover:border-white transition-all duration-500 hover:scale-[1.02]">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80"
                            alt="Our Professional Team"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900/10 to-transparent z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Part 2: Feature Grid -->
    <section id="why-choose-us" class="py-24 bg-[#eef2f6] relative overflow-hidden scroll-mt-24">
        <!-- Background Texture -->
        <div
            class="absolute inset-0 bg-[radial-gradient(#d1d9e6_1px,transparent_1px)] [background-size:32px_32px] opacity-20 -z-10">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-16 reveal-bottom">
                <span class="text-xs font-black text-indigo-600 uppercase tracking-[0.3em] block mb-4">Our Core
                    Excellence</span>
                <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-snug">
                    {{ __('messages.why_us_subtitle') }}
                </h3>
            </div>

            <!-- Main Feature Grid: 4 Columns on Desktop -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
                @php
                    $features = [
                        ['id' => 1, 'color' => 'indigo', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                        ['id' => 2, 'color' => 'purple', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                        ['id' => 3, 'color' => 'emerald', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['id' => 4, 'color' => 'amber', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00.806 1.946 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-.806-.806 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 014.438 0'], // Changed icon for #4
                        ['id' => 5, 'color' => 'cyan', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['id' => 6, 'color' => 'rose', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['id' => 7, 'color' => 'blue', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['id' => 8, 'color' => 'teal', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ];
                @endphp

                @foreach ($features as $f)
                    <div class="group neu-flat p-6 transition-all duration-300 hover:scale-[1.02] flex flex-col reveal-bottom relative overflow-hidden"
                        style="transition-delay: {{ ($loop->index * 50) }}ms">

                        <div
                            class="w-12 h-12 rounded-2xl bg-{{ $f['color'] }}-50 flex items-center justify-center text-{{ $f['color'] }}-600 mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300 relative z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f['icon'] }}">
                                </path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors relative z-20">
                            {{ __('messages.why_us_feat_' . $f['id'] . '_title') }}
                        </h4>
                        <p class="text-slate-500 text-xs leading-relaxed flex-grow relative z-20">
                            {{ __('messages.why_us_feat_' . $f['id'] . '_desc') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 reveal-bottom">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm mb-2 block">Testimonials</span>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-900">What Our Clients Say</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $testimonials = __('messages.home_testimonials');
                @endphp

                @if(is_array($testimonials))
                    @foreach(collect($testimonials)->take(3) as $testi)
                        <div class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom"
                            style="transition-delay: {{ $loop->index * 100 }}ms">
                            <div class="flex items-center gap-1 text-amber-400 mb-6">
                                @for($i = 0; $i < ($testi['rating'] ?? 5); $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-slate-600 mb-8 flex-grow leading-relaxed italic">"{{ $testi['text'] }}"</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <img src="{{ $testi['avatar'] }}" alt="{{ $testi['author'] }}"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-indigo-50">
                                <div>
                                    <h4 class="font-bold text-slate-900 text-sm">{{ $testi['author'] }}</h4>
                                    <span class="text-xs text-slate-500">{{ $testi['role'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <style>
        .reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-bottom {
            opacity: 0;
            transform: translateY(30px);
            transition: all 1s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-visible {
            opacity: 1;
            transform: translateX(0) translateY(0);
        }

        .delay-100 {
            transition-delay: 100ms;
        }

        .delay-200 {
            transition-delay: 200ms;
        }

        .delay-300 {
            transition-delay: 300ms;
        }

        /* Hero Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            /* Start hidden */
        }

        .animation-delay-100 {
            animation-delay: 100ms;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-300 {
            animation-delay: 300ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }

        .animation-delay-500 {
            animation-delay: 500ms;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal-left, .reveal-right, .reveal-bottom').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
    </section>

    <!-- Contact Section (Neumorphic CTA) -->
    <section id="contact" class="py-24 bg-[#eef2f6] relative overflow-hidden">
        <!-- Decorative Background Blobs -->
        <div class="absolute inset-0 opacity-30 pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-indigo-300/40 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-purple-300/40 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-6 text-center relative z-10 reveal-bottom">
            <!-- Main Content -->
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-slate-900 tracking-tight leading-tight">
                {{ __('messages.footer_cta_title') }}
            </h2>
            <p class="text-slate-600 text-lg md:text-xl mb-12 max-w-2xl mx-auto leading-relaxed">
                {{ __('messages.footer_cta_desc') }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-16">

                <!-- WhatsApp Button (Neumorphic) -->
                <a href="https://wa.me/6282229046099" target="_blank"
                    class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-flex items-center hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    {{ __('messages.footer_cta_btn') }}
                </a>
            </div>

            <!-- Trust Indicators (Honest & Value-Focused) -->
            <div class="flex flex-wrap justify-center items-center gap-8 text-slate-600 text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full neu-flat flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <span class="font-medium">Trusted Partner</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full neu-flat flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Fast Response</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full neu-flat flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <span class="font-medium">Quality Guaranteed</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>