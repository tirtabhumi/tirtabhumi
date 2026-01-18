<x-layout-upventure title="Payment - {{ $registration->training->title }}">
    <section class="pt-4 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">

                <!-- Breadcrumbs Stepper -->
                <style>
                    /* Force selected state styles to bypass potential build issues */
                    input[type="radio"]:checked+label {
                        background-color: #eef2f6 !important;
                        /* Reset to default grey */
                        border-color: transparent !important;
                        /* Remove purple border */
                        box-shadow: inset 6px 6px 12px #d1d9e6, inset -6px -6px 12px #ffffff !important;
                        /* Pressed effect */
                    }

                    /* Ensure hover effects are disabled when selected */
                    input[type="radio"]:checked+label:hover {
                        transform: none !important;
                        box-shadow: inset 6px 6px 12px #d1d9e6, inset -6px -6px 12px #ffffff !important;
                    }
                </style>

                <div class="mb-4 animate-fade-in-up">
                    <a href="{{ route('trainings.show', $registration->training->slug) }}" class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Learning Details
                    </a>
                </div>

                <div class="flex items-center justify-center mb-10 animate-fade-in-up">
                    <div class="flex items-center">
                        <!-- Step 1: Payment Details (Active) -->
                        <div class="flex flex-col items-center relative z-10">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-indigo-600 mt-2">Details</span>
                        </div>

                        <!-- Connector -->
                        <div class="w-24 h-1 bg-slate-200 -mt-6 mx-2"></div>

                        <!-- Step 2: Finish -->
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
                    Complete Your Payment
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
                                        @if($registration->training->event_date)
                                            {{ $registration->training->event_date->format('d F Y, H:i') }} WIB
                                        @else
                                            Self-paced Access
                                        @endif
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
                                    <span>Rp 0</span>
                                </div>
                                <div class="flex justify-between font-bold text-lg text-slate-800 pt-2">
                                    <span>Total</span>
                                    <span class="text-indigo-600">Rp
                                        {{ number_format($registration->training->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- User Details -->
                        <div class="neu-flat rounded-2xl p-6 border border-white/50">
                            <h2 class="font-bold text-slate-800 mb-4 text-xs uppercase tracking-wider">Billed To</h2>
                            <div class="text-sm text-slate-600">
                                <p class="font-bold text-slate-800">{{ $registration->name }}</p>
                                <p>{{ $registration->email }}</p>
                                <p>{{ $registration->phone }}</p>
                                @if($registration->institution)
                                    <p class="mt-2 text-slate-500">{{ $registration->institution }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Payment Methods -->
                    <form action="{{ route('payment.process', $registration) }}" method="POST" target="_blank"
                        class="space-y-6 animate-fade-in-up animation-delay-200">
                        @csrf
                        <div class="neu-flat rounded-2xl p-6 border border-white/50">
                            <h2 class="font-bold text-slate-800 mb-6 text-lg">Payment Method</h2>
                            
                            <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 mb-6">
                                <p class="text-sm text-indigo-800">
                                    You will be redirected to Xendit secure payment page to complete your transaction. 
                                    Multiple payment methods available (Virtual Account, E-Wallet, QRIS, etc).
                                </p>
                            </div>

                            <div class="mt-4">
                                <button type="submit"
                                    class="w-full py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white rounded-xl font-bold text-lg transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5">
                                    Pay with Xendit
                                </button>
                                <p class="text-center text-xs text-slate-400 mt-4 flex items-center justify-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                    Secured by Xendit
                                </p>
                            </div>
                        </div>
                </div>
                </form>
            </div>

        </div>
        </div>
    </section>
</x-layout-upventure>