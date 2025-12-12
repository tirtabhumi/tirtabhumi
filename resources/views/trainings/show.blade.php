<x-layout title="{{ $training->title }} - Tirtabhumi Training" description="{{ Str::limit(strip_tags($training->description), 150) }}">

    <section class="pt-32 pb-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <div class="mb-12">
                    <a href="{{ route('trainings.index') }}" class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-lg font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        {{ __('messages.back_to_list') }}
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-16 lg:gap-24">
                    <!-- Main Content -->
                    <div class="md:col-span-2 space-y-12">
                        <!-- Poster Image -->
                        <div class="rounded-2xl overflow-hidden neu-flat border border-white/50">
                            @if($training->image)
                                <img src="{{ Storage::url($training->image) }}" alt="{{ $training->title }}" class="w-full h-auto">
                            @else
                                <div class="aspect-video bg-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
<span class="inline-block w-1"></span>
                        <!-- Details -->
                        <div class="neu-flat rounded-2xl p-8 border border-white/50">
                            <h1 class="text-3xl font-bold text-slate-800 mb-6">{{ $training->title }}</h1>
                            
                            <div class="prose prose-slate max-w-none">
                                {!! $training->description !!}
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar / Registration Form -->
                    <div class="md:col-span-1">
                        <div class="sticky top-24 space-y-8">
                            <!-- Info Card -->
                            <div class="neu-flat rounded-2xl p-6 border border-white/50">
                                <h3 class="font-bold text-slate-800 mb-6">{{ __('messages.training_info') }}</h3>
                                <ul class="space-y-6 text-sm">
                                    <li class="flex items-start gap-4">
                                        <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 text-xs mb-1">{{ __('messages.date_time') }}</span>
                                            <span class="font-bold text-slate-800 block">{{ $training->event_date->format('d F Y') }}</span>
                                            <span class="text-slate-600">{{ $training->event_date->format('H:i') }} WIB</span>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 text-xs mb-1">{{ __('messages.location') }}</span>
                                            <span class="font-bold text-slate-800 block">{{ __('messages.training_type_' . $training->type) }}</span>
                                            @if($training->type === 'online' || $training->type === 'hybrid')
                                                @if($training->location_online)
                                                    <span class="block text-slate-600 text-xs mt-1">
                                                        <span class="font-semibold">Online:</span> {{ $training->location_online }}
                                                    </span>
                                                @endif
                                            @endif
                                            @if($training->type === 'offline' || $training->type === 'hybrid')
                                                @if($training->location_offline)
                                                    <span class="block text-slate-600 text-xs mt-1">
                                                        <span class="font-semibold">Offline:</span> {{ $training->location_offline }}
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-4">
                                        <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 text-xs mb-1">{{ __('messages.price') }}</span>
                                            <span class="font-bold text-xl text-indigo-600">
                                                @if($training->price > 0)
                                                    Rp {{ number_format($training->price, 0, ',', '.') }}
                                                @else
                                                    {{ __('messages.free') ?? 'Gratis' }}
                                                @endif
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Registration Form -->
                            <div class="neu-flat rounded-2xl p-6 border border-white/50">
                                <h3 class="font-bold text-slate-800 mb-6 text-lg">{{ __('messages.register_now') }}</h3>
                                
                                @if(session('success'))
                                    <div class="bg-green-50 text-green-700 p-4 rounded-xl text-sm mb-4 border border-green-100">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if($training->event_date->isPast())
                                    <div class="bg-red-50 text-red-700 p-6 rounded-xl text-center border border-red-100">
                                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 text-red-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                        <h4 class="font-bold text-lg mb-2">{{ __('messages.registration_closed') }}</h4>
                                        <p class="text-sm">{{ __('messages.registration_closed_msg') }}</p>
                                    </div>
                                @else
                                    <form action="{{ route('trainings.register', $training) }}" method="POST" class="space-y-5">
                                        @csrf
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-2">{{ __('messages.full_name') }}</label>
                                            <input type="text" name="name" required class="w-full rounded-xl border-none bg-[#eef2f6] neu-pressed text-sm py-3 px-4 focus:ring-0 text-slate-600 placeholder-slate-400" placeholder="{{ __('messages.name_placeholder') }}">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-2">{{ __('messages.contact_email_label') }}</label>
                                            <input type="email" name="email" required class="w-full rounded-xl border-none bg-[#eef2f6] neu-pressed text-sm py-3 px-4 focus:ring-0 text-slate-600 placeholder-slate-400" placeholder="{{ __('messages.email_placeholder') }}">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-2">{{ __('messages.whatsapp') }}</label>
                                            <input type="tel" name="phone" required class="w-full rounded-xl border-none bg-[#eef2f6] neu-pressed text-sm py-3 px-4 focus:ring-0 text-slate-600 placeholder-slate-400" placeholder="08123456789">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 mb-2">{{ __('messages.institution') }}</label>
                                            <input type="text" name="institution" class="w-full rounded-xl border-none bg-[#eef2f6] neu-pressed text-sm py-3 px-4 focus:ring-0 text-slate-600 placeholder-slate-400" placeholder="{{ __('messages.institution_placeholder') }}">
                                        </div>
                                        
                                        <button type="submit" class="w-full py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white rounded-xl font-bold text-sm transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5 mt-2">
                                            {{ __('messages.submit_registration') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
