<x-layout-upventure title="Affiliate Dashboard">
    <section class="pt-16 pb-24 bg-[#eef2f6] relative overflow-hidden min-h-screen">
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
            <div class="neu-flat p-6 rounded-2xl border border-white/50 mb-8 animate-fade-in-up animation-delay-100">
                <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                        </path>
                    </svg>
                    {{ __('messages.your_referral_link') }}
                </h2>

                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-200 rounded-xl p-4">
                    <p class="text-sm text-slate-600 mb-2">{{ __('messages.share_link_desc') }}</p>
                    <div class="flex gap-2">
                        <input type="text" id="referralLink" readonly
                            value="{{ url('/upventure/list?ref=' . $affiliate->referral_code) }}"
                            class="flex-1 px-4 py-2 rounded-lg border border-indigo-300 bg-white font-mono text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <button type="button" onclick="copyReferralLink()"
                            class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:shadow-lg hover:scale-105 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Main Grid: Stats & Withdrawal -->
            <div class="grid md:grid-cols-3 gap-6 mb-8 animate-fade-in-up animation-delay-200">

                <!-- Total Sales Card -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50 h-full flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            {{ __('messages.total_sales') }}
                        </h3>

                        <div
                            class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border border-blue-100 mb-4">
                            <p class="text-xs text-slate-500 mb-1">{{ __('messages.sales_via_link') }}</p>
                            <p class="text-3xl font-bold text-slate-800">{{ $totalSales }}</p>
                            <p class="text-xs text-blue-600 font-medium mt-1">Transactions</p>
                        </div>
                    </div>

                    <a href="{{ route('affiliates.sales') }}"
                        class="w-full px-3 py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 text-sm font-semibold rounded-lg transition-all flex items-center justify-center gap-2 group mb-1">
                        <span>{{ __('messages.view_order_details') }}</span>
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>

                <!-- Combined Wallet & Withdrawal Card -->
                <div class="md:col-span-2 neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex flex-col md:flex-row gap-8 h-full">
                        <!-- Left: Points Info -->
                        <div
                            class="flex-1 flex flex-col justify-between border-b md:border-b-0 md:border-r border-slate-100 pb-6 md:pb-0 md:pr-6">
                            <div>
                                <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    {{ __('messages.points_wallet') }}
                                </h3>
                                <div
                                    class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border border-green-100 mb-4">
                                    <p class="text-xs text-slate-500 mb-1">{{ __('messages.available_points') }}</p>
                                    <p class="text-3xl font-bold text-slate-800">
                                        {{ number_format($affiliate->total_points - $affiliate->withdrawn_points - $affiliate->pending_points, 0, ',', '.') }}
                                    </p>
                                    <p class="text-xs text-emerald-600 font-medium mt-1">
                                        {{ __('messages.points_to_idr') }}
                                    </p>
                                </div>
                            </div>

                            <a href="{{ route('affiliates.points') }}"
                                class="w-full px-3 py-2 bg-green-50 hover:bg-green-100 text-green-600 text-sm font-semibold rounded-lg transition-all flex items-center justify-center gap-2 group">
                                <span>{{ __('messages.view_points_history') }}</span>
                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Right: Withdrawal Form -->
                        <div class="flex-1 flex flex-col justify-center">
                            <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                {{ __('messages.withdraw_points') }}
                            </h3>

                            <form id="withdrawalForm" action="{{ route('affiliates.withdrawal') }}" method="POST"
                                class="space-y-4">
                                @csrf
                                <div>
                                    <label for="amount"
                                        class="text-sm font-bold text-slate-700 mb-2 block">{{ __('messages.withdrawal_amount') }}</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 font-semibold text-base">Rp</span>
                                        <input type="number" id="amount" name="amount"
                                            min="{{ config('affiliate.min_withdrawal', 100000) }}" step="1000" required
                                            placeholder="{{ __('messages.min_withdrawal') }}"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border-2 border-slate-300 bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 transition-all text-base font-bold text-slate-800 placeholder:text-slate-400 placeholder:font-normal">
                                    </div>
                                    @error('amount')
                                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="button" onclick="showConfirmationModal()"
                                    class="w-full px-6 py-4 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 hover:shadow-xl hover:scale-[1.02] transition-all text-base flex items-center justify-center gap-2 shadow-lg">
                                    <span>{{ __('messages.apply_withdrawal') }}</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </button>
                                <div class="text-center space-y-1.5 mt-3">
                                    <p class="text-xs text-slate-500 font-medium">
                                        {{ __('messages.fee_deduction_note') }}
                                    </p>
                                    <p class="text-xs text-slate-600 font-semibold">
                                        {{ __('messages.processing_time_note') }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        {{ __('messages.transfer_to_registered_account_note') }}
                                    </p>
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
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-purple-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24"
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
                                                    class="text-purple-700">{{ __('messages.total_received') }}:</span>
                                                <span class="text-purple-700" id="modalNet">Rp 0</span>
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
                            <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" onclick="submitWithdrawal()"
                                    class="inline-flex w-full justify-center rounded-lg bg-purple-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 sm:ml-3 sm:w-auto">
                                    {{ __('messages.yes_withdraw') }}
                                </button>
                                <button type="button" onclick="closeConfirmationModal()"
                                    class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
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