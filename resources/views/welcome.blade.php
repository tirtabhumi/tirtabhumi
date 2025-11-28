<x-layout>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative container mx-auto px-6 text-center z-10">
            <!-- Rotating Badge -->
            <div class="inline-flex items-center gap-3 px-8 py-2.5 rounded-full bg-white/60 border border-white/60 backdrop-blur-md shadow-sm mb-8 hover:scale-105 transition-transform duration-300 cursor-default">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
                <span id="rotating-text" class="text-sm font-semibold text-slate-700 transition-opacity duration-500">
                    {{ __('messages.hero_rotating_text.0') }}
                </span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-black">
                {{ __('messages.hero_title_1') }}
                <br />
                {{ __('messages.hero_title_2') }}
            </h1>
            <p class="text-lg md:text-xl text-slate-500 mb-12 max-w-2xl mx-auto leading-relaxed">
                {{ __('messages.hero_subtitle') }}
            </p>
            <div class="flex flex-col md:flex-row gap-8 justify-center">
                <a href="https://wa.me/6282229046099" target="_blank" class="px-8 py-4 neu-btn font-bold text-indigo-600">
                    {{ __('messages.get_started') }}
                </a>
                <a href="#services" class="px-8 py-4 neu-btn-dark font-bold">
                    {{ __('messages.our_services') }}
                </a>
            </div>
            <div class="h-8 md:h-8"></div>
            <div class="mt-32">
                <p class="text-sm font-bold text-black uppercase tracking-wider mb-8">Trusted by Global Leaders</p>
                
                <div class="relative flex w-full flex-col items-center justify-center overflow-hidden">
                    <!-- Marquee Container -->
                    <div class="group relative flex overflow-hidden py-10 px-4 gap-8 flex-row w-full max-w-6xl mx-auto">
                        
                        <!-- First Row (Original) -->
                        <div class="flex shrink-0 justify-start gap-8 animate-marquee-scroll flex-row min-w-full group-hover:[animation-play-state:paused] py-4">
                            @for($i = 0; $i < 6; $i++)
                                <div class="w-40 h-24 neu-flat rounded-xl flex items-center justify-center p-4 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                    <img src="https://placehold.co/150x50/e2e8f0/64748b?text=Logo+{{ $i+1 }}" alt="Partner {{ $i+1 }}" class="max-w-full max-h-full opacity-60 grayscale hover:grayscale-0 transition-all duration-300">
                                </div>
                            @endfor
                        </div>

                        <!-- Second Row (Duplicate for seamless loop) -->
                        <div class="flex shrink-0 justify-start gap-8 animate-marquee-scroll flex-row min-w-full group-hover:[animation-play-state:paused] py-4">
                            @for($i = 0; $i < 6; $i++)
                                <div class="w-40 h-24 neu-flat rounded-xl flex items-center justify-center p-4 border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                                    <img src="https://placehold.co/150x50/e2e8f0/64748b?text=Logo+{{ $i+1 }}" alt="Partner {{ $i+1 }}" class="max-w-full max-h-full opacity-60 grayscale hover:grayscale-0 transition-all duration-300">
                                </div>
                            @endfor
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
                </style>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
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
                    });
                </script>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-[#eef2f6] relative">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-8 text-slate-800">{{ __('messages.why_us_title') }}</h2>
                <div class="neu-flat p-8 md:p-12 rounded-3xl border border-white/50 w-fit mx-auto">
                    <p class="text-slate-600 text-lg leading-relaxed whitespace-pre-line">{{ __('messages.why_us_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-800">{{ __('messages.services_title') }}</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">
                    {{ __('messages.services_desc') }}
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1: Digital & Automation -->
                <a href="{{ route('services.digital') }}" class="block p-8 neu-flat hover:shadow-none transition-all group border border-white/50 hover:-translate-y-1">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-indigo-600 group-hover:text-indigo-500 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 16l4-16M6 9h14M4 15h14"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.service_digital_title') }}</h3>
                    <p class="text-slate-500 text-sm">
                        {{ __('messages.service_digital_desc') }}
                    </p>
                </a>
                <!-- Service 2: Infrastructure -->
                <a href="{{ route('services.infrastructure') }}" class="block p-8 neu-flat hover:shadow-none transition-all group border border-white/50 hover:-translate-y-1">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-purple-600 group-hover:text-purple-500 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.service_infra_title') }}</h3>
                    <p class="text-slate-500 text-sm">
                        {{ __('messages.service_infra_desc') }}
                    </p>
                </a>
                <!-- Service 3: People & Events -->
                <a href="{{ route('services.people') }}" class="block p-8 neu-flat hover:shadow-none transition-all group border border-white/50 hover:-translate-y-1">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-cyan-600 group-hover:text-cyan-500 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.service_people_title') }}</h3>
                    <p class="text-slate-500 text-sm">
                        {{ __('messages.service_people_desc') }}
                    </p>
                </a>
                <!-- Service 4: Procurement -->
                <a href="{{ route('services.procurement') }}" class="block p-8 neu-flat hover:shadow-none transition-all group border border-white/50 hover:-translate-y-1">
                    <div class="w-16 h-16 neu-pressed rounded-2xl flex items-center justify-center mb-6 text-emerald-600 group-hover:text-emerald-500 transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.service_procurement_title') }}</h3>
                    <p class="text-slate-500 text-sm">
                        {{ __('messages.service_procurement_desc') }}
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- Target Market Section -->
    <section class="py-24 bg-[#eef2f6] relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-800">{{ __('messages.target_market_title') }}</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Government -->
                <div class="neu-flat p-8 rounded-2xl border border-white/50 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 neu-pressed rounded-full flex items-center justify-center text-slate-700">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-slate-800">{{ __('messages.tm_gov') }}</h3>
                    <p class="text-slate-500">{{ __('messages.tm_gov_desc') }}</p>
                </div>
                <!-- Enterprise -->
                <div class="neu-flat p-8 rounded-2xl border border-white/50 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 neu-pressed rounded-full flex items-center justify-center text-slate-700">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-slate-800">{{ __('messages.tm_corp') }}</h3>
                    <p class="text-slate-500">{{ __('messages.tm_corp_desc') }}</p>
                </div>
                <!-- UMKM -->
                <div class="neu-flat p-8 rounded-2xl border border-white/50 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 neu-pressed rounded-full flex items-center justify-center text-slate-700">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-slate-800">{{ __('messages.tm_sme') }}</h3>
                    <p class="text-slate-500">{{ __('messages.tm_sme_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News & Blog Section -->
    <section class="py-24 bg-white" id="news-blog">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="mb-12">
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
            <div class="relative min-h-[400px]">
                <!-- Blog Grid (Default Visible) -->
                <div id="content-blog" class="transition-opacity duration-300">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach(\App\Models\Post::with('category')->latest()->take(4)->get() as $post)
                        <a href="{{ route('blog.show', $post) }}" class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                            <div class="relative aspect-video overflow-hidden bg-slate-100">
                                <img src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}" alt="{{ $post->title }}" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
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
                                    Baca Selengkapnya
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
                            ->where('event_date', '>=', now())
                            ->orderBy('event_date', 'asc')
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
                                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold {{ $training->type === 'online' ? 'text-green-600' : 'text-indigo-600' }}">
                                            {{ ucfirst($training->type) }}
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="flex items-center gap-2 text-sm text-slate-500 mb-4">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            {{ $training->event_date->format('d M, Y') }}
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-2">{{ $training->title }}</h3>
                                        <div class="mt-auto flex items-center text-indigo-600 font-bold text-sm group-hover:gap-2 transition-all">
                                            Lihat Detail
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

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-800">{{ __('messages.footer_cta_title') }}</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">
                {{ __('messages.footer_cta_desc') }}
            </p>
            
            <div class="flex justify-center">
                <!-- WhatsApp -->
                <a href="https://wa.me/6282229046099" target="_blank" class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ __('messages.footer_cta_btn') }}
                </a>
            </div>
        </div>
    </section>
</x-layout>
