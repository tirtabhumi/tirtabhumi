<x-layout-upventure title="Payment Success - {{ $registration->training->title }}">
    <section class="pt-0 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">

                <!-- Breadcrumbs Stepper -->
                <div class="flex items-center justify-center mb-10 animate-fade-in-up">
                    <div class="flex items-center">
                        <!-- Step 1: Payment Details (Finished) -->
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
                        <div class="w-24 h-1 bg-indigo-200 -mt-6 mx-2"></div>

                        <!-- Step 2: Finish (Active) -->
                        <div class="flex flex-col items-center relative z-10">
                            <div
                                class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center shadow-lg shadow-indigo-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-bold text-indigo-600 mt-2">Finish</span>
                        </div>
                    </div>
                </div>

                <div class="text-center animate-fade-in-up animation-delay-100">
                    @if($registration->status == 'completed')
                        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ __('messages.payment_successful') }}</h1>
                        <p class="text-slate-500 max-w-lg mx-auto mb-10">
                            Thank you for your payment. Your registration for <span class="font-bold text-slate-800">{{ $registration->training->title }}</span> has been confirmed.
                            You can now access your class.
                        </p>
                        
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('my-classes.index') }}" class="px-8 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all">
                                {{ __('messages.access_my_classes') }}
                            </a>
                            <a href="{{ route('trainings.index') }}" class="px-8 py-3 bg-white text-indigo-600 font-bold rounded-xl border border-indigo-100 hover:bg-indigo-50 hover:-translate-y-1 transition-all">
                                {{ __('messages.browse_more') }}
                            </a>
                        </div>
                    @elseif($registration->status == 'cancelled')
                        <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6 text-red-500">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ __('messages.payment_failed_cancelled') }}</h1>
                        <p class="text-slate-500 max-w-lg mx-auto mb-10">
                            Your payment was cancelled or expired. Please try again.
                        </p>
                        <div class="flex justify-center gap-4">
                             <a href="{{ route('payment.show', $registration) }}" class="px-8 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all">
                                {{ __('messages.try_again') }}
                            </a>
                        </div>
                    @else
                        <div class="w-24 h-24 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6 text-orange-500 animate-pulse">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ __('messages.verifying_payment') }}</h1>
                        <p class="text-slate-500 max-w-lg mx-auto mb-10">
                            We are checking your payment status from Xendit. This usually takes a few seconds.
                            <br>Please click the button below to refresh status.
                        </p>
                         <div class="flex justify-center gap-4">
                            <a href="{{ route('payment.finish', $registration) }}" class="px-8 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all">
                                {{ __('messages.check_status_again') }}
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Order Summary (Optional, collapsed or smaller) -->
                <div class="mt-16 max-w-2xl mx-auto neu-flat rounded-2xl p-6 border border-white/50 opacity-75">
                    <h2 class="font-bold text-slate-800 mb-4 text-sm uppercase tracking-wider text-center">Receipt Summary</h2>
                    <div class="flex justify-between text-sm py-2 border-b border-slate-100">
                        <span class="text-slate-500">Transaction ID</span>
                        <span class="font-mono font-bold text-slate-700">{{ $registration->transaction_id }}</span>
                    </div>
                    <div class="flex justify-between text-sm py-2 border-b border-slate-100">
                        <span class="text-slate-500">Training</span>
                        <span class="font-bold text-slate-700">{{ $registration->training->title }}</span>
                    </div>
                    <div class="flex justify-between text-sm py-2 border-b border-slate-100">
                        <span class="text-slate-500">Amount Paid</span>
                        <span class="font-bold text-indigo-600">Rp {{ number_format($registration->total_amount ?? $registration->training->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm py-2">
                         <span class="text-slate-500">Date</span>
                         <span class="text-slate-700">{{ now()->format('d M Y, H:i') }}</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layout-upventure>
