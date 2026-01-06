<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning - {{ $training->title ?? 'UpVenture' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar for sidebar */
        .curriculum-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .curriculum-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .curriculum-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .curriculum-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>
<body class="bg-slate-50">
    
    <!-- Mobile Header with Menu Toggle -->
    <header class="lg:hidden bg-white border-b border-slate-200 px-4 py-3 sticky top-0 z-50">
        <div class="flex items-center justify-between">
            <button id="mobile-menu-btn" class="p-2 hover:bg-slate-100 rounded-lg transition">
                <svg class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-lg font-bold text-slate-800 truncate">{{ $training->title ?? 'Class Title' }}</h1>
            <div class="w-10"></div> <!-- Spacer for centering -->
        </div>
    </header>

    <div class="flex min-h-screen">
        
        <!-- Left Sidebar - Curriculum -->
        <aside id="curriculum-sidebar" class="fixed lg:sticky top-0 left-0 w-80 lg:w-96 h-screen bg-white border-r border-slate-200 z-40 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
            
            <!-- Sidebar Header -->
            <div class="px-6 py-5 border-b border-slate-200">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-lg font-bold text-slate-800">Course Content</h2>
                    <button id="close-sidebar-btn" class="lg:hidden p-1 hover:bg-slate-100 rounded">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center gap-2 text-sm text-slate-600">
                    <span class="font-medium">3 of 12 completed</span>
                    <span class="text-slate-400">•</span>
                    <span>25% progress</span>
                </div>
                <!-- Progress Bar -->
                <div class="mt-3 w-full bg-slate-200 rounded-full h-2 overflow-hidden">
                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: 25%"></div>
                </div>
            </div>

            <!-- Curriculum List -->
            <div class="curriculum-scroll overflow-y-auto h-[calc(100vh-140px)]">
                
                <!-- Module 1 -->
                <div class="border-b border-slate-100">
                    <button class="module-toggle w-full px-6 py-4 flex items-center justify-between hover:bg-slate-50 transition">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform module-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="font-bold text-slate-800">Module 1: Getting Started</span>
                        </div>
                        <span class="text-xs text-slate-500">4 lessons</span>
                    </button>
                    <div class="module-content">
                        <!-- Lesson 1 - Completed -->
                        <a href="#" class="flex items-center gap-3 px-6 py-3 hover:bg-blue-50 transition border-l-4 border-transparent hover:border-blue-600">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-700 truncate">Introduction to the Course</p>
                                <p class="text-xs text-slate-500">5:30</p>
                            </div>
                        </a>
                        
                        <!-- Lesson 2 - Active -->
                        <a href="#" class="flex items-center gap-3 px-6 py-3 bg-blue-50 border-l-4 border-blue-600">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-600 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-blue-600 truncate">Setup Development Environment</p>
                                <p class="text-xs text-blue-500">12:45</p>
                            </div>
                        </a>
                        
                        <!-- Lesson 3 - Locked -->
                        <a href="#" class="flex items-center gap-3 px-6 py-3 opacity-50 cursor-not-allowed">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-slate-300 flex items-center justify-center">
                                <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-500 truncate">Your First Project</p>
                                <p class="text-xs text-slate-400">15:20</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Module 2 -->
                <div class="border-b border-slate-100">
                    <button class="module-toggle w-full px-6 py-4 flex items-center justify-between hover:bg-slate-50 transition">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform module-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="font-bold text-slate-800">Module 2: Core Concepts</span>
                        </div>
                        <span class="text-xs text-slate-500">8 lessons</span>
                    </button>
                    <div class="module-content hidden">
                        <!-- More lessons here -->
                        <a href="#" class="flex items-center gap-3 px-6 py-3 opacity-50 cursor-not-allowed">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-slate-300 flex items-center justify-center">
                                <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-500 truncate">Understanding Variables</p>
                                <p class="text-xs text-slate-400">10:15</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </aside>

        <!-- Sidebar Overlay for Mobile -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden hidden"></div>

        <!-- Main Content Area -->
        <main class="flex-1 lg:ml-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
                
                <!-- Video Player Container -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-6">
                    <div class="relative aspect-video bg-slate-900">
                        <!-- Video Player Placeholder -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-white bg-opacity-20 backdrop-blur-sm flex items-center justify-center hover:bg-opacity-30 transition cursor-pointer">
                                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"></path>
                                    </svg>
                                </div>
                                <p class="text-white text-sm">Click to play video</p>
                            </div>
                        </div>
                        <!-- Actual Video Player (iframe) -->
                        <!-- <iframe src="https://www.youtube.com/embed/VIDEO_ID" class="w-full h-full" frameborder="0" allowfullscreen></iframe> -->
                    </div>
                </div>

                <!-- Lesson Title and Info -->
                <div class="mb-6">
                    <h1 class="text-2xl lg:text-3xl font-bold text-slate-800 mb-2">Setup Development Environment</h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-600">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            12:45 minutes
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                            Module 1, Lesson 2
                        </span>
                    </div>
                </div>

                <!-- Navigation and Actions -->
                <div class="flex flex-col sm:flex-row gap-3 mb-8">
                    <button class="flex-1 px-6 py-3 bg-white border-2 border-slate-200 rounded-xl font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Previous Lesson
                    </button>
                    
                    <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition shadow-lg shadow-blue-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Mark as Completed
                    </button>
                    
                    <button class="flex-1 px-6 py-3 bg-white border-2 border-slate-200 rounded-xl font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-300 transition flex items-center justify-center gap-2">
                        Next Lesson
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>

                <!-- Tabs Section -->
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                    <!-- Tab Headers -->
                    <div class="border-b border-slate-200">
                        <div class="flex">
                            <button class="tab-btn active px-6 py-4 font-semibold text-slate-700 border-b-2 border-blue-600 hover:bg-slate-50 transition" data-tab="about">
                                About this Lesson
                            </button>
                            <button class="tab-btn px-6 py-4 font-semibold text-slate-500 border-b-2 border-transparent hover:text-slate-700 hover:bg-slate-50 transition" data-tab="resources">
                                Tools & Resources
                            </button>
                            <button class="tab-btn px-6 py-4 font-semibold text-slate-500 border-b-2 border-transparent hover:text-slate-700 hover:bg-slate-50 transition" data-tab="discussion">
                                Discussion
                            </button>
                        </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="p-6 lg:p-8">
                        
                        <!-- About Tab -->
                        <div id="tab-about" class="tab-content">
                            <h3 class="text-xl font-bold text-slate-800 mb-4">What You'll Learn</h3>
                            <div class="prose prose-slate max-w-none">
                                <p class="text-slate-600 leading-relaxed mb-4">
                                    In this lesson, you'll learn how to set up your development environment from scratch. We'll cover installing the necessary tools, configuring your IDE, and setting up version control.
                                </p>
                                <h4 class="text-lg font-bold text-slate-800 mb-3">Key Topics:</h4>
                                <ul class="space-y-2 text-slate-600">
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Installing Node.js and npm
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Configuring VS Code for optimal productivity
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Setting up Git and GitHub
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Installing essential extensions
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Resources Tab -->
                        <div id="tab-resources" class="tab-content hidden">
                            <h3 class="text-xl font-bold text-slate-800 mb-4">Downloads & Links</h3>
                            <div class="space-y-3">
                                <a href="#" class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-800">Starter Code Files</p>
                                            <p class="text-sm text-slate-500">ZIP File - 2.4 MB</p>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </a>
                                
                                <a href="#" class="flex items-center justify-between p-4 bg-slate-50 rounded-xl hover:bg-slate-100 transition group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-slate-800">VS Code Extensions List</p>
                                            <p class="text-sm text-slate-500">External Link</p>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-purple-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Discussion Tab -->
                        <div id="tab-discussion" class="tab-content hidden">
                            <h3 class="text-xl font-bold text-slate-800 mb-4">Questions & Discussion</h3>
                            <div class="space-y-4">
                                <!-- Sample Discussion -->
                                <div class="border-l-4 border-blue-600 bg-blue-50 p-4 rounded-r-xl">
                                    <div class="flex items-start gap-3">
                                        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold flex-shrink-0">
                                            JD
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-slate-800">John Doe</p>
                                            <p class="text-sm text-slate-600 mt-1">What's the best IDE for beginners?</p>
                                            <p class="text-xs text-slate-500 mt-2">2 hours ago • 3 replies</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center py-8">
                                    <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold transition">
                                        Ask a Question
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </main>

    </div>

    <!-- JavaScript for Interactivity -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeSidebarBtn = document.getElementById('close-sidebar-btn');
        const sidebar = document.getElementById('curriculum-sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', openSidebar);
        }
        
        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', closeSidebar);
        }
        
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', closeSidebar);
        }

        // Module Accordion Toggle
        const moduleToggles = document.querySelectorAll('.module-toggle');
        moduleToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('.module-icon');
                
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-90');
            });
        });

        // Tab Switching
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const targetTab = this.dataset.tab;
                
                // Remove active state from all tabs
                tabBtns.forEach(b => {
                    b.classList.remove('active', 'border-blue-600', 'text-slate-700');
                    b.classList.add('border-transparent', 'text-slate-500');
                });
                
                // Add active state to clicked tab
                this.classList.add('active', 'border-blue-600', 'text-slate-700');
                this.classList.remove('border-transparent', 'text-slate-500');
                
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show target tab content
                document.getElementById(`tab-${targetTab}`).classList.remove('hidden');
            });
        });

        // Auto-open first module by default
        document.addEventListener('DOMContentLoaded', function() {
            const firstModule = document.querySelector('.module-toggle');
            if (firstModule) {
                firstModule.click();
            }
        });
    </script>

</body>
</html>
