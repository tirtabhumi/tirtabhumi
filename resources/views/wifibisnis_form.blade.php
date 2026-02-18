<x-layout title="Formulir Pendaftaran Wifi Bisnis" description="Lengkapi data pendaftaran Wifi Bisnis Murah Anda di sini.">
    
    <style>
        .neu-input {
            background: #eef2f6;
            box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
            border: none;
            border-radius: 0.65rem;
            padding: 0.6rem 0.9rem;
            width: 100%;
            outline: none;
            transition: all 0.3s ease;
            color: #334155;
            font-size: 0.875rem;
        }
        .neu-input:focus {
            box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #ffffff;
        }
        .file-label {
            cursor: pointer;
            background: #eef2f6;
            box-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff;
            border-radius: 0.65rem;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
            font-size: 0.875rem;
            color: #6366f1;
            transition: all 0.3s ease;
            max-width: 100%;
            overflow: hidden;
        }
        .file-label span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            flex: 1;
        }
        .file-label:hover {
            transform: translateY(-2px);
            box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
        }
        .section-divider {
            border: none;
            border-top: 1px solid #d1d9e6;
            margin: 1rem 0;
        }
        .neu-cta-filled {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff, 0 4px 16px rgba(99,102,241,0.3);
            border: none;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 0.8rem 1rem;
            font-weight: 700;
            font-size: 0.95rem;
            color: #ffffff;
            cursor: pointer;
        }
        .neu-cta-filled:hover {
            transform: translateY(-2px);
            box-shadow: 8px 8px 20px #d1d9e6, -8px -8px 20px #ffffff, 0 6px 20px rgba(99,102,241,0.4);
        }
        label .req { color: #ef4444; margin-left: 2px; }
    </style>

    <section class="py-16 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-4 max-w-xl">
            <div class="bg-[#eef2f6] shadow-[8px_8px_20px_#d1d9e6,-8px_-8px_20px_#ffffff] rounded-2xl border border-white/50 p-8">
                <div class="mb-7 text-center">
                    <h2 class="text-2xl font-bold text-slate-800 mb-1">Pendaftaran Wifi Bisnis</h2>
                    <p class="text-slate-500 text-sm">Paket: <span class="text-indigo-600 font-bold">{{ $package }}</span></p>
                </div>

                @if($errors->any())
                    <div class="mb-5 p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('wifi.bisnis.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <input type="hidden" name="package_name" value="{{ $package }}">

                    {{-- Identitas Pribadi --}}
                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-widest pt-1">Identitas Pribadi</p>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Sesuai KTP <span class="req">*</span></label>
                        <input type="text" name="ktp_name" value="{{ old('ktp_name') }}" placeholder="Sesuai kartu identitas" class="neu-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nomor HP / WhatsApp <span class="req">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="08123456789" class="neu-input" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Foto KTP <span class="req">*</span></label>
                        <label class="file-label">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span id="ktp-label-text">Upload Foto KTP</span>
                            <input type="file" name="ktp_photo" class="hidden" required accept="image/*" onchange="updateLabel(this, 'ktp-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG — Maks 5MB</p>
                    </div>

                    <hr class="section-divider">

                    {{-- Informasi Bisnis --}}
                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-widest pt-1">Informasi Bisnis</p>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Perusahaan / Toko <span class="req">*</span></label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="Nama bisnis Anda" class="neu-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bergerak Di Bidang Apa? <span class="req">*</span></label>
                        <input type="text" name="business_field" value="{{ old('business_field') }}" placeholder="Kuliner, Retail, Jasa IT" class="neu-input" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Lengkap Bisnis <span class="req">*</span></label>
                        <textarea name="address" rows="2" placeholder="Jl. Contoh No. 1, Kota, Provinsi" class="neu-input" required>{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">NPWP <span class="req">*</span></label>
                        <input type="text" name="npwp" value="{{ old('npwp') }}" placeholder="Nomor NPWP Bisnis" class="neu-input" required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Dokumen NPWP <span class="req">*</span></label>
                        <label class="file-label">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="npwp-label-text">Upload NPWP</span>
                            <input type="file" name="npwp_doc" class="hidden" required accept="image/*,.pdf" onchange="updateLabel(this, 'npwp-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG, PDF — Maks 5MB</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Dokumen NIB <span class="text-[11px] font-normal text-slate-400">(Opsional)</span></label>
                        <label class="file-label">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span id="nib-label-text">Upload NIB</span>
                            <input type="file" name="nib_doc" class="hidden" accept="image/*,.pdf" onchange="updateLabel(this, 'nib-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG, PDF — Maks 5MB</p>
                    </div>

                    <hr class="section-divider">

                    {{-- Foto Tempat Bisnis --}}
                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-widest pt-1">Foto Tempat Bisnis</p>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Foto Depan Tempat Bisnis / Toko <span class="req">*</span></label>
                        <label class="file-label">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span id="bisnis-label-text">Upload Foto</span>
                            <input type="file" name="business_photo" class="hidden" required accept="image/*" onchange="updateLabel(this, 'bisnis-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG — Maks 5MB</p>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <a href="{{ route('wifi.bisnis') }}" class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl font-bold text-sm text-slate-600 transition-all"
                            style="background:#eef2f6; box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali
                        </a>
                        <button type="submit" class="neu-cta-filled flex-1 py-3 text-sm">Kirim Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function updateLabel(input, labelId) {
            const span = document.getElementById(labelId);
            if (span && input.files[0]) span.textContent = input.files[0].name;
        }
    </script>

</x-layout>
