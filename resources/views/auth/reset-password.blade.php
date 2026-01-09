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
                                <input type="password" id="password" name="password" required
                                    class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat"
                                    placeholder="Min. 8 chars">
                                @error('password')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat"
                                    placeholder="Re-enter password">
                            </div>

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