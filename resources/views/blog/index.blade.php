<x-layout title="{{ __('messages.blog') }} - {{ config('app.name') }}">
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Breadcrumb -->
            <x-breadcrumb :current="__('messages.blog')" />

            <div class="text-center mb-16 animate-fade-in-up">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                    {{ __('messages.our_blog') }}
                </h1>
                <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                    {{ __('messages.blog_desc') }}
                </p>
            </div>

            <!-- Search/Filter -->
            <div class="mb-12 flex justify-center animate-fade-in-up" style="animation-delay: 100ms">
                <form action="{{ route('blog.index') }}" method="GET" class="relative w-full md:w-[60%] flex items-center rounded-full neu-pressed bg-[#eef2f6] px-6 transition-all hover:shadow-md">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="{{ __('messages.search_placeholder') ?? 'Search articles...' }}" 
                           class="w-full py-4 pl-4 bg-transparent border-none focus:ring-0 outline-none text-slate-600 placeholder-slate-400 transition-all">
                    <button type="submit" class="p-3 rounded-full hover:bg-white/50 text-indigo-600 transition-colors flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($posts as $post)
                <a href="{{ route('blog.show', $post) }}" 
                   class="block group cursor-pointer neu-flat rounded-2xl overflow-hidden border border-white/50 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-up"
                   style="animation-delay: {{ ($loop->index + 2) * 100 }}ms">
                    <div class="relative aspect-video overflow-hidden bg-slate-100">
                        <img src="{{ $post->image ? Storage::url($post->image) : 'https://placehold.co/600x400/e2e8f0/64748b?text=No+Image' }}" alt="{{ $post->title }}" class="object-cover w-full h-full transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-xs font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600 transition-colors duration-300">
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
                        <span class="inline-flex items-center text-sm font-bold text-indigo-600 group-hover:gap-2 transition-all duration-300">
                            {{ __('messages.read_article') }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </span>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-12 animate-fade-in-up">
                    <p class="text-slate-500 text-lg">{{ __('messages.no_posts') }}</p>
                </div>
                @endforelse
            </div>

            <div class="mt-12 animate-fade-in-up" style="animation-delay: 600ms">
                {{ $posts->links('components.pagination') }}
            </div>
        </div>
    </section>
</x-layout>
