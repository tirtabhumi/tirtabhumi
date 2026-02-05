<x-layout title="{{ __('messages.service_procurement_title') }} - {{ config('app.name') }}" description="{{ __('messages.service_procurement_desc') }}">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 20% !important; flex: 0 0 20% !important; }
            .content-width { width: 80% !important; flex: 0 0 80% !important; }
        }
    </style>
    <section class="relative pt-32 pb-4 md:pt-40 md:pb-6 overflow-hidden">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-teal-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-cyan-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative container mx-auto px-6 z-10">
            <!-- Breadcrumb (Modern) -->
            <div class="mb-10 animate-fade-in-up">
                <x-breadcrumb :paths="[__('messages.services') => '/#services']" :current="__('messages.service_procurement_title')" class="mb-0" />
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Text Column -->
                <div class="lg:w-7/12 text-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-50 border border-emerald-100 mb-8 animate-fade-in-up">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-600 mr-3 animate-pulse"></span>
                        <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Procurement & Facilities</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold tracking-tight mb-6 text-slate-900 leading-[1.1] animate-fade-in-up">
                        {{ __('messages.service_procurement_title') }}
                    </h1>
                    <p class="text-base md:text-lg text-slate-500 mb-10 max-w-xl leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s">
                        {!! nl2br(e(__('messages.service_procurement_desc_full'))) !!}
                    </p>
                    <div class="flex flex-wrap gap-4 animate-fade-in-up" style="animation-delay: 0.4s">
                        <a href="https://wa.me/6282229046099" target="_blank" class="neu-btn px-8 py-3.5 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-all text-sm">
                            {{ __('messages.get_started') }}
                        </a>
                        <a href="#product-catalog" class="neu-btn px-8 py-3.5 rounded-2xl bg-white text-indigo-600 font-bold hover:bg-slate-50 transition-all text-sm">
                             Lihat Katalog
                        </a>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="lg:w-5/12 relative animate-fade-in-up" style="animation-delay: 0.6s">
                    <div class="neu-flat p-4 rounded-[2.5rem] relative z-10">
                        <img src="{{ asset('images/service-procurement-v3.jpg') }}" alt="Procurement Services" class="w-full h-full object-cover rounded-[2rem] shadow-sm">
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-8 -right-8 w-32 h-32 bg-emerald-400/20 rounded-full blur-2xl z-0"></div>
                    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-teal-400/20 rounded-full blur-2xl z-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Catalog Section -->
    <section id="product-catalog" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <form action="{{ route('services.procurement') }}" method="GET" id="filterForm">
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <div class="neu-flat rounded-3xl p-8 border border-white/50">
                                <div class="mb-6 flex items-center justify-between">
                                    <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                    <a href="{{ route('services.procurement') }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                                </div>

                                <!-- Sort -->
                                <div class="mb-6 relative" id="sort-dropdown">
                                    <h4 class="font-bold text-slate-800 mb-3">Urutkan</h4>
                                    <input type="hidden" id="sort-input" name="sort" value="{{ request('sort', 'latest') }}">
                                    <button type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors" onclick="toggleSortDropdown()">
                                        <span id="sort-label" class="font-medium">
                                            @switch(request('sort'))
                                                @case('price_asc') Harga Terendah @break
                                                @case('price_desc') Harga Tertinggi @break
                                                @case('oldest') Terlama @break
                                                @default Terbaru
                                            @endswitch
                                        </span>
                                        <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    
                                    <!-- Custom Dropdown Menu -->
                                    <div id="sort-menu" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 hidden border border-white/50">
                                        <div class="space-y-1">
                                            <button type="button" onclick="selectSort('latest', 'Terbaru')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'latest' || !request('sort') ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Terbaru</button>
                                            <button type="button" onclick="selectSort('oldest', 'Terlama')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'oldest' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Terlama</button>
                                            <button type="button" onclick="selectSort('price_asc', 'Harga Terendah')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'price_asc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Harga Terendah</button>
                                            <button type="button" onclick="selectSort('price_desc', 'Harga Tertinggi')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'price_desc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Harga Tertinggi</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/50 my-4"></div>

                                <!-- Category Filter -->
                                <div class="mb-6">
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('category-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Kategori</h4>
                                        <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="category-list" class="space-y-3">
                                        <!-- All Option -->
                                        <div class="relative">
                                            <input type="radio" name="category" value="" id="cat-all"
                                                class="peer sr-only" 
                                                {{ !request('category') ? 'checked' : '' }}
                                                onchange="submitFormWithScroll(this.form)">
                                            <label for="cat-all" class="flex items-center gap-3 cursor-pointer group select-none">
                                                <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ !request('category') ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent' }}">
                                                    <svg class="w-3.5 h-3.5 transform {{ !request('category') ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                                <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium {{ !request('category') ? 'text-indigo-700 font-bold' : '' }}">Semua Kategori</span>
                                            </label>
                                        </div>

                                        @foreach($categories as $category)
                                            <div class="relative">
                                                <input type="radio" name="category" value="{{ $category->slug }}" id="cat-{{ $category->slug }}"
                                                    class="peer sr-only" 
                                                    {{ request('category') == $category->slug ? 'checked' : '' }}
                                                    onchange="submitFormWithScroll(this.form)">
                                                <label for="cat-{{ $category->slug }}" class="flex items-center gap-3 cursor-pointer group select-none">
                                                    @php $isActive = request('category') == $category->slug; @endphp
                                                    <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ $isActive ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent' }}">
                                                        <svg class="w-3.5 h-3.5 transform {{ $isActive ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                    </div>
                                                    <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium {{ $isActive ? 'text-indigo-700 font-bold' : '' }}">{{ $category->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/50 my-4"></div>

                                <!-- Platform Filter -->
                                <div>
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('platform-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Platform</h4>
                                        <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="platform-list" class="space-y-3">
                                        @foreach(['SIPLah', 'E-Katalog', 'PadiUMKM', 'Tokopedia', 'Shopee'] as $platform)
                                            <label class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="checkbox" name="platform[]" value="{{ $platform }}" 
                                                    class="peer sr-only" 
                                                    {{ in_array($platform, (array)request('platform', [])) ? 'checked' : '' }}
                                                    onchange="submitFormWithScroll(this.form)">
                                                @php $isPlatformActive = in_array($platform, (array)request('platform', [])); @endphp
                                                <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border border-transparent {{ $isPlatformActive ? 'neu-flat text-indigo-600' : 'neu-pressed text-transparent' }}">
                                                    <svg class="w-3.5 h-3.5 transform {{ $isPlatformActive ? 'scale-100' : 'scale-0' }} transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                                <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium {{ $isPlatformActive ? 'text-indigo-700 font-bold' : '' }}">{{ $platform }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
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
                             <form action="{{ route('services.procurement') }}" method="GET" class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                 @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                                 @if(request('platform')) @foreach((array)request('platform') as $plat) <input type="hidden" name="platform[]" value="{{ $plat }}"> @endforeach @endif
                                 @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif

                                <input type="text" 
                                       name="search" 
                                       value="{{ request('search') }}"
                                       placeholder="Cari produk..." 
                                       class="w-full py-4 pl-4 bg-transparent border-none focus:ring-0 outline-none text-slate-600 placeholder-slate-400 transition-all">
                                <button type="submit" class="p-3 text-indigo-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                             </form>
                        </div>
                    </div>

                    @if(request('search'))
                        <div class="mb-6 p-4 rounded-xl bg-indigo-50 border border-indigo-100 text-indigo-700 flex items-center justify-between">
                            <span>Menampilkan hasil pencarian untuk "<span class="font-bold">{{ request('search') }}</span>"</span>
                            <a href="{{ route('services.procurement') }}" class="text-xs font-bold hover:underline">Hapus Filter</a>
                        </div>
                    @endif

                    <!-- Products Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($products as $product)
                            <div class="neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group flex flex-col h-full relative">
                                <a href="{{ route('services.procurement.show', $product) }}" class="absolute inset-0 z-10"><span class="sr-only">Lihat Detail Profit</span></a>

                                <div class="relative aspect-video overflow-hidden bg-slate-100">
                                    @if(!empty($product->images) && isset($product->images[0]))
                                        @php $indexImageUrl = str_starts_with($product->images[0], 'http') ? $product->images[0] : Storage::url($product->images[0]); @endphp
                                        <img src="{{ $indexImageUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
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
                                            {{ $product->category->name ?? 'Uncategorized' }}
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
                                                    'Tokopedia' => 'bg-green-50 text-green-600 border border-green-200',
                                                    'Shopee' => 'bg-orange-50 text-orange-600 border border-orange-200',
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
                                <a href="{{ route('services.procurement') }}" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-indigo-600 font-medium hover:text-indigo-700">Reset Filter</a>
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

    <script>
        function toggleSortDropdown() {
            const menu = document.getElementById('sort-menu');
            menu.classList.toggle('hidden');
        }

        function selectSort(value, label) {
            const input = document.getElementById('sort-input');
            input.value = value;
            document.getElementById('sort-label').innerText = label;
            document.getElementById('sort-menu').classList.add('hidden');
            submitFormWithScroll(input.form);
        }

        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('sort-dropdown');
            const menu = document.getElementById('sort-menu');
            if (dropdown && !dropdown.contains(e.target)) {
                menu.classList.add('hidden'); 
            }
        });

        // Scroll Persistence
        document.addEventListener('DOMContentLoaded', function() {
            const scrollPos = sessionStorage.getItem('scrollPos_procurement');
            if (scrollPos) {
                window.scrollTo(0, scrollPos);
                sessionStorage.removeItem('scrollPos_procurement');
            }
        });

        window.submitFormWithScroll = function(form) {
            sessionStorage.setItem('scrollPos_procurement', window.scrollY);
            form.submit();
        };
    </script>
</x-layout>
