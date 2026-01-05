<x-layout-upventure title="Login">
    <!-- Neumorphism Background -->
    <div class="min-h-screen w-full flex items-center justify-center bg-[#eef2f6] p-4">
        <div class="w-[200px] h-[300px] bg-[#eef2f6] p-3 rounded-[20px] neu-flat text-center flex flex-col justify-center relative overflow-hidden">
            
            <a href="/" class="inline-block mb-2 hover:scale-105 transition-transform duration-300">
                <img class="h-6 w-auto mx-auto drop-shadow-sm" src="{{ asset('images/logo.png') }}" alt="Tirtabhumi">
            </a>

            <h2 class="text-xs font-bold text-slate-800 mb-0.5">
                Welcome!
            </h2>
            <p class="text-[8px] text-slate-500 mb-2 leading-tight">
                Sign in to continue
            </p>
            
            <form class="space-y-2 text-left w-full" action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="space-y-1.5">
                    <div>
                        <div class="neu-pressed rounded-lg p-0.5">
                            <input id="email-address" name="email" type="email" autocomplete="email" required 
                                class="w-full border-none bg-transparent rounded-md px-2 py-1.5 text-slate-700 placeholder-slate-400 focus:ring-0 text-[9px]" 
                                placeholder="Email">
                        </div>
                    </div>
                    <div>
                        <div class="neu-pressed rounded-lg p-0.5">
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="w-full border-none bg-transparent rounded-md px-2 py-1.5 text-slate-700 placeholder-slate-400 focus:ring-0 text-[9px]" 
                                placeholder="Password">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" 
                            class="h-2.5 w-2.5 bg-[#eef2f6] border-slate-300 rounded text-indigo-600 focus:ring-indigo-500 shadow-sm">
                        <label for="remember-me" class="ml-1 block text-[8px] font-medium text-slate-600">
                            Remember
                        </label>
                    </div>

                    <div class="text-[8px]">
                        <a href="#" class="font-bold text-indigo-600 hover:text-indigo-700 transition-colors">
                            Forgot?
                        </a>
                    </div>
                </div>

                <div class="space-y-2 pt-1">
                    <button type="submit" 
                        class="w-full py-1.5 px-2 rounded-lg text-[9px] font-bold text-indigo-600 neu-flat hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                        Sign In
                    </button>

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-300/50"></div>
                        </div>
                    </div>

                    <a href="{{ route('auth.google') }}" 
                        class="w-full flex items-center justify-center gap-1.5 py-1.5 px-2 rounded-lg text-[9px] font-bold text-slate-600 neu-flat hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 group">
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-12" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        Google
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout-upventure>
