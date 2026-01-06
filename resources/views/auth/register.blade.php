<x-layout-upventure title="Register">
    <!-- Contact-style Background -->
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen flex items-center">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
            <div
                class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-1/2 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Unified Container (Expanded Version) -->
            <div
                class="neu-flat p-8 rounded-[2.5rem] border border-white/50 relative overflow-hidden max-w-2xl mx-auto">
                <div class="relative z-10">
                    <!-- Header -->
                    <div class="text-center mb-6 animate-fade-in-up">
                        <h1 class="text-3xl font-bold text-slate-800 mb-2">Join UpVenture!</h1>
                        <p class="text-slate-500">Create your account today.</p>
                    </div>

                    <!-- Register Form -->
                    <div class="bg-white/70 rounded-3xl p-6 border border-white/60 shadow-lg backdrop-blur-md animate-fade-in-up animation-delay-200">
                        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold text-slate-700 mb-1.5">Full
                                    Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-400 transition-all text-sm"
                                    placeholder="John Doe" value="{{ old('name') }}">
                                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-700 mb-1.5">Email
                                    Address</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-400 transition-all text-sm"
                                    placeholder="name@company.com" value="{{ old('email') }}">
                                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block text-xs font-bold text-slate-700 mb-1.5">Phone
                                    Number</label>
                                <div class="flex gap-2">
                                    <div class="w-32">
                                        <select id="country_code" name="country_code" required
                                            class="w-full px-2 py-2.5 rounded-xl bg-white border border-slate-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-400 transition-all appearance-none text-sm text-center">
                                            <option value="+62">🇮🇩 +62</option>
                                            <option value="+1">🇺🇸 +1</option>
                                            <option value="+44">🇬🇧 +44</option>
                                            <option value="+65">🇸🇬 +65</option>
                                            <option value="+60">🇲🇾 +60</option>
                                        </select>
                                    </div>
                                    <div class="flex-1">
                                        <input type="tel" id="phone_number" name="phone_number" required
                                            class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-400 transition-all text-sm"
                                            placeholder="812345678" value="{{ old('phone_number') }}">
                                    </div>
                                </div>
                                @error('country_code') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                @error('phone_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password"
                                    class="block text-xs font-bold text-slate-700 mb-1.5">Password</label>
                                <input type="password" id="password" name="password" required
                                    class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-400 transition-all text-sm"
                                    placeholder="Min. 8 chars">
                                @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-xs font-bold text-slate-700 mb-1.5">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="w-full px-4 py-2.5 rounded-xl neu-pressed border-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all bg-[#eef2f6] text-sm"
                                    placeholder="Re-enter password">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full px-8 py-3.5 mt-2 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all text-sm">
                                Create Account
                            </button>

                            <div class="text-center font-medium text-slate-600 text-xs mt-4">
                                Already have an account? <a href="{{ route('login') }}"
                                    class="text-indigo-600 hover:text-indigo-700 font-bold ml-1">Sign in</a>
                            </div>

                            <!-- Divider -->
                            <div class="flex items-center gap-4 my-4">
                                <div class="h-px bg-slate-300/50 flex-1"></div>
                                <span
                                    class="text-slate-400 text-[10px] font-medium whitespace-nowrap uppercase tracking-wider">Or
                                    sign up with</span>
                                <div class="h-px bg-slate-300/50 flex-1"></div>
                            </div>

                            <!-- Google SSO -->
                            <a href="{{ route('auth.google') }}"
                                class="w-full px-6 py-2.5 neu-btn flex items-center justify-center gap-3 font-bold text-slate-600 hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 text-sm">
                                <svg class="w-4 h-4" viewBox="0 0 24 24">
                                    <path
                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                        fill="#4285F4" />
                                    <path
                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                        fill="#34A853" />
                                    <path
                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                        fill="#FBBC05" />
                                    <path
                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                        fill="#EA4335" />
                                </svg>
                                Google
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-upventure>