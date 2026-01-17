<x-layout-upventure title="Dokumen Sedang Direview">
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen flex items-center">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-amber-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-orange-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 max-w-2xl">
            <div class="neu-flat p-12 rounded-3xl border border-white/50 text-center animate-fade-in-up">
                <!-- Icon -->
                <div
                    class="inline-flex p-6 bg-gradient-to-br from-amber-400 to-orange-500 rounded-3xl mb-6 animate-pulse">
                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-slate-800 mb-4">
                    {{ __('messages.documents_under_review') }}
                </h1>

                <!-- Description -->
                <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                    {!! __('messages.pending_affiliate_desc') !!}
                </p>

                <!-- Info Box -->
                <div
                    class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-6 mb-8 text-left">
                    <h3 class="font-bold text-slate-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ __('messages.what_you_need_to_know') }}
                    </h3>
                    <ul class="space-y-2 text-sm text-slate-700">
                        <li class="flex gap-2">
                            <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ __('messages.review_time_desc') }}</span>
                        </li>
                        <li class="flex gap-2">
                            <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ __('messages.email_notification_desc') }}</span>
                        </li>
                        <li class="flex gap-2">
                            <svg class="w-5 h-5 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ __('messages.ensure_valid_data_desc') }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Button -->
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl hover:shadow-lg hover:scale-[1.02] transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('messages.back_to_dashboard') }}
                </a>
            </div>
        </div>
    </section>
</x-layout-upventure>