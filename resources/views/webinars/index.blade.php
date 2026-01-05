<x-layout-upventure title="Webinars">
    <div class="bg-indigo-700 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-extrabold text-white sm:text-4xl">
                Upcoming Webinars
            </h1>
            <p class="mt-4 text-xl text-indigo-200">
                Join our expert-led sessions and level up your knowledge.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($webinars->count() > 0)
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($webinars as $webinar)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-slate-200">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 bg-indigo-100 text-indigo-800 text-xs font-semibold rounded-full">
                                    {{ $webinar->date->format('M d, Y') }}
                                </span>
                                <span class="text-slate-500 text-sm">
                                    {{ $webinar->price == 0 ? 'FREE' : 'Rp ' . number_format($webinar->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $webinar->title }}</h3>
                            <p class="text-slate-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($webinar->description, 100) }}
                            </p>
                            <a href="#" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded transition">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-slate-900">No webinars scheduled</h3>
                <p class="mt-1 text-sm text-slate-500">Check back later for upcoming sessions.</p>
            </div>
        @endif
    </div>
</x-layout-upventure>
