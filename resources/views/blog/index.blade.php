<x-layout title="{{ __('messages.blog') }} - {{ config('app.name') }}">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 22% !important; flex: 0 0 22% !important; }
        }
    </style>
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <div class="mb-10 animate-fade-in-up">
                <x-breadcrumb :current="__('messages.blog')" class="mb-0" />
            </div>

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ __('messages.our_blog') }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    {{ __('messages.blog_desc') }}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters (Procurement Style) -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <form action="{{ route('blog.index') }}" method="GET" id="filterForm">
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif

                            <div class="neu-flat rounded-3xl p-8 border border-white/50">
                                <div class="mb-6 flex items-center justify-between">
                                    <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                    <a href="{{ route('blog.index') }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                                </div>

                                <!-- Sort -->
                                <div class="mb-6 relative" id="sort-dropdown">
                                    <h4 class="font-bold text-slate-800 mb-3">Urutkan</h4>
                                    <input type="hidden" id="sort-input" name="sort" value="{{ request('sort', 'latest') }}">
                                    <button type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors" onclick="toggleSortDropdown()">
                                        <span id="sort-label" class="font-medium">
                                            @switch(request('sort'))
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

                                        @if(isset($categories) && count($categories) > 0)
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
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Blog Grid -->
                <div class="w-full lg:flex-1">
                    <div class="mb-8">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-800 mb-1">Daftar Artikel</h2>
                            <p class="text-slate-500 text-sm">{{ $posts->total() }} artikel tersedia</p>
                        </div>
                        <div class="w-full">
                                <form action="{{ route('blog.index') }}" method="GET" class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                                @if(request('sort')) <input type="hidden" name="sort" value="{{ request('sort') }}"> @endif

                                <input type="text" 
                                        name="search" 
                                        value="{{ request('search') }}"
                                        placeholder="Cari artikel..." 
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
                            <a href="{{ route('blog.index') }}" class="text-xs font-bold hover:underline">Hapus Filter</a>
                        </div>
                    @endif

                    <div class="grid md:grid-cols-3 gap-6">
                        @forelse($posts as $post)
                        <a href="{{ route('blog.show', $post) }}" 
                           class="group block bg-white rounded-3xl border border-white/50 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full flex flex-col animate-fade-in-up"
                           style="animation-delay: {{ ($loop->index + 1) * 100 }}ms">
                            <div class="aspect-video relative overflow-hidden bg-slate-100 flex-shrink-0">
                                @php
                                    $blogImage = (!empty($post->images) && isset($post->images[0])) 
                                        ? Storage::url($post->images[0]) 
                                        : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image';
                                @endphp
                                <img src="{{ $blogImage }}" alt="{{ $post->title }}" loading="lazy" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-indigo-50 text-indigo-600 uppercase tracking-wider border border-indigo-100">
                                        {{ $post->category->name }}
                                    </span>
                                    <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">{{ $post->created_at->format('M d, Y') }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-2 text-slate-800 group-hover:text-indigo-600 transition-colors line-clamp-2 leading-tight">
                                    {{ $post->title }}
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mb-4 leading-relaxed">
                                    {{ Str::limit(strip_tags($post->content), 100) }}
                                </p>
                                <div class="mt-auto">
                                    <span class="inline-flex items-center text-sm font-bold text-indigo-600 group">
                                        {{ __('messages.read_article') }}
                                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div class="col-span-3 text-center py-20">
                             <div class="neu-pressed rounded-full p-6 w-24 h-24 mx-auto mb-4 flex items-center justify-center text-slate-400">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800 mb-2">{{ __('messages.no_posts') }}</h3>
                            <p class="text-slate-500 max-w-sm mx-auto">Kami tidak dapat menemukan artikel yang Anda cari. Coba gunakan kata kunci lain.</p>
                            <a href="{{ route('blog.index') }}" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-indigo-600 font-medium hover:text-indigo-700">Reset Pencarian</a>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-12 animate-fade-in-up" style="animation-delay: 600ms">
                        {{ $posts->links('components.pagination') }}
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
            const scrollPos = sessionStorage.getItem('scrollPos_blog');
            if (scrollPos) {
                window.scrollTo(0, scrollPos);
                sessionStorage.removeItem('scrollPos_blog');
            }
        });

        window.submitFormWithScroll = function(form) {
            sessionStorage.setItem('scrollPos_blog', window.scrollY);
            form.submit();
        };
    </script>
</x-layout>