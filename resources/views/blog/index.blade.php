<x-layout title="{{ __('messages.blog') }} - {{ config('app.name') }}">
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ __('messages.our_blog') }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    {{ __('messages.blog_desc') }}
                </p>
            </div>

            <!-- Search/Filter (Optional placeholder) -->
            <div class="mb-12 flex justify-center">
                <!-- Add search form here if needed -->
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($posts as $post)
                <a href="{{ route('blog.show', $post) }}" class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-none transition-all hover:-translate-y-1">
                    <div class="relative aspect-video overflow-hidden bg-slate-100">
                        <img src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}" alt="{{ $post->title }}" class="object-contain w-full h-full transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-xs font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600">
                                {{ $post->category->name }}
                            </span>
                            <span class="text-xs text-slate-500">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <h2 class="text-xl font-bold mb-3 text-slate-800 group-hover:text-indigo-600 transition-colors">
                            {{ $post->title }}
                        </h2>
                        <p class="text-slate-500 text-sm line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <span class="inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-500 transition-colors">
                            {{ __('messages.read_article') }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-slate-500 text-lg">{{ __('messages.no_posts') }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</x-layout>
