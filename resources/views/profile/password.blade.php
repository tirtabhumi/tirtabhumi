<x-layout-upventure title="Change Password">
    <section class="py-24 bg-[#eef2f6] min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-6">
            <div class="max-w-md mx-auto neu-flat p-8 rounded-[2rem]">
                <h1 class="text-2xl font-bold text-slate-800 mb-2">Create New Password</h1>
                <p class="text-slate-500 mb-8 text-sm">Your identity has been verified. Please enter your new password
                    below.</p>

                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6 mb-8">
                        <div>
                            <label class="block text-sm font-bold text-slate-600 mb-2">New Password</label>
                            <div class="flex items-center px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus-within:ring-2 focus-within:ring-indigo-500/50 focus-within:border-indigo-500 transition-all group">
                                <input type="password" id="password" name="password" required
                                    class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-0"
                                    style="-ms-reveal: none; -webkit-appearance: none;">
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
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-600 mb-2">Confirm Password</label>
                            <div class="flex items-center px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus-within:ring-2 focus-within:ring-indigo-500/50 focus-within:border-indigo-500 transition-all group">
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="flex-1 bg-transparent border-none focus:ring-0 text-sm py-0"
                                    style="-ms-reveal: none; -webkit-appearance: none;">
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

                    <button type="submit"
                        class="w-full neu-btn px-8 py-3 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 font-bold">
                        Update Password
                    </button>

                    <div class="text-center mt-6">
                        <a href="{{ route('profile.edit') }}"
                            class="text-sm text-slate-400 hover:text-indigo-600 font-medium">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layout-upventure>