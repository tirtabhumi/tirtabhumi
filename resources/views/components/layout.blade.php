<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
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
    <meta property="og:image" content="{{ asset('images/logo-preview.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Tirta Bhumi Indonesia' }}">
    <meta property="twitter:description"
        content="Solusi terpercaya untuk Jasa Digital Marketing, Jasa Membuat Website, Jasa Membuat Company Profile, dan Pengadaan barang dan jasa.">
    <meta property="twitter:image" content="{{ asset('images/logo-preview.png') }}">
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
            <div class="flex items-center gap-3">
                <a href="/" class="flex items-center gap-3 group">
                    <x-logo class="h-10 w-auto transition-opacity hover:opacity-80" />
                </a>
                <!-- Mobile Language Switcher -->
                <div class="md:hidden">
                    <a href="{{ route('locale.switch', app()->getLocale() == 'en' ? 'id' : 'en') }}" 
                       class="text-xs font-bold text-slate-600 border border-slate-300 rounded-md px-2 py-1 hover:bg-slate-100 transition-colors">
                        {{ app()->getLocale() == 'en' ? 'ID' : 'EN' }}
                    </a>
                </div>
            </div>
            <nav class="hidden md:flex space-x-8 items-center">
                <a href="/"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.home') }}</a>
                <a href="/#about"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.about') }}</a>

                <!-- Services Dropdown -->
                <div class="relative group">
                    <button
                        class="flex items-center text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors focus:outline-none py-4 hover-underline-animation">
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
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.blog') }}</a>
                <a href="/#contact"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.contact') }}</a>

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
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-slate-600 focus:outline-none p-2 relative z-50 active:scale-90 transition-transform duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </header>

    <div id="content-wrapper" class="transition-all duration-300 ease-in-out">
        <main id="main-content">
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
                            <li><a href="/" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Home</a></li>
                            <li><a href="/#about" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Tentang Kami</a></li>
                            <li><a href="/#services" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Layanan</a></li>
                            <li><a href="{{ route('blog.index') }}" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Blog</a>
                            </li>
                            <li><a href="/#contact" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Kontak</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 mb-4">Connect</h4>
                        <ul class="space-y-2 text-sm text-slate-500">
                            <li><a href="#" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">LinkedIn</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Instagram</a></li>
                            <li><a href="#" class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Facebook</a></li>
                            <li><a href="https://wa.me/6282229046099"
                                    class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">WhatsApp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pt-8 border-t border-slate-200/50 text-center text-slate-400 text-sm">
                    &copy; {{ date('Y') }} PT Tirta Bhumi Indonesia. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <!-- Mobile Menu Backdrop -->
    <div id="mobile-menu-backdrop" class="fixed inset-0 z-[9998] bg-black/20 backdrop-blur-sm hidden transition-opacity duration-300 opacity-0 md:hidden"></div>

    <!-- Mobile Menu Drawer -->
    <div id="mobile-menu" class="fixed inset-0 z-[10000] bg-white transform translate-x-full transition-transform duration-300 md:hidden flex flex-col h-full" style="background-color: #ffffff !important;">
        <div class="flex flex-col h-full">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <div class="flex items-center gap-2">
                    <x-logo class="h-8 w-auto" />
                </div>
                <button id="close-menu-btn" class="text-slate-800 hover:text-indigo-600 transition-colors focus:outline-none p-2 active:scale-90 transition-transform duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto px-6 py-4">
                <div class="flex flex-col text-center">
                    <a href="/" class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.home') }}</a>
                    
                    <!-- Services Dropdown -->
                    <div class="border-b border-slate-100">
                        <button id="mobile-services-btn" class="flex items-center justify-center w-full text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors focus:outline-none py-4 group gap-2">
                            <span>{{ __('messages.services') }}</span>
                            <svg id="mobile-services-icon" class="w-5 h-5 transform transition-transform duration-200 text-slate-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobile-services-menu" class="hidden flex-col space-y-2 pb-4">
                            <a href="{{ route('services.digital') }}" class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_digital_title') }}</a>
                            <a href="{{ route('services.infrastructure') }}" class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_infra_title') }}</a>
                            <a href="{{ route('services.people') }}" class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_people_title') }}</a>
                            <a href="{{ route('services.procurement') }}" class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_procurement_title') }}</a>
                        </div>
                    </div>

                    <a href="/#about" class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.about') }}</a>
                    <a href="{{ route('blog.index') }}" class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.blog') }}</a>
                    <a href="/#contact" class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.contact') }}</a>
                    
                    <div class="mt-auto pt-8 pb-8">
                        <div class="flex gap-4 justify-center">
                            <!-- Instagram -->
                            <a href="#" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:border-indigo-600 hover:text-indigo-600 transition-all hover:-translate-y-1 hover:shadow-md">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.373c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <!-- LinkedIn -->
                            <a href="#" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:border-indigo-600 hover:text-indigo-600 transition-all hover:-translate-y-1 hover:shadow-md">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <!-- WhatsApp -->
                            <a href="https://wa.me/6282229046099" class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-600 hover:border-indigo-600 hover:text-indigo-600 transition-all hover:-translate-y-1 hover:shadow-md">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM16.07 16.1C15.9 16.5 15.2 16.9 14.6 17C14.2 17.1 13.7 17.1 12.5 16.6C11.1 16 9.9 15.1 8.9 14.1C7.9 13.1 7 11.9 6.4 10.5C5.9 9.3 5.9 8.8 6 8.4C6.1 7.8 6.5 7.1 6.9 7.1C7 7.1 7.1 7.1 7.2 7.1C7.4 7.1 7.6 7.1 7.7 7.4C7.9 7.8 8.4 9 8.5 9.2C8.6 9.4 8.6 9.6 8.5 9.8C8.4 10 8.2 10.1 8 10.3C7.8 10.5 7.6 10.6 7.8 11C8.3 11.8 9 12.8 10 13.5C10.5 13.8 10.9 13.9 11.2 13.8C11.5 13.7 11.9 13.3 12.1 12.9C12.3 12.6 12.6 12.6 12.9 12.7C13.2 12.8 14.7 13.5 15 13.7C15.3 13.8 15.5 13.9 15.6 14C15.7 14.3 15.6 15.6 16.07 16.1Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Custom Cursor Elements -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        
        /* Hover Underline Animation */
        .hover-underline-animation {
            position: relative;
        }

        .hover-underline-animation::after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #4f46e5; /* Indigo-600 */
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .hover-underline-animation:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        @media (pointer: fine) {
            #fluid-cursor {
                display: block;
            }
        }
        @media (pointer: coarse) {
            #fluid-cursor {
                display: none;
            }
        }
    </style>
    <div id="fluid-cursor" class="fixed top-0 left-0 w-8 h-8 rounded-full pointer-events-none z-[9999] opacity-0 transition-opacity duration-500"
         style="border: 1px solid rgba(99, 102, 241, 0.5); background: rgba(99, 102, 241, 0.05);"></div>

    <script>
        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('glass');
            } else {
                navbar.classList.remove('glass');
            }
        });

        // Fluid Jelly Cursor Animation
        document.addEventListener('DOMContentLoaded', () => {
            if (!window.matchMedia('(pointer: fine)').matches) return;

            const cursor = document.getElementById('fluid-cursor');
            if (!cursor) return;

            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;
            let cursorX = mouseX;
            let cursorY = mouseY;
            let velX = 0;
            let velY = 0;
            let scale = 1;
            let isHovering = false;

            // Show cursor
            setTimeout(() => {
                cursor.classList.remove('opacity-0');
            }, 500);

            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });

            // Hover effects
            const interactiveElements = document.querySelectorAll('a, button, input, textarea, select');
            interactiveElements.forEach(el => {
                el.addEventListener('mouseenter', () => {
                    isHovering = true;
                    cursor.style.background = 'rgba(99, 102, 241, 0.15)';
                    cursor.style.borderColor = 'transparent';
                });
                el.addEventListener('mouseleave', () => {
                    isHovering = false;
                    cursor.style.background = 'rgba(99, 102, 241, 0.05)';
                    cursor.style.borderColor = 'rgba(99, 102, 241, 0.5)';
                });
            });

            function animate() {
                // Calculate velocity for smooth follow
                const speed = 0.15;
                const targetX = mouseX;
                const targetY = mouseY;
                
                // Previous position
                const prevX = cursorX;
                const prevY = cursorY;

                // Update position
                cursorX += (targetX - cursorX) * speed;
                cursorY += (targetY - cursorY) * speed;

                // Calculate current velocity
                velX = cursorX - prevX;
                velY = cursorY - prevY;
                
                const velocity = Math.sqrt(velX * velX + velY * velY);
                const angle = Math.atan2(velY, velX) * 180 / Math.PI;

                // Calculate stretch based on velocity
                // Clamp max stretch to avoid extreme distortion
                const stretch = Math.min(velocity * 0.04, 0.5); 
                
                let scaleX = 1 + stretch;
                let scaleY = 1 - stretch * 0.5; // Maintain approximate volume

                // If hovering, override squash/stretch for a stable "magnetic" feel
                if (isHovering) {
                    scaleX = 1.8; // Scale up uniformly
                    scaleY = 1.8;
                    // Smoothly interpolate rotation back to 0 or keep it? 
                    // Let's just apply the scale and ignore rotation for hover to make it look stable
                    cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0) translate(-50%, -50%) scale(${scaleX}, ${scaleY})`;
                } else {
                    cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0) translate(-50%, -50%) rotate(${angle}deg) scale(${scaleX}, ${scaleY})`;
                }

                requestAnimationFrame(animate);
            }

            animate();
        });

        // Mobile Menu Logic
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMenuBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const backdrop = document.getElementById('mobile-menu-backdrop');
            const mobileServicesBtn = document.getElementById('mobile-services-btn');
            const mobileServicesMenu = document.getElementById('mobile-services-menu');
            const mobileServicesIcon = document.getElementById('mobile-services-icon');

            function openMenu() {
                if(mobileMenu && backdrop) {
                    mobileMenu.classList.remove('translate-x-full');
                    backdrop.classList.remove('hidden');
                    // Small delay to allow display:block to apply before opacity transition
                    setTimeout(() => {
                        backdrop.classList.remove('opacity-0');
                    }, 10);
                    document.body.style.overflow = 'hidden';
                    
                    // Fade out Navbar to prevent stacking issues
                    const navbar = document.getElementById('navbar');
                    if(navbar) {
                        navbar.classList.add('opacity-0', 'pointer-events-none');
                    }

                    // Fade out content wrapper to prevent bleed-through smoothly
                    const contentWrapper = document.getElementById('content-wrapper');
                    if(contentWrapper) {
                        contentWrapper.classList.add('opacity-0', 'pointer-events-none');
                    }
                }
            }

            function closeMenu() {
                if(mobileMenu && backdrop) {
                    mobileMenu.classList.add('translate-x-full');
                    backdrop.classList.add('opacity-0');
                    
                    // Fade in Navbar immediately so it's visible as menu slides out
                    const navbar = document.getElementById('navbar');
                    if(navbar) {
                        navbar.classList.remove('opacity-0', 'pointer-events-none');
                    }

                    // Fade in content wrapper immediately
                    const contentWrapper = document.getElementById('content-wrapper');
                    if(contentWrapper) {
                        contentWrapper.classList.remove('opacity-0', 'pointer-events-none');
                    }

                    setTimeout(() => {
                        backdrop.classList.add('hidden');
                    }, 300);
                    document.body.style.overflow = '';
                }
            }

            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openMenu();
                });
            }

            if (closeMenuBtn) {
                closeMenuBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    closeMenu();
                });
            }

            if (backdrop) {
                backdrop.addEventListener('click', closeMenu);
            }

            // Close menu when clicking a link (but NOT the services toggle button)
            if (mobileMenu) {
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', closeMenu);
                });
            }

            // Services Dropdown Toggle
            if (mobileServicesBtn && mobileServicesMenu && mobileServicesIcon) {
                mobileServicesBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation(); // CRITICAL: Stop event from bubbling to parents
                    
                    const isHidden = mobileServicesMenu.classList.contains('hidden');
                    if (isHidden) {
                        mobileServicesMenu.classList.remove('hidden');
                        mobileServicesMenu.classList.add('flex');
                        mobileServicesIcon.style.transform = 'rotate(180deg)';
                    } else {
                        mobileServicesMenu.classList.add('hidden');
                        mobileServicesMenu.classList.remove('flex');
                        mobileServicesIcon.style.transform = 'rotate(0deg)';
                    }
                });
                
                // Prevent clicks inside the services menu from closing the main menu immediately 
                // (unless it's a link, which is handled by the 'a' tag listener above)
                mobileServicesMenu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            }
        });

        // Disable Developer Tools (F12, Inspect, View Source)
        document.addEventListener('keydown', (e) => {
            if (
                // F12
                e.key === 'F12' || 
                e.keyCode === 123 ||
                // Ctrl+Shift+I (Windows) / Cmd+Option+I (Mac)
                ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 'I' || e.key === 'i')) ||
                // Ctrl+Shift+J (Windows) / Cmd+Option+J (Mac)
                ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 'J' || e.key === 'j')) ||
                // Ctrl+U (View Source) / Cmd+Option+U (Mac)
                ((e.ctrlKey || e.metaKey) && (e.key === 'U' || e.key === 'u'))
            ) {
                e.preventDefault();
            }
        });

        // Disable Right Click
        document.addEventListener('contextmenu', (e) => {
            e.preventDefault();
        });
    </script>
</body>
</html>