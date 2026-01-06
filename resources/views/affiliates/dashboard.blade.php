<x-layout-upventure title="Affiliate Dashboard">
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-green-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Header -->
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-slate-800 mb-2">Affiliate Dashboard</h1>
                <p class="text-slate-600">Kode Affiliate Anda: <span class="font-mono font-bold text-indigo-600">{{ $affiliate->affiliate_code }}</span></p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-fade-in-up animation-delay-200">
                <!-- Monthly Earnings -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-800">Rp {{ number_format($monthlyEarnings, 0, ',', '.') }}</span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1">Pendapatan Bulan Ini</h3>
                    <p class="text-xs text-slate-500">{{ now()->format('F Y') }}</p>
                </div>

                <!-- Yearly Earnings -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-800">Rp {{ number_format($yearlyEarnings, 0, ',', '.') }}</span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1">Pendapatan Tahun Ini</h3>
                    <p class="text-xs text-slate-500">{{ now()->format('Y') }}</p>
                </div>

                <!-- Total Sales -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-800">{{ $totalSales }}</span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1">Jumlah Kelas Terjual</h3>
                    <p class="text-xs text-slate-500">Total penjualan</p>
                </div>
            </div>

            <!-- Balance & Withdrawal Section -->
            <div class="grid md:grid-cols-3 gap-6 mb-8 animate-fade-in-up animation-delay-300">
                <!-- Balance Info -->
                <div class="md:col-span-2 neu-flat p-6 rounded-2xl border border-white/50">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Informasi Saldo
                    </h2>
                    
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200">
                            <p class="text-xs text-slate-600 mb-1">Total Pendapatan</p>
                            <p class="text-lg font-bold text-green-600">Rp {{ number_format($affiliate->total_earnings, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl border border-amber-200">
                            <p class="text-xs text-slate-600 mb-1">Sedang Diproses</p>
                            <p class="text-lg font-bold text-amber-600">Rp {{ number_format($affiliate->pending_earnings, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl border border-blue-200">
                            <p class="text-xs text-slate-600 mb-1">Tersedia</p>
                            <p class="text-lg font-bold text-blue-600">Rp {{ number_format($affiliate->total_earnings - $affiliate->withdrawn_earnings - $affiliate->pending_earnings, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Withdrawal Form -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Pencairan
                    </h2>

                    <form action="{{ route('affiliates.withdrawal') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="amount" class="block text-sm font-semibold text-slate-700 mb-2">Jumlah Pencairan</label>
                            <input type="number" id="amount" name="amount" min="100000" step="1000" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all neu-flat">
                            <p class="text-xs text-slate-500 mt-1">Minimal Rp 100.000</p>
                            @error('amount')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Calculator Preview -->
                        <div class="bg-gradient-to-r from-slate-50 to-slate-100 border border-slate-200 rounded-xl p-4 text-sm">
                            <p class="font-semibold text-slate-700 mb-2">Estimasi Penerimaan:</p>
                            <div class="space-y-1 text-xs text-slate-600">
                                <div class="flex justify-between">
                                    <span>Jumlah Pencairan</span>
                                    <span id="calc-amount">Rp 0</span>
                                </div>
                                <div class="flex justify-between text-red-600">
                                    <span>PPN 11%</span>
                                    <span id="calc-tax">- Rp 0</span>
                                </div>
                                <div class="flex justify-between text-red-600">
                                    <span>Platform Fee 5%</span>
                                    <span id="calc-fee">- Rp 0</span>
                                </div>
                                <div class="border-t border-slate-300 pt-1 mt-1"></div>
                                <div class="flex justify-between font-bold text-green-600">
                                    <span>Yang Diterima</span>
                                    <span id="calc-net">Rp 0</span>
                                </div>
                            </div>
                        </div>

                        <button type="submit" 
                            class="w-full px-4 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl hover:shadow-lg hover:scale-[1.02] transition-all">
                            Ajukan Pencairan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Withdrawal History -->
            <div class="neu-flat p-6 rounded-2xl border border-white/50 mb-8 animate-fade-in-up animation-delay-400">
                <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Riwayat Pencairan
                </h2>

                @if($withdrawals->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-slate-200">
                                    <th class="text-left py-3 px-4 text-sm font-semibold text-slate-700">Tanggal</th>
                                    <th class="text-right py-3 px-4 text-sm font-semibold text-slate-700">Jumlah</th>
                                    <th class="text-right py-3 px-4 text-sm font-semibold text-slate-700">PPN 11%</th>
                                    <th class="text-right py-3 px-4 text-sm font-semibold text-slate-700">Fee 5%</th>
                                    <th class="text-right py-3 px-4 text-sm font-semibold text-slate-700">Diterima</th>
                                    <th class="text-center py-3 px-4 text-sm font-semibold text-slate-700">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdrawals as $withdrawal)
                                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                                        <td class="py-3 px-4 text-sm text-slate-600">{{ $withdrawal->created_at->format('d M Y') }}</td>
                                        <td class="py-3 px-4 text-sm text-slate-800 text-right font-semibold">Rp {{ number_format($withdrawal->amount, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 text-sm text-red-600 text-right">- Rp {{ number_format($withdrawal->tax_amount, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 text-sm text-red-600 text-right">- Rp {{ number_format($withdrawal->platform_fee, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 text-sm text-green-600 text-right font-bold">Rp {{ number_format($withdrawal->net_amount, 0, ',', '.') }}</td>
                                        <td class="py-3 px-4 text-center">
                                            @if($withdrawal->status === 'requested')
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-amber-100 text-amber-700">Diajukan</span>
                                            @elseif($withdrawal->status === 'processing')
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">Diproses</span>
                                            @elseif($withdrawal->status === 'completed')
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Sudah Cair</span>
                                            @else
                                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">Ditolak</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-slate-500">Belum ada riwayat pencairan</p>
                    </div>
                @endif
            </div>

            <!-- Recent Sales -->
            <div class="neu-flat p-6 rounded-2xl border border-white/50 animate-fade-in-up animation-delay-500">
                <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    Penjualan Terbaru
                </h2>

                @if($recentSales->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentSales as $sale)
                            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-slate-800">{{ $sale->registration->training->title ?? 'N/A' }}</h4>
                                    <p class="text-xs text-slate-500">{{ $sale->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-green-600">+ Rp {{ number_format($sale->commission_amount, 0, ',', '.') }}</p>
                                    <p class="text-xs text-slate-500">{{ $sale->commission_percentage }}% komisi</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <p class="text-slate-500">Belum ada penjualan</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        // Calculator for withdrawal
        const amountInput = document.getElementById('amount');
        const calcAmount = document.getElementById('calc-amount');
        const calcTax = document.getElementById('calc-tax');
        const calcFee = document.getElementById('calc-fee');
        const calcNet = document.getElementById('calc-net');

        amountInput.addEventListener('input', function() {
            const amount = parseFloat(this.value) || 0;
            const tax = amount * 0.11;
            const fee = amount * 0.05;
            const net = amount - tax - fee;

            calcAmount.textContent = 'Rp ' + amount.toLocaleString('id-ID');
            calcTax.textContent = '- Rp ' + tax.toLocaleString('id-ID');
            calcFee.textContent = '- Rp ' + fee.toLocaleString('id-ID');
            calcNet.textContent = 'Rp ' + net.toLocaleString('id-ID');
        });
    </script>
</x-layout-upventure>
