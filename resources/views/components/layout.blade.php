<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <title>{{ $title ?? 'Tirta Bhumi Indonesia' }}</title>
    <meta name="description"
        content="Tirta Bhumi Indonesia - Solusi terpercaya untuk Jasa Digital Marketing, Jasa Membuat Website, Jasa Membuat Company Profile, dan Pengadaan barang dan jasa.">
    <meta name="keywords"
        content="Jasa Digital Marketing, Jasa Membuat Website, Jasa Membuat Company Profile, Pengadaan barang dan jasa, Tirta Bhumi Indonesia">
    <meta name="author" content="Tirta Bhumi Indonesia">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Tirta Bhumi Indonesia' }}">
    <meta property="og:description"
        content="Solusi terpercaya untuk Jasa Digital Marketing, Jasa Membuat Website, Jasa Membuat Company Profile, dan Pengadaan barang dan jasa.">
    <meta property="og:image" content="{{ asset('images/logo-white.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Tirta Bhumi Indonesia' }}">
    <meta property="twitter:description"
        content="Solusi terpercaya untuk Jasa Digital Marketing, Jasa Membuat Website, Jasa Membuat Company Profile, dan Pengadaan barang dan jasa.">
    <meta property="twitter:image" content="{{ asset('images/logo-white.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #eef2f6;
            /* Common neumorphic background */
            color: #334155;
        }

        /* Glassmorphism Light */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* Neumorphism Flat */
        .neu-flat {
            border-radius: 1rem;
            background: #eef2f6;
            box-shadow: 8px 8px 16px #d1d9e6,
                -8px -8px 16px #ffffff;
        }

        /* Neumorphism Pressed/Inset */
        .neu-pressed {
            border-radius: 1rem;
            background: #eef2f6;
            box-shadow: inset 8px 8px 16px #d1d9e6,
                inset -8px -8px 16px #ffffff;
        }

        /* Neumorphism Button */
        .neu-btn {
            border-radius: 50px;
            background: #eef2f6;
            box-shadow: 5px 5px 10px #d1d9e6,
                -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
            color: #4f46e5;
            /* Indigo-600 */
        }

        .neu-btn:hover {
            box-shadow: 2px 2px 5px #d1d9e6,
                -2px -2px 5px #ffffff;
            transform: translateY(1px);
        }

        .neu-btn:active {
            box-shadow: inset 5px 5px 10px #d1d9e6,
                inset -5px -5px 10px #ffffff;
        }
        
        /* Make logo dark/black for light theme */
        .logo-dark {
            filter: brightness(0) saturate(100%);
        }
    </style>
</head>

<body class="antialiased selection:bg-indigo-500 selection:text-white">
    <header class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="container mx-auto px-6 py-3 sm:py-4 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 group">
                <x-logo class="h-10 w-auto transition-opacity hover:opacity-80" />
            </a>
            <nav class="hidden md:flex space-x-8 items-center">
                <a href="/"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">{{ __('messages.home') }}</a>
                <a href="/#about"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">{{ __('messages.about') }}</a>

                <!-- Services Dropdown -->
                <div class="relative group">
                    <button
                        class="flex items-center text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors focus:outline-none py-4">
                        {{ __('messages.services') }}
                        <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-0 w-64 neu-flat rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-left z-50 overflow-hidden border border-white/50">
                        <div class="py-2">
                            <a href="{{ route('services.digital') }}"
                                class="block px-4 py-3 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50 border-b border-slate-100">
                                {{ __('messages.service_digital_title') }}
                            </a>
                            <a href="{{ route('services.infrastructure') }}"
                                class="block px-4 py-3 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50 border-b border-slate-100">
                                {{ __('messages.service_infra_title') }}
                            </a>
                            <a href="{{ route('services.people') }}"
                                class="block px-4 py-3 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50 border-b border-slate-100">
                                {{ __('messages.service_people_title') }}
                            </a>
                            <a href="{{ route('services.procurement') }}"
                                class="block px-4 py-3 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50">
                                {{ __('messages.service_procurement_title') }}
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('blog.index') }}"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">{{ __('messages.blog') }}</a>
                <a href="/#contact"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors">{{ __('messages.contact') }}</a>

                <!-- Language Switcher -->
                <div class="relative group">
                    <button
                        class="flex items-center text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors focus:outline-none py-4">
                        <span class="uppercase">{{ app()->getLocale() }}</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute right-0 mt-0 w-32 neu-flat rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right z-50 overflow-hidden border border-white/50">
                        <div class="py-1">
                            <a href="{{ route('locale.switch', 'en') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50 {{ app()->getLocale() == 'en' ? 'text-indigo-600 font-bold' : '' }}">
                                English
                            </a>
                            <a href="{{ route('locale.switch', 'id') }}"
                                class="block px-4 py-2 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50 {{ app()->getLocale() == 'id' ? 'text-indigo-600 font-bold' : '' }}">
                                Indonesia
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <a href="https://wa.me/6282229046099" target="_blank"
                class="hidden md:inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold neu-btn">
                {{ __('messages.contact_us') }}
            </a>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-[#eef2f6] py-12 border-t border-slate-200/50 neu-pressed mt-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <x-logo class="h-10 w-auto" />
                    </div>
                    <p class="mt-4 text-slate-500 text-sm leading-relaxed max-w-sm">
                        PT Tirta Bhumi Indonesia.<br>
                        Mitra Strategis Solusi Digital, Infrastruktur, dan Pengadaan Terpadu.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="/" class="hover:text-indigo-600 transition-colors">Home</a></li>
                        <li><a href="/#about" class="hover:text-indigo-600 transition-colors">Tentang Kami</a></li>
                        <li><a href="/#services" class="hover:text-indigo-600 transition-colors">Layanan</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-indigo-600 transition-colors">Blog</a>
                        </li>
                        <li><a href="/#contact" class="hover:text-indigo-600 transition-colors">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-4">Connect</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="#" class="hover:text-indigo-600 transition-colors">LinkedIn</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition-colors">Instagram</a></li>
                        <li><a href="#" class="hover:text-indigo-600 transition-colors">Facebook</a></li>
                        <li><a href="https://wa.me/6282229046099"
                                class="hover:text-indigo-600 transition-colors">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-slate-200/50 text-center text-slate-400 text-sm">
                &copy; {{ date('Y') }} PT Tirta Bhumi Indonesia. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('glass');
            } else {
                navbar.classList.remove('glass');
            }
        });
    </script>
</body>
</html>