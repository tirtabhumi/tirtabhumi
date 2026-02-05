@use('Illuminate\Support\Facades\Storage')
<x-layout title="{{ $product->name }} - Tirtabhumi Procurement" description="{{ Str::limit(strip_tags($product->description), 150) }}">

    <article class="pt-32 pb-24 bg-[#eef2f6] min-h-screen relative z-10">
        <div class="container mx-auto px-4 sm:px-6">
            <!-- Breadcrumb -->
            <div class="mb-12 pt-16">
                <a href="{{ route('services.procurement') }}" class="text-slate-400 hover:text-indigo-600 transition-colors flex items-center gap-2 text-sm font-semibold uppercase tracking-wider">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke E-Procurement
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-16 lg:gap-24">
                <!-- Main Content -->
                <div class="md:col-span-2 space-y-12">
                    <!-- Poster Image & Gallery -->
                    <div class="space-y-6 max-w-sm mx-auto">
                        <div class="rounded-2xl overflow-hidden neu-flat border border-white/50 relative aspect-square w-full bg-white flex items-center justify-center cursor-zoom-in group" onclick="openModal()">
                            @if(!empty($product->images) && isset($product->images[0]))
                                @php 
                                    $firstImage = $product->images[0];
                                    $firstImageUrl = str_starts_with($firstImage, 'http') ? $firstImage : Storage::url($firstImage);
                                @endphp
                                <img id="main-image" src="{{ $firstImageUrl }}" alt="{{ $product->name }}" loading="lazy" class="w-full h-full object-contain transition-all duration-300 group-hover:scale-105">
                                
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors"></div>
                            @else
                                <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>

                        @if(!empty($product->images) && count($product->images) > 1)
                            <div class="flex flex-wrap gap-3 justify-center">
                                @foreach($product->images as $index => $image)
                                    @php $imageUrl = str_starts_with($image, 'http') ? $image : Storage::url($image); @endphp
                                    <button onclick="changeImage('{{ $imageUrl }}', this)" 
                                            class="thumbnail-btn w-16 h-16 rounded-xl overflow-hidden neu-flat border-2 transition-all focus:outline-none {{ $index === 0 ? 'border-indigo-600 ring-2 ring-indigo-600/20' : 'border-white/50 hover:border-indigo-300' }}">
                                        <img src="{{ $imageUrl }}" alt="Thumbnail {{ $index + 1 }}" class="w-full aspect-square object-cover">
                                    </button>
                                @endforeach
                            </div>
                            <script>
                                function changeImage(src, btn) {
                                    const mainImage = document.getElementById('main-image');
                                    const modalImage = document.getElementById('modal-image');
                                    
                                    // Update active state for thumbnails
                                    document.querySelectorAll('.thumbnail-btn').forEach(el => {
                                        el.classList.remove('border-indigo-600', 'ring-2', 'ring-indigo-600/20');
                                        el.classList.add('border-white/50');
                                    });
                                    btn.classList.add('border-indigo-600', 'ring-2', 'ring-indigo-600/20');
                                    btn.classList.remove('border-white/50');

                                    // Smooth fade transition
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
                    
                    <!-- Details -->
                    <div class="neu-flat rounded-2xl p-8 border border-white/50">
                        <h1 class="text-3xl font-bold text-slate-800 mb-6">{{ $product->name }}</h1>
                        
                        <div class="prose prose-slate max-w-none">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <div class="sticky top-24 space-y-8">
                        <!-- Info Card -->
                        <div class="neu-flat rounded-2xl p-6 border border-white/50">
                            <h3 class="font-bold text-slate-800 mb-6">Informasi Produk</h3>
                            <ul class="space-y-6 text-sm">
                                <li class="flex items-start gap-4">
                                    <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="block text-slate-500 text-xs mb-1">Kategori</span>
                                        <span class="font-bold text-slate-800 block">{{ $product->category->name ?? 'Uncategorized' }}</span>
                                    </div>
                                </li>
                                
                                <li class="flex items-start gap-4">
                                    <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div>
                                        <span class="block text-slate-500 text-xs mb-1">Harga</span>
                                        <span class="font-bold text-xl text-indigo-600 block">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </li>

                                @if($product->platforms)
                                <li class="flex items-start gap-4">
                                    <div class="neu-pressed p-3 rounded-full text-indigo-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                    </div>
                                    <div class="w-full">
                                        <span class="block text-slate-500 text-xs mb-2">Tersedia di Platform</span>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($product->platforms as $platform)
                                                @php
                                                    $colorClass = match($platform) {
                                                        'E-Katalog' => 'bg-red-50 text-red-600 border border-red-200',
                                                        'PadiUMKM' => 'bg-emerald-50 text-emerald-600 border border-emerald-200',
                                                        'SIPLah' => 'bg-indigo-50 text-indigo-600 border border-indigo-200',
                                                        'Tokopedia' => 'bg-green-50 text-green-600 border border-green-200',
                                                        'Shopee' => 'bg-orange-50 text-orange-600 border border-orange-200',
                                                        default => 'bg-slate-50 text-slate-600 border border-slate-200',
                                                    };
                                                @endphp
                                                <span class="text-[10px] font-bold px-2.5 py-1 rounded-lg {{ $colorClass }}">
                                                    {{ $platform }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                            @if($product->attachment)
                                <div class="mt-8 pt-6 border-t border-slate-200/50">
                                    <a href="{{ Storage::url($product->attachment) }}" target="_blank" class="block w-full py-4 neu-pressed bg-indigo-50 text-indigo-700 rounded-xl font-bold text-center transition-all hover:shadow-md flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        Unduh Brosur (PDF)
                                    </a>
                                </div>
                            @endif

                            <div class="mt-8 pt-6 border-t border-slate-200/50">
                                <a href="https://wa.me/6282229046099?text=Halo,%20saya%20ingin%20bertanya%20tentang%20produk%20{{ urlencode($product->name) }}" target="_blank" class="block w-full py-4 neu-btn text-indigo-600 hover:text-indigo-700 rounded-xl font-bold text-center transition-all hover:-translate-y-0.5">
                                    Hubungi Kami via WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!-- Image Modal -->
    <div id="image-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-900/90 backdrop-blur-sm p-4 cursor-zoom-out" onclick="closeModal()">
        <button class="absolute top-6 right-6 text-white hover:text-indigo-400 transition-colors z-[110]" onclick="closeModal()">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <div class="max-w-5xl max-h-[90vh] relative" onclick="event.stopPropagation()">
            @php 
                $modalImageUrl = !empty($product->images) ? (str_starts_with($product->images[0], 'http') ? $product->images[0] : Storage::url($product->images[0])) : ''; 
            @endphp
            <img id="modal-image" src="{{ $modalImageUrl }}" alt="Enlarged Image" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
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
