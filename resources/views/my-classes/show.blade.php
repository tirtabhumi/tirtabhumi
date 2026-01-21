<x-layout-upventure title="{{ $training->title }} - My Classes">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 30% !important; flex: 0 0 30% !important; }
            .content-width { width: 70% !important; flex: 0 0 70% !important; }
        }
    </style>
    <section class="pt-4 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <!-- Back to My Classes -->
            <div class="mb-4 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <a href="{{ route('my-classes.index') }}" class="inline-flex items-center gap-2 px-4 py-2 neu-flat rounded-xl text-indigo-600 font-bold hover:text-indigo-700 hover:scale-105 transition-all text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
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

                @php
                    $hasPending = false;
                    $pendingModules = [];
                    $incompleteModules = [];
                    foreach($training->modules as $m) {
                        $p = $userProgress[$m->id] ?? null;
                        if($p && $p->status === 'Menunggu Penilaian' && !$p->is_completed) {
                            $hasPending = true;
                            $pendingModules[] = $m->title;
                        }
                        if(!$p || !$p->is_completed) {
                            $incompleteModules[] = $m;
                        }
                    }
                @endphp

                @if($hasPending)
                    <div class="mt-6 p-4 bg-amber-50 rounded-2xl border border-amber-200">
                        <div class="flex items-center gap-2 text-amber-700 font-bold mb-2">
                            <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Certificate Locked: Waiting for mentor grading
                        </div>
                        <p class="text-xs text-amber-600">
                            The following items are still being reviewed by your mentor:
                            <span class="font-bold">{{ implode(', ', $pendingModules) }}</span>
                        </p>
                    </div>
                @elseif($progressPercentage >= 100)
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('my-classes.certificate', $training->id) }}" target="_blank" 
                           class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            E-Certificate Ready
                        </a>
                    </div>
                @elseif(count($incompleteModules) > 0)
                    <div class="mt-6 p-4 bg-slate-50 rounded-2xl border border-slate-200">
                        <p class="text-sm font-bold text-slate-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Complete all modules to unlock your certificate:
                        </p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($incompleteModules as $im)
                                <span class="px-3 py-1 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-500">
                                    {{ $im->title }}
                                    @if(isset($userProgress[$im->id]) && $userProgress[$im->id]->status === 'graded' && !$userProgress[$im->id]->is_completed)
                                        <span class="text-red-500 ml-1">(Fail / Below Min Score)</span>
                                    @endif
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
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
                                    $isQuiz = $module->type === 'quiz' || (!empty($module->questions) && count($module->questions) > 0);
                                @endphp

                                <div class="neu-flat rounded-2xl p-4 border border-white/50 {{ $isUnlocked ? 'hover:scale-[1.01] transition-transform cursor-pointer' : 'opacity-60' }}"
                                    data-module-id="{{ $module->id }}" 
                                    data-video-url="{{ $module->video_url }}"
                                    data-file-path="{{ $module->file_path ? asset('storage/' . $module->file_path) : '' }}"
                                    data-type="{{ $module->type }}"
                                    data-questions="{{ json_encode($module->questions) }}"
                                    data-is-quiz="{{ $isQuiz ? 'true' : 'false' }}"
                                    data-min-score="{{ $module->min_score ?? 70 }}"

                                     data-user-score="{{ $userProgress[$module->id]->score ?? 0 }}"
                                    data-user-attempts="{{ $userProgress[$module->id]->attempts ?? 0 }}"
                                    data-description="{{ $module->description }}"
                                    data-scheduled-at="{{ $module->scheduled_at ? $module->scheduled_at->toIso8601String() : '' }}"
                                    data-duration-minutes="{{ $module->duration_minutes ?? 60 }}"
                                    data-is-completed="{{ $isCompleted ? 'true' : 'false' }}"
                                    data-is-unlocked="{{ $isUnlocked ? 'true' : 'false' }}" 
                                    data-meeting-platform="{{ $module->meeting_platform }}"
                                    data-meeting-link="{{ $module->meeting_link }}"
                                    data-submission-text="{{ $userProgress[$module->id]->submission_text ?? '' }}"
                                    @php
                                        $subFile = $userProgress[$module->id]->submission_file ?? '';
                                        if (is_array($subFile)) {
                                            $subFile = array_key_first($subFile) ? ($subFile[array_key_first($subFile)] ?? '') : reset($subFile);
                                        }
                                    @endphp
                                    data-submission-file="{{ $subFile }}"
                                    data-submission-status="{{ $userProgress[$module->id]->status ?? 'started' }}"
                                    data-mentor-feedback="{{ $userProgress[$module->id]->mentor_feedback ?? '' }}"
                                    onclick="loadModule(this)">
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
                                             @elseif(isset($userProgress[$module->id]) && $userProgress[$module->id]->status === 'Menunggu Penilaian' && !$isCompleted)
                                                 <div
                                                     class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center animate-pulse">
                                                     <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                 </div>
                                             @elseif(isset($userProgress[$module->id]) && $userProgress[$module->id]->status === 'graded' && !$isCompleted)
                                                 <div
                                                     class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                                     <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
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
                                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Module Info -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-sm font-bold text-slate-800 mb-0.5 line-clamp-2">{{ $module->title }}</h3>
                                            <div class="text-[10px] uppercase tracking-wider font-semibold text-slate-400 mb-1">
                                                @switch($module->type)
                                                    @case('video') Video @break
                                                    @case('pdf') Reading / PDF @break
                                                    @case('quiz') Quiz Assessment @break
                                                    @case('assignment') Project Assignment @break
                                                    @case('online_session') Live Session @break
                                                    @default {{ ucfirst($module->type) }}
                                                @endswitch
                                            </div>
                                            
                                            <div class="flex items-center gap-3 text-xs text-slate-600">
                                                @if($module->duration_minutes)
                                                    <div class="flex items-center gap-1">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        {{ $module->duration_minutes }} min
                                                    </div>
                                                @endif

                                                @if($module->type === 'assignment' && isset($userProgress[$module->id]))
                                                    @php
                                                        $status = $userProgress[$module->id]->status;
                                                        $score = $userProgress[$module->id]->score;
                                                    @endphp
                                                    @if($status === 'Menunggu Penilaian')
                                                        <div class="flex items-center gap-1 text-orange-600 font-bold whitespace-nowrap">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                            Menunggu Nilai
                                                        </div>
                                                    @elseif($score > 0 || $status === 'graded')
                                                        <div class="flex items-center gap-1 text-indigo-600 font-bold whitespace-nowrap">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.54 1.118l-3.976-2.888a1 1 0 00-1.175 0l-3.976 2.888c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                                                            Nilai: {{ $score }}
                                                        </div>
                                                    @endif
                                                @endif
                                                
                                                @if($module->meeting_link)
                                                     <div class="flex items-center gap-1 text-indigo-600 font-bold">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                        Live Session
                                                    </div>
                                                @endif

                                                @if(!$isUnlocked)
                                                    <span class="text-xs font-bold text-orange-600">🔒</span>
                                                @elseif($isCompleted)
                                                    <span class="text-xs font-bold text-green-600">✓ Done</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Icon Action -->
                                        @if($isUnlocked)
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                                                    @if($isQuiz)
                                                        <!-- Quiz Icon -->
                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                                    @elseif($module->meeting_link)
                                                        <!-- Meeting Icon -->
                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    @elseif($module->type === 'assignment')
                                                         <!-- Assignment Icon -->
                                                         <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                    @elseif(in_array($module->type, ['pdf', 'document', 'doc', 'docx']) || Str::endsWith($module->file_path, ['.pdf', '.doc', '.docx']))
                                                        <!-- Document Icon -->
                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                    @elseif(in_array($module->type, ['image', 'jpg', 'png', 'jpeg']) || Str::endsWith($module->file_path, ['.jpg', '.jpeg', '.png']))
                                                        <!-- Image Icon -->
                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    @else
                                                        <!-- Video Icon (Default) -->
                                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M8 5v14l11-7z"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-[70%] content-width">
                    <!-- Module Details Container -->
                    <div class="neu-flat rounded-3xl p-8 border border-white/50 mt-8">
                        <!-- Current Module Title -->
                        <div class="flex items-center justify-between mb-6">
                            <h2 id="current-module-title" class="text-2xl font-bold text-slate-800 hidden"></h2>
                            <span id="player-title" class="px-3 py-1 bg-indigo-100 text-indigo-600 rounded-lg text-xs font-bold uppercase tracking-wider">Module</span>
                        </div>
                        
                        <!-- Current Module Description -->
                        <div id="current-module-description" class="text-slate-600 mb-6 hidden prose max-w-none"></div>

                        <!-- Video Container / Form Container -->
                        <div id="video-container" class="aspect-video bg-slate-900 rounded-xl overflow-hidden mb-6">
                            <!-- Standard Video Player Placeholder (User selects module) -->
                            <div class="flex items-center justify-center h-full text-slate-400">
                                <div class="text-center">
                                    <svg class="w-20 h-20 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-base">Select a module to start learning</p>
                                </div>
                            </div>
                        </div>

                        <!-- Mark Complete Button -->
                        <button id="mark-complete-btn" class="w-full neu-btn px-8 py-4 font-bold text-indigo-600 text-lg hidden hover:scale-[1.01] active:scale-95 transition-all"
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
            const filePath = element.dataset.filePath; // Get file path
            const moduleId = element.dataset.moduleId;
            const type = element.dataset.type;
            const isQuiz = element.dataset.isQuiz === 'true';
            const moduleTitle = element.querySelector('h3').textContent;
            let description = element.dataset.description || '';
            
            // New Meeting Props
            const meetingLink = element.dataset.meetingLink;
            const meetingPlatform = element.dataset.meetingPlatform;

            // Assignment Props
            const submissionText = element.dataset.submissionText || '';
            const submissionFile = element.dataset.submissionFile || '';
            const submissionStatus = element.dataset.submissionStatus || 'started';
            const scheduledAt = element.dataset.scheduledAt;
            const durationMinutes = parseInt(element.dataset.durationMinutes || 60);
            const mentorFeedback = element.dataset.mentorFeedback || '';
            const minScore = parseInt(element.dataset.minScore || 70);

            currentModuleId = moduleId;

            const videoContainer = document.getElementById('video-container');
            const currentModuleTitle = document.getElementById('current-module-title');
            const currentModuleDescription = document.getElementById('current-module-description');
            const playerTitle = document.getElementById('player-title');
            const markCompleteBtn = document.getElementById('mark-complete-btn');

            currentModuleTitle.textContent = moduleTitle;
            currentModuleTitle.classList.remove('hidden');

            
            // Update Description Area
            
            // Append Meeting Link to Description if exists
            let finalDescription = description !== 'null' ? description : '';
            
            if (meetingLink && meetingLink !== 'null' && type !== 'online_session') {
                 finalDescription += `
                    <div class="mt-6 p-4 bg-indigo-50 rounded-xl border border-indigo-100">
                        <h4 class="font-bold text-indigo-700 mb-2 flex items-center gap-2">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                             Live Session Details
                        </h4>
                        <div class="grid gap-2 text-sm">
                            <div>
                                <span class="font-bold text-slate-600">Platform:</span> 
                                <span class="text-slate-800">${meetingPlatform || 'Online Meeting'}</span>
                            </div>
                            <div>
                                <span class="font-bold text-slate-600">Link:</span>
                                <a href="${meetingLink.trim().startsWith('http') ? '' : 'https://'}${meetingLink.trim()}" target="_blank" class="font-bold text-indigo-600 hover:underline break-all">${meetingPlatform || 'Join Meeting'}</a>
                            </div>
                        </div>
                    </div>
                 `;
            }

            if (finalDescription) {
                currentModuleDescription.innerHTML = finalDescription; // Use innerHTML to render the link block
                currentModuleDescription.classList.remove('hidden');
            } else {
                currentModuleDescription.classList.add('hidden');
            }

            // Reset container
            videoContainer.innerHTML = '';
            // Remove ALL potential classes added by various modes
            videoContainer.classList.remove(
                'aspect-video', 'bg-slate-900', // Video default
                'min-h-[400px]', 'p-6', 'bg-white', // Quiz
                'h-[800px]', // PDF
                'bg-slate-100', 'p-4', 'flex', 'items-center', 'justify-center', // Image
                'bg-slate-50', 'p-10', 'min-h-[300px]', // Doc download
                'flex-col', 'p-8' // Assignment
            );
            
            // Default styling reset
            markCompleteBtn.classList.add('hidden');
            if ((!element.dataset.isCompleted || element.dataset.isCompleted === 'false') && !isQuiz && type !== 'assignment') {
                 markCompleteBtn.classList.remove('hidden');
            }

            // --- QUIZ LOGIC ---
            if (isQuiz) {
                playerTitle.textContent = 'Quiz';
                videoContainer.classList.add('bg-white', 'p-6', 'min-h-[400px]');
                
                try {
                    const questions = JSON.parse(element.dataset.questions || '[]');
                    videoContainer.dataset.minScore = element.dataset.minScore;
                    videoContainer.dataset.maxAttempts = element.dataset.maxAttempts;
                    
                    const userScore = parseInt(element.dataset.userScore || 0);
                    const userAttempts = parseInt(element.dataset.userAttempts || 0);
                    const maxAttempts = parseInt(element.dataset.maxAttempts || 3);
                    const isCompleted = element.dataset.isCompleted === 'true';

                    if (isCompleted) {
                         videoContainer.innerHTML = `
                            <div class="text-center py-20">
                                <svg class="w-20 h-20 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                 <h3 class="text-2xl font-bold text-slate-800 mb-2">Quiz Completed!</h3>
                                <div class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-xl font-bold text-sm mb-4">Status: Graded</div>
                                <p class="text-lg text-slate-600">Your Score: ${userScore}</p>
                            </div>
                         `;
                    } else if (submissionStatus === 'Menunggu Penilaian') {
                        videoContainer.innerHTML = `
                            <div class="text-center py-20">
                                <div class="w-20 h-20 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                 <h3 class="text-2xl font-bold text-slate-800 mb-2">Quiz Submitted</h3>
                                <div class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-xl font-bold text-sm mb-4">Status: Pending Review</div>
                                <p class="text-slate-500 max-w-sm mx-auto">
                                    Your essay answers are being reviewed by the mentor. Please wait for the final grade.
                                </p>
                            </div>
                        `;
                    } else if (userAttempts >= maxAttempts) {
                        videoContainer.innerHTML = `
                            <div class="text-center py-20">
                                <svg class="w-20 h-20 text-red-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                <h3 class="text-2xl font-bold text-slate-800 mb-2">Quiz Locked</h3>
                                <p class="text-lg text-slate-600 mb-2">Maximum attempts (${maxAttempts}) reached.</p>
                                <p class="text-slate-500">Last Score: ${userScore}</p>
                            </div>
                        `;
                    } else {
                        renderQuiz(questions, videoContainer);
                    }
                } catch (e) {
                    console.error('Error parsing questions:', e);
                    videoContainer.innerHTML = '<div class="text-red-500">Error loading quiz questions. Please check if questions are defined.</div>';
                }
                return;
            } else if (type === 'online_session') {
                // --- ONLINE SESSION LOGIC ---
                playerTitle.textContent = 'Live Session';
                videoContainer.classList.add('bg-white', 'p-10', 'flex', 'flex-col', 'items-center', 'justify-center', 'min-h-[400px]', 'text-center');
                
                let isLive = false;
                let sessionInfo = 'Scheduled Session';
                let timeDisplay = 'Upcoming';
                
                if (scheduledAt) {
                    const sessionDate = new Date(scheduledAt);
                    const now = new Date();
                    const diffMs = sessionDate - now;
                    const diffMins = Math.floor(diffMs / 60000);
                    
                    if (diffMins <= 15 && diffMins > -120) { // 15 mins before or 2 hours after start (roughly length of session)
                        isLive = true;
                        sessionInfo = 'Live Now!';
                        timeDisplay = 'Session is currently active';
                    } else if (diffMs > 0) {
                        sessionInfo = 'Upcoming Session';
                        timeDisplay = sessionDate.toLocaleString();
                    } else {
                        sessionInfo = 'Session Ended';
                        timeDisplay = 'This session was scheduled for ' + sessionDate.toLocaleString();
                    }
                }

                videoContainer.innerHTML = `
                    <div class="w-full">
                        <div class="neu-flat rounded-3xl p-8 md:p-12 border border-white/50 text-center relative overflow-hidden mb-8 group hover:shadow-lg transition-shadow duration-500">
                             <!-- Background Decoration -->
                            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-red-500 via-orange-500 to-amber-500"></div>
                            <div class="absolute -top-20 -right-20 w-60 h-60 bg-red-50 rounded-full blur-3xl opacity-60"></div>
                            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-orange-50 rounded-full blur-3xl opacity-60"></div>
                            
                            <!-- Icon -->
                            <div class="mb-8 relative inline-block">
                                <div class="absolute inset-0 ${isLive ? 'bg-red-200 blur-xl opacity-50 animate-pulse' : 'bg-indigo-100 blur-xl opacity-30'} rounded-full"></div>
                                <div class="relative w-24 h-24 ${isLive ? 'bg-gradient-to-br from-red-50 to-white text-red-600' : 'bg-gradient-to-br from-indigo-50 to-white text-indigo-500'} rounded-3xl flex items-center justify-center mx-auto shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white rotate-3 group-hover:rotate-6 transition-transform duration-500">
                                    <svg class="w-12 h-12 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </div>
                                ${isLive ? '<div class="absolute -top-2 -right-2 px-3 py-1 bg-red-600 text-white text-[10px] font-black uppercase rounded-full shadow-md animate-bounce">Live Now</div>' : ''}
                            </div>

                            <!-- Title & Status -->
                            <h3 class="text-3xl font-black text-slate-800 mb-2 tracking-tight">${sessionInfo}</h3>
                            <p class="text-slate-500 font-medium mb-8 text-lg">${timeDisplay}</p>

                            <!-- Details Card -->
                            <div class="bg-slate-50/80 backdrop-blur-sm p-6 rounded-2xl border border-slate-200 mb-8 text-left relative">
                                <div class="absolute top-0 left-0 w-1 h-full ${isLive ? 'bg-red-500' : 'bg-indigo-500'}"></div>
                                <div class="grid gap-4">
                                    <div class="flex items-start gap-3">
                                            <div class="p-2 bg-white rounded-lg text-slate-400 shadow-sm border border-slate-100 flex-shrink-0">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                            </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Platform</p>
                                            <p class="font-bold text-slate-800">${meetingPlatform || 'Online Meeting'}</p>
                                        </div>
                                    </div>
                                    <div class="w-full h-px bg-slate-200"></div>
                                    <div class="flex items-start gap-3">
                                             <div class="p-2 bg-white rounded-lg text-slate-400 shadow-sm border border-slate-100 flex-shrink-0">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status</p>
                                                <div class="flex items-center gap-2">
                                                    <span class="relative flex h-2.5 w-2.5">
                                                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full ${isLive ? 'bg-red-400 opacity-75' : 'hidden'}"></span>
                                                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 ${isLive ? 'bg-red-500' : 'bg-amber-500'}"></span>
                                                    </span>
                                                    <p class="font-bold ${isLive ? 'text-red-600' : 'text-amber-600'}">${isLive ? 'Live Streaming' : 'Scheduled'}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full h-px bg-slate-200"></div>
                                    <div class="flex items-start gap-3">
                                            <div class="p-2 bg-white rounded-lg text-slate-400 shadow-sm border border-slate-100 flex-shrink-0">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                            </div>
                                        <div class="flex-1 min-w-0 overflow-hidden">
                                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Link</p>
                                            <a href="${meetingLink.trim().startsWith('http') ? '' : 'https://'}${meetingLink.trim()}" target="_blank" class="font-bold text-indigo-600 hover:text-indigo-700 hover:underline transition-colors text-sm break-all inline-block">${meetingPlatform || 'Join Meeting'}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            ${isLive ? `
                                <a href="${meetingLink.trim().startsWith('http') ? '' : 'https://'}${meetingLink.trim()}" target="_blank" class="w-full py-4 bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 text-white font-bold text-lg rounded-2xl transition-all shadow-xl shadow-orange-200 hover:-translate-y-1 flex items-center justify-center gap-3 group/btn">
                                    <span class="relative flex h-3 w-3">
                                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                      <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                                    </span>
                                    Join Session Now
                                    <svg class="w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                <p class="mt-4 text-xs text-slate-400 font-medium">Click to open ${meetingPlatform || 'meeting'} in a new tab</p>
                            ` : `
                                <div class="w-full py-4 bg-slate-100 text-slate-400 font-bold rounded-2xl cursor-not-allowed mb-4 border-2 border-slate-100 border-dashed flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Join Button Activates When Live
                                </div>
                                
                                ${scheduledAt ? `
                                    <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(moduleTitle)}&details=${encodeURIComponent('Join live session for ' + moduleTitle)}&dates=${new Date(scheduledAt).toISOString().replace(/-|:|\.\d\d\d/g, '')}/${new Date(new Date(scheduledAt).getTime() + (durationMinutes * 60000)).toISOString().replace(/-|:|\.\d\d\d/g, '')}" target="_blank" class="w-full py-3 bg-white border-2 border-indigo-100 text-indigo-600 font-bold rounded-2xl hover:bg-indigo-50 transition-all flex items-center justify-center gap-2 mb-4 group/cal">
                                        <svg class="w-5 h-5 group-hover/cal:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        Add to Google Calendar
                                    </a>
                                ` : ''}
                                
                                <p class="mt-4 text-xs text-slate-400 italic">Button activates 15 minutes before the session starts.</p>
                            `}
                        </div>
                    </div>
                `;
                return;
            } else if (type === 'assignment') {
                // --- ASSIGNMENT LOGIC ---
                videoContainer.classList.add('bg-white', 'p-8', 'flex', 'flex-col', 'min-h-[400px]');

                const userScore = parseInt(element.dataset.userScore || 0);
                const isSubmitted = submissionStatus === 'submitted' || submissionStatus === 'graded' || submissionStatus === 'Menunggu Penilaian' || element.dataset.isCompleted === 'true';

                let instructionFile = '';
                if (filePath) {
                    const isImg = filePath.toLowerCase().endsWith('.jpg') || filePath.toLowerCase().endsWith('.jpeg') || filePath.toLowerCase().endsWith('.png') || filePath.toLowerCase().endsWith('.gif') || filePath.toLowerCase().endsWith('.webp');
                    if (isImg) {
                        instructionFile = `<div class="mb-8"><p class="font-bold text-slate-700 mb-4 flex items-center gap-2"><svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> Assignment Instructions / Material:</p><img src="${filePath}" class="max-w-full rounded-2xl shadow-lg border border-slate-200"></div>`;
                    } else {
                        instructionFile = `<div class="mb-8 p-4 bg-slate-50 rounded-xl border border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4"><div class="flex items-center gap-3 flex-1 min-w-0"><div class="p-2 bg-indigo-100 text-indigo-600 rounded-lg flex-shrink-0"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg></div><div class="min-w-0"><p class="font-bold text-slate-800">Assignment File</p><p class="text-xs text-slate-500">Download the instructions below</p></div></div><a href="${filePath}" download class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-bold text-sm hover:bg-indigo-700 transition-colors flex-shrink-0 whitespace-nowrap text-center">Download</a></div>`;
                    }
                }

                let formHtml = instructionFile;

                console.log('Assignment Load:', { moduleId, filePath, isSubmitted, instructionFile });

                if (isSubmitted) {
                    const isGraded = userScore > 0 || submissionStatus === 'graded';
                    
                    formHtml += `
                        <div class="w-full">
                            ${isGraded ? `
                                <!-- GRADED STATE (New Design) -->
                                <div class="neu-flat rounded-3xl p-8 md:p-12 border border-white/50 text-center relative overflow-hidden mb-8 group hover:shadow-lg transition-shadow duration-500">
                                    <!-- Background Decoration -->
                                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
                                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-purple-100 rounded-full blur-3xl opacity-50"></div>
                                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-indigo-100 rounded-full blur-3xl opacity-50"></div>
                                    
                                    <!-- Icon -->
                                     <div class="mb-6 relative inline-block">
                                        <div class="absolute inset-0 bg-indigo-200 blur-xl opacity-50 rounded-full animate-pulse"></div>
                                        <div class="relative w-20 h-20 bg-gradient-to-br from-indigo-50 to-white rounded-2xl flex items-center justify-center mx-auto shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-indigo-50 text-indigo-600 rotate-3 group-hover:rotate-6 transition-transform duration-500">
                                            <svg class="w-10 h-10 drop-shadow-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                    </div>

                                    <!-- Title & Status -->
                                    <h3 class="text-3xl font-black text-slate-900 mb-2 tracking-tight">
                                        Assignment Graded!
                                    </h3>
                                    <div class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-green-50 text-green-700 rounded-full font-bold text-xs uppercase tracking-wider mb-8 border border-green-100">
                                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                        Status: Graded
                                    </div>

                                    <!-- Score -->
                                    <div class="mb-10 relative">
                                        <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Final Score</div>
                                        <div class="text-[5rem] leading-none font-black text-indigo-600 scale-100 group-hover:scale-105 transition-transform duration-500 cursor-default">
                                            ${userScore}
                                        </div>
                                    </div>

                                    <!-- Feedback -->
                                    ${mentorFeedback ? `
                                        <div class="bg-indigo-50/60 rounded-2xl p-6 text-left relative border border-indigo-100/50">
                                            <div class="flex items-center gap-2 mb-3">
                                                 <div class="p-1 px-2 bg-indigo-100 text-indigo-700 rounded-lg flex items-center gap-1.5">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                                    <span class="text-[10px] font-black uppercase tracking-wider">Mentor Feedback</span>
                                                 </div>
                                            </div>
                                            <p class="text-slate-900 font-bold leading-relaxed text-lg pl-1" style="color: #0f172a;">
                                                 ${mentorFeedback}
                                            </p>
                                        </div>
                                    ` : ''}

                                    <!-- Resubmit if failed -->
                                     ${(userScore < minScore) ? `
                                        <div class="mt-8 p-4 bg-red-50 rounded-xl border border-red-100">
                                            <p class="text-red-700 font-bold text-sm mb-3 flex items-center justify-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                                Score below minimum (${minScore})
                                            </p>
                                            <button onclick="document.getElementById('resubmit-container').classList.remove('hidden');" class="w-full py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-colors shadow-lg shadow-indigo-200">
                                                Try Again
                                            </button>
                                        </div>
                                    ` : ''}

                                </div>
                            ` : `
                                <!-- PENDING REVIEW STATE -->
                                <div class="neu-flat rounded-3xl p-10 border border-white/50 text-center mb-8">
                                     <div class="w-20 h-20 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                     <h3 class="text-2xl font-bold text-slate-800 mb-2">Assignment Submitted</h3>
                                    <div class="inline-block px-4 py-1.5 bg-amber-50 text-amber-700 rounded-full font-bold text-xs uppercase tracking-wider mb-4 border border-amber-100">
                                        Pending Review
                                    </div>
                                    <p class="text-slate-500 mb-0 max-w-sm mx-auto">Your work has been submitted and is currently being reviewed by the mentor.</p>
                                </div>
                            `}

                            <!-- Submission Details (Collapsed/Small) -->
                            <div class="flex flex-col gap-3 justify-center items-center opacity-60 hover:opacity-100 transition-opacity mb-8">
                                 ${submissionText ? `<a href="${submissionText}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold text-indigo-600 hover:text-indigo-700 hover:underline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg> View Submission Link</a>` : ''}
                                ${submissionFile ? `<a href="/storage/${submissionFile}" target="_blank" class="inline-flex items-center gap-2 text-xs font-bold text-indigo-600 hover:text-indigo-700 hover:underline"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg> View Attached File</a>` : ''}
                            </div>

                            <!-- Resubmit Form Container (Hidden by default) -->
                             <div id="resubmit-container" class="hidden text-left border-t border-slate-200 pt-8 animate-fade-in-up">
                                <h4 class="font-bold text-slate-800 mb-6 text-xl">Resubmit Your Work</h4>
                                <form id="assignment-form-resubmit" onsubmit="submitAssignment(event, true)" class="space-y-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">New Project Link (Optional)</label>
                                        <input type="url" name="submission_text" class="w-full rounded-xl border-slate-200 focus:ring-indigo-500 focus:border-indigo-500" value="${submissionText}" placeholder="https://...">
                                    </div>
                                    <div class="relative">
                                        <div class="absolute inset-0 flex items-center" aria-hidden="true"><div class="w-full border-t border-slate-200"></div></div>
                                        <div class="relative flex justify-center"><span class="px-2 bg-white text-sm text-slate-500">OR</span></div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Upload New File (Optional)</label>
                                        <input type="file" name="submission_file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                                    </div>
                                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg hover:-translate-y-1">
                                        Update Submission
                                    </button>
                                </form>
                            </div>
                        </div>
                    `;
                } else {
                    formHtml += `
                        <div class="max-w-2xl mx-auto w-full">
                            <div class="mb-8 p-6 bg-indigo-50 rounded-2xl border border-indigo-100">
                                <h3 class="font-bold text-indigo-800 mb-2">Submission Instructions</h3>
                                <p class="text-indigo-600 text-sm">Please upload your project file or provide a link to your work (Google Drive, GitHub, etc.).</p>
                            </div>

                            <form id="assignment-form" onsubmit="submitAssignment(event)" class="space-y-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Project Link (Optional)</label>
                                    <input type="url" name="submission_text" class="w-full rounded-xl border-slate-200 focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://...">
                                </div>
                                
                                <div class="relative">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-slate-200"></div>
                                    </div>
                                    <div class="relative flex justify-center">
                                        <span class="px-2 bg-white text-sm text-slate-500">OR</span>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Upload File (Optional)</label>
                                    <input type="file" name="submission_file" class="block w-full text-sm text-slate-500
                                        file:mr-4 file:py-3 file:px-6
                                        file:rounded-xl file:border-0
                                        file:text-sm file:font-bold
                                        file:bg-indigo-50 file:text-indigo-700
                                        hover:file:bg-indigo-100
                                    "/>
                                    <p class="mt-1 text-xs text-slate-500">Max size: 10MB. Allowed: PDF, ZIP, DOC, JPG, PNG.</p>
                                </div>

                                <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg hover:-translate-y-1">
                                    Submit Assignment
                                </button>
                            </form>
                            <div id="submission-error" class="hidden mt-4 p-4 bg-red-50 text-red-600 rounded-xl text-sm"></div>
                        </div>
                    `;
                }

                videoContainer.innerHTML = formHtml;
                return;
            }

            // --- FILE / IMAGE / VIDEO LOGIC ---
            
            // Helper to clean and check type/extension
            const safeType = (type || '').toLowerCase();
            const hasExt = (ext) => filePath && filePath.toLowerCase().endsWith(ext);

            const isImage = hasExt('.jpg') || hasExt('.jpeg') || hasExt('.png') || hasExt('.gif') || hasExt('.webp') || 
                            ['image', 'jpg', 'jpeg', 'png'].includes(safeType);
            
            const isPdf = hasExt('.pdf') || ['pdf'].includes(safeType);
            
            const isDoc = hasExt('.doc') || hasExt('.docx') || ['document', 'doc', 'docx'].includes(safeType);

            console.log('Module Load:', { moduleId, type: safeType, filePath, isImage, isPdf, isDoc });

            if (isImage) {
                playerTitle.textContent = 'Image Viewer';
                // Image View
                 videoContainer.classList.add('bg-slate-100', 'p-4', 'flex', 'items-center', 'justify-center');
                 videoContainer.innerHTML = `<img src="${filePath}" alt="${moduleTitle}" class="max-w-full max-h-[600px] rounded-lg shadow-md object-contain">`;

            } else if (isPdf) {
                playerTitle.textContent = 'Document Viewer';
                // PDF View
                videoContainer.classList.add('h-[800px]', 'bg-white');
                videoContainer.innerHTML = `<iframe src="${filePath}" class="w-full h-full rounded-lg" frameborder="0"></iframe>`;

            } else if (isDoc) {
                playerTitle.textContent = 'Document Download';
                // Other Documents (Download)
                videoContainer.classList.add('bg-slate-50', 'p-10', 'flex', 'items-center', 'justify-center', 'min-h-[300px]');
                videoContainer.innerHTML = `
                    <div class="text-center">
                        <div class="w-20 h-20 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Download Document</h3>
                        <p class="text-slate-500 mb-6">This document cannot be previewed directly.</p>
                        <a href="${filePath}" download class="px-8 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition-colors inline-flex items-center gap-2">
                            Download File
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        </a>
                    </div>
                `;
            } else {
                // Video Mode (Fallback)
                playerTitle.textContent = 'Video Player';
                videoContainer.classList.add('aspect-video', 'bg-slate-900');
                
                if (videoUrl && (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be'))) {
                    const videoId = extractYouTubeId(videoUrl);
                    videoContainer.innerHTML = `<iframe class="w-full h-full" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                } else if (videoUrl && videoUrl.includes('vimeo.com')) {
                    const videoId = extractVimeoId(videoUrl);
                    videoContainer.innerHTML = `<iframe class="w-full h-full" src="https://player.vimeo.com/video/${videoId}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>`;
                } else if (videoUrl) {
                    // Generic video (mp4 etc)
                     videoContainer.innerHTML = `<video controls class="w-full h-full" src="${videoUrl}"></video>`;
                } else {
                     videoContainer.innerHTML = '<div class="flex items-center justify-center h-full text-white">Content unavailable</div>';
                }
            }
        }

        function renderQuiz(questions, container) {
            if (!questions || questions.length === 0) {
                container.innerHTML = '<div class="text-center text-slate-500 py-10">No questions in this quiz.</div><button onclick="markComplete()" class="neu-btn px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl mt-4 w-full">Complete Quiz</button>';
                return;
            }

            let html = '<div class="space-y-8">';
            questions.forEach((q, index) => {
                const questionText = q.question_text || q.question || 'Question ' + (index + 1);
                
                html += `
                    <div class="question-item" data-type="${q.question_type || 'choice'}">
                        <p class="font-bold text-slate-800 mb-4">${index + 1}. ${questionText}</p>
                        <div class="space-y-2 pl-4">
                `;
                
                if (q.question_type === 'essay') {
                    html += `
                        <textarea name="question_${index}" class="w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 p-3" rows="3" placeholder="Type your answer..."></textarea>
                    `;
                } else {
                    // Multiple Choice
                    if (Array.isArray(q.options)) {
                        q.options.forEach((opt, optIndex) => {
                            const label = (typeof opt === 'string') ? opt : (opt.label || opt.text);
                            const isCorrect = (typeof opt === 'object' && opt.is_correct) ? 'true' : 'false';
                            
                            html += `
                                <label class="flex items-center gap-3 cursor-pointer p-3 border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors">
                                    <input type="radio" name="question_${index}" value="${optIndex}" class="w-4 h-4 text-indigo-600 focus:ring-indigo-500" data-correct="${isCorrect}">
                                    <span class="text-slate-700 text-sm">${label}</span>
                                </label>
                            `;
                        });
                    }
                }

                html += `</div></div>`;
            });

            html += `
                <div class="pt-6 border-t border-slate-100">
                    <button onclick="submitQuiz()" class="w-full neu-btn px-8 py-4 font-bold text-indigo-600 rounded-xl hover:bg-indigo-50 transition-colors">
                        Submit Answers
                    </button>
                    <div id="quiz-result" class="mt-4 hidden text-center font-bold"></div>
                </div>
            </div>`;

            container.innerHTML = html;
        }

        function submitQuiz() {
            const container = document.getElementById('video-container');
            const items = container.querySelectorAll('.question-item');
            let correctCount = 0;
            let total = 0; // Only count auto-gradable questions for score
            let allAnswered = true;

            const answers = {};

            items.forEach((item, index) => {
                const type = item.dataset.type;
                
                if (type === 'essay') {
                    const textarea = item.querySelector('textarea');
                    const val = textarea.value.trim();
                    if (!val) {
                        allAnswered = false;
                    }
                    answers[index] = { type: 'essay', answer: val };
                } else {
                    total++;
                    const checked = item.querySelector('input[type="radio"]:checked');
                    if (!checked) {
                        allAnswered = false;
                    } else {
                        const isCorrect = checked.dataset.correct === 'true';
                        if (isCorrect) correctCount++;
                        answers[index] = { type: 'choice', answer: checked.value, is_correct: isCorrect };
                    }
                }
            });

            if (!allAnswered) {
                alert('Please complete all questions!');
                return;
            }

            // Calculate Score
            const score = total > 0 ? Math.round((correctCount / total) * 100) : 100;
            const minScore = parseInt(document.querySelector(`#video-container`).dataset.minScore || 70);

            const submitBtn = document.querySelector('button[onclick="submitQuiz()"]');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';

            fetch(`/my-classes/module/${currentModuleId}/complete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ 
                    score: score,
                    quiz_answers: answers
                })
            })
            .then(response => response.json())
            .then(data => {
                const resultDiv = document.getElementById('quiz-result');
                resultDiv.classList.remove('hidden');

                if (data.completed) {
                    resultDiv.innerHTML = `
                        <div class="mb-4">
                            <svg class="w-16 h-16 text-green-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="text-xl font-bold text-green-600">PASSED!</h3>
                            <p class="text-slate-600">Your Score: ${data.score}</p>
                        </div>
                    `;
                    // Reload to update status
                    setTimeout(() => location.reload(), 2000);
                } else if (!data.success) {
                    // Max attempts reached or error
                    resultDiv.innerHTML = `
                        <div class="mb-4">
                            <svg class="w-16 h-16 text-red-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="text-xl font-bold text-red-600">${data.message}</h3>
                            <p class="text-slate-600">Your Score: ${data.score}</p>
                        </div>
                    `;
                } else if (data.is_pending) {
                     // Essay / Manual Grading Pending
                     resultDiv.innerHTML = `
                        <div class="mb-4">
                            <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-amber-600">Submitted for Review</h3>
                            <p class="text-slate-600 mb-2">${data.message}</p>
                            <p class="text-sm text-slate-500">Your essay answers are being reviewed by the mentor.</p>
                             <button onclick="location.reload()" class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Refresh Status</button>
                        </div>
                    `;
                } else {
                    // Failed but can retry
                    resultDiv.innerHTML = `
                        <div class="mb-4">
                            <svg class="w-16 h-16 text-orange-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <h3 class="text-xl font-bold text-orange-600">Failed</h3>
                            <p class="text-slate-600 mb-2">Score: ${data.score} (Min: ${minScore})</p>
                            ${data.attempts_left !== undefined ? `<p class="text-sm text-slate-500">Attempts left: ${data.attempts_left}</p>` : ''}
                            <button onclick="location.reload()" class="mt-4 px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Try Again</button>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Submission failed. Please try again.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Answers';
            });
        }



        function submitAssignment(event, isUpdate = false) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            
            // For resubmissions, this div might not exist yet if generated dynamically, but let's check
            let errorDiv = document.getElementById('submission-error');
            if(!errorDiv) {
                errorDiv = document.createElement('div');
                errorDiv.id = 'submission-error';
                errorDiv.className = 'mt-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm hidden';
                form.appendChild(errorDiv);
            }

            // Basic validation: Check if at least one field is filled
            if (!formData.get('submission_text') && (!formData.get('submission_file') || formData.get('submission_file').size === 0)) {
                errorDiv.textContent = 'Please provide either a link or upload a file.';
                errorDiv.classList.remove('hidden');
                return;
            }

            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
            errorDiv.classList.add('hidden');

            fetch(`/my-classes/module/${currentModuleId}/submit`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(isUpdate ? 'Submission updated! Your work has been sent back for review.' : 'Assignment submitted successfully!');
                    location.reload();
                } else {
                    errorDiv.textContent = data.error || 'Error submitting assignment';
                    errorDiv.classList.remove('hidden');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Submit Assignment';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorDiv.textContent = 'An error occurred. Please try again.';
                errorDiv.classList.remove('hidden');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Submit Assignment';
            });
        }

        function extractYouTubeId(url) {
            if(!url) return null;
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);
            return (match && match[2].length === 11) ? match[2] : null;
        }

        function extractVimeoId(url) {
             if(!url) return null;
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
                },
                body: JSON.stringify({ manual_complete: true })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Module marked as complete! 🎉');
                        location.reload(); 
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to mark as complete. Please try again.');
                });
        }


        document.addEventListener('DOMContentLoaded', () => {
            // For Workshops/Webinars, do NOT auto-load the first module so the Event Details stay visible.
            const isWorkshopOrWebinar = @json(in_array($training->category, ['workshop', 'webinar']));
            if (isWorkshopOrWebinar) {
                return;
            }

            // Find first unlocked module that is NOT completed
            let targetModule = document.querySelector('.neu-flat[onclick="loadModule(this)"][data-is-unlocked="true"][data-is-completed="false"]');
            
            // If all completed or none found, fallback to first unlocked module (review mode)
            if (!targetModule) {
                targetModule = document.querySelector('.neu-flat[onclick="loadModule(this)"][data-is-unlocked="true"]');
            }

            // If still nothing (e.g. only first locked?), fallback to very first one
            if (!targetModule) {
                targetModule = document.querySelector('.neu-flat[onclick="loadModule(this)"]');
            }

            if (targetModule) {
                loadModule(targetModule);
                setTimeout(() => {
                    targetModule.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 500);
            }
        });
    </script>
</x-layout-upventure>