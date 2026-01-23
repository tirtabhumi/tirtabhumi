<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'UpVenture' }} | Grow Your Skills, Grow Your Income</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #eef2f6;
            color: #334155;
        }

    @if(config('services.google.site_verification'))
    <meta name="google-site-verification" content="{{ config('services.google.site_verification') }}" />
    @endif

    @if(config('services.google.tag_manager_id'))
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ config('services.google.tag_manager_id') }}');</script>
    <!-- End Google Tag Manager -->
    @endif

    @if(config('services.google.analytics_id'))
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.analytics_id') }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ config('services.google.analytics_id') }}');
    </script>
    @endif

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
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #cbd5e1;
            border-radius: 10px;
        }

        /* Hide browser native password reveal button */
        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }
    </style>
</head>

<body class="antialiased text-slate-800 overflow-x-hidden">
    @if(config('services.google.tag_manager_id'))
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('services.google.tag_manager_id') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
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
                @if(request()->routeIs('dashboard') || request()->routeIs('profile.*') || request()->routeIs('payment.*') || request()->routeIs('payments.*') || request()->routeIs('affiliate.*') || request()->routeIs('affiliates.*') || request()->routeIs('my-classes.*'))
                    <!-- Empty Nav for Management Pages -->
                @else
                    <a href="/"
                        class="text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.home') }}</a>

                    <!-- Services Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors focus:outline-none py-4 hover-underline-animation">
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

                                <a href="{{ route('services.procurement') }}"
                                    class="block px-4 py-3 text-sm text-slate-600 hover:text-indigo-600 hover:bg-slate-200/50">
                                    {{ __('messages.service_procurement_title') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('trainings.index') }}"
                        class="text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.service_people_title') }}</a>
                    <a href="{{ route('blog.index') }}"
                        class="text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.blog') }}</a>
                    <a href="{{ route('contacts.index') }}"
                        class="text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors hover-underline-animation">{{ __('messages.contact') }}</a>
                @endif

            </nav>
            <div class="hidden md:flex items-center gap-6">
                <!-- Language Switcher -->
                <div class="relative group">
                    <button
                        class="flex items-center text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors focus:outline-none py-4">
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
                            class="flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-indigo-600 focus:outline-none transition-colors">
                            @if(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}"
                                    class="w-8 h-8 rounded-full object-cover border border-slate-200">
                            @else
                                <div
                                    class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xs border border-indigo-200">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div id="user-menu-dropdown"
                            class="absolute right-0 mt-0 w-56 neu-flat rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-nowrap">{{ __('messages.profile_settings') }}</a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-nowrap">{{ __('messages.dashboard') }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 whitespace-nowrap">{{ __('messages.sign_out') }}</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors hover-underline-animation">
                            {{ __('messages.login') }}
                        </a>
                        <a href="{{ route('register') }}"
                            class="text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors hover-underline-animation">
                            {{ __('messages.sign_up') }}
                        </a>
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

    <main class="pt-32 min-h-screen relative overflow-hidden">
        @if(session('success'))
            <div class="container mx-auto px-6 mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="container mx-auto px-6 mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            </div>
        @endif

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
                        <li><a href="{{ route('trainings.index') }}"
                                class="hover:text-indigo-600 transition-all hover:translate-x-1 inline-block">{{ __('messages.service_people_title') }}</a>
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
                    @if(request()->routeIs('dashboard') || request()->routeIs('profile.*') || request()->routeIs('payment.*') || request()->routeIs('payments.*') || request()->routeIs('affiliate.*') || request()->routeIs('affiliates.*') || request()->routeIs('my-classes.*'))
                        <!-- Empty Nav for Management Pages -->
                    @else
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
                                <a href="{{ route('services.procurement') }}"
                                    class="text-base text-slate-500 hover:text-indigo-600 py-2 block">{{ __('messages.service_procurement_title') }}</a>
                            </div>
                        </div>

                        <a href="{{ route('trainings.index') }}"
                            class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.service_people_title') }}</a>
                        <a href="/#about"
                            class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.about') }}</a>
                        <a href="{{ route('blog.index') }}"
                            class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.blog') }}</a>
                        <a href="{{ route('contacts.index') }}"
                            class="text-lg font-medium text-slate-800 hover:text-indigo-600 transition-colors py-4 border-b border-slate-100">{{ __('messages.contact') }}</a>
                    @endif

                    <!-- Mobile Auth Switcher -->
                    @auth
                        <div class="pt-4 pb-2 border-b border-slate-100">
                            <p class="text-sm text-slate-400 mb-2">{{ __('messages.signed_in_as') }} <span
                                    class="font-bold text-slate-600">{{ Auth::user()->name }}</span></p>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-700 transition-colors">
                                {{ __('messages.profile_settings') }}
                            </a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-slate-700 transition-colors">
                                {{ __('messages.dashboard') }}
                            </a>
                            <div class="border-t border-slate-200 dark:border-slate-700 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-center px-4 py-2 text-sm text-red-600 hover:bg-slate-100 dark:text-red-400 dark:hover:bg-slate-700 transition-colors">
                                    {{ __('messages.sign_out') }}
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="flex flex-col gap-3 mt-6">
                            <a href="{{ route('login') }}"
                                class="w-full py-3 rounded-xl text-center font-bold border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
                                {{ __('messages.login') }}
                            </a>
                            <a href="{{ route('register') }}"
                                class="w-full py-3 rounded-xl text-center font-bold bg-indigo-600 text-white shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-colors">
                                {{ __('messages.sign_up') }}
                            </a>
                        </div>
                    @endauth

                    <!-- Social Icons (Mobile) -->
                    <div class="mt-8 pt-6 border-t border-slate-100">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">
                            {{ __('messages.connect') }}
                        </p>
                        <div class="flex justify-center gap-6">
                            <a href="https://linkedin.com/company/pt-tirta-bhumi-indonesia" target="_blank"
                                rel="noopener noreferrer"
                                class="text-slate-400 hover:text-indigo-600 transition-colors">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/tirtabhumi.id/" target="_blank" rel="noopener noreferrer"
                                class="text-slate-400 hover:text-pink-600 transition-colors">
                                <span class="sr-only">Instagram</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.37c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/tirtabhumiid/" target="_blank" rel="noopener noreferrer"
                                class="text-slate-400 hover:text-blue-600 transition-colors">
                                <span class="sr-only">Facebook</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="https://wa.me/6282229046099" target="_blank" rel="noopener noreferrer"
                                class="text-slate-400 hover:text-green-500 transition-colors">
                                <span class="sr-only">WhatsApp</span>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M20.5 3.5a12.004 12.004 0 00-16.97 16.97c3.95 3.95 9.99 4.3 14.36 1.05l.39-.29 4.5 1.18-.85-4.4-.28-.43A11.977 11.977 0 0020.5 3.5zM12 21.75c-2.05 0-3.99-.62-5.63-1.69l-.4-.27-2.9.76.77-2.82-.26-.42a9.75 9.75 0 118.42 4.44zm5.34-7.29c-.29-.15-1.74-.86-2-1-.28-.1-.47-.15-.67.15-.19.29-.77 1-.94 1.17-.18.19-.35.22-.64.08a8.2 8.2 0 01-3.83-2.36 9.07 9.07 0 01-1.65-2.06c-.18-.29-.02-.45.12-.6.13-.13.3-.34.45-.51.15-.18.19-.3.29-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.62-.91-2.22-.24-.59-.49-.51-.67-.52-.17-.01-.37-.01-.57-.01-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.21 3.08c.15.2 2.1 3.21 5.09 4.5.71.3 1.26.49 1.69.63.71.22 1.36.19 1.87.11.57-.08 1.76-.72 2.01-1.42.25-.69.25-1.29.17-1.42-.07-.12-.27-.2-.57-.35z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
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
                // Navbar Scroll Effect
                const navbar = document.getElementById('navbar');
                function handleScroll() {
                    if (window.scrollY > 20) {
                        navbar.classList.add('bg-[#eef2f6]/80', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-white/20');
                    } else {
                        navbar.classList.remove('bg-[#eef2f6]/80', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-white/20');
                    }
                }
                window.addEventListener('scroll', handleScroll);
                handleScroll(); // Initial check
            });
        </script>
</body>

</html>