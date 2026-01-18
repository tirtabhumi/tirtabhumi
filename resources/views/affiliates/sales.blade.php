<x-layout-upventure title="Riwayat Penjualan">
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <!-- Header -->
            <div class="mb-8 animate-fade-in-up flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 mb-2">{{ __('messages.sales_history') }}</h1>
                    <p class="text-slate-600">{{ __('messages.sales_history_desc') }}</p>
                </div>
                <a href="{{ route('affiliates.index') }}" 
                    class="px-6 py-3 bg-white border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('messages.back') }}
                </a>
            </div>

            <!-- Filters -->
            <div class="neu-flat p-6 rounded-2xl border border-white/50 mb-6 animate-fade-in-up animation-delay-100">
                <form method="GET" action="{{ route('affiliates.sales') }}" class="grid md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">{{ __('messages.search') }}</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('messages.search_sales_placeholder') }}"
                            class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-slate-800 font-medium">
                    </div>

                    <!-- Start Date -->
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">{{ __('messages.from_date') }}</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                            class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-slate-800 font-medium">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">{{ __('messages.to_date') }}</label>
                        <input type="date" name="end_date" value="{{ request('end_date') }}"
                            class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-slate-800 font-medium">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">{{ __('messages.status') }}</label>
                        <select name="status" class="w-full px-4 py-2.5 rounded-xl border-2 border-slate-300 bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all text-slate-800 font-medium">
                            <option value="">{{ __('messages.all_status') }}</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('messages.pending_status') }}</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>{{ __('messages.approved_status') }}</option>
                            <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ __('messages.paid_status') }}</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="md:col-span-4 flex gap-3">
                        <button type="submit" 
                            class="px-6 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all text-sm h-[42px]">
                            {{ __('messages.filter') }}
                        </button>
                        <a href="{{ route('affiliates.sales') }}" 
                            class="px-6 py-2 bg-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-300 transition-all">
                            {{ __('messages.reset') }}
                        </a>
                    </div>
                </form>
            </div>

            <!-- Sales Table -->
            <div class="neu-flat rounded-2xl border border-white/50 overflow-hidden animate-fade-in-up animation-delay-200">
                @if($sales->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-blue-50 to-cyan-50">
                                <tr>
                                    <th class="text-left py-4 px-6 text-sm font-bold text-slate-700">{{ __('messages.date') }}</th>
                                    <th class="text-left py-4 px-6 text-sm font-bold text-slate-700">{{ __('messages.class') }}</th>
                                    <th class="text-left py-4 px-6 text-sm font-bold text-slate-700">{{ __('messages.customer') }}</th>
                                    <th class="text-right py-4 px-6 text-sm font-bold text-slate-700">{{ __('messages.price') }}</th>
                                    <th class="text-right py-4 px-6 text-sm font-bold text-slate-700">{{ __('messages.commission') }}</th>
                                    <th class="text-center py-4 px-6 text-sm font-bold text-slate-700">{{ __('messages.status') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($sales as $sale)
                                    <tr class="hover:bg-blue-50/50 transition-colors">
                                        <td class="py-4 px-6 text-sm text-slate-600">
                                            {{ $sale->created_at->format('d M Y') }}
                                            <br>
                                            <span class="text-xs text-slate-400">{{ $sale->created_at->format('H:i') }}</span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <p class="font-semibold text-slate-800">{{ $sale->registration->training->title ?? 'N/A' }}</p>
                                            <p class="text-xs text-slate-500">{{ $sale->registration->training->category ?? '' }}</p>
                                        </td>
                                        <td class="py-4 px-6 text-sm text-slate-600">
                                            {{ $sale->registration->name ?? 'N/A' }}
                                            <br>
                                            <span class="text-xs text-slate-400">{{ $sale->registration->email ?? '' }}</span>
                                        </td>
                                        <td class="py-4 px-6 text-right font-semibold text-slate-800">
                                            Rp {{ number_format($sale->registration->training->price ?? 0, 0, ',', '.') }}
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <p class="font-bold text-green-600">+{{ number_format($sale->commission_amount, 0, ',', '.') }}</p>
                                            <p class="text-xs text-slate-500">{{ $sale->commission_percentage }}%</p>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            @if($sale->status === 'pending')
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-700">{{ __('messages.pending_status') }}</span>
                                            @elseif($sale->status === 'approved')
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">{{ __('messages.approved_status') }}</span>
                                            @else
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">{{ __('messages.paid_status') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-6 bg-slate-50 border-t border-slate-200">
                        {{ $sales->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-slate-500 text-lg font-semibold mb-2">{{ __('messages.no_sales_yet') }}</p>
                        <p class="text-slate-400">{{ __('messages.start_sharing_desc') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-layout-upventure>