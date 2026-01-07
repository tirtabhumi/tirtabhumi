<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'UpVenture' }} | Grow Your Skills, Grow Your Income</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #eef2f6;
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
            background-color: #4f46e5;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .hover-underline-animation:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }
    </style>
</head>

<body class="antialiased text-slate-800">
    <header class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="container mx-auto px-6 py-3 sm:py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <a href="/" class="flex items-center gap-3 group">
                    <x-logo class="h-10 w-auto transition-opacity hover:opacity-80" />
                    <div class="h-8 w-[1px] bg-slate-200"></div>
                    <span class="text-xl font-bold text-indigo-600 tracking-tighter">UpVenture</span>
                </a>
                <!-- Mobile Language Switcher -->
                <div class="md:hidden">
                    <a href="{{ route('locale.switch', app()->getLocale() == 'en' ? 'id' : 'en') }}"
                        class="text-xs font-bold text-slate-600 border border-slate-300 rounded-md px-2 py-1 hover:bg-slate-100 transition-colors">
                        {{ app()->getLocale() == 'en' ? 'ID' : 'EN' }}
                    </a>
                </div>
            </div>
            <nav class="hidden md:flex space-x-8 items-center flex-1 justify-center">
                <a href="/"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.home') }}</a>

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
                            <a href="{{ route('trainings.index') }}"
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
                <a href="{{ route('contacts.index') }}"
                    class="text-sm font-medium text-slate-600 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.contact') }}</a>

            </nav>
            <div class="hidden md:flex items-center gap-6">
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

                <!-- Auth (UpVenture Specific) -->
                @auth
                    <div class="relative ml-3">
                        <button id="user-menu-btn"
                            class="flex items-center text-sm font-medium text-slate-600 hover:text-indigo-600 focus:outline-none transition-colors">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="user-menu-dropdown"
                            class="absolute right-0 mt-0 w-48 neu-flat rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                            <a href="/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="text-sm font-bold text-slate-600 hover:text-indigo-600 transition-colors">{{ __('messages.login') }}</a>
                        <a href="{{ route('register') }}" class="neu-btn px-6 py-2 text-sm font-bold">Sign Up</a>
                    </div>
                @endauth
            </div>
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn"
                class="md:hidden text-slate-600 focus:outline-none p-2 relative z-50 active:scale-90 transition-transform duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
    </header>

    <main class="pt-32 min-h-screen">
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
                        {!! __('messages.footer_desc_full') !!}
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-4">{{ __('messages.quick_links') }}</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="/"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">{{ __('messages.home') }}</a>
                        </li>
                        <li><a href="/#about"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">{{ __('messages.about') }}</a>
                        </li>
                        <li><a href="/#services"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">{{ __('messages.services') }}</a>
                        </li>
                        <li><a href="{{ route('blog.index') }}"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">{{ __('messages.blog') }}</a>
                        </li>
                        <li><a href="{{ route('contacts.index') }}"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">{{ __('messages.contact') }}</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 mb-4">{{ __('messages.connect') }}</h4>
                    <ul class="space-y-2 text-sm text-slate-500">
                        <li><a href="https://linkedin.com/company/pt-tirta-bhumi-indonesia" target="_blank"
                                rel="noopener noreferrer"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">LinkedIn</a>
                        </li>
                        <li><a href="https://www.instagram.com/tirtabhumi.id/" target="_blank" rel="noopener noreferrer"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Instagram</a>
                        </li>
                        <li><a href="https://www.facebook.com/tirtabhumiid/" target="_blank" rel="noopener noreferrer"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">Facebook</a>
                        </li>
                        <li><a href="https://wa.me/6282229046099" target="_blank" rel="noopener noreferrer"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">WhatsApp</a>
                        </li>
                        <li><a href="mailto:hello@tirtabhumi.com"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">hello@tirtabhumi.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-slate-200/50 text-center text-slate-400 text-sm">
                &copy; {{ date('Y') }} PT Tirta Bhumi Indonesia. All rights reserved.
            </div>
        </div>
    </footer>
    <!-- Mobile Menu Backdrop -->
    <div id="mobile-menu-backdrop"
        class="fixed inset-0 z-[9998] bg-black/20 backdrop-blur-sm hidden transition-opacity duration-300 opacity-0 md:hidden">
    </div>

    <!-- Mobile Menu Drawer -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[10000] bg-white transform translate-x-full transition-transform duration-300 md:hidden flex flex-col h-full"
        style="background-color: #ffffff !important;">
        <div class="flex flex-col h-full">
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 flex-shrink-0">
                <div class="flex items-center gap-2">
                    <x-logo class="h-8 w-auto" />
                </div>
                <button id="close-menu-btn"
                    class="text-slate-800 hover:text-indigo-600 transition-colors focus:outline-none p-2 active:scale-90 transition-transform duration-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto px-6 py-4">
                <div class="flex flex-col text-center">
                    <a href="/"
                        class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.home') }}</a>

                    <!-- Services Dropdown -->
                    <div class="border-b border-slate-100">
                        <button id="mobile-services-btn"
                            class="flex items-center justify-center w-full text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors focus:outline-none py-4 group gap-2">
                            <span>{{ __('messages.services') }}</span>
                            <svg id="mobile-services-icon"
                                class="w-5 h-5 transform transition-transform duration-200 text-slate-400 group-hover:text-indigo-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="mobile-services-menu" class="hidden flex-col space-y-2 pb-4">
                            <a href="{{ route('services.digital') }}"
                                class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_digital_title') }}</a>
                            <a href="{{ route('services.infrastructure') }}"
                                class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_infra_title') }}</a>
                            <a href="{{ route('trainings.index') }}"
                                class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_people_title') }}</a>
                            <a href="{{ route('services.procurement') }}"
                                class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_procurement_title') }}</a>
                        </div>
                    </div>

                    <a href="/#about"
                        class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.about') }}</a>
                    <a href="{{ route('blog.index') }}"
                        class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.blog') }}</a>
                    <a href="{{ route('contacts.index') }}"
                        class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.contact') }}</a>
                </div>
            </nav>
        </div>
    </div>

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

        // Mobile Menu Logic
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const closeMenuBtn = document.getElementById('close-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const backdrop = document.getElementById('mobile-menu-backdrop');
            const mobileServicesBtn = document.getElementById('mobile-services-btn');
            const mobileServicesMenu = document.getElementById('mobile-services-menu');
            const mobileServicesIcon = document.getElementById('mobile-services-icon');

            // User Menu Toggle (Desktop)
            const userMenuBtn = document.getElementById('user-menu-btn');
            const userMenuDropdown = document.getElementById('user-menu-dropdown');

            if (userMenuBtn && userMenuDropdown) {
                userMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    userMenuDropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!userMenuBtn.contains(e.target) && !userMenuDropdown.contains(e.target)) {
                        userMenuDropdown.classList.add('hidden');
                    }
                });
            }


            function openMenu() {
                if (mobileMenu && backdrop) {
                    mobileMenu.classList.remove('translate-x-full');
                    backdrop.classList.remove('hidden');
                    setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
                    document.body.style.overflow = 'hidden';
                }
            }

            function closeMenu() {
                if (mobileMenu && backdrop) {
                    mobileMenu.classList.add('translate-x-full');
                    backdrop.classList.add('opacity-0');
                    setTimeout(() => backdrop.classList.add('hidden'), 300);
                    document.body.style.overflow = '';
                }
            }

            if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', (e) => { e.preventDefault(); openMenu(); });
            if (closeMenuBtn) closeMenuBtn.addEventListener('click', (e) => { e.preventDefault(); closeMenu(); });
            if (backdrop) backdrop.addEventListener('click', closeMenu);

            // Services Dropdown Toggle
            if (mobileServicesBtn && mobileServicesMenu && mobileServicesIcon) {
                mobileServicesBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();

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

                mobileServicesMenu.addEventListener('click', (e) => {
                    e.stopPropagation();
                });
            }
        });
    </script>
</body>

</html>