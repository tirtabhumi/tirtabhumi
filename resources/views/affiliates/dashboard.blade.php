<x-layout-upventure title="Affiliate Dashboard">
    <section class="min-h-screen pt-12 pb-24 relative overflow-hidden bg-[#eef2f6]">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-green-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 max-w-6xl">
            <!-- Breadcrumb -->
            <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('messages.back_to_dashboard') }}
                </a>
            </div>

            <!-- Header -->
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-slate-800 mb-2">{{ __('messages.affiliate_dashboard') }}</h1>
                <p class="text-slate-600">{{ __('messages.referral_code') }}: <span
                        class="font-mono font-bold text-indigo-600">{{ $affiliate->referral_code }}</span></p>
            </div>

            <!-- Referral Link Section -->
            <div class="neu-flat rounded-3xl border border-white/50 mb-10 group relative overflow-hidden animate-fade-in-up animation-delay-100">
                <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/5 rounded-full -mr-32 -mt-32 blur-3xl group-hover:bg-indigo-500/10 transition-all duration-500"></div>
                
                <div class="p-8 md:p-10 relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <h2 class="text-2xl font-black text-slate-800 mb-2 flex items-center gap-3">
                                <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                </div>
                                {{ __('messages.your_referral_link') }}
                            </h2>
                            <p class="text-sm text-slate-500 font-medium max-w-lg">{{ __('messages.share_link_desc') }}</p>
                        </div>

                        <div class="flex-1 w-full">
                            <div class="bg-white/80 backdrop-blur-sm p-2 rounded-2xl border-2 border-indigo-100 flex items-center gap-2 group-focus-within:border-indigo-500 transition-all shadow-sm">
                                <div class="px-4 py-2 bg-indigo-50 text-indigo-700 rounded-xl font-black text-xs uppercase tracking-widest hidden sm:block">URL</div>
                                <input type="text" id="referralLink" readonly
                                    value="{{ url('/upventure/list?ref=' . $affiliate->referral_code) }}"
                                    class="flex-1 bg-transparent border-none focus:ring-0 font-mono text-sm text-slate-600 py-3 lg:py-4">
                                <button type="button" onclick="copyReferralLink()"
                                    class="p-3 lg:p-4 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 hover:scale-105 active:scale-95 transition-all shadow-md flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Grid: Stats & Withdrawal -->
            <div class="grid md:grid-cols-3 gap-6 mb-8 animate-fade-in-up animation-delay-200">

                <!-- Total Sales Card -->
                <div class="neu-flat rounded-[2rem] border border-white/50 h-full flex flex-col relative overflow-hidden group transition-all duration-500 hover:shadow-2xl hover:shadow-blue-200/50">
                    <!-- Background Decor -->
                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-blue-100 rounded-full blur-3xl opacity-60 group-hover:bg-blue-200 group-hover:scale-110 transition-all duration-700"></div>
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500"></div>
                    
                    <div class="p-8 flex-1 flex flex-col items-center">
                        <div class="flex items-center gap-4 mb-8 w-full">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-blue-100 flex items-center justify-center text-blue-600 rotate-3 group-hover:rotate-12 transition-all duration-500">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-slate-800 tracking-tight uppercase text-xs">{{ __('messages.total_sales') }}</h3>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                    <p class="text-[10px] text-blue-600 font-black uppercase tracking-widest">Performance</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full mb-8 flex-1 flex flex-col justify-center">
                            <div class="neu-pressed p-8 relative overflow-hidden text-center group/card transition-all hover:scale-[0.99]">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-3 text-blue-700/60">{{ __('messages.sales_via_link') }}</p>
                                <div class="flex items-center justify-center gap-2 mb-4">
                                    <span class="text-6xl font-black tracking-tighter text-blue-600/90">{{ $totalSales }}</span>
                                    <span class="text-sm font-bold text-blue-400 uppercase tracking-widest">Units</span>
                                </div>
                                <div class="py-2 px-4 neu-flat rounded-xl inline-block">
                                    <p class="text-[10px] font-black text-blue-500/70 uppercase tracking-widest">100% Verified Sales</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full mt-auto">
                            <a href="{{ route('affiliates.sales') }}"
                                class="w-full py-4 bg-white/50 hover:bg-blue-600 text-blue-700 hover:text-white text-xs font-black rounded-2xl transition-all duration-300 flex items-center justify-center gap-2 group border border-blue-100/50 shadow-sm">
                                <span>{{ __('messages.view_order_details') }}</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Wallet & Withdrawal separated but in same 2-col span -->
                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Points Wallet Card -->
                    <div class="neu-flat rounded-[2rem] border border-white/50 p-8 flex flex-col relative overflow-hidden group">
                        <div class="flex items-center gap-4 mb-10">
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-50 to-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-emerald-100 flex items-center justify-center text-emerald-600 -rotate-3 group-hover:rotate-0 transition-all duration-500">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-slate-800 tracking-tight uppercase text-xs">{{ __('messages.points_wallet') }}</h3>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <p class="text-[10px] text-emerald-600 font-black uppercase tracking-widest">{{ __('messages.available_points') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-10 flex-1 flex flex-col justify-center">
                            <div class="neu-pressed p-8 relative overflow-hidden group/wallet text-center transition-all hover:scale-[0.99]">
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] mb-3 text-emerald-700/60">{{ __('messages.total_earnings') }}</p>
                                <div class="flex items-center justify-center gap-2 mb-4">
                                     <span class="text-6xl font-black tracking-tighter text-emerald-600/90">
                                        {{ number_format($affiliate->total_points - $affiliate->withdrawn_points - $affiliate->pending_points, 0, ',', '.') }}
                                    </span>
                                    <span class="text-sm font-bold text-emerald-400 uppercase tracking-widest">Points</span>
                                </div>
                                <div class="py-2 px-4 neu-flat rounded-xl inline-block">
                                    <p class="text-[10px] font-black text-emerald-600/70 uppercase tracking-widest">
                                        {{ __('messages.points_to_idr') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-auto">
                            <a href="{{ route('affiliates.points') }}"
                                class="w-full py-4 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-xs font-black rounded-2xl transition-all duration-300 flex items-center justify-center gap-2 group border border-emerald-100">
                                <span>{{ __('messages.view_points_history') }}</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Withdrawal Card -->
                    <div class="neu-flat rounded-[2rem] border border-white/50 p-8 flex flex-col justify-center relative overflow-hidden group">
                        <div class="flex items-center gap-4 mb-10">
                            <div class="w-14 h-14 bg-blue-50 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-blue-100 flex items-center justify-center text-blue-600 -rotate-3 group-hover:rotate-0 transition-all duration-500">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black text-slate-800 tracking-tight uppercase text-xs">{{ __('messages.withdraw_points') }}</h3>
                                <div class="flex items-center gap-1.5 mt-1">
                                    <span class="flex h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                    <p class="text-[10px] text-blue-600 font-black uppercase tracking-widest">Transfer Out</p>
                                </div>
                            </div>
                        </div>

                        <form id="withdrawalForm" action="{{ route('affiliates.withdrawal') }}" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label for="amount" class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 block">{{ __('messages.withdrawal_amount') }}</label>
                                <div class="flex items-center w-full rounded-2xl neu-pressed group overflow-hidden transition-all focus-within:ring-4 focus-within:ring-blue-100">
                                    <div class="w-24 flex items-center justify-center text-slate-400 font-black text-sm transition-colors group-focus-within:text-blue-600 select-none border-r border-slate-200/50">
                                        Rp
                                    </div>
                                    <input type="number" id="amount" name="amount"
                                        min="{{ config('affiliate.min_withdrawal', 100000) }}" step="1000" required
                                        placeholder="{{ __('messages.min_withdrawal') }}"
                                        class="flex-1 border-none focus:ring-0 py-4 px-10 text-base font-black text-slate-800 placeholder:text-slate-300 placeholder:font-bold bg-transparent">
                                </div>
                                @error('amount')
                                    <p class="text-red-600 text-[10px] font-bold mt-2 ml-1 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <button type="button" onclick="showConfirmationModal()"
                                class="w-full py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-black rounded-2xl hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition-all text-sm flex items-center justify-center gap-3 shadow-lg shadow-blue-100">
                                <span>{{ __('messages.apply_withdrawal') }}</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </button>
                            
                            <div class="bg-indigo-50/30 p-4 rounded-2xl border border-indigo-100/20 space-y-2">
                                <div class="flex items-start gap-2 text-[10px] leading-relaxed">
                                    <svg class="w-3.5 h-3.5 text-indigo-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="text-indigo-600/70 font-medium">
                                        <p>{{ __('messages.fee_deduction_note') }}</p>
                                        <p class="font-bold border-t border-indigo-100/30 mt-1 pt-1">{{ __('messages.processing_time_note') }}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>

            <!-- Confirmation Modal -->
            <div id="confirmationModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <!-- Background backdrop -->
                <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm transition-opacity opacity-0"
                    id="modalBackdrop"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <!-- Modal panel -->
                        <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg scale-95 opacity-0"
                            id="modalPanel">
                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                            {{ __('messages.confirm_withdrawal') }}
                                        </h3>
                                        <div class="mt-4 space-y-3">
                                            <div class="flex justify-between text-sm">
                                                <span
                                                    class="text-slate-500">{{ __('messages.withdrawal_amount_label') }}:</span>
                                                <span class="font-semibold text-slate-800" id="modalAmount">Rp 0</span>
                                            </div>
                                            <div class="flex justify-between text-sm text-red-500">
                                                <span>{{ __('messages.tax_deduction') }}:</span>
                                                <span id="modalTax">- Rp 0</span>
                                            </div>
                                            <div class="flex justify-between text-sm text-red-500">
                                                <span>{{ __('messages.platform_fee') }}:</span>
                                                <span id="modalFee">- Rp 0</span>
                                            </div>
                                            <div
                                                class="border-t border-dashed border-slate-300 pt-3 flex justify-between font-bold text-lg">
                                                <span
                                                    class="text-blue-700">{{ __('messages.total_received') }}:</span>
                                                <span class="text-blue-700" id="modalNet">Rp 0</span>
                                            </div>
                                            <div class="bg-blue-50 p-3 rounded-lg mt-3">
                                                <p class="text-[11px] text-blue-700 flex gap-2">
                                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    {{ __('messages.transfer_info_desc', ['bank' => $affiliate->bank_name, 'number' => $affiliate->bank_account_number, 'name' => $affiliate->bank_account_holder]) }}
                                                </p>
                                            </div>
                                            <p class="text-xs text-slate-400 mt-2">
                                                {{ __('messages.withdrawal_agreement') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-slate-50 px-6 py-4 flex flex-col sm:flex-row-reverse gap-3">
                                <button type="button" onclick="submitWithdrawal()"
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-4 text-xs font-black text-white shadow-lg shadow-blue-100 hover:from-blue-700 hover:to-indigo-700 transition-all uppercase tracking-widest whitespace-nowrap">
                                    {{ __('messages.yes_withdraw') }}
                                </button>
                                <button type="button" onclick="closeConfirmationModal()"
                                    class="flex-1 sm:flex-none inline-flex items-center justify-center rounded-2xl bg-white px-8 py-4 text-xs font-black text-slate-500 shadow-sm border border-slate-200 hover:bg-slate-50 transition-all uppercase tracking-widest whitespace-nowrap">
                                    {{ __('messages.cancel') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        // Affiliate Config
        const affiliateConfig = {
            minWithdrawal: {{ config('affiliate.min_withdrawal', 100000) }},
            taxRate: {{ config('affiliate.tax_rate', 0.11) }},
            feeRate: {{ config('affiliate.platform_fee_rate', 0.05) }}
        };

        // Copy referral link to clipboard
        function copyReferralLink() {
            const input = document.getElementById('referralLink');
            input.select();
            input.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(input.value).then(() => {
                const button = event.target.closest('button');
                const originalHTML = button.innerHTML;
                button.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                button.classList.add('bg-green-600');

                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.classList.remove('bg-green-600');
                }, 2000);
            }).catch(err => {
                alert('Gagal menyalin link');
            });
        }

        // Format Currency
        function formatRupiah(amount) {
            return 'Rp ' + amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // Confirmation Modal Logic
        function showConfirmationModal() {
            const amountInput = document.getElementById('amount');
            const amount = parseFloat(amountInput.value);

            if (!amount || amount < affiliateConfig.minWithdrawal) {
                alert('Minimal pencairan adalah ' + formatRupiah(affiliateConfig.minWithdrawal));
                return;
            }

            // Calculate fees
            const tax = amount * affiliateConfig.taxRate;
            const fee = amount * affiliateConfig.feeRate;
            const net = amount - tax - fee;

            // Update modal Content
            document.getElementById('modalAmount').textContent = formatRupiah(amount);
            document.getElementById('modalTax').textContent = '- ' + formatRupiah(Math.round(tax));
            document.getElementById('modalFee').textContent = '- ' + formatRupiah(Math.round(fee));
            document.getElementById('modalNet').textContent = formatRupiah(Math.round(net));

            // Show Modal
            const modal = document.getElementById('confirmationModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            modal.classList.remove('hidden');
            // Small delay for animation
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                panel.classList.remove('opacity-0', 'scale-95');
                panel.classList.add('opacity-100', 'scale-100');
            }, 10);
        }

        function closeConfirmationModal() {
            const modal = document.getElementById('confirmationModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            backdrop.classList.add('opacity-0');
            panel.classList.remove('opacity-100', 'scale-100');
            panel.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function submitWithdrawal() {
            document.getElementById('withdrawalForm').submit();
        }
    </script>
</x-layout-upventure>