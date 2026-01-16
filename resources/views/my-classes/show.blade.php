<x-layout-upventure title="{{ $training->title }} - My Classes">
    <style>
        @media (min-width: 1024px) {
            .sidebar-width { width: 30% !important; flex: 0 0 30% !important; }
            .content-width { width: 70% !important; flex: 0 0 70% !important; }
        }
    </style>
    <section class="pt-24 pb-24 bg-[#eef2f6] min-h-screen">
        <div class="container mx-auto px-6">
            <!-- Breadcrumb -->
            <div class="mb-8">
                <a href="{{ route('my-classes.index') }}"
                    class="text-slate-500 hover:text-indigo-600 transition-colors flex items-center gap-2 text-lg font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>{{ __('messages.back_to_my_classes') }}</span>
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

                @if($progressPercentage >= 100)
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('my-classes.certificate', $training->id) }}" target="_blank" 
                           class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            E-Certificate Ready
                        </a>
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
                                    data-max-attempts="{{ $module->max_attempts ?? 3 }}"
                                    data-user-score="{{ $userProgress[$module->id]->score ?? 0 }}"
                                    data-user-attempts="{{ $userProgress[$module->id]->attempts ?? 0 }}"
                                    data-description="{{ $module->description }}"

                                    data-is-completed="{{ $isCompleted ? 'true' : 'false' }}"
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

                                        <!-- Icon Action -->
                                        @if($isUnlocked)
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center group-hover:scale-110 transition-transform">
                                                    @if($isQuiz)
                                                        <!-- Quiz Icon -->
                                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
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
                    <div class="neu-flat rounded-3xl p-8 border border-white/50">
                        <h3 id="player-title" class="text-2xl font-bold text-slate-800 mb-6">Video Player</h3>

                        <!-- Video Container -->
                        <div id="video-container" class="aspect-video bg-slate-900 rounded-xl overflow-hidden mb-6">
                            <!-- Content injected via JS -->
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

                    </div>

                    <!-- Module Details Container (New) -->
                    <div class="neu-flat rounded-3xl p-8 border border-white/50 mt-8">
                        <!-- Current Module Title -->
                        <div id="current-module-title" class="text-2xl font-bold text-slate-800 mb-4 hidden"></div>
                        
                        <!-- Current Module Description -->
                        <div id="current-module-description" class="text-slate-600 mb-6 hidden prose max-w-none"></div>

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
            const filePath = element.dataset.filePath; // Get file path
            const moduleId = element.dataset.moduleId;
            const type = element.dataset.type;
            const isQuiz = element.dataset.isQuiz === 'true';
            const moduleTitle = element.querySelector('h3').textContent;
            const description = element.dataset.description;
            
            currentModuleId = moduleId;

            const videoContainer = document.getElementById('video-container');
            const currentModuleTitle = document.getElementById('current-module-title');
            const currentModuleDescription = document.getElementById('current-module-description');
            const playerTitle = document.getElementById('player-title');
            const markCompleteBtn = document.getElementById('mark-complete-btn');

            currentModuleTitle.textContent = moduleTitle;
            currentModuleTitle.classList.remove('hidden');

            if (description && description !== 'null') {
                currentModuleDescription.textContent = description;
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
                'bg-slate-50', 'p-10', 'min-h-[300px]' // Doc download
            );
            
            // Default styling reset
            markCompleteBtn.classList.remove('hidden');

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
                                <p class="text-lg text-slate-600">Your Score: ${userScore}</p>
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
                    
                    markCompleteBtn.classList.add('hidden'); // Hide default mark complete, show inside quiz
                } catch (e) {
                    console.error('Error parsing questions:', e);
                    videoContainer.innerHTML = '<div class="text-red-500">Error loading quiz.</div>';
                }
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

            items.forEach(item => {
                const type = item.dataset.type;
                
                if (type === 'essay') {
                    const textarea = item.querySelector('textarea');
                    if (!textarea.value.trim()) {
                        allAnswered = false;
                    }
                    // Essay is auto-correct for now in this simple implementation
                } else {
                    total++;
                    const checked = item.querySelector('input[type="radio"]:checked');
                    if (!checked) {
                        allAnswered = false;
                    } else if (checked.dataset.correct === 'true') {
                        correctCount++;
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
                body: JSON.stringify({ score: score })
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
                } else {
                    // Failed but can retry
                    resultDiv.innerHTML = `
                        <div class="mb-4">
                            <svg class="w-16 h-16 text-orange-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <h3 class="text-xl font-bold text-orange-600">Failed</h3>
                            <p class="text-slate-600 mb-2">Score: ${data.score} (Min: ${minScore})</p>
                            <p class="text-sm text-slate-500">Attempts left: ${data.attempts_left}</p>
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
                }
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