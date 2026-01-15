<x-layout-upventure title="Payment History">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 20% !important; flex: 0 0 20% !important; }
            .content-width { width: 80% !important; flex: 0 0 80% !important; }
        }

        /* Active state: input checked -> ubah bulatan + centang + teks */
        label input[type="checkbox"]:checked + .checkbox-ui{
        background: #3b82f6 !important;
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59,130,246,.30) !important;
        }

        label input[type="checkbox"]:checked + .checkbox-ui .check-icon{
        transform: scale(1) !important;
        }

        label .check-icon{
        transform: scale(0);
        }

        label input[type="checkbox"]:checked + .checkbox-ui + .checkbox-text{
        color: #1d4ed8 !important;
        font-weight: 700 !important;
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
            <div class="mb-8">
                <a href="/dashboard" class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-lg font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Dashboard
                </a>
            </div>

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    Payment History
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    View and manage all your transaction history
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 animate-fade-in-up" style="animation-delay: 200ms">
                <!-- Sidebar Filters -->
                <div class="w-full lg:w-[20%] sidebar-width">
                    <div class="sticky top-24">
                        <form action="{{ route('payments.index') }}" method="GET" id="filterForm">
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif

                            <div class="neu-flat rounded-3xl p-8 border border-white/50">
                                <div class="mb-6 flex items-center justify-between">
                                    <h3 class="font-bold text-lg text-slate-800">Filter</h3>
                                    <a href="{{ route('payments.index') }}" class="text-xs text-red-500 font-bold hover:underline">Reset</a>
                                </div>

                                <!-- Sort -->
                                <div class="mb-6 relative" id="sort-dropdown">
                                    <h4 class="font-bold text-slate-800 mb-3">Urutkan</h4>
                                    <input type="hidden" id="sort-input" name="sort" value="{{ request('sort', 'latest') }}">
                                    <button type="button" class="w-full flex items-center justify-between rounded-xl neu-pressed bg-[#eef2f6] px-4 py-3 text-sm text-slate-600 focus:outline-none hover:text-indigo-600 transition-colors" onclick="toggleSortDropdown()">
                                        <span id="sort-label" class="font-medium">
                                            @switch(request('sort'))
                                                @case('oldest') Terlama @break
                                                @case('amount_asc') Nominal Terendah @break
                                                @case('amount_desc') Nominal Tertinggi @break
                                                @default Terbaru
                                            @endswitch
                                        </span>
                                        <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    
                                    <div id="sort-menu" class="absolute z-20 mt-4 w-full rounded-xl neu-flat bg-[#eef2f6] p-2 hidden border border-white/50">
                                        <div class="space-y-1">
                                            <button type="button" onclick="selectSort('latest', 'Terbaru')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'latest' || !request('sort') ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Terbaru</button>
                                            <button type="button" onclick="selectSort('oldest', 'Terlama')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'oldest' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Terlama</button>
                                            <button type="button" onclick="selectSort('amount_asc', 'Nominal Terendah')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'amount_asc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Nominal Terendah</button>
                                            <button type="button" onclick="selectSort('amount_desc', 'Nominal Tertinggi')" class="block w-full text-left px-4 py-2 text-sm rounded-lg transition-colors {{ request('sort') == 'amount_desc' ? 'text-indigo-600 font-bold bg-white/50 shadow-sm' : 'text-slate-600 hover:bg-white/30 hover:text-indigo-600' }}">Nominal Tertinggi</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-slate-200/50 my-4"></div>

                                <!-- Payment Status Filter -->
                                <div class="mb-6">
                                    <button type="button" class="flex items-center justify-between w-full mb-3 group" onclick="document.getElementById('payment-status-list').classList.toggle('hidden')">
                                        <h4 class="font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Status Pembayaran</h4>
                                        <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                                    </button>
                                    <div id="payment-status-list" class="space-y-3">
                                        @foreach(['paid' => 'Paid', 'unpaid' => 'Unpaid', 'cancelled' => 'Cancelled'] as $value => $label)
                                            <label class="flex items-center gap-3 cursor-pointer group select-none relative">
                                                <input type="radio" name="payment_status" value="{{ $value }}"
                                                    class="peer sr-only"
                                                    {{ request('payment_status') == $value ? 'checked' : '' }}
                                                    onchange="this.form.submit()">

                                                <div class="checkbox-ui w-5 h-5 flex-shrink-0 rounded-md neu-pressed flex items-center justify-center text-white transition-all duration-200 border border-transparent">
                                                    <svg class="w-3.5 h-3.5 check-icon transform scale-0 transition-transform duration-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>

                                                <span class="checkbox-text text-slate-600 group-hover:text-indigo-600 transition-colors text-sm font-medium">
                                                    {{ $label }}
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="w-full lg:w-[80%] content-width">
                    <div class="mb-8">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-slate-800 mb-1">Daftar Transaksi</h2>
                            <p class="text-slate-500 text-sm">{{ $registrations->total() }} transaksi ditemukan</p>
                        </div>
                        <div class="w-full">
                            <form action="{{ route('payments.index') }}" method="GET" class="relative w-full flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                                @if(request('payment_status'))
                                    <input type="hidden" name="payment_status" value="{{ request('payment_status') }}">
                                @endif
                                @if(request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                @if(request('sort'))
                                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                                @endif

                                <input type="text" 
                                       name="search" 
                                       value="{{ request('search') }}"
                                       placeholder="Cari transaksi atau ID..." 
                                       class="w-full py-4 pl-4 bg-transparent border-none focus:ring-0 outline-none text-slate-600 placeholder-slate-400 transition-all">
                                <button type="submit" class="p-3 rounded-full hover:bg-white/50 text-indigo-600 transition-colors flex-shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    @if(request('search'))
                        <div class="mb-4 text-slate-500">
                            Menampilkan hasil pencarian untuk "<span class="font-bold text-slate-800">{{ request('search') }}</span>"
                        </div>
                    @endif

                    <!-- Transactions List (Card Style with Neumorphism) -->
                    <div class="space-y-4">
                        @forelse($registrations as $registration)
                            <div class="neu-flat rounded-2xl p-6 border border-white/50 hover:shadow-xl transition-all duration-300">
                                <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                                    <!-- Training Info -->
                                    <div class="flex items-center gap-4 flex-1">
                                        <!-- Thumbnail -->
                                        <div class="flex-shrink-0 w-20 h-20 rounded-xl overflow-hidden bg-slate-100 neu-pressed">
                                            @if($registration->training->image)
                                                <img src="{{ Storage::url($registration->training->image) }}" alt="{{ $registration->training->title }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center text-slate-300">
                                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Details -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="inline-block px-2.5 py-1 text-xs font-bold rounded-lg neu-pressed {{ $registration->training->category == 'class' ? 'text-indigo-600' : 'text-purple-600' }}">
                                                    {{ ucfirst($registration->training->category) }}
                                                </span>
                                                @if($registration->payment_status == 'paid')
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-green-100 text-green-700">
                                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                                        Paid
                                                    </span>
                                                @elseif($registration->payment_status == 'cancelled')
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-red-100 text-red-700">
                                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5"></span>
                                                        Cancelled
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-100 text-amber-700">
                                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full mr-1.5 animate-pulse"></span>
                                                        Unpaid
                                                    </span>
                                                @endif
                                            </div>
                                            <h3 class="text-base font-bold text-slate-800 mb-1 line-clamp-1">{{ $registration->training->title }}</h3>
                                            <div class="flex flex-col gap-1 text-xs text-slate-500">
                                                <div class="flex items-center gap-3">
                                                    <span class="flex items-center gap-1">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        @if($registration->training->event_date)
                                                            {{ $registration->training->event_date->format('d M Y') }}
                                                        @else
                                                            Self-paced Access
                                                        @endif
                                                    </span>
                                                    @if($registration->transaction_id)
                                                        <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                                        <span class="font-mono">{{ $registration->transaction_id }}</span>
                                                    @endif
                                                </div>
                                                
                                                @if($registration->payment_method)
                                                    <div class="flex items-center gap-1 text-indigo-600 font-medium">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                                        Via {{ str_replace('_', ' ', strtoupper($registration->payment_method)) }}
                                                    </div>
                                                @endif

                                                @if($registration->payment_status == 'unpaid' && $registration->payment_expiry_time)
                                                    <div class="flex items-center gap-1 text-amber-600 font-medium mt-1">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        Pay before {{ $registration->payment_expiry_time->format('F j, Y \a\t g:i A') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Amount & Actions -->
                                    <div class="flex items-center justify-between lg:justify-end gap-4 pt-4 lg:pt-0 border-t lg:border-t-0 border-slate-100">
                                        <!-- Amount -->
                                        <div class="text-right">
                                            <div class="text-xs text-slate-500 mb-1">Total Amount</div>
                                            <div class="text-xl font-bold text-slate-800">
                                                Rp {{ number_format($registration->total_amount ?? $registration->training->price, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        @if($registration->payment_status == 'paid')
                                            <div class="neu-pressed px-4 py-2 rounded-xl">
                                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                        @elseif($registration->payment_status == 'cancelled')
                                            <div class="neu-pressed px-4 py-2 rounded-xl">
                                                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                            </div>
                                        @else
                                            <div class="flex flex-col gap-2">
                                                @if($registration->invoice_url && $registration->payment_status == 'unpaid')
                                                    <a href="{{ $registration->invoice_url }}" 
                                                       target="_blank"
                                                       class="neu-btn px-4 py-2 text-sm font-bold text-indigo-600 rounded-xl hover:scale-105 transition-transform flex items-center justify-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                        Pay Now
                                                    </a>
                                                @else
                                                    <a href="{{ route('payment.show', $registration) }}" 
                                                       class="neu-btn px-4 py-2 text-sm font-bold text-indigo-600 rounded-xl hover:scale-105 transition-transform flex items-center justify-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                        Pay Now
                                                    </a>
                                                @endif
                                                <form action="{{ route('payment.cancel', $registration) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this payment?');">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="neu-btn px-4 py-2 text-sm font-bold text-red-600 rounded-xl hover:scale-105 transition-transform flex items-center justify-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="neu-flat rounded-3xl p-16 text-center border border-white/50">
                                <div class="inline-block p-6 bg-slate-100 rounded-full mb-6">
                                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-700 mb-3">Tidak Ada Transaksi</h3>
                                <p class="text-slate-500 mb-8 max-w-md mx-auto">Tidak ada transaksi yang sesuai dengan filter Anda</p>
                                <a href="{{ route('payments.index') }}" class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-block">
                                    Reset Filter
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($registrations->hasPages())
                        <div class="mt-12">
                            {{ $registrations->links('components.pagination') }}
                        </div>
                    @endif
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
            document.getElementById('sort-input').value = value;
            document.getElementById('sort-label').textContent = label;
            document.getElementById('filterForm').submit();
        }

        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('sort-dropdown');
            const menu = document.getElementById('sort-menu');
            if (!dropdown.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

    </script>
</x-layout-upventure>