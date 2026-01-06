<x-layout-upventure title="Riwayat Poin">
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <!-- Header -->
            <div class="mb-8 animate-fade-in-up flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800 mb-2">Riwayat Poin</h1>
                    <p class="text-slate-600">Catatan poin masuk (komisi) dan poin keluar (pencairan)</p>
                </div>
                <a href="{{ route('affiliates.index') }}" 
                    class="px-6 py-3 bg-white border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Filters -->
            <div class="neu-flat p-6 rounded-2xl border border-white/50 mb-6 animate-fade-in-up animation-delay-100">
                <form method="GET" action="{{ route('affiliates.points') }}" class="grid md:grid-cols-3 gap-4">
                    <!-- Start Date -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Dari Tanggal</label>
                        <input type="date" name="start_date" value="{{ request('start_date') }}"
                            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Sampai Tanggal</label>
                        <input type="date" name="end_date" value="{{ request('end_date') }}"
                            class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all">
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 items-end">
                        <button type="submit" 
                            class="px-6 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-xl hover:shadow-lg hover:scale-105 transition-all text-sm h-[42px]">
                            Filter
                        </button>
                        <a href="{{ route('affiliates.points') }}" 
                            class="px-6 py-2 bg-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-300 transition-all text-sm h-[42px] flex items-center">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Points Table -->
            <div class="neu-flat rounded-2xl border border-white/50 overflow-hidden animate-fade-in-up animation-delay-200">
                @if($paginatedHistory->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-purple-50 to-indigo-50">
                                <tr>
                                    <th class="text-left py-4 px-6 text-sm font-bold text-slate-700">Tanggal</th>
                                    <th class="text-left py-4 px-6 text-sm font-bold text-slate-700">Keterangan</th>
                                    <th class="text-center py-4 px-6 text-sm font-bold text-slate-700">Tipe</th>
                                    <th class="text-right py-4 px-6 text-sm font-bold text-slate-700">Jumlah</th>
                                    <th class="text-center py-4 px-6 text-sm font-bold text-slate-700">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($paginatedHistory as $item)
                                    <tr class="hover:bg-purple-50/50 transition-colors">
                                        <td class="py-4 px-6 text-sm text-slate-600">
                                            {{ $item['created_at']->format('d M Y') }}
                                            <br>
                                            <span class="text-xs text-slate-400">{{ $item['created_at']->format('H:i') }}</span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <p class="font-semibold text-slate-800 text-sm">{{ $item['description'] }}</p>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            @if($item['type'] == 'in')
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Poin Masuk</span>
                                            @else
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">Poin Keluar</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-right font-bold {{ $item['type'] == 'in' ? 'text-green-600' : 'text-slate-800' }}">
                                            {{ $item['type'] == 'in' ? '+' : '-' }} {{ number_format($item['amount'], 0, ',', '.') }}
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            @php
                                                $status = $item['raw_status'];
                                                $color = 'gray';
                                                $label = ucfirst($status);
                                                
                                                if ($status == 'pending') {
                                                    $color = 'amber';
                                                } elseif ($status == 'approved' || $status == 'processed') {
                                                    $color = 'green';
                                                    if ($status == 'processed') $label = 'Dicairkan';
                                                } elseif ($status == 'rejected') {
                                                    $color = 'red';
                                                    $label = 'Gagal';
                                                } elseif ($status == 'paid') {
                                                    $color = 'blue';
                                                    $label = 'Paid';
                                                }
                                            @endphp
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-{{ $color }}-100 text-{{ $color }}-700">
                                                {{ $label }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-6 bg-slate-50 border-t border-slate-200">
                        {{ $paginatedHistory->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-slate-500 text-lg font-semibold mb-2">Belum ada riwayat poin</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-layout-upventure>
