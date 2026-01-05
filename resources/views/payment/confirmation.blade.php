<x-layout-upventure title="Payment Confirmation - {{ $registration->training->title }}">
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">

                <!-- Breadcrumbs Stepper -->
                <div class="flex items-center justify-center mb-10 animate-fade-in-up">
                    <div class="flex items-center">
                        <!-- Step 1: Payment Details (Finished/Active) -->
                        <div class="flex flex-col items-center relative z-10">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-indigo-600 mt-2">Payment Details</span>
                        </div>

                        <!-- Connector -->
                        <div class="w-16 h-1 bg-indigo-200 -mt-6 mx-2"></div>

                        <!-- Step 2: Payment Confirmation (Active) -->
                        <div class="flex flex-col items-center relative z-10">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-indigo-600 mt-2">Confirmation</span>
                        </div>

                        <!-- Connector -->
                        <div class="w-16 h-1 bg-slate-200 -mt-6 mx-2"></div>

                        <!-- Step 3: Finish -->
                        <div class="flex flex-col items-center relative z-10 opacity-50">
                            <div
                                class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-slate-500 mt-2">Finish</span>
                        </div>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-slate-800 mb-8 text-center animate-fade-in-up animation-delay-100">
                    Waiting for Payment
                </h1>

                <div class="grid md:grid-cols-2 gap-8">

                    <!-- Order Summary -->
                    <div class="space-y-6 animate-fade-in-up">
                        <div class="neu-flat rounded-2xl p-6 border border-white/50">
                            <h2 class="font-bold text-slate-800 mb-4 text-lg">Order Summary</h2>

                            <div class="flex items-start gap-4 mb-6">
                                <div
                                    class="w-20 h-20 rounded-xl overflow-hidden neu-pressed bg-indigo-50 flex-shrink-0">
                                    @if($registration->training->image)
                                        <img src="{{ Storage::url($registration->training->image) }}" alt="Training"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-indigo-300">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-800 line-clamp-2">
                                        {{ $registration->training->title }}
                                    </h3>
                                    <p class="text-xs text-slate-500 mt-1">
                                        {{ $registration->training->event_date->format('d F Y, H:i') }} WIB
                                    </p>
                                    @if($registration->training->category == 'class')
                                        <span
                                            class="inline-block px-2 py-0.5 mt-2 text-[10px] font-bold tracking-wider uppercase text-indigo-600 bg-indigo-100 rounded-md">Class</span>
                                    @else
                                        <span
                                            class="inline-block px-2 py-0.5 mt-2 text-[10px] font-bold tracking-wider uppercase text-purple-600 bg-purple-100 rounded-md">Webinar</span>
                                    @endif
                                </div>
                            </div>

                            <div class="border-t border-slate-200/50 pt-4 space-y-2">
                                <div class="flex justify-between text-sm text-slate-600">
                                    <span>Subtotal</span>
                                    <span>Rp {{ number_format($registration->training->price, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-sm text-slate-600">
                                    <span>Admin Fee</span>
                                    <span>Rp {{ number_format($registration->admin_fee, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between font-bold text-lg text-slate-800 pt-2">
                                    <span>Total Payment</span>
                                    <span class="text-indigo-600">Rp
                                        {{ number_format($registration->total_amount, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Transaction Details -->
                        <div class="neu-flat rounded-2xl p-6 border border-white/50">
                            <h2 class="font-bold text-slate-800 mb-4 text-xs uppercase tracking-wider">Transaction Info
                            </h2>
                            <div class="text-sm text-slate-600 space-y-3">
                                <div class="flex justify-between">
                                    <span>Transaction ID</span>
                                    <span
                                        class="font-mono font-bold text-slate-800">{{ $registration->transaction_id }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Status</span>
                                    @if($registration->payment_status == 'paid')
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-600 font-bold rounded text-xs uppercase">Paid</span>
                                    @else
                                        <span
                                            class="px-2 py-1 bg-orange-100 text-orange-600 font-bold rounded text-xs uppercase">Unpaid</span>
                                    @endif
                                </div>

                                <div class="flex justify-between items-center pt-2 gap-4">
                                    <button onclick="window.location.reload()"
                                        class="text-xs font-bold text-indigo-600 flex items-center hover:text-indigo-700 transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                        Check Payment Status
                                    </button>

                                    <button
                                        onclick="if(confirm('Apakah kamu yakin ingin membatalkan transaksi ini? Kamu dapat membuat transaksi menggunakan metode pembayaran lainnya.')) { window.location.href = '{{ route('payment.show', $registration) }}'; }"
                                        class="text-[10px] font-bold text-red-600 hover:text-red-700 transition-colors border-b border-dashed border-red-600 hover:border-red-700">
                                        Cancel Payment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Instruction (Right Column) -->
                    <div class="animate-fade-in-up animation-delay-200">
                        <div
                            class="neu-flat rounded-2xl p-6 border border-white/50 h-full flex flex-col relative overflow-hidden">

                            <!-- Countdown Header -->
                            <div class="bg-indigo-600 -mx-6 -mt-6 p-6 mb-6 text-white text-center">
                                <p class="text-sm opacity-90 mb-1">Complete payment in</p>
                                <div class="text-3xl font-bold font-mono" id="countdown">
                                    --:--:--
                                </div>
                                <p class="text-xs mt-2 opacity-75">Before
                                    {{ $registration->payment_expiry_time->format('d M Y, H:i') }} WIB
                                </p>
                            </div>

                            <div class="flex-grow">
                                <div class="flex justify-between items-center mb-2">
                                    <h2 class="font-bold text-slate-800 text-lg">Payment Instruction</h2>
                                    <a href="#"
                                        class="text-xs font-bold text-indigo-600 hover:underline flex items-center">
                                        How to pay?
                                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <p class="text-sm text-slate-500 mb-6">Please complete your payment before the time
                                    expires.</p>

                                <div class="space-y-6">
                                    <!-- Selected Method Display -->
                                    <div class="flex items-center gap-4 p-4 rounded-xl neu-flat border border-white/50">
                                        @php
                                            $methodName = match ($registration->payment_method) {
                                                'bca_va' => 'Bank BCA Virtual Account',
                                                'mandiri_va' => 'Bank Mandiri Virtual Account',
                                                'bri_va' => 'Bank BRI Virtual Account',
                                                'ovo' => 'OVO',
                                                'dana' => 'DANA',
                                                default => 'Unknown Method'
                                            };
                                            $logo = match ($registration->payment_method) {
                                                'bca_va' => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg',
                                                'mandiri_va' => 'https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg',
                                                'bri_va' => 'https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg',
                                                'ovo' => 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg',
                                                'dana' => 'https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg',
                                                default => ''
                                            };
                                        @endphp
                                        <div
                                            class="w-12 h-12 flex items-center justify-center p-1 bg-slate-50 rounded-lg">
                                            @if($logo)
                                                <img src="{{ $logo }}" alt="Logo" class="max-h-full max-w-full">
                                            @endif
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-500 font-bold uppercase">Method</p>
                                            <p class="font-bold text-slate-800">{{ $methodName }}</p>
                                        </div>
                                    </div>

                                    <!-- Virtual Account / Payment Code -->
                                    <div class="text-center">
                                        <p class="text-sm text-slate-500 mb-2">Virtual Account Number / Payment Code</p>
                                        <div class="neu-pressed rounded-xl p-4 flex items-center justify-between group cursor-pointer transition-colors"
                                            onclick="copyToClipboard('8800123456789')">
                                            <span
                                                class="font-mono text-2xl font-bold text-indigo-700 tracking-wider">8800
                                                1234 5678 9</span>
                                            <span class="text-indigo-400 group-hover:text-indigo-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                        <p class="text-xs text-indigo-500 mt-2">Click to copy</p>
                                    </div>

                                    <!-- Total Amount Large -->
                                    <div class="text-center pt-4 border-t border-slate-100">
                                        <p class="text-sm text-slate-500 mb-1">Total to Pay</p>
                                        <p class="text-3xl font-bold text-slate-800">Rp
                                            {{ number_format($registration->total_amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-12">
                                <a href="{{ route('trainings.index') }}"
                                    class="block w-full text-center py-4 neu-btn text-indigo-600 font-bold rounded-xl active:neu-pressed transition-all">
                                    Back to Home
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        // Countdown Timer
        const expiryTime = new Date("{{ $registration->payment_expiry_time }}").getTime();

        const countdownInterval = setInterval(function () {
            const now = new Date().getTime();
            const distance = expiryTime - now;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "EXPIRED";
                return;
            }

            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML =
                (hours < 10 ? "0" + hours : hours) + ":" +
                (minutes < 10 ? "0" + minutes : minutes) + ":" +
                (seconds < 10 ? "0" + seconds : seconds);

        }, 1000);

        // Copy to clipboard
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert("Copied to clipboard!");
            });
        }
    </script>
</x-layout-upventure>