@props(['training'])

<a href="{{ route('trainings.show', $training->slug) }}"
    class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-slate-100 h-full flex flex-col">
    <div class="aspect-video bg-slate-200 relative overflow-hidden flex-shrink-0">
        @if($training->image)
            <img src="{{ Str::startsWith($training->image, 'http') ? $training->image : Storage::url($training->image) }}"
                alt="{{ $training->title }}" loading="lazy"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @else
            <div class="w-full h-full flex items-center justify-center text-slate-400">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
        @endif

        <!-- Status Badges -->
        @if($training->event_date && $training->event_date->isPast())
            <div
                class="absolute top-4 right-4 bg-red-100/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-red-600">
                {{ __('messages.finished') ?? 'Finished' }}
            </div>
        @else
            <div class="absolute top-4 right-4 flex items-center gap-2">
                <div class="bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-indigo-600 shadow-sm">
                    @if($training->category == 'webinar')
                        {{ __('messages.training_type_' . $training->type) }}
                    @else
                        {{ ucfirst($training->level) }}
                    @endif
                </div>
            </div>
        @endif
    </div>

    <div class="p-6 flex flex-col flex-grow">
        <div class="mb-1">
            @php
                $catIconColors = [
                    'class' => 'text-blue-600',
                    'webinar' => 'text-purple-600',
                    'workshop' => 'text-amber-600',
                ];
                $catIconColor = $catIconColors[$training->category] ?? 'text-slate-600';
            @endphp
            <span class="{{ $catIconColor }} font-bold uppercase tracking-wider text-[10px]">
                {{ ucfirst($training->category) }}
            </span>
        </div>

        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            @if($training->event_date)
                {{ \Carbon\Carbon::parse($training->event_date)->format('d M Y, H:i') }} WIB
            @else
                Self-paced
            @endif
        </div>

        <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-indigo-600 transition-colors line-clamp-2">
            {{ $training->title }}
        </h3>
        <p class="text-slate-600 text-sm line-clamp-2 mb-4">{{ strip_tags($training->description) }}</p>

        <div class="mt-auto flex items-center justify-between">
            <span class="text-lg font-bold text-slate-800">
                @if($training->price == 0)
                    Gratis
                @else
                    Rp {{ number_format($training->price, 0, ',', '.') }}
                @endif
            </span>
            <span class="flex items-center text-indigo-600 font-semibold text-sm">
                {{ __('messages.training_view_detail') ?? 'Detail' }}
                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </span>
        </div>
    </div>
</a>