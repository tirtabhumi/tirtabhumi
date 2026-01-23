<x-layout-upventure title="{{ $title }} - {{ config('app.name') }}">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 20% !important; flex: 0 0 20% !important; }
            .content-width { width: 77% !important; flex: 0 0 77% !important; }
        }
        /* Active state: input checked -> ubah bulatan + centang + teks */
        label input[type="checkbox"]:checked + .checkbox-ui{
        background: #4f46e5 !important;  /* indigo-600 */
        border-color: #4f46e5 !important;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.3) !important;
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
        color: #4338ca !important;
        font-weight: 700 !important;
        }
    </style>
        <!-- Animated Background -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-1/4 left-1/4 w-96 h-96 bg-purple-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <div class="mb-10 animate-fade-in-up">
                <x-breadcrumb :paths="[__('messages.training_title') => route('trainings.index')]" :current="$title" class="mb-0" />
            </div>

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ $title }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    Explore our available programs and start learning today.
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <form action="{{ request()->url() }}" method="GET" id="filterForm">
                            <!-- Preserve Search and Sort -->
                             @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif

                            <div class="neu-flat rounded-3xl p-8 border border-white/50">
                                <div class="mb-6 flex items-center justify-between">
                                    <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                    <a href="{{ request()->url() }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                                </div>

                                <!-- Sort -->
                                <div class="mb-6 relative" id="sort-dropdown">
                                    <h4 class="font-bold text-slate-800 mb-3">Sort By</h4>
                                    <input type="hidden" id="sort-input" name="sort" value="{{ request('sort', 'latest') }}">
                                    <button type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors" onclick="toggleSortDropdown()">
                                        <span id="sort-label" class="font-medium">
                                            @switch(request('sort'))
                                                @case('price_asc') Lowest Price @break
                                                @case('price_desc') Highest Price @break
                                                @default Upcoming Date
                                            @endswitch
                                        </span>
                                        <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    
                                    <!-- Custom Dropdown Menu -->
                                    <div id="sort-menu" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 hidden border border-white/50">
                                        <div class="space-y-1">
                                            <button type="button" onclick="selectSort('latest', 'Upcoming Date')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'latest' || !request('sort') ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Upcoming Date</button>
                                            <button type="button" onclick="selectSort('price_asc', 'Lowest Price')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'price_asc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Lowest Price</button>
                                            <button type="button" onclick="selectSort('price_desc', 'Highest Price')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'price_desc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Highest Price</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/50 my-4"></div>

                                <!-- Category Filter -->
                                @if(isset($filters['category']) && !empty($filters['category']))
                                <div class="mb-6">
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('category-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Category</h4>
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


                                <!-- Type Filter -->
                                @if(isset($filters['type']) && !empty($filters['type']))
                                <div id="type-filter-container" style="{{ (in_array('webinar', (array)request('category', [])) || in_array('workshop', (array)request('category', []))) ? 'display: block;' : 'display: none;' }}">
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('type-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Type</h4>
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

                <!-- Product/Training Grid -->
                <div class="w-full lg:w-[80%] content-width">
                     <div class="mb-8">
                        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800 mb-1">Available Programs</h2>
                                <p class="text-slate-500 text-sm">{{ $trainings->total() }} programs found</p>
                            </div>
                        </div>
                        <div class="w-full">
                             <form action="{{ request()->url() }}" method="GET" class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                <!-- Hidden inputs to preserve filters -->
                                @if(request('category'))
                                    @foreach((array)request('category') as $cat)
                                        <input type="hidden" name="category[]" value="{{ $cat }}">
                                    @endforeach
                                @endif

                                @if(request('type'))
                                    @foreach((array)request('type') as $typ)
                                        <input type="hidden" name="type[]" value="{{ $typ }}">
                                    @endforeach
                                @endif
                                @if(request('sort'))
                                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                                @endif

                                <input type="text" 
                                       name="search" 
                                       value="{{ request('search') }}"
                                       placeholder="Search programs..." 
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
                            Showing results for "<span class="font-bold text-slate-800">{{ request('search') }}</span>"
                        </div>
                    @endif

                    <!-- Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                         @forelse($trainings as $training)
                            <x-training-card :training="$training" />
                        @empty
                            <div class="col-span-full text-center py-20">
                                <div class="neu-pressed rounded-full p-6 w-24 h-24 mx-auto mb-4 flex items-center justify-center text-slate-400">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                @if(request()->anyFilled(['search', 'type']))
                                    <h3 class="text-lg font-bold text-slate-800 mb-2">No programs found</h3>
                                    <p class="text-slate-500 max-w-sm mx-auto">Try different filters or search terms.</p>
                                    <a href="{{ request()->url() }}" class="inline-block mt-4 neu-btn px-6 py-2 rounded-xl text-indigo-600 font-medium hover:text-indigo-700">Reset Filter</a>
                                @else
                                    <h3 class="text-lg font-bold text-slate-800 mb-2">No programs available</h3>
                                    <p class="text-slate-500 max-w-sm mx-auto">We are updating our schedule. Please check back later.</p>
                                @endif
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-12 animate-fade-in-up" style="animation-delay: 600ms">
                        {{ $trainings->links('components.pagination') }}
                    </div>
                </div>
            </div>
        </div>

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
            input.form.submit(); 
        }

        document.addEventListener('click', function(e) {
            const dropdown = document.getElementById('sort-dropdown');
            const menu = document.getElementById('sort-menu');
            if (dropdown && !dropdown.contains(e.target)) {
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
            
            // Initial check already done by server-side style, but useful if we preventDefault submit later
        });
    </script>
</x-layout-upventure>
