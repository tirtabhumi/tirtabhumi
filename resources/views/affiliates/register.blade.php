@props(['errors' => $errors ?? new \Illuminate\Support\ViewErrorBag])
<x-layout-upventure title="Join UpVenture Affiliates">

        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 max-w-6xl">
            <!-- Header -->
            <div class="text-center mb-12 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-4">
                    {!! __('messages.join_affiliate', ['app' => '<span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">UpVenture Affiliates</span>']) !!}
                </h1>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    {{ __('messages.affiliate_commission_desc', ['commission' => 5]) }}
                </p>
            </div>

            <!-- Introduction Section -->
            <div class="neu-flat p-8 rounded-3xl border border-white/50 mb-8 animate-fade-in-up animation-delay-200">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    {{ __('messages.about_affiliate_program') }}
                </h2>

                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <!-- How it Works -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
                        <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ __('messages.how_it_works') }}
                        </h3>
                        <ol class="space-y-3 text-slate-600">
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-sm font-bold">1</span>
                                <span>{{ __('messages.step_1') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-sm font-bold">2</span>
                                <span>{{ __('messages.step_2') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-sm font-bold">3</span>
                                <span>{{ __('messages.step_3') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-sm font-bold">4</span>
                                <span>{{ __('messages.step_4') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <span
                                    class="flex-shrink-0 w-6 h-6 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center text-sm font-bold">5</span>
                                <span>{{ __('messages.step_5', ['commission' => 5]) }}</span>
                            </li>
                        </ol>
                    </div>

                    <!-- Benefits -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
                        <h3 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            {{ __('messages.benefits') }}
                        </h3>
                        <ul class="space-y-3 text-slate-600">
                            <li class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ __('messages.benefit_1', ['commission' => 5]) }}</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ __('messages.benefit_2') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ __('messages.benefit_3') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ __('messages.benefit_4') }}</span>
                            </li>
                            <li class="flex gap-3">
                                <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>{{ __('messages.benefit_5') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Withdrawal Info -->
                <div class="bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-6">
                    <h3 class="font-bold text-slate-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ __('messages.withdrawal_info') }}
                    </h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        {{ __('messages.withdrawal_deduction_desc') }}
                    </p>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="neu-flat p-8 rounded-3xl border border-white/50 animate-fade-in-up animation-delay-400">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 flex items-center gap-3">
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    {{ __('messages.registration_form') }}
                </h2>

                <form action="{{ route('affiliates.register') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- KTP Section -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
                        <h3 class="font-bold text-slate-800 mb-4">{{ __('messages.ktp_data') }}</h3>

                        <div class="mb-4">
                            <label for="ktp_name" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('messages.ktp_name_label') }} *</label>
                            <input type="text" id="ktp_name" name="ktp_name" value="{{ old('ktp_name', auth()->user()->name) }}" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat">
                            @error('ktp_name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="ktp_photo" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('messages.ktp_photo_label') }}
                                *</label>
                            <input type="file" id="ktp_photo" name="ktp_photo" accept="image/*" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat">
                            <p class="text-xs text-slate-500 mt-1">Format: JPG, PNG. Max: 2MB</p>
                            @error('ktp_photo')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Bank Account Section -->
                    <div class="neu-flat p-6 rounded-2xl border border-white/50">
                        <h3 class="font-bold text-slate-800 mb-4">{{ __('messages.bank_account_data') }}</h3>

                        <div class="mb-4">
                            <label for="bank_account_name" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('messages.bank_account_holder_label') }} *</label>
                            <input type="text" id="bank_account_name" name="bank_account_name"
                                value="{{ old('bank_account_name', auth()->user()->name) }}" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat">
                            <p class="text-xs text-slate-500 mt-1">{{ __('messages.must_match_ktp') }}</p>
                            @error('bank_account_name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="bank_name" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('messages.bank_name_label') }}
                                    *</label>
                                <select id="bank_name" name="bank_name" required
                                    class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat">
                                    <option value="">{{ __('messages.select_bank') }}</option>
                                    <option value="BCA" {{ old('bank_name') == 'BCA' ? 'selected' : '' }}>BCA</option>
                                    <option value="Mandiri" {{ old('bank_name') == 'Mandiri' ? 'selected' : '' }}>Mandiri
                                    </option>
                                    <option value="BNI" {{ old('bank_name') == 'BNI' ? 'selected' : '' }}>BNI</option>
                                    <option value="BRI" {{ old('bank_name') == 'BRI' ? 'selected' : '' }}>BRI</option>
                                    <option value="CIMB Niaga" {{ old('bank_name') == 'CIMB Niaga' ? 'selected' : '' }}>
                                        CIMB Niaga</option>
                                    <option value="Permata" {{ old('bank_name') == 'Permata' ? 'selected' : '' }}>Permata
                                    </option>
                                    <option value="Danamon" {{ old('bank_name') == 'Danamon' ? 'selected' : '' }}>Danamon
                                    </option>
                                    <option value="BTN" {{ old('bank_name') == 'BTN' ? 'selected' : '' }}>BTN</option>
                                    <option value="Lainnya" {{ old('bank_name') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                                @error('bank_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="bank_account_number"
                                    class="block text-sm font-semibold text-slate-700 mb-2">{{ __('messages.bank_account_number_label') }} *</label>
                                <input type="text" id="bank_account_number" name="bank_account_number"
                                    value="{{ old('bank_account_number') }}" required
                                    class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat">
                                @error('bank_account_number')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="bank_book_photo" class="block text-sm font-semibold text-slate-700 mb-2">{{ __('messages.bank_book_photo_label') }} *</label>
                            <input type="file" id="bank_book_photo" name="bank_book_photo" accept="image/*" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat">
                            <p class="text-xs text-slate-500 mt-1">Format: JPG, PNG. Max: 2MB</p>
                            @error('bank_book_photo')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <a href="{{ route('dashboard') }}"
                            class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold hover:bg-slate-50 transition-all">
                            {{ __('messages.back') }}
                        </a>
                        <button type="submit"
                            class="flex-1 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl hover:shadow-lg hover:scale-[1.02] transition-all">
                            {{ __('messages.register_now') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
</x-layout-upventure>