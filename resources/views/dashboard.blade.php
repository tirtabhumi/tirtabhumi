<x-layout-upventure title="Dashboard">
    <!-- Main Background -->
    
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

            <!-- Back to Home -->
              <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <a href="/" class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    {{ __('messages.back_to_home') }}
                </a>
            </div>
            

            <!-- Dashboard Header -->
            <div class="mb-6 animate-fade-in-up flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">{{ __('messages.dashboard_welcome', ['name' => Auth::user()->name]) }}</h1>
                    <p class="text-slate-500 mt-2">{{ __('messages.dashboard_subtitle') }}</p>
                </div>
                <a href="{{ route('profile.edit') }}"
                    class="neu-flat px-6 py-3 rounded-xl bg-white text-indigo-600 font-bold hover:bg-indigo-50 hover:scale-[1.02] transition-all flex items-center gap-2 shadow-sm border border-indigo-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    {{ __('messages.edit_profile') }}
                </a>
            </div>

            <!-- Stats Grid -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12 animate-fade-in-up animation-delay-200">
                <!-- My Learnings -->
                <a href="{{ route('my-classes.index') }}"
                    class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group block relative overflow-hidden">
                     <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-24 h-24 text-indigo-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                     </div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
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
                    <h3 class="font-bold text-slate-700 mb-1 relative z-10">{{ __('messages.my_learnings') }}</h3>
                    <p class="text-sm text-indigo-600 font-medium flex items-center gap-1 relative z-10">
                        {{ __('messages.view_all') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </p>
                </a>

                <!-- Payment -->
                <div
                    class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group relative overflow-hidden">
                     <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-24 h-24 text-indigo-600" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                     </div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div
                            class="p-3 bg-indigo-100 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="text-3xl font-bold text-slate-800">{{ $registrations->where('payment_status', 'unpaid')->count() }}</span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1 relative z-10">{{ __('messages.payment') }}</h3>
                    <p class="text-xs text-slate-500 mb-2 relative z-10">{{ __('messages.pending_transactions') }}</p>
                    <a href="{{ route('payments.index') }}"
                        class="text-sm text-indigo-600 font-medium flex items-center gap-1 relative z-10">
                        {{ __('messages.view_history') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <!-- Certificates -->
                <a href="{{ route('certificates.index') }}"
                    class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group block relative overflow-hidden">
                     <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-24 h-24 text-indigo-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l-5.5 9h11L12 2zm0 3.84L13.93 9h-3.87L12 5.84zM17.5 13c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zM6.5 13C4.01 13 2 15.01 2 17.5S4.01 22 6.5 22 11 19.99 11 17.5 8.99 13 6.5 13zm0 7c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                     </div>
                    <div class="flex items-center justify-between mb-4 relative z-10">
                        <div
                            class="p-3 bg-indigo-100 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-3xl font-bold text-slate-800">
                            {{-- Rough count --}}
                            {{ $registrations->where('status', 'completed')->filter(function ($reg) {
    return $reg->training->modules->count() > 0 && \App\Models\UserModuleProgress::where('user_id', auth()->id())->whereIn('training_module_id', $reg->training->modules->pluck('id'))->where('is_completed', true)->count() == $reg->training->modules->count(); })->count() }}
                        </span>
                    </div>
                    <h3 class="font-bold text-slate-700 mb-1 relative z-10">{{ __('messages.certificates') }}</h3>
                    <p class="text-sm text-indigo-600 font-medium flex items-center gap-1 relative z-10">
                        {{ __('messages.view_achievements') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </p>
                </a>

                <!-- Affiliate / Join -->
                @if(Auth::user()->affiliate && Auth::user()->affiliate->status === 'approved')
                    <div
                        class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group relative overflow-hidden">
                         <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                            <svg class="w-24 h-24 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M16 6l2.29-2.29-4.88-4.88-4 4L2 2.71 4.71 0 5.41.71 16 11.29l5.29-5.29z"/><path d="M5.41 12.71L12.71 20H11.3l-5.89-5.89z"/></svg>
                         </div>
                        <div class="flex items-center justify-between mb-4 relative z-10">
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
                        <h3 class="font-bold text-slate-700 mb-1 relative z-10">{{ __('messages.affiliate_balance') }}</h3>
                        <a href="{{ route('affiliates.index') }}"
                            class="text-sm text-green-600 font-medium hover:underline flex items-center gap-1 relative z-10">
                            {{ __('messages.go_to_dashboard') }} <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @else
                    <div
                        class="neu-flat p-6 rounded-2xl border border-white/50 hover:scale-[1.02] transition-transform duration-300 group border-dashed border-slate-300 relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4 opacity-50 relative z-10">
                            <div class="p-3 bg-slate-100 rounded-xl text-slate-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="font-bold text-slate-700 mb-1 relative z-10">{{ __('messages.join_affiliates') }}</h3>
                        <p class="text-xs text-slate-500 mb-3 relative z-10">{{ __('messages.earn_commissions') }}</p>
                        <a href="{{ route('affiliates.index') }}"
                            class="text-xs font-bold text-indigo-600 hover:text-indigo-800 hover:underline relative z-10">
                            {{ __('messages.join_program') }} &rarr;
                        </a>
                    </div>
                @endif
            </div>

            <!-- Recent Activity / Empty State -->
            <div class="neu-flat p-8 rounded-[2rem] border border-white/50 animate-fade-in-up animation-delay-400">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-slate-800">{{ __('messages.recent_activity') }}</h3>
                    <a href="{{ route('my-classes.index') }}" class="text-sm font-bold text-indigo-600 hover:underline">{{ __('messages.view_all') }}</a>
                </div>

                @php
                    $completedRegistrations = $registrations->where('status', 'completed');
                @endphp

                @if($completedRegistrations->count() > 0)
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2">
                        @foreach($completedRegistrations->take(10) as $reg)
                            <div class="group flex items-center justify-between p-4 bg-white/30 rounded-2xl border border-white/30 hover:bg-white/50 transition-all duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="p-3 bg-indigo-50/50 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-700 group-hover:text-indigo-700 transition-colors">{{ $reg->training->title }}</h4>
                                        <p class="text-xs text-slate-500">{{ __('messages.joined') }} {{ $reg->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-2 w-64">
                                    @php
                                        $totalModules = $reg->training->modules->count();
                                        $completedModules = \App\Models\UserModuleProgress::where('user_id', auth()->id())
                                            ->whereIn('training_module_id', $reg->training->modules->pluck('id'))
                                            ->where('is_completed', true)
                                            ->count();
                                        $progress = $totalModules > 0 ? round(($completedModules / $totalModules) * 100) : 0;
                                    @endphp

                                    <div class="w-full">
                                        <div class="flex items-center justify-end gap-2 text-xs text-slate-600 mb-1">
                                            <span class="font-medium">{{ __('messages.progress') }}</span>
                                            <span class="font-bold">{{ $progress }}%</span>
                                        </div>
                                        <div class="h-2 bg-slate-200 rounded-full overflow-hidden w-full">
                                            <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-500" style="width: {{ $progress }}%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center gap-2">
                                         @if($progress >= 100)
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full">
                                                {{ __('messages.completed') }}
                                            </span>
                                        @endif
                                        
                                        <a href="{{ route('my-classes.show', $reg->training->slug) }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                                            {{ __('messages.continue_learning') }} &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold text-slate-700 mb-2">{{ __('messages.empty_activity_title') }}</h4>
                        <p class="text-slate-500 mb-6 max-w-md mx-auto">{{ __('messages.empty_activity_subtitle') }}</p>
                        <a href="{{ route('trainings.index') }}" class="neu-btn px-8 py-3 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 font-bold shadow-lg shadow-indigo-200">
                            {{ __('messages.browse_classes') }}
                        </a>
                    </div>
                @endif
    </section>
</x-layout-upventure>