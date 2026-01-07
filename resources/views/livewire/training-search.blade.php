<div>
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 20% !important; flex: 0 0 20% !important; }
            .content-width { width: 80% !important; flex: 0 0 80% !important; }
        }
    </style>
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-purple-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 right-1/3 w-96 h-96 bg-pink-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <x-breadcrumb :paths="[__('messages.training_title') => '/upventure']" :current="$forcedCategory === 'class' ? __('messages.class_title') : __('messages.training_schedule_title')" />

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ $forcedCategory === 'class' ? __('messages.class_title') : __('messages.training_schedule_title') }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    {{ $forcedCategory === 'class' ? __('messages.class_desc') : __('messages.training_schedule_desc') }}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <div class="neu-flat rounded-3xl p-8 border border-white/50">
                            <div class="mb-6 flex items-center justify-between">
                                <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                <button wire:click="$set('type', []); $set('level', []); $set('search', ''); $set('sort', 'latest')" class="text-xs text-red-500 font-bold hover:underline">Reset</button>
                            </div>

                            <!-- Sort -->
                            <div class="mb-6 relative" x-data="{ open: false }">
                                <h4 class="font-bold text-slate-800 mb-3">Urutkan</h4>
                                <button @click="open = !open" @click.away="open = false" type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors">
                                    <span class="font-medium">
                                        @switch($sort)
                                            @case('upcoming') Terdekat @break
                                            @case('price_asc') Harga Terendah @break
                                            @case('price_desc') Harga Tertinggi @break
                                            @default Terdekat
                                        @endswitch
                                    </span>
                                    <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                
                                <div x-show="open" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 border border-white/50" style="display: none;">
                                    <div class="space-y-1">
                                        <button type="button" wire:click="$set('sort', 'upcoming'); open = false" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ $sort == 'upcoming' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Terdekat</button>
                                        <button type="button" wire:click="$set('sort', 'price_asc'); open = false" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ $sort == 'price_asc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Harga Terendah</button>
                                        <button type="button" wire:click="$set('sort', 'price_desc'); open = false" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ $sort == 'price_desc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Harga Tertinggi</button>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-slate-200/50 my-4"></div>

                            <!-- Filter Section -->
                            <div class="mb-6" x-data="{ open: true }">
                                <button type="button" class="flex items-center justify-between w-full mb-3 group" @click="open = !open">
                                    <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">
                                        {{ $forcedCategory === 'class' ? 'Level' : 'Tipe' }}
                                    </h4>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors transform transition-transform" :class="{ 'rotate-180': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                </button>
                                <div x-show="open" class="space-y-3">
                                    @if($forcedCategory === 'class')
                                        @foreach(['beginner', 'intermediate', 'expert'] as $l)
                                            <label wire:key="level-{{ $loop->index }}" class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="checkbox" wire:model.live="level" value="{{ $l }}" class="peer sr-only">
                                                
                                                <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ in_array($l, $level) ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent group-hover:border-indigo-600' }}">
                                                    <svg class="w-3.5 h-3.5 transform {{ in_array($l, $level) ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                                
                                                <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium capitalize">{{ ucfirst($l) }}</span>
                                            </label>
                                        @endforeach
                                    @else
                                        @foreach(['online', 'offline', 'hybrid'] as $t)
                                            <label wire:key="type-{{ $loop->index }}" class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="checkbox" wire:model.live="type" value="{{ $t }}" class="peer sr-only">
                                                
                                                <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ in_array($t, $type) ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent group-hover:border-indigo-600' }}">
                                                    <svg class="w-3.5 h-3.5 transform {{ in_array($t, $type) ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                                
                                                <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium capitalize">{{ __('messages.training_type_' . $t) }}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="w-full lg:w-[80%] content-width">
                    <div class="mb-8">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-800 mb-1">Daftar {{ $forcedCategory === 'class' ? 'Kelas' : 'Webinar' }}</h2>
                            <p class="text-slate-500 text-sm">{{ $trainings->total() }} item tersedia</p>
                        </div>
                        <div class="w-full">
                            <div class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                <input type="text" 
                                        wire:model.live.debounce.300ms="search"
                                        placeholder="Cari..." 
                                        class="w-full py-4 pl-4 bg-transparent border-none focus:ring-0 outline-none text-slate-600 placeholder-slate-400 transition-all">
                                <div class="p-3 flex-shrink-0 text-indigo-600">
                                    <svg wire:loading.remove wire:target="search" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <svg wire:loading wire:target="search" class="w-6 h-6 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Info -->
                    @if($search)
                        <div class="mb-4 text-slate-500">
                            Menampilkan hasil pencarian untuk "<span class="font-bold text-slate-800">{{ $search }}</span>"
                        </div>
                    @endif

                    <!-- Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 relative">
                         <!-- Loading Overlay -->
                         <div wire:loading.flex wire:target="type, sort, page, search" class="absolute inset-0 z-20 bg-white/50 backdrop-blur-sm items-center justify-center rounded-xl">
                            <svg class="w-10 h-10 text-indigo-600 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>

                        @forelse($trainings as $training)
                            <a href="{{ route('trainings.show', $training) }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-slate-100 h-full flex flex-col">
                                <div class="aspect-video bg-slate-200 relative overflow-hidden flex-shrink-0">
                                    @if($training->image)
                                        <img src="{{ Storage::url($training->image) }}" alt="{{ $training->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    @if($training->event_date->isPast())
                                        <div class="absolute top-4 right-4 bg-red-100/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-red-600">
                                            {{ __('messages.finished') }}
                                        </div>
                                    @else
                                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold {{ $training->type === 'online' ? 'text-green-600' : 'text-indigo-600' }}">
                                            {{ __('messages.training_type_' . $training->type) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $training->event_date->format('d M Y, H:i') }} WIB
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
                                            Detail
                                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full text-center py-20">
                                <div class="neu-pressed rounded-full p-6 w-24 h-24 mx-auto mb-4 flex items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-slate-800 mb-2">Item tidak ditemukan</h3>
                                <p class="text-slate-500 max-w-sm mx-auto">Coba gunakan kata kunci lain atau ubah filter pencarian Anda.</p>
                                <button wire:click="$set('type', []); $set('level', []); $set('search', '')" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-indigo-600 font-medium hover:text-indigo-700">Reset Filter</button>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 animate-fade-in-up" style="animation-delay: 600ms">
                         {{ $trainings->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
