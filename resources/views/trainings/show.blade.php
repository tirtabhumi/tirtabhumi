@use('Illuminate\Support\Facades\Storage')
<x-layout-upventure title="{{ $training->title }} - Tirtabhumi Training" description="{{ Str::limit(strip_tags($training->description), 150) }}">

    <section class="pt-4 pb-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Back to UpVenture Learnings -->
                <div class="mb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <a href="{{ route('trainings.index') }}" class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to UpVenture Learnings
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-16 lg:gap-24">
                    <!-- Main Content -->
                    <div class="md:col-span-2 space-y-12">
                        <!-- Poster Image -->
                        <div class="rounded-2xl overflow-hidden neu-flat border border-white/50">
                            @if($training->image)
                                <img src="{{ Storage::url($training->image) }}" alt="{{ $training->title }}" loading="lazy" class="w-full h-auto">
                            @elseif($training->images && count($training->images) > 0)
                                <img src="{{ Storage::url($training->images[0]) }}" alt="{{ $training->title }}" loading="lazy" class="w-full h-auto">
                            @else
                                <div class="aspect-video bg-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
<span class="inline-block w-1"></span>
                        <!-- Details -->
                        <div class="neu-flat rounded-2xl p-8 border border-white/50">
                            <h1 class="text-3xl font-bold text-slate-800 mb-6">{{ $training->title }}</h1>
                            
                            <div class="prose prose-slate max-w-none">
                                {!! $training->description !!}
                            </div>
                        </div>

                        <!-- Course Curriculum / Session Schedule (New) -->
                        @if($training->modules->count() > 0)
                            <div class="neu-flat rounded-2xl p-8 border border-white/50 space-y-6">
                                <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-3">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.246.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.246.477-4.5 1.253"></path></svg>
                                    Sessions & Curriculum
                                </h2>

                                <div class="space-y-4">
                                    @foreach($training->modules->sortBy('order') as $module)
                                        <div class="p-5 rounded-xl border border-slate-100 bg-white shadow-sm hover:shadow-md transition-shadow">
                                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                                <div class="flex items-start gap-4">
                                                    <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 font-bold text-sm">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                    <div>
                                                        <h3 class="font-bold text-slate-800">{{ $module->title }}</h3>
                                                        <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">{{ $module->type }}</p>
                                                    </div>
                                                </div>

                                                @if($module->meeting_link)
                                                    <div class="flex-shrink-0">
                                                        @if($isRegistered ?? false)
                                                            @php
                                                                $mLink = trim($module->meeting_link);
                                                                if ($mLink && !str_starts_with($mLink, 'http://') && !str_starts_with($mLink, 'https://')) {
                                                                    $mLink = 'https://' . $mLink;
                                                                }
                                                            @endphp
                                                            <a href="{{ $mLink }}" target="_blank" 
                                                               class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-700 rounded-lg text-sm font-bold hover:bg-indigo-100 transition-colors">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                                {{ $module->meeting_platform ?: 'Join Meeting' }}
                                                            </a>
                                                        @else
                                                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 text-slate-400 rounded-lg text-sm font-bold cursor-not-allowed" title="Please register to access">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                                                Locked
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar / Registration Form -->
                    <div class="md:col-span-1">
                        <div class="sticky top-24 space-y-8">
                            <!-- Info Card -->
                            <div class="neu-flat rounded-2xl p-6 border border-white/50">
                                <h3 class="font-bold text-slate-800 mb-6">{{ __('messages.training_info') }}</h3>
                                <ul class="space-y-6 text-sm">
                                    <li class="flex items-start gap-4">
                                        <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 text-xs mb-1">{{ __('messages.date_time') }}</span>
                                            @if($training->event_date)
                                                <span class="font-bold text-slate-800 block">{{ $training->event_date->format('d F Y') }}</span>
                                                <span class="text-slate-600">{{ $training->event_date->format('H:i') }} WIB</span>
                                            @else
                                                <span class="font-bold text-slate-800 block">Self-paced Access</span>
                                                <span class="text-slate-600">Flexible Schedule</span>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                            @if($training->category === 'class')
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>
                                            @else
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            @endif
                                        </div>
                                        <div>
                                            @if($training->category === 'class')
                                                <span class="block text-slate-500 text-xs mb-1">{{ __('messages.difficulty_level') }}</span>
                                                <span class="font-bold text-slate-800 block">
                                                    {{ $training->level ? __('messages.level_' . $training->level) : '-' }}
                                                </span>
                                            @else
                                                <span class="block text-slate-500 text-xs mb-1">{{ __('messages.location') }}</span>
                                                <span class="font-bold text-slate-800 block">
                                                    {{ $training->type ? __('messages.training_type_' . $training->type) : '-' }}
                                                </span>
                                                @if($training->type === 'online' || $training->type === 'hybrid')
                                                    @if($training->modules->whereNotNull('meeting_link')->count() > 0)
                                                        <span class="block text-indigo-600 text-xs mt-1 font-bold italic">
                                                            Check sessions below for links
                                                        </span>
                                                    @elseif($training->location_online)
                                                        @php
                                                            $onlineUrl = trim($training->location_online);
                                                            if ($onlineUrl && !str_starts_with($onlineUrl, 'http://') && !str_starts_with($onlineUrl, 'https://')) {
                                                                $onlineUrl = 'https://' . $onlineUrl;
                                                            }
                                                        @endphp
                                                        <span class="block text-slate-600 text-xs mt-1">
                                                            <span class="font-semibold">Platform:</span> 
                                                            <a href="{{ $onlineUrl }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 font-bold hover:underline break-all">
                                                                {{ $training->meeting_platform ?: 'Join Meeting' }}
                                                            </a>
                                                        </span>
                                                    @endif
                                                @endif
                                                @if($training->type === 'offline' || $training->type === 'hybrid')
                                                    @if($training->location_offline)
                                                        <span class="block text-slate-600 text-xs mt-1">
                                                            <span class="font-semibold">Offline:</span> {{ $training->location_offline }}
                                                        </span>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 text-xs mb-1">{{ __('messages.price') }}</span>
                                            <span class="font-bold text-xl text-indigo-600">
                                                @if($training->price > 0)
                                                    Rp {{ number_format($training->price, 0, ',', '.') }}
                                                @else
                                                    {{ __('messages.free') ?? 'Gratis' }}
                                                @endif
                                            </span>
                                        </div>
                                    </li>

                                    @if($training->attachment)
                                        <li class="flex items-start gap-4 pt-4 border-t border-slate-200/50">
                                            <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div class="flex-1">
                                                <span class="block text-slate-500 text-xs mb-2">Dokumen Pendukung</span>
                                                <a href="{{ Storage::url($training->attachment) }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                                                    Unduh Silabus (PDF)
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <!-- Registration Form -->
                            <div class="neu-flat rounded-2xl p-6 border border-white/50">
                                <h3 class="font-bold text-slate-800 mb-6 text-lg">{{ __('messages.register_now') }}</h3>
                                
                                @if(session('success'))
                                    <div class="bg-green-50 text-green-700 p-4 rounded-xl text-sm mb-4 border border-green-100">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if($training->event_date && $training->event_date->isPast())
                                    <div class="bg-red-50 text-red-700 p-6 rounded-xl text-center border border-red-100">
                                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 text-red-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <h4 class="font-bold text-lg mb-2">{{ __('messages.registration_closed') }}</h4>
                                        <p class="text-sm">{{ __('messages.registration_closed_msg') }}</p>
                                    </div>
                                @else
                                    @guest
                                        <div class="text-center">
                                            <p class="text-slate-500 mb-4">{{ __('messages.login_to_register') }}</p>
                                            <a href="{{ route('login') }}" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white rounded-xl font-bold text-sm transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5 inline-block">
                                                Buy This Class
                                            </a>
                                        </div>
                                    @endguest

                                    @auth
                                        <form action="{{ route('trainings.register', $training) }}" method="POST" class="space-y-5">
                                            @csrf
                                            <!-- Hidden or Read-only User Data for visual confirmation if needed, but requirements say 'without filling form' so we hide standard inputs -->
                                            
                                            <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100 mb-4">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <div class="w-8 h-8 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-700 font-bold text-xs">
                                                        {{ substr(Auth::user()->name, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-bold text-indigo-900">{{ Auth::user()->name }}</p>
                                                        <p class="text-xs text-indigo-600">{{ Auth::user()->email }}</p>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-indigo-500 italic">Buying as logged in user</p>
                                            </div>

                                            <button type="submit" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white rounded-xl font-bold text-sm transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5 mt-2">
                                                Buy This Class [Rp {{ number_format($training->price, 0, ',', '.') }}]
                                            </button>
                                        </form>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-upventure>
