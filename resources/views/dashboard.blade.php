<x-layout-upventure title="Dashboard">
    <!-- Main Background -->
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-1/2 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">

            <!-- Dashboard Header -->
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-slate-800">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-slate-500 mt-2">Here's what's happening with your learning journey.</p>
            </div>

            <!-- Stats Grid -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12 animate-fade-in-up animation-delay-200">
                <!-- My Learnings -->
                <a href="{{ route('my-classes.index') }}"
                    class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group block">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-indigo-100 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-3xl font-bold text-slate-800">{{ $registrations->where('status', 'completed')->count() }}</span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1">My Learnings</h3>
                    <p class="text-sm text-indigo-600 font-medium flex items-center gap-1">
                        View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </p>
                </a>

                <!-- Payment (New) -->
                <div
                    class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-3 bg-orange-100 rounded-xl text-orange-600 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-3xl font-bold text-slate-800">{{ $registrations->where('payment_status', 'unpaid')->count() }}</span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1">Payment</h3>
                    <p class="text-xs text-slate-500 mb-2">Pending Transactions</p>
                    <a href="{{ route('payments.index') }}"
                        class="text-sm text-orange-600 font-medium hover:underline flex items-center gap-1">
                        View History <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Affiliate / Join -->
                @if(Auth::user()->affiliate && Auth::user()->affiliate->status === 'approved')
                    <div
                        class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group">
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="p-3 bg-green-100 rounded-xl text-green-600 group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-slate-800">Rp
                                {{ number_format(Auth::user()->affiliate->total_earnings ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <h3 class="font-bold text-slate-700 mb-1">Affiliate Balance</h3>
                        <a href="{{ route('affiliates.index') }}"
                            class="text-sm text-green-600 font-medium hover:underline flex items-center gap-1">
                            Go to Dashboard <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @else
                    <div
                        class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group border-dashed border-slate-300">
                        <div class="flex items-center justify-between mb-4 opacity-50">
                            <div class="p-3 bg-slate-100 rounded-xl text-slate-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-bold text-slate-700 mb-1">Join Affiliates</h3>
                        <p class="text-xs text-slate-500 mb-3">Earn commissions.</p>
                        <a href="{{ route('affiliates.index') }}"
                            class="text-xs font-bold text-indigo-600 hover:text-indigo-800 hover:underline">
                            Join Program &rarr;
                        </a>
                    </div>
                @endif
            </div>

            <!-- Recent Activity / Empty State -->
            <div class="neu-flat p-8 rounded-[2rem] border border-white/50 animate-fade-in-up animation-delay-400">

            </div>

        </div>
    </section>
</x-layout-upventure>