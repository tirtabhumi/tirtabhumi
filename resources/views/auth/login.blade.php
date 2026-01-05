<x-layout-upventure title="Login">
    <!-- Neumorphism Background -->
    <div class="min-h-screen w-full flex items-center justify-center bg-[#eef2f6] p-6 lg:p-12">
        
        <!-- Main Layout Grid -->
        <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <!-- Left Side (Login Form) -->
            <div class="flex justify-center w-full order-2 lg:order-1">
                <div class="w-full max-w-[360px] bg-[#eef2f6] p-8 rounded-xl neu-flat text-center flex flex-col justify-center relative overflow-hidden transition-all duration-300">
                    
                    <a href="/" class="inline-block mb-8 hover:scale-105 transition-transform duration-300">
                        <img class="h-12 w-auto mx-auto drop-shadow-sm" src="{{ asset('images/logo.png') }}" alt="Tirtabhumi">
                    </a>

                    <h2 class="text-2xl font-bold text-slate-800 mb-2">
                        Welcome Back!
                    </h2>
                    <p class="text-sm text-slate-500 mb-8 font-medium">
                        Login into your account
                    </p>
                    
                    <form class="space-y-6 text-left w-full" action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="email-address" class="block text-xs font-bold text-slate-600 mb-2 ml-1">Email Address</label>
                                <div class="neu-pressed rounded-2xl p-1">
                                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                                        class="w-full border-none bg-transparent rounded-xl px-4 py-3 text-slate-700 placeholder-slate-400 focus:ring-0 text-sm" 
                                        placeholder="name@company.com">
                                </div>
                            </div>
                            <div>
                                <label for="password" class="block text-xs font-bold text-slate-600 mb-2 ml-1">Password</label>
                                <div class="neu-pressed rounded-2xl p-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                                        class="w-full border-none bg-transparent rounded-xl px-4 py-3 text-slate-700 placeholder-slate-400 focus:ring-0 text-sm" 
                                        placeholder="••••••••">
                                </div>
                            </div>
                        </div>

                        @error('email')
                            <div class="bg-red-50 text-red-500 text-xs font-medium p-3 rounded-xl border border-red-100 flex items-center gap-2">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <label for="remember-me" class="flex items-center gap-2 cursor-pointer group select-none relative">
                                    <input id="remember-me" name="remember-me" type="checkbox" class="peer sr-only">
                                    
                                    <div class="w-5 h-5 flex-shrink-0 rounded-md flex items-center justify-center transition-all duration-200 border-2 border-transparent neu-pressed text-transparent group-hover:border-indigo-500 peer-checked:bg-indigo-600 peer-checked:border-white peer-checked:text-white peer-checked:shadow-none">
                                        <svg class="w-3.5 h-3.5 transform scale-0 peer-checked:scale-100 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                    </div>

                                    <span class="text-[10px] font-medium text-slate-600 group-hover:text-indigo-600 transition-colors">
                                        Remember me
                                    </span>
                                </label>
                            </div>

                            <div class="text-[10px]">
                                <a href="#" class="font-bold text-indigo-600 hover:text-indigo-700 transition-colors">
                                    Forgot password?
                                </a>
                            </div>
                        </div>

                        <div class="space-y-6 pt-2">
                            <button type="submit" 
                                class="w-full py-3.5 px-4 rounded-xl text-sm font-bold text-indigo-600 neu-flat hover:scale-[1.02] active:scale-[0.98] transition-all duration-300">
                                Sign In
                            </button>

                            <div class="relative">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-slate-300/50"></div>
                                </div>
                                <div class="relative flex justify-center text-xs">
                                    <span class="px-4 bg-[#eef2f6] text-slate-400 font-medium">Or continue with</span>
                                </div>
                            </div>

                            <a href="{{ route('auth.google') }}" 
                                class="w-full flex items-center justify-center gap-3 py-3.5 px-4 rounded-xl text-sm font-bold text-slate-600 neu-flat hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 group">
                                <svg class="w-5 h-5 transition-transform group-hover:rotate-12" viewBox="0 0 24 24">
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

            <!-- Right Side (Illustration) -->
            <div class="hidden lg:flex justify-center items-center relative h-full w-full min-h-[500px] order-1 lg:order-2">
                <!-- Abstract Aurora Composition -->
                <div class="absolute top-0 right-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                <div class="absolute top-0 right-72 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-32 right-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
                
                <div class="relative z-10 p-8">
                     <img src="{{ asset('images/illustration_login.svg') }}" onerror="this.style.display='none'" class="max-w-md w-full drop-shadow-2xl" alt="Tirtabhumi Illustration">
                     <!-- Fallback Content if Image Missing -->
                     <div class="text-center space-y-4">
                        <div class="inline-block neu-flat p-6 rounded-full mb-4">
                            <span class="text-4xl">🚀</span>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-700">Grow with UpVenture</h2>
                        <p class="text-slate-500">Join our community and scale your business to new heights.</p>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-upventure>
