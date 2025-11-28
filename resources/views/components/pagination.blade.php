@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-center gap-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="neu-flat w-12 h-12 flex items-center justify-center rounded-full text-slate-300 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="neu-flat w-12 h-12 flex items-center justify-center rounded-full text-indigo-600 hover:text-indigo-700 transition-all hover:-translate-y-0.5 active:neu-pressed" aria-label="{{ __('pagination.previous') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="w-12 h-12 flex items-center justify-center text-slate-400 font-bold">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="neu-pressed w-12 h-12 flex items-center justify-center rounded-full text-indigo-600 font-bold border border-white/50" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="neu-flat w-12 h-12 flex items-center justify-center rounded-full text-slate-600 hover:text-indigo-600 font-bold transition-all hover:-translate-y-0.5 active:neu-pressed">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="neu-flat w-12 h-12 flex items-center justify-center rounded-full text-indigo-600 hover:text-indigo-700 transition-all hover:-translate-y-0.5 active:neu-pressed" aria-label="{{ __('pagination.next') }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        @else
            <span class="neu-flat w-12 h-12 flex items-center justify-center rounded-full text-slate-300 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        @endif
    </nav>
@endif
