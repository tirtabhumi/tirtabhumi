<x-layout title="Home - PT Tirta Bhumi Indonesia" description="Mitra Strategis Transformasi Digital, Infrastruktur IT, Pengembangan SDM, dan Pengadaan Barang & Jasa Terpadu.">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative container mx-auto px-6 text-center z-10">
            <!-- Rotating Badge -->
            <div class="inline-flex items-center gap-3 px-8 py-2.5 rounded-full bg-white/60 border border-white/60 backdrop-blur-md shadow-sm mb-8 hover:scale-105 transition-transform duration-300 cursor-default animate-fade-in-up">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
                <span id="rotating-text" class="text-sm font-semibold text-slate-700 transition-opacity duration-500">
                    {{ __('messages.hero_rotating_text.0') }}
                </span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-black animate-fade-in-up animation-delay-100">
                {{ __('messages.hero_title_1') }}
                <br />
                {{ __('messages.hero_title_2') }}
            </h1>
            <p class="text-lg md:text-xl text-slate-500 mb-12 max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                {{ __('messages.hero_subtitle') }}
            </p>
            <div class="flex flex-col md:flex-row gap-6 justify-center animate-fade-in-up animation-delay-300">
                <a href="{{ route('contacts.index') }}" class="px-8 py-4 neu-flat text-indigo-600 font-bold hover:scale-105 transition-transform duration-300">
                    {{ __('messages.footer_cta_btn') }}
                </a>
                <a href="#services" class="px-8 py-4 neu-btn-dark font-bold">
                    {{ __('messages.our_services') }}
                </a>
            </div>
            <div class="h-8 md:h-8"></div>
            <div class="mt-32 animate-fade-in-up animation-delay-400">
                <p class="text-sm font-bold text-black uppercase tracking-wider mb-8">Trusted by Global Leaders</p>
                
                <div class="relative flex w-full flex-col items-center justify-center overflow-hidden">
                    <!-- Marquee Container -->
                    <div class="group relative flex overflow-hidden py-10 px-4 gap-8 flex-row w-full max-w-6xl mx-auto">
                        
                        <!-- First Row (Original) -->
                        <div class="flex shrink-0 justify-start gap-8 animate-marquee-scroll flex-row group-hover:[animation-play-state:paused] py-4">
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-1.png') }}" alt="Partner 1" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-2.png') }}" alt="Partner 2" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-3.png') }}" alt="Partner 3" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner 4" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-5.png') }}" alt="Partner 5" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                        </div>

                        <!-- Second Row (Duplicate for seamless loop) -->
                        <div class="flex shrink-0 justify-start gap-8 animate-marquee-scroll flex-row group-hover:[animation-play-state:paused] py-4">
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-1.png') }}" alt="Partner 1" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-2.png') }}" alt="Partner 2" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-3.png') }}" alt="Partner 3" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner 4" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                            <div class="w-32 h-20 neu-flat rounded-xl flex items-center justify-center p-3 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                <img src="{{ asset('images/partners/partner-5.png') }}" alt="Partner 5" loading="lazy" width="128" height="80" class="max-w-full max-h-full transition-all duration-300">
                            </div>
                        </div>

                        <!-- Gradient Masks -->
                        <div class="pointer-events-none absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#eef2f6] to-transparent z-10"></div>
                        <div class="pointer-events-none absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-[#eef2f6] to-transparent z-10"></div>
                    </div>
                </div>

                <style>
                    .animate-marquee-scroll {
                        animation: marquee-scroll 25s linear infinite;
                    }
                    @keyframes marquee-scroll {
                        from { transform: translateX(0); }
                        to { transform: translateX(calc(-100% - 2rem)); }
                    }
                    @keyframes wiggle {
                        0%, 100% { transform: rotate(-3deg); }
                        50% { transform: rotate(3deg); }
                    }
                    .animate-wiggle {
                        animation: wiggle 1s ease-in-out infinite;
                    }
                    @keyframes float {
                        0%, 100% { transform: translateY(0); }
                        50% { transform: translateY(-10px); }
                    }
                    .animate-float {
                        animation: float 3s ease-in-out infinite;
                    }
                </style>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
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
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <!-- Filter Toggle -->
                    <div class="neu-pressed p-2 rounded-full flex items-center gap-2">
                        <button onclick="switchTab('blog')" id="btn-blog" class="px-8 py-3 rounded-full text-sm font-bold transition-all duration-300 neu-flat text-indigo-600 transform hover:-translate-y-0.5">
                            {{ __('messages.filter_blog') }}
                        </button>
                        <button onclick="switchTab('training')" id="btn-training" class="px-8 py-3 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-slate-700 hover:bg-slate-200/50">
                            {{ __('messages.filter_training') }}
                        </button>
                    </div>

                    <!-- See All Button -->
                    <a id="see-all-btn" href="{{ route('blog.index') }}" class="neu-flat px-6 py-2 rounded-full text-sm font-bold text-slate-700 hover:text-indigo-600 transition-colors flex items-center">
                        {{ __('messages.see_all') }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Content Container -->
            <div class="relative min-h-[400px] reveal-bottom delay-200">
                <!-- Blog Grid (Default Visible) -->
                <div id="content-blog" class="transition-opacity duration-300">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach(\App\Models\Post::with('category')->latest()->take(4)->get() as $post)
                        <a href="{{ route('blog.show', $post) }}" class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                            <div class="relative aspect-video overflow-hidden bg-slate-100">
                                <img src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}" alt="{{ $post->title }}" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-xs font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600">
                                        {{ $post->category->name }}
                                    </span>
                                    <span class="text-xs text-slate-500">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-3 mb-4">
                                    {{ Str::limit(strip_tags($post->content), 100) }}
                                </p>
                                <div class="mt-auto flex items-center text-indigo-600 font-bold text-sm group-hover:gap-2 transition-all">
                                    {{ __('messages.read_more') }}
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Trainings Grid (Default Hidden) -->
                <div id="content-training" class="hidden transition-opacity duration-300">
                    @php
                        $upcomingTrainings = \App\Models\Training::where('is_active', true)
                            ->orderBy('event_date', 'desc')
                            ->take(4)
                            ->get();
                    @endphp

                    @if($upcomingTrainings->count() > 0)
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($upcomingTrainings as $training)
                                <a href="{{ route('trainings.show', $training) }}" class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                                    <div class="relative aspect-video overflow-hidden bg-slate-100">
                                        @if($training->image)
                                            <img src="{{ Storage::url($training->image) }}" alt="{{ $training->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400">
                                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                        @if($training->event_date->isPast())
                                            <div class="absolute top-4 right-4 bg-red-100/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-red-600">
                                                Selesai
                                            </div>
                                        @else
                                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold {{ $training->type === 'online' ? 'text-green-600' : 'text-indigo-600' }}">
                                                {{ ucfirst($training->type) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ $training->event_date->format('d M, Y') }}
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-2">{{ $training->title }}</h3>
                                        <div class="mt-auto flex items-center text-indigo-600 font-bold text-sm group-hover:gap-2 transition-all">
                                            {{ __('messages.view_detail') }}
                                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12 bg-white rounded-3xl border border-slate-100">
                            <p class="text-slate-500">{{ __('messages.no_upcoming_trainings') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <script>
        function switchTab(tab) {
            const btnTraining = document.getElementById('btn-training');
            const btnBlog = document.getElementById('btn-blog');
            const contentTraining = document.getElementById('content-training');
            const contentBlog = document.getElementById('content-blog');
            const seeAllBtn = document.getElementById('see-all-btn');

            if (tab === 'training') {
                // Update Buttons
                btnTraining.classList.add('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                btnTraining.classList.remove('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');
                
                btnBlog.classList.remove('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                btnBlog.classList.add('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');

                // Update Content
                contentTraining.classList.remove('hidden');
                contentBlog.classList.add('hidden');

                // Update See All Link
                seeAllBtn.href = "{{ route('trainings.index') }}";
            } else {
                // Update Buttons
                btnBlog.classList.add('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                btnBlog.classList.remove('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');
                
                btnTraining.classList.remove('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                btnTraining.classList.add('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');

                // Update Content
                contentBlog.classList.remove('hidden');
                contentTraining.classList.add('hidden');

                // Update See All Link
                seeAllBtn.href = "{{ route('blog.index') }}";
            }
        }
    </script>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 reveal-bottom">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-800">{{ __('messages.services_title') }}</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">
                    {{ __('messages.services_desc') }}
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-6" id="services-grid">
                <!-- Service 1: Digital & Automation (Large - Span 2) -->
                <a href="{{ route('services.digital') }}" class="spotlight-card group relative md:col-span-2 p-8 neu-flat hover:shadow-none transition-all duration-500 border border-white/50 hover:-translate-y-1 overflow-hidden reveal-bottom delay-100">
                    <div class="spotlight absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), rgba(79, 70, 229, 0.1), transparent 40%);"></div>

                    <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-6 h-full">
                        <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center text-indigo-600 transition-all duration-500 shrink-0 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 16l4-16M6 9h14M4 15h14"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-slate-800 group-hover:text-indigo-600 transition-colors">{{ __('messages.service_digital_title') }}</h3>
                            <p class="text-slate-500 text-base leading-relaxed group-hover:text-slate-600 transition-colors">
                                {{ __('messages.service_digital_desc') }}
                            </p>
                        </div>
                    </div>
                </a>

                <!-- Service 2: Infrastructure (Small - Span 1) -->
                <a href="{{ route('services.infrastructure') }}" class="spotlight-card group relative md:col-span-1 p-8 neu-flat hover:shadow-none transition-all duration-500 border border-white/50 hover:-translate-y-2 overflow-hidden flex flex-col reveal-bottom delay-200">
                    <div class="spotlight absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), rgba(147, 51, 234, 0.1), transparent 40%);"></div>
                    <div class="absolute -bottom-4 -right-4 opacity-5 group-hover:opacity-10 transition-all duration-700 transform group-hover:-translate-y-4 group-hover:scale-110 animate-float">
                        <svg class="w-24 h-24 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-purple-600 transition-all duration-500 group-hover:shadow-lg group-hover:shadow-purple-200">
                        <svg class="w-8 h-8 group-hover:-translate-y-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-purple-600 transition-colors">{{ __('messages.service_infra_title') }}</h3>
                    <p class="text-slate-500 text-sm flex-grow relative z-10">
                        {{ __('messages.service_infra_desc') }}
                    </p>
                </a>

                <!-- Service 3: People & Events (Small - Span 1) -->
                <a href="{{ route('trainings.index') }}" class="spotlight-card group relative md:col-span-1 p-8 neu-flat hover:shadow-none transition-all duration-500 border border-white/50 hover:-translate-y-1 overflow-hidden flex flex-col reveal-bottom delay-300">
                    <div class="spotlight absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), rgba(8, 145, 178, 0.1), transparent 40%);"></div>

                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-cyan-600 transition-all duration-500 group-hover:animate-wiggle">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-cyan-600 transition-colors">{{ __('messages.service_people_title') }}</h3>
                    <p class="text-slate-500 text-sm flex-grow">
                        {{ __('messages.service_people_desc') }}
                    </p>
                </a>

                <!-- Service 4: Procurement (Large - Span 2) -->
                <a href="{{ route('services.procurement') }}" class="spotlight-card group relative md:col-span-2 p-8 neu-flat hover:shadow-none transition-all duration-500 border border-white/50 hover:-translate-y-1 overflow-hidden reveal-bottom delay-300">
                    <div class="spotlight absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none" style="background: radial-gradient(600px circle at var(--mouse-x) var(--mouse-y), rgba(16, 185, 129, 0.1), transparent 40%);"></div>
                    <div class="absolute -bottom-8 -right-8 p-8 opacity-10 group-hover:opacity-20 transition-all duration-700 transform group-hover:scale-150 group-hover:rotate-12 animate-float">
                        <svg class="w-40 h-40 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div class="relative z-10 flex flex-col md:flex-row md:items-center gap-6 h-full">
                        <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center text-emerald-600 transition-all duration-500 shrink-0 group-hover:scale-110 group-hover:shadow-lg group-hover:shadow-emerald-200">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-2 text-slate-800 group-hover:text-emerald-600 transition-colors">{{ __('messages.service_procurement_title') }}</h3>
                            <p class="text-slate-500 text-base leading-relaxed group-hover:text-slate-600 transition-colors">
                                {{ __('messages.service_procurement_desc') }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- About & Target Market Section -->
    <section id="about" class="py-24 bg-[#eef2f6] relative overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-white/50 to-transparent pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Single Container for Both Sections -->
            <div class="neu-flat p-6 md:p-12 rounded-3xl border border-white/50 relative overflow-hidden">
                <div class="grid md:grid-cols-2 gap-16 md:gap-12 lg:gap-24">
                    <!-- Left Column: Why Us -->
                    <div class="reveal-left relative group flex flex-col h-full justify-center">
                        <!-- Decorative Gradient -->
                        <div class="absolute top-0 left-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl -ml-32 -mt-32 group-hover:bg-indigo-500/20 transition-all duration-700 pointer-events-none"></div>
                        
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-800 leading-tight">
                            {{ __('messages.why_us_title') }}
                        </h2>
                        <div class="prose prose-lg text-slate-600 leading-relaxed mb-8">
                            <p>{{ __('messages.why_us_desc') }}</p>
                        </div>
                        
                        <!-- Core Values -->
                        <div>
                            <p class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Core Values</p>
                            <div class="flex gap-4">
                                <div class="w-12 h-12 rounded-full neu-pressed flex items-center justify-center text-indigo-600" title="Innovation">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div class="w-12 h-12 rounded-full neu-pressed flex items-center justify-center text-indigo-600" title="Integrity">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <div class="w-12 h-12 rounded-full neu-pressed flex items-center justify-center text-indigo-600" title="Excellence">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Who We Serve -->
                    <div class="reveal-right flex flex-col h-full mt-12 md:mt-0">
                        <div class="mb-8">
                            <h2 class="text-3xl md:text-4xl font-bold text-slate-800">{{ __('messages.target_market_title') }}</h2>
                        </div>

                        <div class="space-y-6 flex-grow">
                            <!-- Government -->
                            <div class="bg-slate-50 p-4 md:p-6 rounded-2xl flex items-center gap-4 md:gap-6 hover:translate-x-2 transition-transform duration-300 border border-slate-100 shadow-sm">
                                <div class="w-14 h-14 shrink-0 neu-flat rounded-xl flex items-center justify-center text-slate-700">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('messages.tm_gov') }}</h3>
                                    <p class="text-slate-500 text-sm leading-relaxed">{{ __('messages.tm_gov_desc') }}</p>
                                </div>
                            </div>

                            <!-- Enterprise -->
                            <div class="bg-slate-50 p-4 md:p-6 rounded-2xl flex items-center gap-4 md:gap-6 hover:translate-x-2 transition-transform duration-300 border border-slate-100 shadow-sm">
                                <div class="w-14 h-14 shrink-0 neu-flat rounded-xl flex items-center justify-center text-slate-700">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('messages.tm_corp') }}</h3>
                                    <p class="text-slate-500 text-sm leading-relaxed">{{ __('messages.tm_corp_desc') }}</p>
                                </div>
                            </div>

                            <!-- UMKM -->
                            <div class="bg-slate-50 p-4 md:p-6 rounded-2xl flex items-center gap-4 md:gap-6 hover:translate-x-2 transition-transform duration-300 border border-slate-100 shadow-sm">
                                <div class="w-14 h-14 shrink-0 neu-flat rounded-xl flex items-center justify-center text-slate-700">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-slate-800 mb-1">{{ __('messages.tm_sme') }}</h3>
                                    <p class="text-slate-500 text-sm leading-relaxed">{{ __('messages.tm_sme_desc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
            .delay-100 { transition-delay: 100ms; }
            .delay-200 { transition-delay: 200ms; }
            .delay-300 { transition-delay: 300ms; }
            
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
                opacity: 0; /* Start hidden */
            }
            .animation-delay-100 { animation-delay: 100ms; }
            .animation-delay-200 { animation-delay: 200ms; }
            .animation-delay-300 { animation-delay: 300ms; }
            .animation-delay-400 { animation-delay: 400ms; }
            .animation-delay-500 { animation-delay: 500ms; }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
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

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6 text-center reveal-bottom">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-800">{{ __('messages.footer_cta_title') }}</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">
                {{ __('messages.footer_cta_desc') }}
            </p>
            
            <div class="flex justify-center">
                <!-- WhatsApp -->
                <a href="{{ route('contacts.index') }}" class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-flex items-center hover:scale-105 transition-transform duration-300">
                    {{ __('messages.footer_cta_btn') }}
                </a>
            </div>
        </div>
    </section>
</x-layout>
