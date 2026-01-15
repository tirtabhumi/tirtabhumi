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
                            <input type="password" name="password" required
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-600 mb-2">Confirm Password</label>
                            <input type="password" name="password_confirmation" required
                                class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                        </div>
                    </div>

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