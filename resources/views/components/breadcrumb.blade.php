@props(['paths' => [], 'current'])

<nav {{ $attributes->merge(['class' => 'flex justify-center mb-8 text-sm text-slate-500 w-full px-2']) }} aria-label="Breadcrumb">
    <style>
        .breadcrumb-scroll::-webkit-scrollbar {
            display: none;
        }
        .breadcrumb-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/50 backdrop-blur-sm px-4 py-2 rounded-full border border-white/50 shadow-sm overflow-x-auto whitespace-nowrap breadcrumb-scroll max-w-full">
        <li class="inline-flex items-center shrink-0">
            <a href="/" class="inline-flex items-center hover:text-indigo-600 hover:underline transition-colors text-xs md:text-sm">
                <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                {{ __('messages.home') }}
            </a>
        </li>

        @foreach($paths as $label => $url)
        <li class="inline-flex items-center shrink-0">
            <a href="{{ $url }}" class="inline-flex items-center hover:text-indigo-600 hover:underline transition-colors text-xs md:text-sm">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-slate-500 md:ml-2 font-medium">{{ $label }}</span>
            </a>
        </li>
        @endforeach

        <li class="inline-flex items-center shrink-0" aria-current="page">
            <div class="flex items-center text-xs md:text-sm">
                <svg class="w-4 h-4 md:w-5 md:h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-slate-800 md:ml-2 font-medium">{{ $current }}</span>
            </div>
        </li>
    </ol>
</nav>
