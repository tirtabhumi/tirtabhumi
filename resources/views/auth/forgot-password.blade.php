<x-layout-auth title="Forgot Password">
    <!-- Contact-style Background -->
    <section class="w-full relative overflow-hidden flex items-center justify-center py-12 md:py-0">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
             <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
             <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
             <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Unified Container (Compact Version) -->
            <div class="neu-flat p-8 rounded-[2.5rem] border border-white/50 relative overflow-hidden max-w-xl mx-auto mt-20 md:mt-0">
                <div class="relative z-10">
                    <!-- Header -->
                    <div class="text-center mb-6 animate-fade-in-up">
                        <h1 class="text-3xl font-bold text-slate-800 mb-2">Forgot Password?</h1>
                        <p class="text-slate-500">Enter your email to receive a reset link.</p>
                    </div>

                    <!-- Form -->
                    <div class="bg-white/70 rounded-3xl p-8 border border-white/60 shadow-lg backdrop-blur-md animate-fade-in-up animation-delay-200">
                        
                        @if (session('status'))
                            <div class="mb-6 text-sm font-medium text-green-600 bg-green-100 border border-green-400 rounded-xl p-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
                            @csrf
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-semibold text-slate-800 mb-2 tracking-wide">Email Address</label>
                                <input type="email" id="email" name="email" required 
                                    class="w-full px-4 py-2 rounded-xl border border-slate-300 text-sm placeholder:text-slate-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all neu-flat"
                                    placeholder="name@company.com" value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full px-8 py-3.5 mt-2 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all text-sm">
                                Send Reset Link
                            </button>
                            
                            <div class="text-center mt-4">
                                <a href="{{ route('login') }}" class="text-xs font-bold text-slate-500 hover:text-indigo-600 transition-colors">
                                    <span class="mr-1">←</span> Back to Sign In
                                </a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout-auth>
