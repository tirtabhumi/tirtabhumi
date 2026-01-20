<x-layout-upventure title="Profile Settings">
        <div class="container mx-auto px-6 relative z-10 max-w-4xl">
            <!-- Header -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">{{ __('messages.profile_settings') }}</h1>
                    <p class="text-slate-500 mt-2">{{ __('messages.manage_account_desc') }}</p>
                </div>
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm group shrink-0 self-start md:self-center">
                    <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>{{ __('messages.back_to_dashboard') }}</span>
                </a>
            </div>

            <div class="flex flex-col md:items-start gap-8">
                <!-- Top Section: Avatar & Info centered or side-by-side -->
                <div class="w-full flex flex-col md:flex-row gap-8">
                    <!-- Left Sidebar: Avatar & Security -->
                    <div class="w-full md:w-1/3">
                        <div class="flex flex-col gap-8 sticky top-32">
                            <!-- Avatar Card -->
                            <div class="neu-flat p-8 rounded-[2rem] text-center">
                                <div class="relative w-32 h-32 mx-auto mb-6 group">
                                    @if($user->avatar)
                                        <img src="{{ $user->avatar_url }}" id="current-avatar" alt="{{ $user->name }}"
                                            class="w-24 h-24 rounded-full object-cover border-4 border-slate-100 shadow-md">
                                    @else
                                        <div
                                            class="w-full h-full rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500 text-4xl font-bold border-4 border-white shadow-md">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                    @endif

                                    <!-- Overlay Button -->
                                    <button type="button" onclick="document.getElementById('avatar-input').click()"
                                        class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white cursor-pointer">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </button>
                                </div>

                                <input type="file" id="avatar-input" class="hidden" accept="image/*">

                                <h2 class="text-xl font-bold text-slate-800">{{ $user->name }}</h2>
                                <p class="text-sm text-slate-500 uppercase tracking-wide font-medium">
                                    {{ $user->role ?? 'User' }}
                                </p>

                                @if($user->avatar)
                                    <form action="{{ route('profile.avatar.delete') }}" method="POST" class="mt-4">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-xs text-red-500 hover:text-red-700 font-bold hover:underline">
                                            {{ __('messages.remove_photo') }}
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <!-- Security & Password -->
                            <div class="neu-flat p-6 rounded-[2rem]">
                                <h3 class="text-xl font-bold text-slate-800 mb-4">{{ __('messages.security') }}</h3>

                                <div class="flex items-center justify-between p-4 bg-indigo-50 rounded-xl border border-indigo-100 gap-4">
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-indigo-900 text-sm">{{ __('messages.change_password') }}</h4>
                                        <p class="text-xs text-indigo-600/80 leading-relaxed mt-1">{{ __('messages.change_password_desc') }}</p>
                                    </div>
                                    <form action="{{ route('profile.password.link') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 bg-white text-indigo-600 font-bold text-sm rounded-full shadow-sm hover:shadow-md transition-all whitespace-nowrap flex-shrink-0">
                                            {{ __('messages.send_link') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content: Forms -->
                    <div class="w-full md:w-2/3 space-y-8">
                        @if(session('status') === 'profile-updated')
                            <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl font-medium border border-green-200">
                                {{ __('messages.profile_updated') }}
                            </div>
                        @endif
                        @if(session('status') === 'verification-link-sent')
                            <div
                                class="bg-indigo-100 text-indigo-700 px-6 py-4 rounded-xl font-medium border border-indigo-200">
                                {!! __('messages.verification_link_sent_desc', ['email' => $user->email]) !!}
                            </div>
                        @endif
                        @if(session('status') === 'password-updated')
                            <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl font-medium border border-green-200">
                                {{ __('messages.password_updated') }}
                            </div>
                        @endif


                        <!-- Personal Information -->
                        <div class="neu-flat p-8 rounded-[2rem]">
                            <h3 class="text-xl font-bold text-slate-800 mb-6">{{ __('messages.personal_info') }}</h3>

                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="space-y-5 mb-8">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-600 mb-2">{{ __('messages.full_name') }}</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-600 mb-2">{{ __('messages.phone_number') }}</label>
                                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                            class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-600 mb-2">{{ __('messages.email_address') }}</label>
                                        <div class="relative">
                                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                                class="w-full px-4 py-3 rounded-xl bg-white border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all read-only:bg-slate-100 read-only:text-slate-500">
                                            
                                        </div>
                                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                        
                                        <!-- Email help text as alert -->
                                        <div class="mt-3 flex items-start gap-3 p-3 bg-blue-50 rounded-xl border border-blue-100">
                                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <p class="text-xs text-blue-600 leading-relaxed">
                                                {{ __('messages.change_email_note') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex justify-center">
                                    <button type="submit"
                                        class="neu-btn px-8 py-3 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 font-bold shadow-lg shadow-indigo-200">
                                        {{ __('messages.save_changes') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Crop Modal -->
    <div id="crop-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden flex items-center justify-center p-4"
        style="z-index: 99999;">
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg">
            <h3 class="text-xl font-bold mb-4">{{ __('messages.crop_photo_title') }}</h3>
            <div class="relative w-full h-[300px] bg-slate-100 rounded-lg overflow-hidden mb-6">
                <img id="crop-image" src="" alt="Crop Preview" class="max-w-full">
            </div>
            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeCropModal()"
                    class="px-6 py-2 text-slate-600 font-bold hover:bg-slate-100 rounded-full transition-colors">{{ __('messages.cancel') }}</button>
                <button type="button" id="crop-save-btn"
                    class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-full hover:bg-indigo-700 transition-colors">{{ __('messages.save_photo') }}</button>
            </div>
        </div>
    </div>

    <!-- Cropper.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

    <script>
        const avatarInput = document.getElementById('avatar-input');
        const cropModal = document.getElementById('crop-modal');
        const cropImage = document.getElementById('crop-image');
        const cropSaveBtn = document.getElementById('crop-save-btn');
        let cropper;

        avatarInput.addEventListener('change', function (e) {
            const files = e.target.files;
            if (files && files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    cropImage.src = e.target.result;
                    cropModal.classList.remove('hidden');

                    if (cropper) cropper.destroy();
                    cropper = new Cropper(cropImage, {
                        aspectRatio: 1,
                        viewMode: 1,
                        autoCropArea: 0.8,
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        function closeCropModal() {
            cropModal.classList.add('hidden');
            avatarInput.value = ''; // Reset
            if (cropper) cropper.destroy();
        }

        cropSaveBtn.addEventListener('click', function () {
            if (!cropper) return;

            // Get cropped canvas
            const canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400,
            });

            const base64Image = canvas.toDataURL('image/png');

            // Send to server
            fetch('{{ route("profile.avatar.update") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ avatar: base64Image })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update current avatar preview
                        // document.getElementById('current-avatar').src = data.avatar_url; // If using img tag
                        // We might need to refresh or just update src.
                        // Assuming page refresh is easiest to reset all states securely, or just update UI.
                        window.location.reload();
                    } else {
                        alert('Failed to update avatar.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Error uploading avatar.');
                });

            closeCropModal();
        });
    </script>
</x-layout-upventure>