<x-layout-upventure title="My Certificates">
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-yellow-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-orange-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <div class="mb-8">
                <a href="/dashboard" class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-lg font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Dashboard
                </a>
            </div>

            <div class="text-center mb-16 animate-fade-in-up">
                <div class="inline-flex items-center justify-center p-4 bg-yellow-100 rounded-full mb-6 text-yellow-600">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    My Certificates
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    Showcase your achievements and download your earned certificates
                </p>
            </div>

            <div class="max-w-6xl mx-auto animate-fade-in-up animation-delay-100">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($registrations as $registration)
                        <div class="neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group relative">
                            <!-- Certificate Preview Mockup -->
                            <div class="aspect-[1.414/1] bg-slate-100 relative p-4 overflow-hidden group-hover:bg-slate-50 transition-colors">
                                <div class="w-full h-full border-4 border-double border-slate-200 bg-white shadow-sm flex flex-col items-center justify-center p-4 text-center">
                                    <div class="w-12 h-12 mb-2 opacity-50">
                                        <x-logo class="w-full h-full text-slate-300" />
                                    </div>
                                    <div class="h-1 w-16 bg-slate-200 mb-2"></div>
                                    <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-1">Certificate</h3>
                                    <h4 class="text-[10px] text-slate-500 line-clamp-2 px-4">{{ $registration->training->title }}</h4>
                                    <div class="mt-4 flex justify-between w-full px-2">
                                        <div class="h-8 w-8 bg-slate-100 rounded"></div>
                                        <div class="h-px w-12 bg-slate-200 self-end mb-2"></div>
                                    </div>
                                </div>
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors"></div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-1">{{ $registration->training->title }}</h3>
                                <p class="text-slate-500 text-sm mb-6">Completed on {{ $registration->updated_at->format('d M Y') }}</p>
                                
                                <a href="{{ route('my-classes.certificate', $registration->training_id) }}" target="_blank" 
                                   class="block w-full neu-btn py-3 text-center font-bold text-indigo-600 rounded-xl hover:bg-indigo-50 transition-colors flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Download Certificate
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="neu-flat rounded-3xl p-16 text-center border border-white/50">
                                <div class="inline-block p-6 bg-slate-100 rounded-full mb-6">
                                    <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-700 mb-3">No Certificates Yet</h3>
                                <p class="text-slate-500 mb-8 max-w-md mx-auto">Complete your classes to earn certificates.</p>
                                <a href="{{ route('my-classes.index') }}" class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-block">
                                    Go to My Classes
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</x-layout-upventure>
