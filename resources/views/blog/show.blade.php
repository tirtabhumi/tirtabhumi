<x-layout title="{{ $post->title }} - {{ config('app.name') }}">
    <article class="pt-32 pb-24 bg-[#eef2f6] min-h-screen">
        <!-- Header -->
        <header class="container mx-auto px-6 mb-12 text-center max-w-4xl">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="text-sm font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600">
                    {{ $post->category->name }}
                </span>
                <span class="text-sm text-slate-500">{{ $post->published_at->format('M d, Y') }}</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-8 leading-tight text-slate-800">
                {{ $post->title }}
            </h1>
            @if($post->image)
            <div class="relative aspect-video rounded-2xl overflow-hidden neu-flat border border-white/50 p-2">
                <div class="rounded-xl overflow-hidden w-full h-full bg-slate-100">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="object-contain w-full h-full">
                </div>
            </div>
            @endif
        </header>

        <!-- Content -->
        <div class="container mx-auto px-6 max-w-3xl">
            <div class="prose prose-lg prose-slate max-w-none">
                {!! $post->content !!}
            </div>
        </div>

        <!-- Navigation -->
        <div class="container mx-auto px-6 max-w-3xl mt-16 pt-8 border-t border-slate-200/50">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center text-slate-500 hover:text-indigo-600 transition-colors font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                {{ __('messages.back_to_blog') }}
            </a>
        </div>
    </article>
</x-layout>
