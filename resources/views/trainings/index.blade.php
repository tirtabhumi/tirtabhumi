<x-layout-upventure title="{{ __('messages.training_title') }} - {{ config('app.name') }}">
    <!-- Hero Section -->
       <section class="relative -mt-32 pt-32 pb-4 md:pt-40 md:pb-6 overflow-hidden">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative container mx-auto px-6 z-10">
            <!-- Breadcrumb (Modern) -->
            
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Text Column -->
                <div class="lg:w-7/12 text-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-50 border border-indigo-100 mb-8 animate-fade-in-up">
                        <span class="flex h-2 w-2 rounded-full bg-indigo-600 mr-3 animate-pulse"></span>
                        <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Upgrade Your Skills</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold tracking-tight mb-6 text-slate-900 leading-[1.1] animate-fade-in-up">
                        {{ __('messages.training_title') }}
                    </h1>
                    <p class="text-base md:text-lg text-slate-500 mb-10 max-w-xl leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s">
                        {{ __('messages.training_subtitle') }}
                        <br>
                        <span class="text-indigo-600 font-semibold mt-4 block">{{ __('messages.training_subtitle_highlight') }}</span>
                    </p>
                    <div class="flex flex-wrap gap-4 animate-fade-in-up" style="animation-delay: 0.4s">
                        <a href="#trainings" class="neu-btn px-8 py-3.5 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-all text-sm">
                            {{ __('messages.training_btn_schedule') }}
                        </a>
                        <a href="{{ route('contacts.index') }}" class="neu-btn px-8 py-3.5 rounded-2xl bg-white text-indigo-600 font-bold hover:bg-slate-50 transition-all text-sm">
                            {{ __('messages.partnership_btn') }}
                        </a>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="lg:w-5/12 relative animate-fade-in-up" style="animation-delay: 0.6s">
                    <div class="neu-flat p-4 rounded-[2.5rem] relative z-10">
                        <img src="{{ asset('images/service-upventure-hero-v2.png') }}" alt="UpVenture Education" class="w-full h-full object-cover rounded-[2rem] shadow-sm">
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-8 -right-8 w-32 h-32 bg-cyan-400/20 rounded-full blur-2xl z-0"></div>
                    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-indigo-400/20 rounded-full blur-2xl z-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 font-bold tracking-wider uppercase text-xs mb-4 border border-indigo-100">
                    Most Updated Material
                </span>
                <h2 class="text-4xl md:text-5xl font-bold mb-4 text-slate-900">{{ __('messages.category_title') }} Paling Update</h2>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg">{{ __('messages.category_desc') }}</p>
            </div>
            
            <div class="relative marquee-container py-10">
                <!-- Side Fades for Professional Look -->
                <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#eef2f6] to-transparent z-10 pointer-events-none"></div>
                <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-[#eef2f6] to-transparent z-10 pointer-events-none"></div>

                <div class="space-y-8 overflow-hidden">
                <!-- Row 1: Moving Right (Atas Kanan) -->
                <div class="flex gap-6 animate-marquee-right whitespace-nowrap">
                    @php
                        $topics1 = [
                            ['title' => 'topic_uiux', 'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-3'],
                            ['title' => 'topic_web', 'icon' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                            ['title' => 'topic_marketing', 'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z'],
                            ['title' => 'topic_ai', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                            ['title' => 'topic_office', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z']
                        ];
                    @endphp
                    @foreach(array_merge($topics1, $topics1, $topics1) as $topic)
                    <div class="inline-flex items-center gap-4 bg-white px-8 py-5 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 min-w-[280px] group hover:border-indigo-500/30 hover:shadow-md transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $topic['icon'] }}"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-lg">{{ __('messages.' . $topic['title']) }}</h3>
                            <p class="text-xs text-slate-400 font-medium">Coming Soon</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Row 2: Moving Left (Bawah Kiri) -->
                <div class="flex gap-6 animate-marquee-left whitespace-nowrap">
                    @php
                        $topics2 = [
                            ['title' => 'topic_coding', 'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                            ['title' => 'topic_iot', 'icon' => 'M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A10.003 10.003 0 0012 3v8h8c0-3.321-1.616-6.264-4.102-8.084m1.852 14.743l.054.09A10.003 10.003 0 0112 21v-8H4c0 3.321 1.616 6.264 4.102 8.084m1.852-14.743l-.054-.09'],
                            ['title' => 'topic_data', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                            ['title' => 'topic_design', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                            ['title' => 'topic_security', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z']
                        ];
                    @endphp
                    @foreach(array_merge($topics2, $topics2, $topics2) as $topic)
                    <div class="inline-flex items-center gap-4 bg-white px-8 py-5 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 min-w-[280px] group hover:border-indigo-500/30 hover:shadow-md transition-all duration-300">
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $topic['icon'] }}"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-800 text-lg">{{ __('messages.' . $topic['title']) }}</h3>
                            <p class="text-xs text-slate-400 font-medium">Coming Soon</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Class Section -->
    <section id="classes" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between mb-12">
                <div class="text-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-800">{{ __('messages.class_title') }}</h2>
                    <p class="text-slate-500 max-w-2xl text-lg">{{ __('messages.class_desc') }}</p>
                </div>
                <a href="{{ route('trainings.list') }}" class="inline-flex items-center text-indigo-600 font-bold hover:text-indigo-700 transition-colors">
                    {{ __('messages.see_all') }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            @if($trainings->count() > 0)
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($trainings->take(6) as $training)
                        <a href="{{ route('trainings.show', $training->slug) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-slate-100 h-full flex flex-col">
                            <div class="aspect-video bg-slate-200 relative overflow-hidden flex-shrink-0">
                                @if($training->image)
                                    <img src="{{ Storage::url($training->image) }}" alt="{{ $training->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                                @if($training->event_date && $training->event_date->isPast())
                                    <div class="absolute top-4 right-4 bg-red-100/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-red-600">
                                        {{ __('messages.finished') }}
                                    </div>
                                @else
                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-indigo-600">
                                        @if($training->category == 'class')
                                            Online Course
                                        @else
                                            {{ __('messages.level_' . ($training->level ?? 'beginner')) }}
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    @if($training->event_date)
                                      {{ \Carbon\Carbon::parse($training->event_date)->format('d M Y, H:i') }} WIB
                                    @else
                                      Self-paced Access
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-indigo-600 transition-colors line-clamp-2">{{ $training->title }}</h3>
                                <p class="text-slate-600 text-sm line-clamp-2 mb-4">{{ strip_tags($training->description) }}</p>
                                
                                <div class="mt-auto flex items-center justify-between">
                                    <span class="text-lg font-bold text-slate-800">
                                        @if($training->price == 0)
                                            Gratis
                                        @else
                                            Rp {{ number_format($training->price, 0, ',', '.') }}
                                        @endif
                                    </span>
                                    <span class="flex items-center text-indigo-600 font-semibold text-sm">
                                        {{ __('messages.training_view_detail') }}
                                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-24 bg-white rounded-3xl border border-slate-100 shadow-sm">
                    <div class="w-16 h-16 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-6 text-indigo-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">{{ __('messages.class_empty_title') }}</h3>
                    <p class="text-slate-500">{{ __('messages.class_empty_desc') }}</p>
                </div>
            @endif
        </div>
    </section>


    <!-- About Section & Privileges -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16 mb-24">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-5xl font-bold mb-8 text-slate-900 leading-tight">
                        {{ __('messages.training_about_title') }}
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8">
                        {{ __('messages.training_about_desc') }}
                    </p>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <div class="text-3xl font-bold text-indigo-600 mb-1">100%</div>
                            <div class="text-slate-500 text-sm italic">Kurikulum Berbasis Proyek</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-indigo-600 mb-1">Resmi</div>
                            <div class="text-slate-500 text-sm italic">Sertifikat Kompetensi</div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Benefit 1 -->
                        <div class="neu-flat p-6 rounded-3xl">
                            <div class="w-12 h-12 neu-pressed rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">{{ __('messages.privilege_1_title') }}</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">{{ __('messages.privilege_1_desc') }}</p>
                        </div>
                        <!-- Benefit 2 -->
                        <div class="neu-flat p-6 rounded-3xl">
                            <div class="w-12 h-12 neu-pressed rounded-xl flex items-center justify-center text-purple-600 mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">{{ __('messages.privilege_2_title') }}</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">{{ __('messages.privilege_2_desc') }}</p>
                        </div>
                        <!-- Benefit 3 -->
                        <div class="neu-flat p-6 rounded-3xl">
                            <div class="w-12 h-12 neu-pressed rounded-xl flex items-center justify-center text-green-600 mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">{{ __('messages.privilege_3_title') }}</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">{{ __('messages.privilege_3_desc') }}</p>
                        </div>
                        <!-- Benefit 4 -->
                        <div class="neu-flat p-6 rounded-3xl">
                            <div class="w-12 h-12 neu-pressed rounded-xl flex items-center justify-center text-blue-600 mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-800 mb-2">{{ __('messages.privilege_4_title') }}</h4>
                            <p class="text-slate-500 text-xs leading-relaxed">{{ __('messages.privilege_4_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-900">{{ __('messages.training_testi_title') }}</h2>
                <p class="text-slate-500">{{ __('messages.training_testi_desc') }}</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="neu-flat p-8 rounded-2xl animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="flex gap-1 mb-4">
                        @for($i=0; $i<5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-slate-600 mb-6 italic">{{ __('messages.training_testi_1_text') }}</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full neu-pressed flex items-center justify-center text-indigo-600 font-bold">D</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">{{ __('messages.training_testi_1_author') }}</h4>
                            <p class="text-xs text-slate-500">{{ __('messages.training_testi_1_role') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="neu-flat p-8 rounded-2xl animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex gap-1 mb-4">
                        @for($i=0; $i<5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-slate-600 mb-6 italic">{{ __('messages.training_testi_2_text') }}</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full neu-pressed flex items-center justify-center text-purple-600 font-bold">R</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">{{ __('messages.training_testi_2_author') }}</h4>
                            <p class="text-xs text-slate-500">{{ __('messages.training_testi_2_role') }}</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="neu-flat p-8 rounded-2xl animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex gap-1 mb-4">
                        @for($i=0; $i<5; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-slate-600 mb-6 italic">{{ __('messages.training_testi_3_text') }}</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full neu-pressed flex items-center justify-center text-green-600 font-bold">A</div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">{{ __('messages.training_testi_3_author') }}</h4>
                            <p class="text-xs text-slate-500">{{ __('messages.training_testi_3_role') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

    <!-- Partnership Section -->
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-indigo-100 rounded-full blur-[120px] opacity-60"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="neu-flat rounded-[3rem] p-8 md:p-16 bg-white shadow-xl overflow-hidden relative border border-white">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                    <!-- Text Side -->
                    <div class="lg:w-1/2">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-50 border border-indigo-100 mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-indigo-600 mr-2"></span>
                            <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">{{ __('messages.partnership_title') }}</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-bold mb-6 text-slate-900 leading-tight">
                            {{ __('messages.partnership_subtitle') }}
                        </h2>
                        <p class="text-slate-500 text-lg mb-10 leading-relaxed">
                            {{ __('messages.partnership_desc') }}
                        </p>

                        <!-- Feature List -->
                        <div class="space-y-6 mb-12">
                            <div class="flex items-start gap-4 group">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex flex-shrink-0 items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <div class="pt-1">
                                    <h4 class="font-bold text-slate-800 text-lg mb-1">{{ __('messages.partnership_feature_1') }}</h4>
                                    <p class="text-slate-500 leading-relaxed">{{ __('messages.partnership_feature_1_desc') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 group">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex flex-shrink-0 items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                                <div class="pt-1">
                                    <h4 class="font-bold text-slate-800 text-lg mb-1">{{ __('messages.partnership_feature_2') }}</h4>
                                    <p class="text-slate-500 leading-relaxed">{{ __('messages.partnership_feature_2_desc') }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 group">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex flex-shrink-0 items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all shadow-sm">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                                </div>
                                <div class="pt-1">
                                    <h4 class="font-bold text-slate-800 text-lg mb-1">{{ __('messages.partnership_feature_3') }}</h4>
                                    <p class="text-slate-500 leading-relaxed">{{ __('messages.partnership_feature_3_desc') }}</p>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('contacts.index') }}" class="inline-flex items-center justify-center px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/20 hover:bg-indigo-700 hover:shadow-indigo-600/40 hover:-translate-y-0.5 transition-all duration-300 group">
                            {{ __('messages.partnership_btn') }}
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>

                    <!-- Image Side -->
                    <div class="lg:w-1/2 relative">
                        <div class="relative z-10 p-4 bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Join as Partner" class="w-full h-[450px] object-cover rounded-[2rem]">
                        </div>
                        <!-- Decorative elements -->
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-400/20 rounded-full blur-3xl z-0 animate-pulse"></div>
                        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-yellow-400/20 rounded-full blur-2xl z-0 animate-pulse animation-delay-2000"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes marquee-right {
            0% { transform: translateX(-33.333%); }
            100% { transform: translateX(0); }
        }
        @keyframes marquee-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-33.333%); }
        }
        .animate-marquee-right {
            animation: marquee-right 40s linear infinite;
            width: max-content;
        }
        .animate-marquee-left {
            animation: marquee-left 40s linear infinite;
            width: max-content;
        }
        /* Custom hover state for rows */
        .marquee-container:hover .animate-marquee-right,
        .marquee-container:hover .animate-marquee-left {
            animation-play-state: paused;
        }
    </style>
</x-layout-upventure>
