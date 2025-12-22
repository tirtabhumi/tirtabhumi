<x-layout title="{{ __('messages.service_procurement_title') }} - {{ config('app.name') }}" description="{{ __('messages.service_procurement_desc') }}">
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

                                <!-- Sort -->
                                <div class="mb-6 relative" id="sort-dropdown">
                                    <h4 class="font-bold text-slate-800 mb-3">Urutkan</h4>
                                    <input type="hidden" name="sort" value="{{ request('sort', 'latest') }}">
                                    <button type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors" onclick="toggleSortDropdown()">
                                        <span id="sort-label" class="font-medium">
                                            @switch(request('sort'))
                                                @case('price_asc') Harga Terendah @break
                                                @case('price_desc') Harga Tertinggi @break
                                                @default Paling Sesuai
                                            @endswitch
                                        </span>
                                        <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    
                                    <!-- Custom Dropdown Menu -->
                                    <div id="sort-menu" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 hidden border border-white/50">
                                        <div class="space-y-1">
                                            <button type="button" onclick="selectSort('latest', 'Paling Sesuai')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'latest' || !request('sort') ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Paling Sesuai</button>
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
                                        @foreach($categories as $category)
                                            <label class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="checkbox" name="category[]" value="{{ $category }}" 
                                                    class="peer sr-only"
                                                    {{ in_array($category, (array)request('category', [])) ? 'checked' : '' }}
                                                    onchange="setTimeout(() => this.form.submit(), 300)">
                                                
                                                <div class="w-5 h-5 flex-shrink-0 rounded-md neu-pressed flex items-center justify-center text-white peer-checked:bg-indigo-600 peer-checked:neu-flat transition-all duration-200 border border-transparent">
                                                    <svg class="w-3.5 h-3.5 transform scale-0 peer-checked:scale-100 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                </div>
                                                
                                                <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">{{ $category }}</span>
                                            </label>
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
                                        @foreach(['SIPLah', 'E-Katalog', 'PadiUMKM'] as $platform)
                                            <label class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="checkbox" name="platform[]" value="{{ $platform }}" 
                                                    class="peer sr-only" 
                                                    {{ in_array($platform, (array)request('platform', [])) ? 'checked' : '' }}
                                                    onchange="setTimeout(() => this.form.submit(), 300)">
                                                
                                                <div class="w-5 h-5 flex-shrink-0 rounded-md neu-pressed flex items-center justify-center text-white peer-checked:bg-indigo-600 peer-checked:neu-flat transition-all duration-200 border border-transparent">
                                                    <svg class="w-3.5 h-3.5 transform scale-0 peer-checked:scale-100 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                                </div>

                                                <span class="text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">{{ $platform }}</span>
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
                                <!-- Hidden inputs to preserve filters -->
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
                                <button type="submit" class="p-3 rounded-full hover:bg-white/50 text-indigo-600 transition-colors flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
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
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
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
                                @if(request()->anyFilled(['search', 'category', 'platform']))
                                    <h3 class="text-lg font-bold text-slate-800 mb-2">Produk tidak ditemukan</h3>
                                    <p class="text-slate-500 max-w-sm mx-auto">Coba gunakan kata kunci lain atau ubah filter pencarian Anda.</p>
                                    <a href="{{ route('services.procurement') }}" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-indigo-600 font-medium hover:text-indigo-700">Reset Filter</a>
                                @else
                                    <h3 class="text-lg font-bold text-slate-800 mb-2">Belum ada produk saat ini</h3>
                                    <p class="text-slate-500 max-w-sm mx-auto">Kami sedang menyiapkan katalog produk terbaik untuk Anda. Silakan kembali lagi nanti.</p>
                                @endif
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

    <script>
        function toggleSortDropdown() {
            const menu = document.getElementById('sort-menu');
            menu.classList.toggle('hidden');
        }

        function selectSort(value, label) {
            // Update hidden input
            const input = document.querySelector('input[name="sort"]');
            input.value = value;
            
            // Update Label
            document.getElementById('sort-label').innerText = label;
            
            // Close dropdown
            document.getElementById('sort-menu').classList.add('hidden');
            
            // Submit form
            input.form.submit();
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('sort-dropdown');
            const menu = document.getElementById('sort-menu');
            // If click is outside the dropdown container, hide the menu
            if (dropdown && !dropdown.contains(e.target)) {
                menu.classList.add('hidden'); 
            }
        });
    </script>
</x-layout>
