<x-layout-upventure title="Dokumen Sedang Direview">
    
        <!-- Subdued Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-[10%] left-[10%] w-[30%] h-[30%] bg-indigo-500/10 rounded-full blur-[100px] animate-blob"></div>
            <div class="absolute bottom-[20%] right-[10%] w-[35%] h-[35%] bg-blue-500/10 rounded-full blur-[120px] animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 max-w-2xl">
            <!-- Tirta Bhumi Solid Neumorphic Card -->
            <div class="neu-flat p-12 md:p-20 rounded-[3rem] border border-white/60 text-center animate-fade-in">
                
                <!-- Status Icon with Glow -->
                <div class="relative inline-flex mb-12">
                    <div class="absolute inset-0 bg-indigo-500 rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <div class="relative w-28 h-28 bg-gradient-to-br from-indigo-50 to-white rounded-[2rem] shadow-[0_20px_40px_rgba(0,0,0,0.05)] border border-indigo-100 flex items-center justify-center -rotate-3 hover:rotate-0 transition-transform duration-500">
                        <svg class="w-14 h-14 text-indigo-600 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Headline (Tirta style font-black) -->
                <h1 class="text-4xl md:text-5xl font-black text-slate-800 mb-6 tracking-tight leading-tight">
                    {{ __('messages.documents_under_review') }}
                </h1>

                <!-- Body Text -->
                <p class="text-lg text-slate-500 font-medium mb-12 leading-relaxed max-w-lg mx-auto">
                    {!! __('messages.pending_affiliate_desc') !!}
                </p>

                <!-- Action Button (Tirta style CTA) -->
                <div class="flex flex-col items-center gap-8">
                   <a href="{{ route('dashboard') }}" class="group inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl text-sm transition-all duration-200 hover:bg-indigo-700 hover:shadow-md">
                    <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    {{ __('messages.back_to_dashboard') }}
                </a>

                <div class="flex items-center gap-3">
                    <span class="flex h-2 w-2 rounded-full bg-indigo-500 animate-ping"></span>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">
                        Proses Verifikasi Sedang Berjalan
                    </p>
                </div>
                </div>
            </div>
        </div>

    <style>
        .animate-spin-slow {
            animation: spin 10s linear infinite;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes blob {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(20px, -30px) scale(1.05); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }
        
        .animate-blob {
            animation: blob 10s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</x-layout-upventure>