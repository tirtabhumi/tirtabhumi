<x-layout-upventure title="My Classes - Learning Dashboard">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 20% !important; flex: 0 0 20% !important; }
            .content-width { width: 77% !important; flex: 0 0 77% !important; }
        }

        /* Active state: input checked -> ubah bulatan + centang + teks */
        label input[type="checkbox"]:checked + .checkbox-ui{
        background: #3b82f6 !important;  /* biru terang */
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59,130,246,.30) !important;
        }

        /* munculkan icon centang saat checked */
        label input[type="checkbox"]:checked + .checkbox-ui .check-icon{
        transform: scale(1) !important;
        }

        /* kalau tidak checked, icon disembunyikan */
        label .check-icon{
        transform: scale(0);
        }

        /* teks ikut aktif */
        label input[type="checkbox"]:checked + .checkbox-ui + .checkbox-text{
        color: #1d4ed8 !important;
        font-weight: 700 !important;
        }
    </style>
    
        <!-- Animated Background -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-purple-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 right-1/3 w-96 h-96 bg-pink-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Back to Dashboard -->
             <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    {{ __('messages.back_to_dashboard') }}
                </a>
            </div>

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ __('messages.my_classes_title') }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    {{ __('messages.my_classes_subtitle') }}
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <form action="{{ route('my-classes.index') }}" method="GET" id="filterForm">
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
                                    <a href="{{ route('my-classes.index') }}" class="text-xs text-red-500 font-bold hover:underline">{{ __('messages.reset') }}</a>
                                </div>

                                <!-- Sort -->
                                <div class="mb-6 relative" id="sort-dropdown">
                                    <h4 class="font-bold text-slate-800 mb-3">{{ __('messages.sort_by') }}</h4>
                                    <input type="hidden" id="sort-input" name="sort" value="{{ request('sort', 'latest') }}">
                                    <button type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors" onclick="toggleSortDropdown()">
                                        <span id="sort-label" class="font-medium">
                                            @switch(request('sort'))
                                                @case('price_asc') {{ __('messages.lowest_price') }} @break
                                                @case('price_desc') {{ __('messages.highest_price') }} @break
                                                @default {{ __('messages.upcoming_date') }}
                                            @endswitch
                                        </span>
                                        <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    
                                    <!-- Custom Dropdown Menu -->
                                    <div id="sort-menu" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 hidden border border-white/50">
                                        <div class="space-y-1">
                                            <button type="button" onclick="selectSort('latest', '{{ __('messages.upcoming_date') }}')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'latest' || !request('sort') ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">{{ __('messages.upcoming_date') }}</button>
                                            <button type="button" onclick="selectSort('price_asc', '{{ __('messages.lowest_price') }}')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'price_asc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">{{ __('messages.lowest_price') }}</button>
                                            <button type="button" onclick="selectSort('price_desc', '{{ __('messages.highest_price') }}')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'price_desc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">{{ __('messages.highest_price') }}</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/50 my-4"></div>

                                <!-- Category Filter -->
                                @if(isset($filters['category']) && !empty($filters['category']))
                                <div class="mb-6">
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('category-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ __('messages.category') }}</h4>
                                        <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="category-list" class="space-y-3">
                                        @foreach($filters['category'] as $category)
                                            <label class="flex items-center gap-3 cursor-pointer group select-none relative">
                                               <input type="checkbox" name="category[]" value="{{ $category }}"
                                                    class="peer sr-only"
                                                    {{ in_array($category, (array)request('category', [])) ? 'checked' : '' }}
                                                    onchange="setTimeout(() => this.form.submit(), 300)">

                                                <div class="checkbox-ui w-5 h-5 flex-shrink-0 rounded-md neu-pressed flex items-center justify-center text-white transition-all duration-200 border border-transparent">
                                                    <svg class="w-3.5 h-3.5 check-icon transform scale-0 transition-transform duration-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>

                                                <span class="checkbox-text text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">
                                                    {{ ucfirst($category) }}
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="border-t border-slate-200/50 my-4"></div>
                                @endif


                                @if(isset($filters['level']) && isset($filters['type']))
                                <div class="border-t border-slate-200/50 my-4"></div>
                                @endif

                                <!-- Type Filter -->
                                @if(isset($filters['type']) && !empty($filters['type']))
                                <div id="type-filter-container" style="{{ (in_array('webinar', (array)request('category', [])) || in_array('workshop', (array)request('category', []))) ? 'display: block;' : 'display: none;' }}">
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('type-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ __('messages.type') }}</h4>
                                        <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="type-list" class="space-y-3">
                                        @foreach($filters['type'] as $type)
                                            <label class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="checkbox" name="type[]" value="{{ $type }}"
                                                    class="peer sr-only"
                                                    {{ in_array($type, (array)request('type', [])) ? 'checked' : '' }}
                                                    onchange="setTimeout(() => this.form.submit(), 300)">

                                                <div class="checkbox-ui w-5 h-5 flex-shrink-0 rounded-md neu-pressed flex items-center justify-center text-white transition-all duration-200 border border-transparent">
                                                    <svg class="check-icon w-3.5 h-3.5 transform scale-0 transition-transform duration-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>

                                                  <span class="checkbox-text text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">
                                                    {{ __('messages.training_type_' . $type) }}
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Classes Grid -->
                <div class="w-full lg:w-[80%] content-width">
                    <div class="mb-8">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-800 mb-1">{{ __('messages.classes_list') }}</h2>
                            <p class="text-slate-500 text-sm">{{ __('messages.classes_available', ['count' => $myClasses->total()]) }}</p>
                        </div>
                        <div class="w-full">
                            <form action="{{ route('my-classes.index') }}" method="GET" class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                <!-- Hidden inputs to preserve filters -->
                                @if(request('level'))
                                    @foreach((array)request('level') as $lvl)
                                        <input type="hidden" name="level[]" value="{{ $lvl }}">
                                    @endforeach
                                @endif
                                @if(request('sort'))
                                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                                @endif

                                <input type="text" 
                                       name="search" 
                                       value="{{ request('search') }}"
                                       placeholder="{{ __('messages.search_classes_placeholder') }}" 
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
                            {!! __('messages.search_results_for', ['search' => request('search')]) !!}
                        </div>
                    @endif

                    <!-- Classes Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($myClasses as $registration)
                            @php
                                // Calculate progress for this class
                                $totalModules = $registration->training->modules->count();
                                $completedModules = \App\Models\UserModuleProgress::where('user_id', auth()->id())
                                    ->whereIn('training_module_id', $registration->training->modules->pluck('id'))
                                    ->where('is_completed', true)
                                    ->count();
                                $classProgress = $totalModules > 0 ? round(($completedModules / $totalModules) * 100) : 0;
                            @endphp
                            
                            <div class="neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group flex flex-col h-full relative">
                                <a href="{{ route('my-classes.show', $registration->training->slug) }}" class="absolute inset-0 z-10"><span class="sr-only">{{ __('messages.view_class_detail') }}</span></a>

                                <div class="relative aspect-video overflow-hidden bg-gradient-to-br from-indigo-100 to-purple-100">
                                    @if($registration->training->image)
                                        <img src="{{ Storage::url($registration->training->image) }}" alt="{{ $registration->training->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-indigo-300">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        </div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    
                                    <!-- Status & Level Badges -->
                                    <div class="absolute top-3 right-3 flex items-center gap-2">
                                        <!-- Level Badge -->
                                        @if($registration->training->level)
                                            <span class="px-2 py-1 bg-white/90 backdrop-blur text-indigo-600 text-xs font-bold rounded-full shadow-sm">
                                                {{ ucfirst($registration->training->level) }}
                                            </span>
                                        @endif
                                        
                                        <!-- Progress Status Badge -->
                                        @if($classProgress >= 100)
                                            <span class="px-2 py-1 bg-indigo-600 text-white text-xs font-bold rounded-full shadow-lg shadow-indigo-500/30">
                                                {{ __('messages.completed') }}
                                            </span>
                                        @else
                                            <span class="px-2 py-1 bg-green-500 text-white text-xs font-bold rounded-full">
                                                {{ __('messages.purchased') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="p-6 flex flex-col flex-grow">
                                    <!-- Category & Level Labels -->
                                    <div class="mb-2 flex items-center gap-2">
                                        @php
                                            $catIconColors = [
                                                'class' => 'text-blue-600',
                                                'webinar' => 'text-purple-600',
                                                'workshop' => 'text-amber-600',
                                            ];
                                            $catIconColor = $catIconColors[$registration->training->category] ?? 'text-slate-600';
                                        @endphp
                                        <span class="{{ $catIconColor }} font-bold uppercase tracking-wider text-[10px]">
                                            {{ ucfirst($registration->training->category) }}
                                        </span>
                                        @if($registration->training->level)
                                            <span class="px-2 py-0.5 bg-indigo-100 text-indigo-600 text-[10px] font-bold rounded-full">
                                                {{ ucfirst($registration->training->level) }}
                                            </span>
                                        @endif
                                    </div>

                                    <h3 class="text-lg font-bold text-slate-700 line-clamp-2 group-hover:text-indigo-600 transition-colors mb-3">
                                        {{ $registration->training->title }}
                                    </h3>
                                    
                                    <div class="mt-auto">
                                        <div class="flex items-center gap-2 text-xs text-slate-600 mb-3">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                            {{ $registration->training->modules->count() }} {{ __('messages.modules') }}
                                        </div>
                                        
                                        <!-- Progress Bar -->
                                        <div class="mb-3">
                                            <div class="flex items-center justify-between text-xs text-slate-600 mb-1">
                                                <span class="font-medium">{{ __('messages.progress') }}</span>
                                                <span class="font-bold">{{ $classProgress }}%</span>
                                            </div>
                                            <div class="h-2 bg-slate-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-500" style="width: {{ $classProgress }}%"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                                            @if($classProgress >= 100)
                                                <a href="{{ route('my-classes.certificate', $registration->training_id) }}" target="_blank" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    {{ __('messages.certificate_ready') }}
                                                </a>
                                            @else
                                                <span class="text-sm font-bold text-indigo-600">{{ __('messages.continue_learning') }} →</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="neu-flat rounded-3xl p-16 text-center border border-white/50">
                                    <div class="inline-block p-6 bg-slate-100 rounded-full mb-6">
                                        <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-700 mb-3">{{ __('messages.no_classes_found') }}</h3>
                                    <p class="text-slate-500 mb-8 max-w-md mx-auto">{{ __('messages.no_classes_filter_desc') }}</p>
                                    <a href="{{ route('my-classes.index') }}" class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-block">
                                        {{ __('messages.reset_filter') }}
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($myClasses->hasPages())
                        <div class="mt-12">
                            {{ $myClasses->links('components.pagination') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    <script>
        function toggleSortDropdown() {
            const menu = document.getElementById('sort-menu');
            menu.classList.toggle('hidden');
        }

        function selectSort(value, label) {
            document.getElementById('sort-input').value = value;
            document.getElementById('sort-label').textContent = label;
            document.getElementById('filterForm').submit();
        }

        // Close dropdown when clicking outside
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('sort-dropdown');
            const menu = document.getElementById('sort-menu');
            if (!dropdown.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Type Filter Visibility Logic
        document.addEventListener('DOMContentLoaded', function() {
            const typeFilterContainer = document.getElementById('type-filter-container');
            const categoryCheckboxes = document.querySelectorAll('input[name="category[]"]');

            function checkCategories() {
                let showType = false;
                categoryCheckboxes.forEach(cb => {
                    if (cb.checked && (cb.value === 'webinar' || cb.value === 'workshop')) {
                        showType = true;
                    }
                });

                if (typeFilterContainer) {
                    typeFilterContainer.style.display = showType ? 'block' : 'none';
                }
            }

            // Add listeners
            categoryCheckboxes.forEach(cb => {
                cb.addEventListener('change', checkCategories);
            });
            
            // Note: Initial check is handled by server-side rendering to prevent flash, 
            // but we add this just in case of dynamic interactions without reload (though current implementation reloads)
            // checkCategories(); 
        });
    </script>
</x-layout-upventure>
