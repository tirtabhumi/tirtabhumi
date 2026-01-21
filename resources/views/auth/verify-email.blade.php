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
                        <h1 class="text-3xl md:text-4xl font-bold text-slate-800 text-center md:text-left">Cek Email Anda!</h1>
                        <p class="text-slate-500 leading-relaxed text-center md:text-left">
                            Kami telah mengirimkan tautan verifikasi ke alamat email Anda. 
                            Silakan klik tautan tersebut untuk mengaktifkan akun.
                        </p>

                        <p class="text-slate-500 leading-relaxed text-center md:text-left mt-4">
                            Mohon menunggu hingga 5 menit. Apabila email belum diterima, silakan kirim ulang tautan verifikasi.
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

                            <p class="text-slate-600 mb-6 font-medium">Belum menerima email?</p>

                            <form method="POST" action="{{ route('verification.send') }}" x-data="{ 
                                    seconds: 120, 
                                    timer: null,
                                    init() { 
                                        this.timer = setInterval(() => {
                                            if (this.seconds > 0) {
                                                this.seconds--;
                                            } else {
                                                clearInterval(this.timer);
                                            }
                                        }, 1000);
                                    }
                                }">
                                @csrf
                                <button type="submit" 
                                        :disabled="seconds > 0"
                                        :class="{ '!opacity-50 !cursor-not-allowed': seconds > 0 }"
                                        class="w-full px-8 py-4 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                                    
                                    <!-- Countdown State -->
                                    <span x-show="seconds > 0" class="flex items-center gap-2">
                                        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Kirim ulang dalam <span x-text="seconds" class="tabular-nums"></span>d
                                    </span>
                                    
                                    <!-- Ready State -->
                                    <span x-show="seconds === 0">
                                        Kirim Ulang Email Verifikasi
                                    </span>
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                                @csrf
                                <button type="submit" class="inline-flex items-center justify-center gap-2 text-sm text-slate-500 hover:text-indigo-600 font-medium transition-colors group w-full">
                                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Kembali ke Halaman Login
                                </button>
                            </form>
                            


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout-auth>
