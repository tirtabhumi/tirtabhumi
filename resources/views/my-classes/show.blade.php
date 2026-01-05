<x-layout-upventure title="{{ $training->title }} - My Classes">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 30% !important; flex: 0 0 30% !important; }
            .content-width { width: 70% !important; flex: 0 0 70% !important; }
        }
    </style>
    <section class="pt-32 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <!-- Breadcrumb -->
            <div class="mb-8">
                <a href="{{ route('my-classes.index') }}"
                    class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-lg font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to My Classes
                </a>
            </div>

            <!-- Class Header -->
            <div class="neu-flat rounded-3xl p-8 border border-white/50 mb-8">
                <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ $training->title }}</h1>
                <div class="flex items-center gap-6 text-sm text-slate-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $training->modules->count() }} Modules
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $progressPercentage }}% Complete
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="mt-6">
                    <div class="h-3 bg-slate-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 transition-all duration-500"
                            style="width: {{ $progressPercentage }}%"></div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Sidebar - Course Modules (30%) -->
                <div class="w-full lg:w-[30%] sidebar-width">
                    <div class="neu-flat rounded-3xl p-8 border border-white/50 sticky top-24 max-h-[calc(100vh-120px)] overflow-y-auto">
                        <h2 class="text-2xl font-bold text-slate-800 mb-6">Course Modules</h2>

                        <div class="space-y-4">
                            @foreach($training->modules as $index => $module)
                                @php
                                    $isCompleted = isset($userProgress[$module->id]) && $userProgress[$module->id]->is_completed;
                                    $isUnlocked = $module->isUnlockedFor(auth()->id());
                                @endphp

                                <div class="neu-flat rounded-2xl p-4 border border-white/50 {{ $isUnlocked ? 'hover:scale-[1.01] transition-transform cursor-pointer' : 'opacity-60' }}"
                                    data-module-id="{{ $module->id }}" data-video-url="{{ $module->video_url }}"
                                    data-is-unlocked="{{ $isUnlocked ? 'true' : 'false' }}" onclick="loadModule(this)">
                                    <div class="flex items-start gap-3">
                                        <!-- Module Number/Status -->
                                        <div class="flex-shrink-0">
                                            @if($isCompleted)
                                                <div
                                                    class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                            @elseif($isUnlocked)
                                                <div
                                                    class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <span class="text-base font-bold text-indigo-600">{{ $index + 1 }}</span>
                                                </div>
                                            @else
                                                <div
                                                    class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Module Info -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-sm font-bold text-slate-800 mb-1 line-clamp-2">{{ $module->title }}</h3>
                                            
                                            <div class="flex items-center gap-3 text-xs text-slate-600">
                                                @if($module->duration_minutes)
                                                    <div class="flex items-center gap-1">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        {{ $module->duration_minutes }} min
                                                    </div>
                                                @endif

                                                @if(!$isUnlocked)
                                                    <span class="text-xs font-bold text-orange-600">🔒</span>
                                                @elseif($isCompleted)
                                                    <span class="text-xs font-bold text-green-600">✓</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Play Icon -->
                                        @if($isUnlocked)
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M8 5v14l11-7z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Content - Video Player (70%) -->
                <div class="w-full lg:w-[70%] content-width">
                    <div class="neu-flat rounded-3xl p-8 border border-white/50 sticky top-24">
                        <h3 class="text-2xl font-bold text-slate-800 mb-6">Video Player</h3>

                        <!-- Video Container -->
                        <div id="video-container" class="aspect-video bg-slate-900 rounded-xl overflow-hidden mb-6">
                            <div class="flex items-center justify-center h-full text-slate-400">
                                <div class="text-center">
                                    <svg class="w-20 h-20 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-base">Select a module to start learning</p>
                                </div>
                            </div>
                        </div>

                        <!-- Current Module Title -->
                        <div id="current-module-title" class="text-lg font-bold text-slate-700 mb-6 hidden"></div>

                        <!-- Mark Complete Button -->
                        <button id="mark-complete-btn" class="w-full neu-btn px-8 py-4 font-bold text-indigo-600 text-lg hidden"
                            onclick="markComplete()">
                            Mark as Complete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentModuleId = null;

        function loadModule(element) {
            const isUnlocked = element.dataset.isUnlocked === 'true';
            if (!isUnlocked) {
                alert('Please complete the previous module first!');
                return;
            }

            const videoUrl = element.dataset.videoUrl;
            const moduleId = element.dataset.moduleId;
            const moduleTitle = element.querySelector('h3').textContent;

            currentModuleId = moduleId;

            // Extract video ID from YouTube/Vimeo URL
            const videoContainer = document.getElementById('video-container');
            const currentModuleTitle = document.getElementById('current-module-title');
            const markCompleteBtn = document.getElementById('mark-complete-btn');

            // YouTube embed
            if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                const videoId = extractYouTubeId(videoUrl);
                videoContainer.innerHTML = `<iframe class="w-full h-full" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            }
            // Vimeo embed
            else if (videoUrl.includes('vimeo.com')) {
                const videoId = extractVimeoId(videoUrl);
                videoContainer.innerHTML = `<iframe class="w-full h-full" src="https://player.vimeo.com/video/${videoId}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`;
            }

            currentModuleTitle.textContent = moduleTitle;
            currentModuleTitle.classList.remove('hidden');
            markCompleteBtn.classList.remove('hidden');
        }

        function extractYouTubeId(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);
            return (match && match[2].length === 11) ? match[2] : null;
        }

        function extractVimeoId(url) {
            const regExp = /vimeo.*\/(\d+)/i;
            const match = url.match(regExp);
            return match ? match[1] : null;
        }

        function markComplete() {
            if (!currentModuleId) return;

            fetch(`/my-classes/module/${currentModuleId}/complete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Module marked as complete! 🎉');
                        location.reload(); // Reload to update progress
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to mark as complete. Please try again.');
                });
        }
    </script>
</x-layout-upventure>