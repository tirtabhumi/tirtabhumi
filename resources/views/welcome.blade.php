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
                                <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner 4" loading="lazy" class="h-14 w-auto object-contain transition-all duration-300">
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
                                <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner 4" loading="lazy" class="h-14 w-auto object-contain transition-all duration-300">
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

    <!-- Upventur Section -->
    <section id="upventur" class="py-24 bg-slate-50 relative">
        <div class="container mx-auto px-6">
            <div class="mb-12 reveal-bottom">
                 <h2 class="text-xl font-bold text-slate-500 mb-2">UpVenture</h2>
                 <h3 class="text-3xl md:text-5xl font-bold text-slate-900 mb-4 leading-tight">Learn & Grow</h3>
                 <p class="text-slate-500 text-lg mb-8">
                     Upgrade your skills with our expert-led <strong>Class Digital</strong> and interactive <strong>Webinar & Workshop</strong>.
                 </p>

                  <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
                      <div class="neu-pressed p-2 rounded-full flex items-center gap-2">
                          <button onclick="switchUpventurTab('class')" id="btn-class" class="px-8 py-3 rounded-full text-sm font-bold transition-all duration-300 neu-flat text-indigo-600 transform hover:-translate-y-0.5">
                              Class Digital
                          </button>
                          <button onclick="switchUpventurTab('webinar')" id="btn-webinar" class="px-8 py-3 rounded-full text-sm font-bold transition-all duration-300 text-slate-500 hover:text-slate-700 hover:bg-slate-200/50">
                              Webinar & Workshop
                          </button>
                      </div>

                     <!-- See All Button -->
                     <a id="see-all-upventur-btn" href="{{ route('trainings.classes') }}" class="neu-flat px-6 py-2 rounded-full text-sm font-bold text-slate-700 hover:text-indigo-600 transition-colors flex items-center uppercase tracking-wider">
                         {{ __('messages.see_all') }}
                         <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                     </a>
                  </div>
            </div>

            <!-- Content Container -->
            <div class="relative min-h-[400px] reveal-bottom delay-200">
                <!-- Class Content (Default) -->
                <div id="content-class" class="transition-opacity duration-300">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @php
                            $classes = \App\Models\Training::where('category', 'class')->latest()->take(4)->get();
                        @endphp
                        @foreach($classes as $class)
                        <a href="{{ route('trainings.show', $class) }}" class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                            <div class="relative aspect-video overflow-hidden bg-slate-100">
                                <img src="{{ $class->image ? (Str::startsWith($class->image, 'http') ? $class->image : Storage::url($class->image)) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}" alt="{{ $class->title }}" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 right-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-indigo-600 shadow-sm">
                                    {{ $class->type === 'offline' ? 'Offline' : 'Hybrid' }}
                                </span>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $class->event_date->format('d M, Y') }}
                                </div>
                                <h3 class="text-lg font-bold mb-2 text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    {{ $class->title }}
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4">
                                    {{ Str::limit($class->description, 80) }}
                                </p>
                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-sm font-bold text-indigo-600">
                                        Rp {{ number_format($class->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs font-bold text-slate-400 group-hover:text-indigo-600 transition-colors flex items-center">
                                        Detail <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Webinar Content (Hidden) -->
                <div id="content-webinar" class="hidden transition-opacity duration-300">
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @php
                            $webinars = \App\Models\Training::where('category', 'webinar')->latest()->take(4)->get();
                        @endphp
                        @foreach($webinars as $webinar)
                        <a href="{{ route('trainings.show', $webinar) }}" class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                            <div class="relative aspect-video overflow-hidden bg-slate-100">
                                <img src="{{ $webinar->image ? (Str::startsWith($webinar->image, 'http') ? $webinar->image : Storage::url($webinar->image)) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}" alt="{{ $webinar->title }}" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 right-3 bg-red-100/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-red-600 shadow-sm flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-600 animate-pulse"></span> Live
                                </span>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 text-sm text-slate-500 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    Webinar
                                </div>
                                <h3 class="text-lg font-bold mb-2 text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    {{ $webinar->title }}
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4">
                                    {{ Str::limit($webinar->description, 80) }}
                                </p>
                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-sm font-bold text-green-600">
                                        {{ $webinar->price == 0 ? 'Free' : 'Rp ' . number_format($webinar->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs font-bold text-slate-400 group-hover:text-indigo-600 transition-colors flex items-center">
                                        Join <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <script>
            function switchUpventurTab(tab) {
                const btnClass = document.getElementById('btn-class');
                const btnWebinar = document.getElementById('btn-webinar');
                const contentClass = document.getElementById('content-class');
                const contentWebinar = document.getElementById('content-webinar');
                const seeAllBtn = document.getElementById('see-all-upventur-btn');

                if (tab === 'webinar') {
                    // Update Buttons
                    btnClass.classList.remove('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                    btnClass.classList.add('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');
                    
                    btnWebinar.classList.add('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                    btnWebinar.classList.remove('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');

                    // Show/Hide Content
                    contentClass.classList.add('hidden');
                    contentWebinar.classList.remove('hidden');
                    
                    // Update Link
                    seeAllBtn.href = "{{ route('trainings.webinars') }}";

                } else {
                    // Update Buttons
                    btnWebinar.classList.remove('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                    btnWebinar.classList.add('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');

                    btnClass.classList.add('neu-flat', 'text-indigo-600', 'transform', 'hover:-translate-y-0.5');
                    btnClass.classList.remove('text-slate-500', 'hover:text-slate-700', 'hover:bg-slate-200/50');

                    // Show/Hide Content
                    contentWebinar.classList.add('hidden');
                    contentClass.classList.remove('hidden');

                    // Update Link
                    seeAllBtn.href = "{{ route('trainings.classes') }}";
                }
            }
        </script>
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
                    <a id="see-all-btn" href="{{ route('blog.index') }}" class="neu-flat px-6 py-2 rounded-full text-sm font-bold text-slate-700 hover:text-indigo-600 transition-colors flex items-center">
                        {{ __('messages.see_all') }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Content Container -->
            <div class="relative min-h-[400px] reveal-bottom delay-200">
                <!-- Blog Grid -->
                <div id="content-blog">
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
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 relative overflow-hidden bg-slate-50">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 reveal-bottom">
                <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 font-bold tracking-wider uppercase text-xs mb-4 border border-indigo-100">
                    Our Expertise
                </span>
                <h2 class="text-4xl md:text-6xl font-bold text-slate-900 mb-6 tracking-tight">
                    {{ __('messages.services_title') }}
                </h2>
                <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                    {{ __('messages.services_desc') }}
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1: Digital Services -->
                <a href="{{ route('services.digital') }}" class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                    <!-- Image Header -->
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('images/service-digital.png') }}" alt="Digital Services" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <!-- Subtle Gradient for Icon -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div class="absolute top-4 left-4 w-12 h-12 rounded-xl bg-white/95 backdrop-blur-sm flex items-center justify-center text-indigo-600 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                    
                    <!-- Content Area -->
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">{{ __('messages.service_digital_title') }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 flex-grow">
                            {{ __('messages.service_digital_desc') }}
                        </p>
                        <span class="inline-flex items-center text-sm font-bold text-indigo-600 group-hover:translate-x-2 transition-transform duration-300">
                            Learn More <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>

                <!-- Service 2: Infrastructure -->
                <a href="{{ route('services.infrastructure') }}" class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                    <!-- Image Header -->
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('images/service-infrastructure.png') }}" alt="Infrastructure" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <!-- Subtle Gradient for Icon -->
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div class="absolute top-4 left-4 w-12 h-12 rounded-xl bg-white/95 backdrop-blur-sm flex items-center justify-center text-purple-600 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    
                    <!-- Content Area -->
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-purple-600 transition-colors">{{ __('messages.service_infra_title') }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 flex-grow">
                            {{ __('messages.service_infra_desc') }}
                        </p>
                        <span class="inline-flex items-center text-sm font-bold text-purple-600 group-hover:translate-x-2 transition-transform duration-300">
                            Learn More <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>

                <!-- Service 3: UpVenture -->
                <a href="{{ route('trainings.index') }}" class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                    <!-- Image Header -->
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('images/service-upventure.png') }}" alt="UpVenture" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <!-- Subtle Gradient for Icon -->
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div class="absolute top-4 left-4 w-12 h-12 rounded-xl bg-white/95 backdrop-blur-sm flex items-center justify-center text-cyan-600 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    </div>
                    
                    <!-- Content Area -->
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-cyan-600 transition-colors">{{ __('messages.service_people_title') }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 flex-grow">
                            {{ __('messages.service_people_desc') }}
                        </p>
                        <span class="inline-flex items-center text-sm font-bold text-cyan-600 group-hover:translate-x-2 transition-transform duration-300">
                            Learn More <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>

                <!-- Service 4: Procurement -->
                <a href="{{ route('services.procurement') }}" class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                    <!-- Image Header -->
                    <div class="relative h-52 overflow-hidden">
                        <img src="{{ asset('images/service-procurement.png') }}" alt="Procurement" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <!-- Subtle Gradient for Icon -->
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-600/20 to-transparent"></div>
                        <!-- Icon Badge -->
                        <div class="absolute top-4 left-4 w-12 h-12 rounded-xl bg-white/95 backdrop-blur-sm flex items-center justify-center text-emerald-600 shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                    </div>
                    
                    <!-- Content Area -->
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-emerald-600 transition-colors">{{ __('messages.service_procurement_title') }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 flex-grow">
                            {{ __('messages.service_procurement_desc') }}
                        </p>
                        <span class="inline-flex items-center text-sm font-bold text-emerald-600 group-hover:translate-x-2 transition-transform duration-300">
                            Learn More <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Us Part 1: Branding Intro -->
    <section id="why-us" class="py-24 bg-white relative overflow-hidden group">
        <!-- Background Texture -->
        <div class="absolute inset-x-0 top-0 h-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:24px_24px] opacity-40 -z-0"></div>
        <!-- Decorative Blob -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-50/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 opacity-70"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-center reveal-bottom">
                <div class="lg:w-6/12">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">
                        {{ __('messages.why_us_title') }}
                    </h2>
                    <p class="text-slate-500 text-lg leading-relaxed mb-8">
                        {{ __('messages.why_us_main_desc') }}
                    </p>
                    <div class="flex gap-4">
                        <div class="px-6 py-3 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-indigo-600 animate-pulse"></div>
                            <span class="text-sm font-bold text-indigo-900">Trusted Experts</span>
                        </div>
                        <div class="px-6 py-3 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></div>
                            <span class="text-sm font-bold text-emerald-900">Proven Results</span>
                        </div>
                    </div>
                </div>
                <div class="lg:w-6/12">
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-slate-50 group-hover:border-white transition-colors duration-500">
                        <img src="{{ asset('images/why-us-team-javanese.png') }}" alt="Our Professional Team" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900/10 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us Part 2: Feature Grid (Distinct Background) -->
    <section id="why-choose-us" class="py-24 bg-slate-50 relative overflow-hidden">
        <!-- Background Texture -->
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:24px_24px] opacity-40 -z-0"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-20 reveal-bottom">
                <span class="text-xs font-black text-indigo-600 uppercase tracking-[0.3em] block mb-4">Our Core Excellence</span>
                <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">{{ __('messages.why_us_subtitle') }}</h3>
            </div>

            <div class="relative max-w-7xl mx-auto">
                <!-- Decorative Background Elements (Inside Grid Area) -->
                <div class="absolute top-1/2 left-0 w-64 h-64 bg-indigo-100 rounded-full blur-3xl -translate-y-1/2 -translate-x-1/2 opacity-30 select-none"></div>
                <div class="absolute top-1/2 right-0 w-64 h-64 bg-purple-100 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 opacity-30 select-none"></div>

                <!-- Floating Stat Left (Desktop) -->
                <div class="hidden xl:flex absolute -left-20 top-1/2 -translate-y-1/2 flex-col items-center gap-4 reveal-left">
                    <div class="p-6 bg-white/70 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border border-white text-center transform -rotate-12 hover:rotate-0 transition-transform duration-700 group">
                        <div class="text-4xl font-black text-indigo-600 mb-1">{{ __('messages.why_us_stat_1_val') }}</div>
                        <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('messages.why_us_stat_1_label') }}</div>
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h5m-3.414-1.414l3.414 3.414m-4.828 0l4.828 4.828M7 14H2m3.414 1.414L2 12l4.828-4.828"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Floating Stat Right (Desktop) -->
                <div class="hidden xl:flex absolute -right-20 top-1/2 -translate-y-1/2 flex-col items-center gap-4 reveal-right">
                    <div class="p-6 bg-white/70 backdrop-blur-xl rounded-[2.5rem] shadow-2xl border border-white text-center transform rotate-12 hover:rotate-0 transition-transform duration-700 group">
                        <div class="text-4xl font-black text-purple-600 mb-1">{{ __('messages.why_us_stat_2_val') }}</div>
                        <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('messages.why_us_stat_2_label') }}</div>
                        <div class="absolute -bottom-2 -left-2 w-10 h-10 bg-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Main Feature Grid -->
                <div class="grid md:grid-cols-3 gap-8 relative z-10">
                    <!-- Feature 1: Innovation -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=600" alt="Innovation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-x-4 top-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-indigo-600 shadow-sm">Innovation</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">
                                {{ __('messages.why_us_feat_1_title') }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ __('messages.why_us_feat_1_desc') }}
                            </p>
                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Modern</span>
                                </div>
                                <div class="text-indigo-600/50 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2: Client-Centric -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-100">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=600" alt="Client-Centric" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-x-4 top-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-purple-600 shadow-sm">Client-Centric</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">
                                {{ __('messages.why_us_feat_2_title') }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ __('messages.why_us_feat_2_desc') }}
                            </p>
                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Focused</span>
                                </div>
                                <div class="text-indigo-600/50 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3: Expertise -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-200">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1552581234-26160f608093?auto=format&fit=crop&q=80&w=600" alt="Expertise" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-x-4 top-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-emerald-600 shadow-sm">Expertise</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">
                                {{ __('messages.why_us_feat_3_title') }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ __('messages.why_us_feat_3_desc') }}
                            </p>
                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Skilled</span>
                                </div>
                                <div class="text-indigo-600/50 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 4: Security -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-300">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=600" alt="Security" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-x-4 top-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-amber-600 shadow-sm">Security</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">
                                {{ __('messages.why_us_feat_4_title') }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ __('messages.why_us_feat_4_desc') }}
                            </p>
                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Trusted</span>
                                </div>
                                <div class="text-indigo-600/50 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 5: Agile -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-400">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=600" alt="Agile" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-x-4 top-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-indigo-600 shadow-sm">Agile</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">
                                {{ __('messages.why_us_feat_5_title') }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ __('messages.why_us_feat_5_desc') }}
                            </p>
                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Fast</span>
                                </div>
                                <div class="text-indigo-600/50 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 6: Quality -->
                    <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-500">
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1560177112-fbfd5fde9566?auto=format&fit=crop&q=80&w=600" alt="Quality" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-x-4 top-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-cyan-600 shadow-sm">Quality</span>
                            </div>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="text-xl font-bold text-slate-900 mb-4 group-hover:text-indigo-600 transition-colors">
                                {{ __('messages.why_us_feat_6_title') }}
                            </h4>
                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ __('messages.why_us_feat_6_desc') }}
                            </p>
                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between mt-auto">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-cyan-500"></div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Proven</span>
                                </div>
                                <div class="text-indigo-600/50 group-hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 bg-white relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 reveal-bottom">
                <span class="text-indigo-600 font-bold tracking-wider uppercase text-sm mb-2 block">Testimonials</span>
                <h2 class="text-3xl md:text-5xl font-bold text-slate-900">What Our Clients Say</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-100">
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-slate-600 mb-6 flex-grow leading-relaxed">"UpVenture's training programs have significantly boosted our team's productivity. The mentors are top-notch!"</p>
                    <div class="flex items-center gap-4 mt-auto">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Client 1" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Budi Santoso</h4>
                            <span class="text-xs text-slate-500">CTO, TechCorp</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-200">
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-slate-600 mb-6 flex-grow leading-relaxed">"The procurement services were streamlined and efficient. Saved us time and resources."</p>
                    <div class="flex items-center gap-4 mt-auto">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Client 2" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Siti Aminah</h4>
                            <span class="text-xs text-slate-500">Ops Manager, RetailIndo</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col reveal-bottom delay-300">
                    <div class="flex items-center gap-1 text-amber-400 mb-6">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <p class="text-slate-600 mb-6 flex-grow leading-relaxed">"Highly recommended for any infrastructure consultancy. Professional and reliable."</p>
                    <div class="flex items-center gap-4 mt-auto">
                        <img src="https://images.unsplash.com/photo-1545167622-3a6ac756afa4?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Client 3" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Andi Wijaya</h4>
                            <span class="text-xs text-slate-500">Director, BuildCo</span>
                        </div>
                    </div>
                </div>
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

    <!-- Contact Section (Premium Light Theme CTA) -->
    <section id="contact" class="py-24 bg-gradient-to-b from-white via-slate-50 to-white relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 opacity-40">
            <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-br from-indigo-200 to-purple-200 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-gradient-to-br from-purple-200 to-pink-200 rounded-full blur-3xl"></div>
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
                               
                <!-- WhatsApp Button -->
                <a href="https://wa.me/6282229046099" target="_blank"
                    class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    {{ __('messages.footer_cta_btn') }}
                </a>
            </div>
            
            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-8 text-slate-500 text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <span class="font-medium">500+ Companies</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-yellow-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <span class="font-medium">4.9/5 Rating</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="font-medium">Fast Response</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>
