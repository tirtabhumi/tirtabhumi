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
    </style>
</head>

<body class="antialiased text-slate-800 min-h-screen flex flex-col relative overflow-x-hidden">
    
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full z-50 p-3 md:p-4 pointer-events-none">
        <div class="container mx-auto max-w-7xl pointer-events-auto">
            <div class="flex items-center justify-between gap-4">
                
                <!-- Left Side: Back Button -->
                <a href="/" class="group flex items-center gap-3 text-slate-600 hover:text-indigo-600 transition-colors">
                    <div class="neu-icon-btn">
                        <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-sm">Back to Website</span>
                </a>

                <!-- Right Side: Logo & Switcher -->
                <div class="flex items-center gap-4 md:gap-8">
                    <!-- Logo -->
                     <a href="/" class="flex items-center gap-3 group">
                        <x-logo class="h-10 w-auto text-indigo-600" />
                        <div class="h-8 w-[1px] bg-slate-300"></div>
                        <span class="text-xl font-bold text-indigo-600 tracking-tighter">UpVenture</span>
                    </a>

                    <!-- Auth Switcher -->
                    <div class="neu-pressed p-1 rounded-full flex items-center w-[220px]">
                        <a href="{{ route('login') }}" class="flex-1 text-center py-2 px-4 rounded-full text-sm font-bold whitespace-nowrap transition-all {{ request()->routeIs('login') ? 'neu-flat text-indigo-600' : 'text-slate-500 hover:text-indigo-600' }}">Log In</a>
                        <a href="{{ route('register') }}" class="flex-1 text-center py-2 px-4 rounded-full text-sm font-bold whitespace-nowrap transition-all {{ request()->routeIs('register') ? 'neu-flat text-indigo-600' : 'text-slate-500 hover:text-indigo-600' }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center relative z-10 w-full px-4 pb-4 pt-20 md:px-0 md:pb-0 md:pt-24">
        {{ $slot }}
    </main>

</body>
</html>
