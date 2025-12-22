<x-layout title="{{ $product->name }} - Tirtabhumi Procurement" description="{{ Str::limit(strip_tags($product->description), 150) }}">

    <section class="pt-32 pb-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <div class="mb-12">
                    <a href="{{ route('services.procurement') }}" class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-lg font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Daftar Produk
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-16 lg:gap-24">
                    <!-- Main Content -->
                    <div class="md:col-span-2 space-y-12">
                        <!-- Poster Image -->
                        <div class="rounded-2xl overflow-hidden neu-flat border border-white/50">
                            @if($product->image)
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" loading="lazy" class="w-full h-auto">
                            @else
                                <div class="aspect-video bg-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Details -->
                        <div class="neu-flat rounded-2xl p-8 border border-white/50">
                            <h1 class="text-3xl font-bold text-slate-800 mb-6">{{ $product->name }}</h1>
                            
                            <div class="prose prose-slate max-w-none">
                                {!! nl2br(e($product->description)) !!}
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
                                            <span class="font-bold text-slate-800 block">{{ $product->category }}</span>
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
        </div>
    </section>
</x-layout>
