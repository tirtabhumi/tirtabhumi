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
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-emerald-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-teal-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 right-1/3 w-96 h-96 bg-cyan-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <x-breadcrumb :paths="[__('messages.services') => '/#services']" :current="__('messages.service_procurement_title')" />

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ __('messages.service_procurement_title') }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    {{ __('messages.service_procurement_desc') }}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <div class="neu-flat rounded-3xl p-8 border border-white/50">
                            <div class="mb-6 flex items-center justify-between">
                                <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                <button wire:click="$set('category', []); $set('platform', []); $set('search', ''); $set('sort', 'latest')" class="text-xs text-red-500 font-bold hover:underline">Reset</button>
                            </div>

                            <!-- Sort -->
                            <div class="mb-6 relative" x-data="{ open: false }">
                                <h4 class="font-bold text-slate-800 mb-3">Urutkan</h4>
                                <button @click="open = !open" @click.away="open = false" type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors">
                                    <span class="font-medium">
                                        @switch($sort)
                                            @case('price_asc') Harga Terendah @break
                                            @case('price_desc') Harga Tertinggi @break
                                            @default Paling Sesuai
                                        @endswitch
                                    </span>
                                    <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                
                                <!-- Custom Dropdown Menu -->
                                <div x-show="open" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 border border-white/50" style="display: none;">
                                    <div class="space-y-1">
                                        <button type="button" wire:click="$set('sort', 'latest'); open = false" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ $sort == 'latest' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Paling Sesuai</button>
                                        <button type="button" wire:click="$set('sort', 'price_asc'); open = false" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ $sort == 'price_asc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Harga Terendah</button>
                                        <button type="button" wire:click="$set('sort', 'price_desc'); open = false" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ $sort == 'price_desc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Harga Tertinggi</button>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-slate-200/50 my-4"></div>

                            <!-- Category Filter -->
                            <div class="mb-6" x-data="{ open: true }">
                                <button type="button" class="flex items-center justify-between w-full mb-3 group" @click="open = !open">
                                    <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Kategori</h4>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors transform transition-transform" :class="{ 'rotate-180': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                </button>
                                <div x-show="open" class="space-y-3">
                                    @foreach($categories as $cat)
                                        <label wire:key="category-{{ $loop->index }}" class="flex items-center gap-3 cursor-pointer group select-none relative">
                                            <input type="checkbox" wire:model.live="category" value="{{ $cat }}" class="peer sr-only">
                                            
                                            <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ in_array($cat, $category) ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent group-hover:border-indigo-600' }}">
                                                <svg class="w-3.5 h-3.5 transform {{ in_array($cat, $category) ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                            
                                            <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">{{ $cat }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="border-t border-slate-200/50 my-4"></div>

                            <!-- Platform Filter -->
                            <div x-data="{ open: true }">
                                <button type="button" class="flex items-center justify-between w-full mb-3 group" @click="open = !open">
                                    <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Platform</h4>
                                    <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors transform transition-transform" :class="{ 'rotate-180': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                </button>
                                <div x-show="open" class="space-y-3">
                                    @foreach(['SIPLah', 'E-Katalog', 'PadiUMKM'] as $plat)
                                        <label wire:key="platform-{{ $loop->index }}" class="flex items-center gap-3 cursor-pointer group select-none relative">
                                            <input type="checkbox" wire:model.live="platform" value="{{ $plat }}" class="peer sr-only">
                                            
                                            <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ in_array($plat, $platform) ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent group-hover:border-indigo-600' }}">
                                                <svg class="w-3.5 h-3.5 transform {{ in_array($plat, $platform) ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                            </div>

                                            <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">{{ $plat }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="w-full lg:w-[80%] content-width">
                    <div class="mb-8">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-800 mb-1">Daftar Produk</h2>
                            <p class="text-slate-500 text-sm">{{ $products->total() }} produk tersedia</p>
                        </div>
                        <div class="w-full">
                            <div class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                <input type="text" 
                                        wire:model.live.debounce.300ms="search"
                                        placeholder="Cari produk..." 
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

                    <!-- Products Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 relative">
                        <!-- Loading Overlay -->
                        <div wire:loading.flex wire:target="category, platform, sort, page, search" class="absolute inset-0 z-20 bg-white/50 backdrop-blur-sm items-center justify-center rounded-xl">
                            <svg class="w-10 h-10 text-indigo-600 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>

                        @forelse($products as $product)
                            <div class="neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group flex flex-col h-full relative">
                                <a href="{{ route('services.procurement.show', $product) }}" class="absolute inset-0 z-10"><span class="sr-only">Lihat Detail Profit</span></a>

                                <div class="relative aspect-video overflow-hidden bg-slate-100">
                                    @if($product->image)
                                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-slate-300">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center gap-3 mb-3">
                                        <span class="text-xs font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600 transition-colors duration-300">
                                            {{ $product->category }}
                                        </span>
                                    </div>
                                    
                                    <h3 class="text-lg font-bold text-slate-700 line-clamp-2 group-hover:text-indigo-600 transition-colors">
                                        {{ $product->name }}
                                    </h3>
                                    
                                    <div class="mt-2 mb-4">
                                        <span class="block text-2xl font-extrabold text-slate-800">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    @if($product->platforms)
                                    <div class="flex flex-wrap gap-2 mb-6">
                                        @foreach($product->platforms as $platform)
                                            @php
                                                $colorClass = match($platform) {
                                                    'E-Katalog' => 'bg-red-50 text-red-600 border border-red-200',
                                                    'PadiUMKM' => 'bg-emerald-50 text-emerald-600 border border-emerald-200',
                                                    'SIPLah' => 'bg-indigo-50 text-indigo-600 border border-indigo-200',
                                                    default => 'bg-slate-50 text-slate-600 border border-slate-200',
                                                };
                                            @endphp
                                            <span class="text-[10px] font-bold px-2.5 py-1 rounded-lg {{ $colorClass }}">
                                                {{ $platform }}
                                            </span>
                                        @endforeach
                                    </div>
                                    @endif

                                    <div class="mt-auto">
                                        <span class="inline-flex items-center text-sm font-bold text-indigo-600 group-hover:gap-2 transition-all duration-300">
                                            Lihat Detail
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-20">
                                <div class="neu-pressed rounded-full p-6 w-24 h-24 mx-auto mb-4 flex items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-slate-800 mb-2">Produk tidak ditemukan</h3>
                                <p class="text-slate-500 max-w-sm mx-auto">Coba gunakan kata kunci lain atau ubah filter pencarian Anda.</p>
                                <button wire:click="$set('category', []); $set('platform', []); $set('search', '')" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-indigo-600 font-medium hover:text-indigo-700">Reset Filter</button>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 animate-fade-in-up" style="animation-delay: 600ms">
                        {{ $products->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
