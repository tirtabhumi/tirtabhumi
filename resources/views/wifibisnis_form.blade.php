<x-layout title="Formulir Pendaftaran Wifi Bisnis"
    description="Lengkapi data pendaftaran Wifi Bisnis Murah Anda di sini.">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
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

        .neu-input.error {
            box-shadow: inset 4px 4px 8px #ffd1d1, inset -4px -4px 8px #ffffff;
            border: 1px solid #ef4444;
        }

        .file-label.error {
            box-shadow: 6px 6px 12px #ffd1d1, -6px -6px 12px #ffffff;
            border: 1px solid #ef4444;
            color: #ef4444;
        }

        .error-text {
            color: #ef4444;
            font-size: 10px;
            font-weight: bold;
            margin-top: 4px;
            display: block;
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
            box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff, 0 4px 16px rgba(99, 102, 241, 0.3);
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
            box-shadow: 8px 8px 20px #d1d9e6, -8px -8px 20px #ffffff, 0 6px 20px rgba(99, 102, 241, 0.4);
        }

        label .req {
            color: #ef4444;
            margin-left: 2px;
        }
    </style>

    <section class="py-16 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-4 max-w-xl">
            <div
                class="bg-[#eef2f6] shadow-[8px_8px_20px_#d1d9e6,-8px_-8px_20px_#ffffff] rounded-2xl border border-white/50 p-8">
                <div class="mb-7 text-center">
                    <h2 class="text-2xl font-bold text-slate-800 mb-1">Pendaftaran Wifi Bisnis</h2>
                    <p class="text-slate-500 text-sm">Paket: <span
                            class="text-indigo-600 font-bold">{{ $package }}</span></p>
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

                <form action="{{ route('wifi.bisnis.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4" novalidate>
                    @csrf
                    <input type="hidden" name="package_name" value="{{ $package }}">

                    {{-- Identitas Pribadi --}}
                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-widest pt-1">Identitas Pribadi
                    </p>

                    <div class="field-group" id="field-ktp_name">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Sesuai KTP <span
                                class="req">*</span></label>
                        <input type="text" name="ktp_name" value="{{ old('ktp_name') }}"
                            placeholder="Sesuai kartu identitas" class="neu-input @error('ktp_name') error @enderror"
                            required>
                        @error('ktp_name') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                    <div class="field-group" id="field-phone">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nomor HP / WhatsApp <span
                                class="req">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="08123456789"
                            class="neu-input @error('phone') error @enderror" required>
                        @error('phone') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group" id="field-ktp_photo">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Foto KTP <span
                                class="req">*</span></label>
                        <label class="file-label @error('ktp_photo') error @enderror">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span id="ktp-label-text">Upload Foto KTP</span>
                            <input type="file" name="ktp_photo" class="hidden" required accept="image/*"
                                onchange="updateLabel(this, 'ktp-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG — Maks 10MB</p>
                        @error('ktp_photo') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <hr class="section-divider">

                    {{-- Informasi Bisnis --}}
                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-widest pt-1">Informasi Bisnis</p>

                    <div class="field-group" id="field-company_name">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Nama Perusahaan / Toko <span
                                class="req">*</span></label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}"
                            placeholder="Nama bisnis Anda" class="neu-input @error('company_name') error @enderror"
                            required>
                        @error('company_name') <span class="error-text">{{ $message }}</span> @enderror
                    </div>
                    <div class="field-group" id="field-business_field">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bergerak Di Bidang Apa? <span
                                class="req">*</span></label>
                        <input type="text" name="business_field" value="{{ old('business_field') }}"
                            placeholder="Kuliner, Retail, Jasa IT"
                            class="neu-input @error('business_field') error @enderror" required>
                        @error('business_field') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group" id="field-address">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Alamat Lengkap Bisnis <span
                                class="req">*</span></label>
                        <textarea name="address" rows="2" placeholder="Jl. Contoh No. 1, Kota, Provinsi"
                            class="neu-input @error('address') error @enderror" required>{{ old('address') }}</textarea>
                        @error('address') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group" id="field-location">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Lokasi Pemasangan (Titik Koordinat)
                            <span class="req">*</span></label>
                        <div id="map" class="w-full h-64 rounded-xl border-2 border-slate-200 shadow-inner mt-2"
                            style="background: #eef2f6;"></div>

                        <div class="flex gap-2 mb-2 mt-3">
                            <input id="pac-input" type="text" placeholder="Cari lokasi atau masukkan koordinat..."
                                class="neu-input flex-1">
                            <button type="button" id="btn-apply-location"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-xs font-bold shadow-md hover:bg-indigo-700 transition">
                                Applied
                            </button>
                        </div>
                        <p class="text-[10px] text-slate-500 mt-1 italic flex items-center gap-1">
                            <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Geser pin merah ke lokasi yang presisi.
                        </p>
                        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                        <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
                        @error('latitude') <span class="error-text">Lokasi wajib diisi (izinkan akses lokasi atau geser
                        pin).</span> @enderror
                    </div>

                    <div class="field-group" id="field-npwp">
                        <label class="block text-xs font-bold text-slate-700 mb-1">NPWP Bisnis <span
                                class="req">*</span></label>
                        <input type="text" id="npwp" name="npwp" value="{{ old('npwp') }}"
                            placeholder="Nomor NPWP Bisnis" class="neu-input @error('npwp') error @enderror" required
                            maxlength="20">
                        @error('npwp') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group" id="field-npwp_doc">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Dokumen NPWP Bisnis <span
                                class="req">*</span></label>
                        <label class="file-label @error('npwp_doc') error @enderror">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span id="npwp-label-text">Upload NPWP</span>
                            <input type="file" name="npwp_doc" class="hidden" required accept="image/*,.pdf"
                                onchange="updateLabel(this, 'npwp-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG, PDF — Maks 10MB</p>
                        @error('npwp_doc') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="field-group" id="field-nib_doc">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Dokumen NIB <span
                                class="text-[11px] font-normal text-slate-400">(Opsional)</span></label>
                        <label class="file-label @error('nib_doc') error @enderror">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span id="nib-label-text">Upload NIB</span>
                            <input type="file" name="nib_doc" class="hidden" accept="image/*,.pdf"
                                onchange="updateLabel(this, 'nib-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG, PDF — Maks 10MB</p>
                        @error('nib_doc') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <hr class="section-divider">

                    {{-- Foto Tempat Bisnis --}}
                    <p class="text-[11px] font-bold text-indigo-500 uppercase tracking-widest pt-1">Foto Tempat Bisnis
                    </p>

                    <div class="field-group" id="field-business_photo">
                        <label class="block text-xs font-bold text-slate-700 mb-1">Foto Depan Tempat Bisnis / Toko <span
                                class="req">*</span></label>
                        <label class="file-label @error('business_photo') error @enderror">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span id="bisnis-label-text">Upload Foto</span>
                            <input type="file" name="business_photo" class="hidden" required accept="image/*"
                                onchange="updateLabel(this, 'bisnis-label-text')">
                        </label>
                        <p class="mt-1 text-[11px] text-slate-400 italic">JPG, PNG — Maks 10MB</p>
                        @error('business_photo') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 flex gap-3">
                        <a href="{{ route('wifi.bisnis') }}"
                            class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl font-bold text-sm text-slate-600 transition-all"
                            style="background:#eef2f6; box-shadow: 6px 6px 14px #d1d9e6, -6px -6px 14px #ffffff;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
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

        // Auto-scroll to first error
        document.addEventListener('DOMContentLoaded', function () {
            const firstError = document.querySelector('.error-text');
            if (firstError) {
                const parentGroup = firstError.closest('.field-group');
                if (parentGroup) {
                    parentGroup.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }

            // NPWP Formatting
            const npwpInput = document.getElementById('npwp');
            if (npwpInput) {
                npwpInput.addEventListener('input', function (e) {
                    let value = e.target.value.replace(/\D/g, ''); // Remove non-digits
                    if (value.length > 15) value = value.substring(0, 15); // Limit to 15 digits

                    let formatted = '';
                    if (value.length > 0) formatted += value.substring(0, 2);
                    if (value.length > 2) formatted += '.' + value.substring(2, 5);
                    if (value.length > 5) formatted += '.' + value.substring(5, 8);
                    if (value.length > 8) formatted += '.' + value.substring(8, 9);
                    if (value.length > 9) formatted += '-' + value.substring(9, 12);
                    if (value.length > 12) formatted += '.' + value.substring(12, 15);

                    e.target.value = formatted;
                });
            }

            // Client-side validation warning
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function (e) {
                    let isValid = true;
                    // Simply checking HTML5 required attribute implicitly, 
                    // but manual check gives us custom alert control.

                    const requiredInputs = form.querySelectorAll('input[required], textarea[required], select[required]');
                    let emptyFields = [];

                    requiredInputs.forEach(input => {
                        if (!input.value.trim()) {
                            isValid = false;
                            // Get label text for better warning
                            const label = input.closest('.field-group')?.querySelector('label')?.textContent.replace('*', '').trim() || input.name;
                            emptyFields.push(label);
                            input.classList.add('error'); // Ensure visual feedback
                        } else {
                            input.classList.remove('error');
                        }
                    });

                    // Specific check for Location (Lat/Lng)
                    const lat = document.getElementById('latitude').value;
                    const lng = document.getElementById('longitude').value;
                    if (!lat || !lng) {
                        isValid = false;
                        emptyFields.push("Lokasi Pemasangan (Peta)");
                    }

                    if (!isValid) {
                        e.preventDefault();
                        alert('Mohon lengkapi data berikut:\n- ' + emptyFields.join('\n- '));

                        // Scroll to first empty field
                        const firstEmpty = form.querySelector('.error, input[value=""]');
                        if (firstEmpty) {
                            firstEmpty.closest('.field-group')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                });
            }
        });
    </script>



    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Default location (Jakarta)
                const defaultLat = -6.200000;
                const defaultLng = 106.816666;

                const oldLat = parseFloat("{{ old('latitude') }}");
                const oldLng = parseFloat("{{ old('longitude') }}");

                let initialLat = !isNaN(oldLat) ? oldLat : defaultLat;
                let initialLng = !isNaN(oldLng) ? oldLng : defaultLng;

                // Initialize Map
                const map = L.map('map').setView([initialLat, initialLng], 15);

                // Add OSM Tile Layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Add Marker
                let marker = L.marker([initialLat, initialLng], {
                    draggable: true
                }).addTo(map);

                // Update function
                function updatePosition(lat, lng) {
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                }

                // Initial update if old values exist
                if (!isNaN(oldLat) && !isNaN(oldLng)) {
                    updatePosition(oldLat, oldLng);
                }

                // Reverse Geocoding Function
                async function getAddress(lat, lng) {
                    try {
                        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`);
                        const data = await response.json();
                        if (data && data.display_name) {
                            marker.bindPopup(data.display_name).openPopup();
                            // Optional: fill address textarea if user wants auto-fill
                            // document.querySelector('textarea[name="address"]').value = data.display_name;
                        }
                    } catch (error) {
                        console.error('Reverse geocoding error:', error);
                    }
                }

                // Drag Event
                marker.on('dragend', function (e) {
                    const pos = marker.getLatLng();
                    updatePosition(pos.lat, pos.lng);
                    map.panTo(pos);
                    getAddress(pos.lat, pos.lng);
                });

                // Map Click Event
                map.on('click', function (e) {
                    marker.setLatLng(e.latlng);
                    updatePosition(e.latlng.lat, e.latlng.lng);
                    map.panTo(e.latlng);
                    getAddress(e.latlng.lat, e.latlng.lng);
                });

                // Geolocation
                if (navigator.geolocation && isNaN(oldLat)) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        const newLatLng = new L.LatLng(lat, lng);
                        marker.setLatLng(newLatLng);
                        map.setView(newLatLng, 15);
                        updatePosition(lat, lng);
                        getAddress(lat, lng);
                    });
                }

                // Search Functionality (Nominatim)
                const searchInput = document.getElementById('pac-input');
                const searchBtn = document.getElementById('btn-apply-location');

                async function performSearch() {
                    const query = searchInput.value;
                    if (!query) return;

                    // Check if coordinates
                    const parts = query.split(',').map(s => parseFloat(s.trim()));
                    if (parts.length === 2 && !isNaN(parts[0]) && !isNaN(parts[1])) {
                        const lat = parts[0];
                        const lng = parts[1];
                        const newLatLng = new L.LatLng(lat, lng);
                        marker.setLatLng(newLatLng);
                        map.setView(newLatLng, 15);
                        updatePosition(lat, lng);
                        return;
                    }

                    // Search via Nominatim
                    const originalText = searchBtn.innerText;
                    searchBtn.disabled = true;
                    searchBtn.innerText = 'Mencari...';

                    try {
                        const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}`);
                        const data = await response.json();

                        if (data && data.length > 0) {
                            const result = data[0];
                            const lat = parseFloat(result.lat);
                            const lng = parseFloat(result.lon);
                            const newLatLng = new L.LatLng(lat, lng);

                            marker.setLatLng(newLatLng);
                            map.setView(newLatLng, 16);
                            updatePosition(lat, lng);
                        } else {
                            alert('Lokasi tidak ditemukan. Coba kata kunci lain.');
                        }
                    } catch (error) {
                        console.error('Search error:', error);
                        alert('Terjadi kesalahan saat mencari lokasi.');
                    } finally {
                        searchBtn.disabled = false;
                        searchBtn.innerText = originalText;
                    }
                }

                searchBtn.addEventListener('click', performSearch);
                searchInput.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        performSearch();
                    }
                });
            });
        </script>
    @endpush
</x-layout>