<x-layout-auth title="Reset Password">
    <!-- Contact-style Background -->
    <section class="w-full relative overflow-hidden flex items-center justify-center py-12 md:py-0">
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
            <!-- Unified Container (Compact Version) -->
            <div
                class="neu-flat p-8 rounded-[2.5rem] border border-white/50 relative overflow-hidden max-w-xl mx-auto mt-20 md:mt-0">
                <div class="relative z-10">
                    <!-- Header -->
                    <div class="text-center mb-6 animate-fade-in-up">
                        <h1 class="text-3xl font-bold text-slate-800 mb-2">Reset Password</h1>
                        <p class="text-slate-500">Enter your email and new password.</p>
                    </div>

                    <!-- Form -->
                    <div class="bg-white/70 rounded-3xl p-6 border border-white/60 shadow-lg backdrop-blur-md animate-fade-in-up animation-delay-200">
                        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Email
                                    Address</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat"
                                    placeholder="name@company.com" value="{{ old('email', request()->email) }}">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">New
                                    Password</label>
                                <div class="flex items-center px-4 py-1.5 rounded-xl border border-slate-300 bg-white/50 focus-within:border-indigo-500 focus-within:ring-2 focus-within:ring-indigo-200 transition-all neu-flat group">
                                    <input type="password" id="password" name="password" required
                                        class="flex-1 bg-transparent border-none focus:ring-0 text-sm placeholder:text-slate-400 py-1"
                                        style="-ms-reveal: none; -webkit-appearance: none;"
                                        placeholder="Min. 8 chars & symbols">
                                    <button type="button" onclick="togglePassword('password', this)"
                                        class="p-1.5 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-white/50 transition-all focus:outline-none flex-shrink-0">
                                        <svg id="eye-icon-password" class="w-5 h-5 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-off-icon-password" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="mt-1.5 text-[10px] text-slate-400 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                    Min. 8 karakter & simbol (@#$%^&*)
                                </p>
                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Confirm Password</label>
                                <div class="flex items-center px-4 py-1.5 rounded-xl border border-slate-300 bg-white/50 focus-within:border-indigo-500 focus-within:ring-2 focus-within:ring-indigo-200 transition-all neu-flat group">
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                        class="flex-1 bg-transparent border-none focus:ring-0 text-sm placeholder:text-slate-400 py-1"
                                        style="-ms-reveal: none; -webkit-appearance: none;"
                                        placeholder="Re-enter password">
                                    <button type="button" onclick="togglePassword('password_confirmation', this)"
                                        class="p-1.5 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-white/50 transition-all focus:outline-none flex-shrink-0">
                                        <svg id="eye-icon-password_confirmation" class="w-5 h-5 block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg id="eye-off-icon-password_confirmation" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                        </svg>
                                    </button>
                                </div>
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
                                class="w-full px-8 py-3.5 mt-2 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all text-sm">
                                Reset Password
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout-auth>