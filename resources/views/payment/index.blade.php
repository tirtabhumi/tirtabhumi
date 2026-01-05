<x-layout-upventure title="Payment History">
    <section class="py-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="mb-8 animate-fade-in-up">
                <a href="/dashboard"
                    class="text-slate-500 hover:text-indigo-600 mb-4 inline-flex items-center gap-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Dashboard
                </a>
                <h1 class="text-3xl font-bold text-slate-800">Payment History</h1>
                <p class="text-slate-500 mt-2">View and manage your transaction history.</p>
            </div>

            @if($registrations->isNotEmpty())
                <div class="space-y-6 animate-fade-in-up animation-delay-100">
                    @foreach($registrations as $registration)
                        <div
                            class="neu-flat p-5 rounded-xl border border-white/50 flex flex-col md:flex-row items-center gap-6 group hover:-translate-y-1 transition-all duration-300 bg-white">
                            <!-- Image -->
                            <div
                                class="w-full md:w-28 h-20 md:h-20 rounded-xl overflow-hidden flex-shrink-0 bg-slate-100 relative">
                                @if($registration->training->image)
                                    <img src="{{ Storage::url($registration->training->image) }}"
                                        alt="{{ $registration->training->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <!-- Category Badge -->
                                <div class="absolute top-0 left-0 m-1">
                                    <span
                                        class="inline-block px-1.5 py-0.5 rounded text-[10px] font-bold shadow-sm {{ $registration->training->category == 'class' ? 'bg-indigo-500 text-white' : 'bg-purple-500 text-white' }}">
                                        {{ ucfirst($registration->training->category) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="flex-grow text-center md:text-left w-full">
                                <h3
                                    class="font-bold text-slate-800 text-lg line-clamp-1 mb-1 group-hover:text-indigo-600 transition-colors">
                                    {{ $registration->training->title }}</h3>
                                <div class="flex items-center justify-center md:justify-start gap-3 text-sm text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $registration->training->event_date->format('d M Y, H:i') }}
                                    </span>
                                    <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                    <span>Rp
                                        {{ number_format($registration->total_amount ?? $registration->training->price, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <!-- Status & Action -->
                            <div
                                class="flex flex-col items-center md:items-end gap-3 w-full md:w-auto mt-2 md:mt-0 pt-4 md:pt-0 border-t md:border-t-0 border-slate-100 md:border-none">
                                @if($registration->payment_status == 'paid')
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                        Completed
                                    </span>
                                @elseif($registration->payment_status == 'cancelled')
                                    <span
                                        class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-red-100 text-red-700 border border-red-200">
                                        <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span>
                                        Cancel
                                    </span>
                                @else
                                    <div class="flex flex-col items-center md:items-end gap-2">
                                        <span
                                            class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                            <span class="w-2 h-2 bg-amber-500 rounded-full mr-1.5 animate-pulse"></span>
                                            Confirmation
                                        </span>
                                        <a href="{{ route('payment.confirmation', $registration) }}"
                                            class="neu-btn px-4 py-1.5 text-xs font-bold text-indigo-600 rounded-lg hover:-translate-y-0.5 transition-transform flex items-center">
                                            Pay Now <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-white/50 rounded-2xl border border-white/50">
                    <div
                        class="w-20 h-20 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-4 text-indigo-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-700 mb-1">No transaction history</h3>
                    <p class="text-slate-500 mb-6">You haven't made any purchases yet.</p>
                    <a href="{{ route('trainings.index') }}"
                        class="neu-btn px-6 py-2.5 font-bold text-sm inline-block">Browse Classes</a>
                </div>
            @endif
        </div>
    </section>
</x-layout-upventure>