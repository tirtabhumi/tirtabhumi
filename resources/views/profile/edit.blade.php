<x-layout-upventure title="Profile Settings">
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen">
        <div class="container mx-auto px-6 relative z-10">
            <!-- Header -->
            <div class="mb-12">
                <h1 class="text-3xl font-bold text-slate-800">Profile Settings</h1>
                <p class="text-slate-500 mt-2">Manage your account information and preferences.</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Sidebar: Avatar & Basic Info -->
                <div class="lg:w-1/3">
                    <div class="neu-flat p-8 rounded-[2rem] text-center sticky top-32">
                        <div class="relative w-32 h-32 mx-auto mb-6 group">
                            @if($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" id="current-avatar" alt="{{ $user->name }}"
                                    class="w-full h-full rounded-full object-cover border-4 border-white shadow-md">
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
                                    Remove Profile Photo
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Right Content: Forms -->
                <div class="lg:w-2/3 space-y-8">
                    @if(session('status') === 'profile-updated')
                        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl font-medium border border-green-200">
                            Profile updated successfully!
                        </div>
                    @endif
                    @if(session('status') === 'verification-link-sent')
                        <div
                            class="bg-indigo-100 text-indigo-700 px-6 py-4 rounded-xl font-medium border border-indigo-200">
                            We have sent a password change link to your email (<b>{{ $user->email }}</b>). Please check your
                            inbox.
                        </div>
                    @endif
                    @if(session('status') === 'password-updated')
                        <div class="bg-green-100 text-green-700 px-6 py-4 rounded-xl font-medium border border-green-200">
                            Password has been changed successfully!
                        </div>
                    @endif


                    <!-- Personal Information -->
                    <div class="neu-flat p-8 rounded-[2rem]">
                        <h3 class="text-xl font-bold text-slate-800 mb-6">Personal Information</h3>

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="grid md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-600 mb-2">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-600 mb-2">Phone Number</label>
                                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                                    @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-span-full">
                                    <label class="block text-sm font-bold text-slate-600 mb-2">Email Address</label>
                                    <div class="relative">
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                            class="w-full px-4 py-3 pl-10 rounded-xl bg-white border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all read-only:bg-slate-100 read-only:text-slate-500">
                                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-2">Changing email may require re-verification.
                                    </p>
                                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- If we had Institution column, we'd add it here. --}}
                                {{--
                                <div class="col-span-full">
                                    <label class="block text-sm font-bold text-slate-600 mb-2">Institution /
                                        Organization</label>
                                    <input type="text" name="institution"
                                        value="{{ old('institution', $user->institution ?? '') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all">
                                </div>
                                --}}
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="neu-btn px-8 py-3 rounded-full text-white bg-indigo-600 hover:bg-indigo-700 font-bold">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Security & Password -->
                    <div class="neu-flat p-8 rounded-[2rem]">
                        <h3 class="text-xl font-bold text-slate-800 mb-6">Security</h3>

                        <div
                            class="flex items-center justify-between p-4 bg-indigo-50 rounded-xl border border-indigo-100">
                            <div>
                                <h4 class="font-bold text-indigo-900">Change Password</h4>
                                <p class="text-sm text-indigo-600/80">For your security, we will email you a
                                    verification link before you can change your password.</p>
                            </div>
                            <form action="{{ route('profile.password.link') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="px-6 py-2 bg-white text-indigo-600 font-bold rounded-full shadow-sm hover:shadow-md transition-all">
                                    Send Link
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Crop Modal -->
    <div id="crop-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden flex items-center justify-center p-4"
        style="z-index: 99999;">
        <div class="bg-white rounded-2xl p-6 w-full max-w-lg">
            <h3 class="text-xl font-bold mb-4">Crop Profile Photo</h3>
            <div class="relative w-full h-[300px] bg-slate-100 rounded-lg overflow-hidden mb-6">
                <img id="crop-image" src="" alt="Crop Preview" class="max-w-full">
            </div>
            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeCropModal()"
                    class="px-6 py-2 text-slate-600 font-bold hover:bg-slate-100 rounded-full transition-colors">Cancel</button>
                <button type="button" id="crop-save-btn"
                    class="px-6 py-2 bg-indigo-600 text-white font-bold rounded-full hover:bg-indigo-700 transition-colors">Save
                    Photo</button>
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