<x-layout-auth title="Sign Up">

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
            class="neu-flat p-8 rounded-[2.5rem] border border-white/50 relative overflow-hidden max-w-2xl mx-auto mt-20 md:mt-0">
            <div class="relative z-10">
                <!-- Header -->
                <div class="text-center mb-6 animate-fade-in-up">
                    <h1 class="text-3xl font-bold text-slate-800 mb-2">Join UpVenture!</h1>
                    <p class="text-slate-500">Create your account today.</p>
                </div>

                <!-- Register Form -->
                <div
                    class="bg-slate-50/50 rounded-3xl p-8 border border-white/60 shadow-lg backdrop-blur-md animate-fade-in-up animation-delay-200">
                    <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Full
                                Name</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat"
                                placeholder="John Doe" value="{{ old('name') }}">
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Email
                                Address</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat"
                                placeholder="name@company.com" value="{{ old('email') }}">
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone_number"
                                class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Phone
                                Number</label>
                            <div
                                class="flex items-center rounded-xl border border-slate-300 bg-[#eef2f6] focus-within:border-indigo-500 focus-within:ring-2 focus-within:ring-indigo-200 transition-all neu-flat group relative overflow-hidden">
                                <div class="w-14 flex-shrink-0 relative">
                                    <select id="country_code" name="country_code" required
                                        class="w-full pl-3 pr-2 py-2.5 bg-transparent border-none focus:ring-0 text-sm cursor-pointer font-medium text-slate-700">
                                        <option value="+62">+62</option>
                                        <option value="+1">+1</option>
                                        <option value="+44">+44</option>
                                        <option value="+65">+65</option>
                                        <option value="+60">+60</option>
                                    </select>
                                </div>
                                <div class="w-px h-6 bg-slate-200 flex-shrink-0"></div>
                                <input type="tel" id="phone_number" name="phone_number" required
                                    class="flex-1 min-w-0 px-3 py-2.5 bg-transparent border-none focus:ring-0 text-sm placeholder:text-slate-400"
                                    placeholder="812345678" value="{{ old('phone_number') }}">
                            </div>
                            @error('country_code') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            @error('phone_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password"
                                class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Password</label>
                            <div
                                class="flex items-center rounded-xl border border-slate-300 bg-[#eef2f6] focus-within:border-indigo-500 focus-within:ring-2 focus-within:ring-indigo-200 transition-all neu-flat group relative w-full overflow-hidden">
                                <input type="password" id="password" name="password" required
                                    class="flex-1 min-w-0 bg-transparent border-none focus:ring-0 text-sm placeholder:text-slate-400 py-3 pl-4 pr-1"
                                    style="-ms-reveal: none; -webkit-appearance: none;"
                                    placeholder="Min. 8 chars & symbols">
                                <button type="button" onclick="togglePassword('password', this)"
                                    class="p-3 text-slate-400 hover:text-indigo-600 transition-all focus:outline-none flex-shrink-0 bg-transparent">
                                    <svg id="eye-icon-password" class="w-5 h-5 block" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eye-off-icon-password" class="w-5 h-5 hidden" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-1.5 text-[10px] text-slate-400 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Min. 8 karakter & simbol (@#$%^&*)
                            </p>
                            @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation"
                                class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Confirm
                                Password</label>
                            <div
                                class="flex items-center rounded-xl border border-slate-300 bg-[#eef2f6] focus-within:border-indigo-500 focus-within:ring-2 focus-within:ring-indigo-200 transition-all neu-flat group relative w-full overflow-hidden">
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="flex-1 min-w-0 bg-transparent border-none focus:ring-0 text-sm placeholder:text-slate-400 py-3 pl-4 pr-1"
                                    style="-ms-reveal: none; -webkit-appearance: none;" placeholder="Re-enter password">
                                <button type="button" onclick="togglePassword('password_confirmation', this)"
                                    class="p-3 text-slate-400 hover:text-indigo-600 transition-all focus:outline-none flex-shrink-0 bg-transparent">
                                    <svg id="eye-icon-password_confirmation" class="w-5 h-5 block" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eye-off-icon-password_confirmation" class="w-5 h-5 hidden" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <p class="mt-1 text-xs text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <script>
                            function togglePassword(inputId, button) {
                                const input = document.getElementById(inputId);
                                const eyeIcon = document.getElementById(`eye-icon-${inputId}`);
                                const eyeOffIcon = document.getElementById(`eye-off-icon-${inputId}`);

                                if (input.type === 'password') {
                                    input.type = 'text';
                                    eyeIcon.classList.add('hidden');
                                    eyeOffIcon.classList.remove('hidden');
                                } else {
                                    input.type = 'password';
                                    eyeIcon.classList.remove('hidden');
                                    eyeOffIcon.classList.add('hidden');
                                }
                            }
                        </script>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full px-10 py-4 mt-2 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all text-sm">
                            Create Account
                        </button>

                        <div class="text-center font-medium text-slate-600 text-xs mt-5">
                            Already have an account? <a href="{{ route('login') }}"
                                class="text-indigo-600 hover:text-indigo-700 font-bold ml-2">Sign in</a>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center gap-4 my-6">
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
</x-layout-auth>