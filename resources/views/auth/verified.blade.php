<x-layout-auth title="Email Verified" :hideAuthSwitcher="true" :hideBackButton="true">
    <section class="w-full relative overflow-hidden flex items-center justify-center py-12 md:py-0">
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-green-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div
                class="neu-flat p-8 md:p-12 rounded-[2.5rem] border border-white/50 relative overflow-hidden max-w-lg mx-auto text-center transform transition-all hover:scale-[1.01]">

                <div
                    class="w-24 h-24 bg-green-100/80 rounded-full flex items-center justify-center text-green-600 mb-8 mx-auto shadow-sm animate-bounce-short">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <h1 class="text-3xl font-extrabold text-indigo-700 mb-4 tracking-tight">Email Verified!</h1>
                <p class="text-slate-500 mb-8 leading-relaxed">
                    Thank you, <span class="font-semibold text-slate-700">{{ $name ?? 'User' }}</span>. Your email has
                    been successfully verified. You can now access all dashboard features.
                </p>

                <div class="space-y-4">
                    <a href="{{ route('login') }}"
                        class="block w-full px-8 py-4 font-semibold rounded-xl text-center shadow-md transition-all hover:opacity-90 active:scale-95"
                        style="background-color: #1d4ed8 !important; color: #ffffff !important;">
                        {{ __('messages.continue_to_login') ?? 'Continue to Login / Dashboard' }}
                    </a>
                </div>

            </div>
        </div>
    </section>
</x-layout-auth>