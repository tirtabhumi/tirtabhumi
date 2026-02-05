<x-layout title="{{ $post->title }} - {{ config('app.name') }}">
    <article class="pt-32 pb-24 bg-[#eef2f6] min-h-screen">
        <!-- Header -->
        <header class="container mx-auto px-6 mb-12 text-center max-w-4xl">
            <!-- Breadcrumb -->
            <x-breadcrumb :paths="[__('messages.blog') => route('blog.index')]" :current="Str::limit($post->title, 30)" class="justify-center" />
            
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="text-xs font-bold px-3 py-1 rounded-full neu-pressed text-indigo-600">
                    {{ $post->category->name }}
                </span>
                <span class="text-sm text-slate-500">{{ $post->published_at->format('M d, Y') }}</span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-bold mb-8 leading-tight text-slate-800">
                {{ $post->title }}
            </h1>

            <!-- Poster Image & Gallery -->
            <div class="space-y-6 max-w-sm mx-auto">
                <div class="rounded-2xl overflow-hidden neu-flat border border-white/50 relative aspect-square w-full bg-white flex items-center justify-center cursor-zoom-in group" onclick="openModal()">
                    @if(!empty($post->images) && isset($post->images[0]))
                        <img id="main-image" src="{{ Storage::url($post->images[0]) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-contain transition-all duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors"></div>
                    @else
                        <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    @endif
                </div>

                @if(!empty($post->images) && count($post->images) > 1)
                    <div class="flex flex-wrap gap-3 justify-center">
                        @foreach($post->images as $index => $image)
                            <button onclick="changeImage('{{ Storage::url($image) }}', this)" 
                                    class="thumbnail-btn w-16 h-16 rounded-xl overflow-hidden neu-flat border-2 transition-all focus:outline-none {{ $index === 0 ? 'border-indigo-600 ring-2 ring-indigo-600/20' : 'border-white/50 hover:border-indigo-300' }}">
                                <img src="{{ Storage::url($image) }}" alt="Thumbnail {{ $index + 1 }}" class="w-full aspect-square object-cover">
                            </button>
                        @endforeach
                    </div>
                    <script>
                        function changeImage(src, btn) {
                            const mainImage = document.getElementById('main-image');
                            const modalImage = document.getElementById('modal-image');
                            
                            document.querySelectorAll('.thumbnail-btn').forEach(el => {
                                el.classList.remove('border-indigo-600', 'ring-2', 'ring-indigo-600/20');
                                el.classList.add('border-white/50');
                            });
                            btn.classList.add('border-indigo-600', 'ring-2', 'ring-indigo-600/20');
                            btn.classList.remove('border-white/50');

                            mainImage.style.opacity = '0';
                            setTimeout(() => {
                                mainImage.src = src;
                                if (modalImage) modalImage.src = src;
                                mainImage.onload = () => {
                                    mainImage.style.opacity = '1';
                                }
                            }, 150);
                        }
                    </script>
                @endif
            </div>
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
    <!-- Image Modal -->
    <div id="image-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/90 backdrop-blur-sm p-4 cursor-zoom-out" onclick="closeModal()">
        <button class="absolute top-6 right-6 text-white hover:text-indigo-400 transition-colors z-[110]" onclick="closeModal()">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <div class="max-w-5xl max-h-[90vh] relative" onclick="event.stopPropagation()">
            <img id="modal-image" src="{{ !empty($post->images) ? Storage::url($post->images[0]) : '' }}" alt="Enlarged Image" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('image-modal').classList.remove('hidden');
            document.getElementById('image-modal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('image-modal').classList.remove('flex');
            document.getElementById('image-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    </script>
</x-layout>
