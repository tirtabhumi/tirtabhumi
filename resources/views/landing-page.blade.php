<x-layout>
    <x-slot:title>
        Jasa Website & Google Ads - Pindahkan Toko Anda ke Jalan Raya
    </x-slot>

    <!-- Custom Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        .bg-grid-pattern {
            background-image: linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }
        .text-glow {
            text-shadow: 0 0 30px rgba(99, 102, 241, 0.6);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .glass-card-dark {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* FAQ Accordion */
        .faq-item {
            transition: all 0.3s ease;
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .faq-answer.active {
            max-height: 500px;
        }
        .faq-icon {
            transition: transform 0.3s ease;
        }
        .faq-icon.active {
            transform: rotate(45deg);
        }
        
        /* Sticky Mobile CTA */
        .sticky-cta {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        .sticky-cta.show {
            transform: translateY(0);
        }
        
        /* Fade in animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative container mx-auto px-6 text-center z-10">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full neu-flat border border-white/50 text-indigo-700 text-sm font-medium mb-8">
                <span class="relative flex h-3 w-3">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                </span>
                Solusi Anti-Boncos untuk UMKM
            </div>

            <!-- Headline -->
            <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-6 text-black leading-tight">
                Website Bagus Tapi Sepi?<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600">
                    Itu Sama Saja Buka Toko di Hutan!
                </span>
            </h1>
            
            <!-- Subheadline -->
            <p class="text-lg md:text-xl text-slate-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                Jangan biarkan pelanggan nyasar ke kompetitor. 
                <strong class="text-slate-800">Pindahkan Toko Anda ke Jalan Raya (Google) Sekarang.</strong>
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col md:flex-row gap-6 justify-center">
                <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20pindahkan%20toko%20saya%20ke%20Google." class="px-8 py-4 neu-btn font-bold text-indigo-600">
                    🚀 Pindahkan Toko Saya Sekarang
                </a>
                <a href="#comparison" class="px-8 py-4 neu-flat hover:shadow-none transition-all text-slate-600 rounded-full font-medium border border-slate-200/50">
                    Pelajari Caranya
                </a>
            </div>
        </div>
    </section>



    <!-- Reality Check (Comparison) -->
    <section id="comparison" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Masih Jualan Nungguin Bola?</h2>
                <p class="text-slate-500 text-lg">Lihat bedanya cara lama vs cara cerdas.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- The Old Way -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50">
                    <div class="inline-block bg-slate-200 text-slate-600 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide mb-6">CARA LAMA</div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-6">Toko di Hutan</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>Bikin website mahal, tapi <strong>pengunjung nol</strong>.</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>Capek posting di Sosmed, yang like cuma teman sendiri.</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            <span>Coba ngiklan sendiri, malah <strong>boncos</strong> karena salah setting.</span>
                        </li>
                    </ul>
                </div>

                <!-- The New Way -->
                <div class="neu-flat p-8 rounded-3xl border-2 border-indigo-400">
                    <div class="inline-block bg-slate-200 text-slate-600 px-4 py-1.5 rounded-full text-xs font-bold tracking-wide mb-6">CARA TIRTABHUMI</div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-6">Toko di Jalan Raya</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-700">
                            <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Website Landing Page yang <strong>siap konversi</strong> (bikin orang mau beli).</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700">
                            <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Tampil di <strong>Halaman 1 Google</strong> saat orang cari produk Anda.</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-700">
                            <svg class="w-5 h-5 text-green-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Sistem <strong>Top-Up Saldo</strong> mudah, anti ribet, anti boncos.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Proof / Testimonials -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Dipercaya oleh UMKM di Indonesia</h2>
                <p class="text-indigo-600 text-lg font-semibold">Mereka sudah merasakan banjir orderan. Giliran Anda sekarang!</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <!-- Testimonial 1 -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-700 text-base mb-5 italic leading-relaxed font-medium">"Orderan naik 3x lipat sejak pakai Google Ads dari Tirtabhumi. Setup mudah, nggak pusing!"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold">B</div>
                        <div>
                            <div class="font-bold text-slate-800 text-sm">Budi Santoso</div>
                            <div class="text-xs text-slate-500">Pemilik Toko Elektronik</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-700 text-base mb-5 italic leading-relaxed font-medium">"Website lama sepi banget. Pindah ke sini langsung ramai. Pokoknya worth it!"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold">S</div>
                        <div>
                            <div class="font-bold text-slate-800 text-sm">Siti Nurhaliza</div>
                            <div class="text-xs text-slate-500">Toko Fashion Online</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="neu-flat p-6 rounded-2xl border border-white/50">
                    <div class="flex gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-700 text-base mb-5 italic leading-relaxed font-medium">"Bayar sekali, untung terus-menerus. Top-up mudah, hasilnya mantap!"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 font-bold">A</div>
                        <div>
                            <div class="font-bold text-slate-800 text-sm">Ahmad Rizki</div>
                            <div class="text-xs text-slate-500">Kuliner & Catering</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Value Proposition -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2 order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-6">
                        Gaptek? Tenang, Kami yang Urus Teknisnya.
                    </h2>
                    <p class="text-slate-500 text-lg mb-10 leading-relaxed">
                        Anda tidak perlu pusing belajar coding atau algoritma Google. Fokus saja melayani chat pelanggan yang masuk.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-green-600 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <div>
                                <h4 class="font-bold text-slate-800 text-base mb-1">Kami Buatkan Website</h4>
                                <p class="text-slate-600 text-sm">Desain profesional, loading cepat, dan copywriting memikat.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-green-600 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <div>
                                <h4 class="font-bold text-slate-800 text-base mb-1">Kami Setting Iklannya</h4>
                                <p class="text-slate-600 text-sm">Riset kata kunci "Uang" agar iklan muncul ke orang yang siap beli.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <svg class="w-5 h-5 text-green-600 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <div>
                                <h4 class="font-bold text-slate-800 text-base mb-1">Anda Tinggal Top-Up</h4>
                                <p class="text-slate-600 text-sm">Saldo habis? Tinggal isi lagi kayak beli pulsa. Iklan jalan lagi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 order-1 md:order-2">
                    <div class="relative">
                        <!-- Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-[2rem] opacity-30 blur-2xl animate-pulse"></div>
                        
                        <!-- Chat Container -->
                        <div class="relative neu-flat p-6 md:p-8 rounded-[2rem] shadow-2xl border border-white/50">
                            <!-- Header -->
                            <div class="flex items-center justify-between border-b border-slate-100 pb-6 mb-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-black flex items-center justify-center text-black font-bold shadow-lg shadow-green-200">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-800 text-lg">Calon Pembeli</div>
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                            <span class="text-xs text-slate-500 font-medium">Online</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs text-slate-400">Today</div>
                            </div>

                            <!-- Chat Bubbles -->
                            <div class="space-y-6">
                                <!-- Incoming -->
                                <div class="flex gap-3">
                                    <div class="bg-slate-100 p-4 rounded-2xl rounded-tl-none max-w-[85%] text-slate-700 shadow-sm">
                                        <p class="text-sm leading-relaxed">Halo gan, saya lihat websitenya di Google. Mau tanya paket yang Juragan ready?</p>
                                        <span class="text-[10px] text-slate-400 mt-1 block">10:42</span>
                                    </div>
                                </div>
                                
                                <!-- Outgoing -->
                                <div class="flex gap-3 justify-end">
                                    <div class="bg-indigo-600 p-4 rounded-2xl rounded-tr-none max-w-[85%] text-gray shadow-md shadow-indigo-200">
                                        <p class="text-sm leading-relaxed">Ready Pak! Silahkan, mau dibantu proses sekarang?</p>
                                        <span class="text-[10px] text-indigo-200 mt-1 block text-right">10:43</span>
                                    </div>
                                </div>

                                <!-- Incoming -->
                                <div class="flex gap-3">
                                    <div class="bg-slate-100 p-4 rounded-2xl rounded-tl-none max-w-[85%] text-slate-700 shadow-sm">
                                        <p class="text-sm leading-relaxed">Oke siap, saya transfer sekarang ya.</p>
                                        <span class="text-[10px] text-slate-400 mt-1 block">10:45</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="mt-6 pt-4 border-t border-slate-100 text-center">
                                <p class="text-xs text-slate-400 font-medium italic">
                                    *Ilustrasi notifikasi orderan yang akan sering Anda terima
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Masih Ragu?</h2>
                <p class="text-indigo-600 text-lg font-semibold">Kami jawab pertanyaan yang paling sering ditanyakan.</p>
            </div>

            <div class="flex flex-col gap-12">
                <!-- FAQ 1 -->
                <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                    <button onclick="toggleFAQ(this)" class="w-full p-6 text-left flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="font-bold text-slate-800 text-lg">Saya Gaptek, takut nggak bisa.</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            Tenang, Pak/Bu. Tugas Anda cuma melayani pembeli di WhatsApp. Urusan teknis website dan pusingnya grafik iklan, biar tim ahli kami yang urus. Nanti kami ajarkan cara isi saldonya, <strong>semudah isi token listrik.</strong>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                    <button onclick="toggleFAQ(this)" class="w-full p-6 text-left flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600 shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="font-bold text-slate-800 text-lg">Takut Boncos (Rugi).</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            Justru kalau tidak pakai ilmu, itu yang bikin boncos. Kami risetkan kata kunci yang <strong>benar-benar dicari pembeli</strong> (kata kunci "uang"), bukan sekadar klik-klik sembarangan. Website yang kami buat juga dirancang khusus agar orang yang masuk <strong>mau belanja</strong>, bukan hanya lihat-lihat doang.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                    <button onclick="toggleFAQ(this)" class="w-full p-6 text-left flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="font-bold text-slate-800 text-lg">Berapa lama websitenya jadi?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            Untuk paket Rintisan, <strong>7-10 hari kerja</strong> sudah bisa launching. Paket Juragan sekitar <strong>14-21 hari kerja</strong> karena riset keyword lebih mendalam. Yang penting, setelah jadi, Anda langsung bisa mulai terima orderan!
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="faq-item neu-flat rounded-2xl border border-white/50 overflow-hidden">
                    <button onclick="toggleFAQ(this)" class="w-full p-6 text-left flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0 mt-0.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <span class="font-bold text-slate-800 text-lg">Apa bedanya dengan jasa lain?</span>
                        </div>
                        <svg class="faq-icon w-6 h-6 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                    <div class="faq-answer px-6 pb-6">
                        <div class="pl-12 text-slate-600 leading-relaxed">
                            Kami tidak cuma bikin website biasa. Kami siapkan <strong>Mesin Penjualan</strong> yang langsung konek ke Google Ads. Sistemnya <strong>anti-ribet</strong> — tinggal top-up saldo kayak isi pulsa. Plus, kami fokus khusus UMKM, jadi paham banget pain point Anda.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Pricing Section -->
    <section class="py-24 bg-[#eef2f6]">
        <!-- Background Glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-indigo-200/30 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Investasi Sekali, Untung Berkali-kali</h2>
                <p class="text-slate-500 text-lg">Pilih paket yang pas buat kantong Anda.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
                <!-- Basic -->
                <div class="neu-flat border border-white/50 rounded-3xl p-8 hover:-translate-y-1 transition-all">
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Paket Rintisan</h3>
                    <p class="text-slate-500 text-sm mb-6">Buat yang baru coba-coba online.</p>
                    <div class="text-3xl font-bold text-slate-900 mb-8">2 Juta-an</div>
                    <ul class="space-y-4 mb-8 text-slate-700 text-sm">
                        <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span> Web Landing Page Simple</li>
                        <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span> Setup Ads Dasar</li>
                        <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span> Gratis Domain .com</li>
                    </ul>
                    <a href="https://wa.me/6282229046099?text=Info%20Paket%20Rintisan" class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-slate-700 text-center transition-all font-medium">Pilih Paket Ini</a>
                </div>

                <!-- Pro (Highlighted) -->
                <div class="neu-flat rounded-3xl p-8 relative transform md:scale-110 shadow-2xl z-10 border-2 border-indigo-500">
                    <div class="absolute -top-3 -right-3 neu-flat border border-indigo-200 text-indigo-700 px-4 py-1 rounded-full text-xs font-bold shadow-lg whitespace-nowrap">
                        PALING LARIS 🔥
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-slate-800">Paket Juragan</h3>
                    <p class="text-slate-500 text-sm mb-8 font-medium">Paling pas buat kejar omzet.</p>
                    <div class="text-4xl font-bold text-slate-900 mb-8">5 Juta-an</div>
                    <ul class="space-y-5 mb-10 text-slate-700 text-sm font-medium">
                        <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span> <strong>Web Professional & Lengkap</strong></li>
                        <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span> <strong>Riset Keyword "Uang"</strong></li>
                        <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span> Copywriting Penjualan</li>
                        <li class="flex gap-3 items-center"><span class="text-indigo-600 font-bold">✓</span> Prioritas Support</li>
                    </ul>
                    <a href="https://wa.me/6282229046099?text=Info%20Paket%20Juragan" class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-indigo-700 font-bold text-center transition-all">Pilih Paket Ini</a>
                </div>

                <!-- Custom -->
                <div class="neu-flat border border-white/50 rounded-3xl p-8 hover:-translate-y-1 transition-all">
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Paket Sultan</h3>
                    <p class="text-slate-500 text-sm mb-6">Terima beres, full service.</p>
                    <div class="text-3xl font-bold text-slate-900 mb-8">Hubungi Kami</div>
                    <ul class="space-y-4 mb-8 text-slate-700 text-sm">
                        <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span> Full Custom Website</li>
                        <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span> Managed Service Bulanan</li>
                        <li class="flex gap-3"><span class="text-green-600 font-bold">✓</span> Konsultasi Bisnis Digital</li>
                    </ul>
                    <a href="https://wa.me/6282229046099?text=Info%20Paket%20Sultan" class="block w-full py-4 rounded-xl neu-flat hover:neu-pressed text-slate-700 text-center transition-all font-medium">Konsultasi Dulu</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 bg-[#eef2f6] text-center">
        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-5xl font-bold text-slate-800 mb-8 leading-tight">Jangan Sampai Kompetitor Anda<br>Baca Ini Duluan!</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">Slot untuk penanganan Google Ads kami terbatas setiap bulannya agar hasil maksimal. Amankan posisi Anda sekarang.</p>
            <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20amankan%20slot%20Google%20Ads." class="px-8 py-4 neu-btn font-bold text-indigo-600 inline-flex items-center justify-center">
                <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                Amankan Slot Saya
            </a>
        </div>
    </section>

    <!-- Sticky Mobile CTA -->
    <div class="sticky-cta md:hidden bg-white border-t border-slate-200 shadow-2xl p-4">
        <a href="https://wa.me/6282229046099?text=Halo,%20saya%20mau%20konsultasi%20tentang%20website%20dan%20Google%20Ads." class="flex items-center justify-center w-full px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            Konsultasi Gratis
        </a>
    </div>

    <!-- JavaScript -->
    <script>
        // FAQ Accordion
        function toggleFAQ(button) {
            const faqItem = button.closest('.faq-item');
            const answer = faqItem.querySelector('.faq-answer');
            const icon = button.querySelector('.faq-icon');
            const isActive = answer.classList.contains('active');
            
            // Close all FAQs
            document.querySelectorAll('.faq-answer').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelectorAll('.faq-icon').forEach(item => {
                item.classList.remove('active');
            });
            
            // Toggle current FAQ
            if (!isActive) {
                answer.classList.add('active');
                icon.classList.add('active');
            }
        }

        // Sticky Mobile CTA
        window.addEventListener('scroll', () => {
            const stickyCTA = document.querySelector('.sticky-cta');
            if (!stickyCTA) return;
            
            const scrollPosition = window.scrollY;
            const windowHeight = window.innerHeight;
            
            // Show sticky CTA after scrolling past hero (about 1 screen height)
            if (scrollPosition > windowHeight * 0.8) {
                stickyCTA.classList.add('show');
            } else {
                stickyCTA.classList.remove('show');
            }
        });
    </script>
</x-layout>
