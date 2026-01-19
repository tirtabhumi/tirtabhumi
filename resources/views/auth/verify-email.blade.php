<x-layout-auth title="Verify Email" :hideAuthSwitcher="true" :hideBackButton="true">
    <!-- Contact-style Background -->
    <section class="w-full relative overflow-hidden flex items-center justify-center py-12 md:py-0">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
             <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
             <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
             <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Unified Container -->
            <div class="neu-flat p-8 md:p-12 rounded-[2.5rem] border border-white/50 relative overflow-hidden max-w-4xl mx-auto mt-20 md:mt-0">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    
                    <!-- Left Column: Illustration/Text -->
                    <div class="space-y-6 animate-fade-in-up">
                        <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 mb-6 mx-auto md:mx-0">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-800 text-center md:text-left">Check Your Inbox!</h1>
                        <p class="text-slate-500 leading-relaxed text-center md:text-left">
                            We've sent a verification link to the email address you provided. Please click the link to verify your account.
                        </p>
                    </div>

                    <!-- Right Column: Actions -->
                    <div class="space-y-8 animate-fade-in-up animation-delay-200">
                        <div class="bg-white/70 rounded-3xl p-8 border border-white/60 shadow-lg backdrop-blur-md text-center">
                            
                            @if (session('message'))
                                <div class="mb-6 text-sm font-medium text-green-600 bg-green-100 border border-green-400 rounded-xl p-4">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <p class="text-slate-600 mb-6 font-medium">Didn't receive the email?</p>

                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="w-full px-8 py-4 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all">
                                    Resend Verification Email
                                </button>
                            </form>
                            


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout-auth>
