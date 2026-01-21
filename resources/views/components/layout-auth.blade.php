<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Auth' }} | UpVenture</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #eef2f6;
            color: #334155;
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

        .neu-icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #eef2f6;
            box-shadow: 5px 5px 10px #d1d9e6, -5px -5px 10px #ffffff;
            transition: all 0.3s ease;
            color: #64748b;
        }

        .neu-icon-btn:hover {
            color: #4f46e5;
            box-shadow: 2px 2px 5px #d1d9e6, -2px -2px 5px #ffffff;
            transform: translateY(1px);
        }

        /* Hide browser native password reveal button */
        input::-ms-reveal,
        input::-ms-clear {
            display: none;
        }

        /* Prevent background change on autofill */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #eef2f6 inset !important;
            -webkit-text-fill-color: #334155 !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>

<body class="antialiased text-slate-800 min-h-screen flex flex-col relative overflow-x-hidden">

    <!-- Header -->
    <header id="navbar" class="fixed top-0 left-0 w-full z-50 p-3 md:p-4 pointer-events-none transition-all duration-300">
        <div class="container mx-auto max-w-7xl pointer-events-auto relative">
            <div class="flex items-center justify-between w-full h-12 md:h-16">
                
                <!-- Left Side: Back Button -->
                <div class="flex items-center min-w-[40px] md:min-w-[80px]">
                    @unless($hideBackButton ?? false)
                        <a href="/" class="group text-slate-600 hover:text-indigo-600 transition-colors">
                            <div class="neu-icon-btn">
                                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                            </div>
                        </a>
                    @endunless
                </div>

                <!-- Center: Logo (Absolute Centered) -->
                <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                    <a href="/" class="flex items-center gap-2 md:gap-3 whitespace-nowrap">
                        <x-logo class="h-8 md:h-10 w-auto text-indigo-600" />
                        <div class="h-6 md:h-8 w-[1px] bg-slate-300"></div>
                        <span class="text-lg md:text-xl font-bold text-indigo-600 tracking-tighter">UpVenture</span>
                    </a>
                </div>

                <!-- Right Side: Auth Switcher -->
                <div class="flex items-center justify-end min-w-[40px] md:min-w-[80px]">
                    @unless($hideAuthSwitcher ?? false)
                        <div class="flex items-center gap-3 md:gap-6">
                            <a href="{{ route('login') }}"
                                class="text-xs md:text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors">
                                {{ __('messages.login') }}
                            </a>
                            <a href="{{ route('register') }}"
                                class="text-xs md:text-sm font-medium text-slate-800 hover:text-indigo-600 transition-colors">
                                Sign Up
                            </a>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </header>

    <main
        class="flex-grow flex items-center justify-center relative z-10 w-full px-4 pb-4 pt-20 md:px-0 md:pb-0 md:pt-24">
        {{ $slot }}
    </main>

    <script>
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                // Using Tailwind classes that match the main layout's "glass" look
                navbar.classList.add('bg-[#eef2f6]/80', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-white/20');
            } else {
                navbar.classList.remove('bg-[#eef2f6]/80', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-white/20');
            }
        });
    </script>
</body>

</html>