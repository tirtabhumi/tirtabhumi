<x-layout>
    <x-slot:title>
        {{ $training->title }} - Tirtabhumi Training
    </x-slot>

    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="max-w-5xl mx-auto">
                <!-- Breadcrumb -->
                <div class="mb-8">
                    <a href="{{ route('trainings.index') }}" class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-sm font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Daftar Pelatihan
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="md:col-span-2 space-y-8">
                        <!-- Poster Image -->
                        <div class="rounded-2xl overflow-hidden shadow-lg bg-white">
                            @if($training->image)
                                <img src="{{ Storage::url($training->image) }}" alt="{{ $training->title }}" class="w-full h-auto">
                            @else
                                <div class="aspect-video bg-slate-200 flex items-center justify-center text-slate-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>

                        <!-- Details -->
                        <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                            <h1 class="text-3xl font-bold text-slate-800 mb-6">{{ $training->title }}</h1>
                            
                            <div class="prose prose-slate max-w-none">
                                {!! $training->description !!}
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar / Registration Form -->
                    <div class="md:col-span-1">
                        <div class="sticky top-24 space-y-6">
                            <!-- Info Card -->
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                                <h3 class="font-bold text-slate-800 mb-4">Informasi Pelatihan</h3>
                                <ul class="space-y-4 text-sm">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <div>
                                            <span class="block text-slate-500 text-xs">Tanggal & Waktu</span>
                                            <span class="font-medium text-slate-800">{{ $training->event_date->format('d F Y') }}</span>
                                            <span class="block text-slate-600">{{ $training->event_date->format('H:i') }} WIB</span>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-indigo-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <div>
                                            <span class="block text-slate-500 text-xs">Lokasi</span>
                                            <span class="font-medium text-slate-800">{{ ucfirst($training->type) }}</span>
                                            @if($training->location)
                                                <span class="block text-slate-600">{{ $training->location }}</span>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Registration Form -->
                            <div class="bg-white rounded-2xl p-6 shadow-lg border border-indigo-100">
                                <h3 class="font-bold text-slate-800 mb-4 text-lg">Daftar Sekarang</h3>
                                
                                @if(session('success'))
                                    <div class="bg-green-50 text-green-700 p-4 rounded-xl text-sm mb-4 border border-green-100">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('trainings.register', $training) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label class="block text-xs font-medium text-slate-700 mb-1">Nama Lengkap</label>
                                        <input type="text" name="name" required class="w-full rounded-lg border-slate-200 text-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan nama Anda">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-700 mb-1">Email</label>
                                        <input type="email" name="email" required class="w-full rounded-lg border-slate-200 text-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="nama@email.com">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-700 mb-1">No. WhatsApp</label>
                                        <input type="tel" name="phone" required class="w-full rounded-lg border-slate-200 text-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="08123456789">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-700 mb-1">Instansi / Perusahaan (Opsional)</label>
                                        <input type="text" name="institution" class="w-full rounded-lg border-slate-200 text-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Nama instansi">
                                    </div>
                                    
                                    <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-sm transition-all shadow-lg shadow-indigo-200">
                                        Daftar Pelatihan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
