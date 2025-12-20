<x-layout title="{{ __('messages.service_procurement_title') }} - {{ config('app.name') }}" description="{{ __('messages.service_procurement_desc') }}">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 30% !important; flex: 0 0 30% !important; }
            .content-width { width: 70% !important; flex: 0 0 70% !important; }
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

            <!-- Search Bar (Centered like Blog) -->
            <div class="mb-12 flex justify-center animate-fade-in-up" style="animation-delay: 100ms">
                <form action="{{ route('services.procurement') }}" method="GET" class="relative w-full md:w-[60%] flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                    <!-- Preserve existing filters when searching -->
                    @if(request('category')) 
                        @foreach((array)request('category') as $cat)
                            <input type="hidden" name="category[]" value="{{ $cat }}">
                        @endforeach
                    @endif
                    @if(request('platform'))
                        @foreach((array)request('platform') as $plat)
                            <input type="hidden" name="platform[]" value="{{ $plat }}">
                        @endforeach
                    @endif
                    @if(request('sort'))
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    @endif

                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Cari produk..." 
                           class="w-full py-4 pl-4 bg-transparent border-none focus:ring-0 outline-none text-slate-600 placeholder-slate-400 transition-all">
                    <button type="submit" class="p-3 rounded-full hover:bg-white/50 text-emerald-600 transition-colors flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[30%] sidebar-width">
                    <div class="sticky top-24">
                        <form action="{{ route('services.procurement') }}" method="GET" id="filterForm">
                            <!-- Helper to keep search when filtering -->
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif

                            <div class="neu-flat rounded-3xl p-8 border border-white/50">
                                <div class="mb-6 flex items-center justify-between">
                                    <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                    <a href="{{ route('services.procurement') }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                                </div>

                                <!-- Category Filter -->
                                <div class="mb-6">
                                    <button type="button" class="flex items-center justify-between w-full mb-3" onclick="document.getElementById('category-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800">Kategori</h4>
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="category-list" class="space-y-3">
                                        @foreach($categories as $category)
                                            <label class="flex items-start cursor-pointer group">
                                                <input type="checkbox" name="category[]" value="{{ $category }}" 
                                                    class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 bg-[#eef2f6]"
                                                    {{ in_array($category, (array)request('category', [])) ? 'checked' : '' }}
                                                    onchange="this.form.submit()">
                                                <span class="ml-3 text-slate-600 group-hover:text-emerald-600">{{ $category }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/50 my-4"></div>

                                <!-- Platform Filter -->
                                <div>
                                    <button type="button" class="flex items-center justify-between w-full mb-3" onclick="document.getElementById('platform-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800">Platform</h4>
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="platform-list" class="space-y-3">
                                        @foreach(['SIPLah', 'E-Katalog', 'PadiUMKM'] as $platform)
                                            <label class="flex items-start cursor-pointer group">
                                                <input type="checkbox" name="platform[]" value="{{ $platform }}" 
                                                    class="mt-1 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 bg-[#eef2f6]" 
                                                    {{ in_array($platform, (array)request('platform', [])) ? 'checked' : '' }}
                                                    onchange="this.form.submit()">
                                                <span class="ml-3 text-slate-600 group-hover:text-emerald-600">{{ $platform }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="w-full lg:w-[70%] content-width">
                    <!-- Top Bar -->
                    <div class="flex flex-col md:flex-row justify-end items-center mb-6">
                        <div class="flex items-center space-x-4 w-full md:w-auto">
                            <span class="text-slate-500 text-sm whitespace-nowrap">Urutkan:</span>
                            <form action="{{ route('services.procurement') }}" method="GET" class="w-full md:w-48">
                                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                                @if(request('category')) 
                                    @foreach((array)request('category') as $cat)
                                        <input type="hidden" name="category[]" value="{{ $cat }}">
                                    @endforeach
                                @endif
                                @if(request('platform'))
                                    @foreach((array)request('platform') as $plat)
                                        <input type="hidden" name="platform[]" value="{{ $plat }}">
                                    @endforeach
                                @endif
                                
                                <select name="sort" class="w-full rounded-full border-none neu-pressed bg-[#eef2f6] text-sm focus:ring-0 text-slate-600 py-3 px-6 cursor-pointer" onchange="this.form.submit()">
                                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Paling Sesuai</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                                </select>
                            </form>
                        </div>
                    </div>

                    <!-- Search Info -->
                    @if(request('search'))
                        <div class="mb-4 text-slate-500">
                            Menampilkan hasil pencarian untuk "<span class="font-bold text-slate-800">{{ request('search') }}</span>"
                        </div>
                    @endif

                    <!-- Products Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
                        @forelse($products as $product)
                            <div class="neu-btn rounded-2xl p-4 transition-all duration-300 group hover:-translate-y-1">
                                <div class="aspect-square bg-[#eef2f6] overflow-hidden relative rounded-xl neu-pressed mb-4">
                                    @if($product->image)
                                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 mix-blend-multiply">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-slate-300">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-medium text-slate-800 mb-1 line-clamp-2 text-sm leading-snug min-h-[2.5rem]" title="{{ $product->name }}">{{ $product->name }}</h3>
                                    <p class="text-emerald-600 font-bold text-base mb-2">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    
                                    <div class="flex items-center space-x-1 text-xs text-slate-500 mb-2">
                                        <svg class="w-3 h-3 text-amber-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
                                        <span>4.8</span>
                                        <span class="text-slate-300">|</span>
                                        <span>{{ $product->category }}</span>
                                    </div>

                                    <div class="flex flex-wrap gap-1 mt-auto">
                                        @if($product->platforms)
                                            @foreach($product->platforms as $platform)
                                                <span class="px-2 py-1 text-[10px] rounded-lg neu-pressed text-slate-500">
                                                    {{ $platform }}
                                                </span>
                                            @endforeach
                                        @endif
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
                                <a href="{{ route('services.procurement') }}" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-emerald-600 font-medium hover:text-emerald-700">Reset Filter</a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <!-- Pagination -->
                    <div class="mt-12 animate-fade-in-up" style="animation-delay: 600ms">
                        {{ $products->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
