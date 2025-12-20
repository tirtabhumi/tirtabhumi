<x-layout title="{{ __('messages.service_digital_title') }} - {{ config('app.name') }}" description="{{ __('messages.service_digital_desc') }}">
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-[#eef2f6] overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <!-- Breadcrumb -->
            <!-- Breadcrumb -->
            <x-breadcrumb :paths="[__('messages.services') => '/#services']" :current="__('messages.service_digital_title')" />

            <div class="inline-flex items-center justify-center p-3 mb-6 rounded-2xl neu-pressed text-indigo-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 16l4-16M6 9h14M4 15h14"></path></svg>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-slate-800">
                {{ __('messages.service_digital_title') }}
            </h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto leading-relaxed">
                {{ __('messages.service_digital_desc') }}
            </p>
        </div>
    </section>

    <!-- Detailed Services -->
    <section class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Software & Web Development -->
                <a href="{{ route('webbundling') }}" class="block group">
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 h-full flex flex-col">
                        <h3 class="text-xl font-bold mb-4 text-slate-800">{{ __('messages.digital_sub_1_title') }}</h3>
                        <p class="text-slate-500 mb-6">
                            {{ __('messages.digital_sub_1_desc') }}
                        </p>
                        <ul class="space-y-2 text-sm text-slate-600 mb-6">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_1_list_1') }}</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_1_list_2') }}</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_1_list_3') }}</li>
                        </ul>
                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <span class="inline-flex items-center font-semibold text-indigo-600 group-hover:text-indigo-700 transition-colors">
                                {{ __('messages.learn_more') }}
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Automation & AI -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 relative overflow-hidden">
                    <h3 class="text-xl font-bold mb-4 text-slate-800">{{ __('messages.digital_sub_2_title') }}</h3>
                    <p class="text-slate-500 mb-6">
                        {{ __('messages.digital_sub_2_desc') }}
                    </p>
                    <ul class="space-y-2 text-sm text-slate-600 mb-6">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_2_list_1') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_2_list_2') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_2_list_3') }}</li>
                    </ul>
                    
                    <button onclick="openAiChat()" class="neu-btn w-full py-3 font-bold text-indigo-600 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        Try AI Demo
                    </button>
                </div>

                <!-- AI Chat Modal -->
                <div id="ai-chat-modal" class="fixed inset-0 z-[9999] hidden">
                    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeAiChat()"></div>
                        <div class="fixed inset-0 md:absolute md:inset-auto md:top-1/2 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 w-full md:w-[400px] bg-white md:rounded-2xl shadow-2xl flex flex-col h-[100dvh] md:h-[600px] md:max-h-[85vh]">
                        <!-- Header -->
                        <div class="bg-indigo-600 p-4 flex items-center justify-between text-white shrink-0 z-10 relative">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sm">Tirtabhumi AI Assistant</h3>
                                    <p class="text-xs text-indigo-200 flex items-center gap-1">
                                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Online
                                    </p>
                                </div>
                            </div>
                            <button onclick="closeAiChat()" class="text-white/80 hover:text-white p-1 hover:bg-white/10 rounded-lg transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        
                        <!-- Setup Screen -->
                        <div id="chat-setup" class="p-6 space-y-6 overflow-y-auto flex-1">
                            <div class="text-center">
                                <h4 class="font-bold text-slate-800 text-lg mb-2">Pilih Industri Anda</h4>
                                <p class="text-slate-500 text-sm">Pilih industri yang sesuai untuk simulasi percakapan yang lebih relevan.</p>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-3">
                                <button onclick="selectIndustry('Logistics')" class="industry-btn p-3 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-sm font-medium transition-all">
                                    Logistics
                                </button>
                                <button onclick="selectIndustry('Manufacture')" class="industry-btn p-3 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-sm font-medium transition-all">
                                    Manufacture
                                </button>
                                <button onclick="selectIndustry('Edukasi')" class="industry-btn p-3 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-sm font-medium transition-all">
                                    Edukasi
                                </button>
                                <button onclick="selectIndustry('Pelatihan')" class="industry-btn p-3 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-sm font-medium transition-all">
                                    Pelatihan
                                </button>
                                <button onclick="selectIndustry('Wifi')" class="industry-btn p-3 rounded-xl border border-slate-200 hover:border-indigo-500 hover:bg-indigo-50 text-slate-600 hover:text-indigo-600 text-sm font-medium transition-all col-span-2">
                                    Wifi / Internet
                                </button>
                            </div>

                            <button onclick="startSimulation()" id="start-btn" disabled class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 disabled:bg-slate-300 disabled:cursor-not-allowed text-white rounded-xl font-bold text-sm transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5">
                                Mulai Simulasi
                            </button>
                        </div>

                        <!-- Chat Interface (Hidden initially) -->
                        <div id="chat-interface" class="hidden flex-col flex-1 min-h-0 h-full overflow-hidden md:h-[500px]">
                            <!-- Chat Area -->
                            <div id="chat-messages" class="flex-1 min-h-0 p-4 overflow-y-auto bg-slate-50 space-y-4 overscroll-contain" style="-webkit-overflow-scrolling: touch; touch-action: pan-y;">
                                <!-- Welcome Message -->
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div class="neu-flat p-3 rounded-2xl rounded-tl-none border-white/50 text-sm text-slate-600">
                                        Halo! Saya asisten AI Tirtabhumi. Saya siap membantu kebutuhan <span id="selected-industry-text" class="font-bold"></span> Anda. Ada yang bisa saya bantu?
                                    </div>
                                </div>
                            </div>

                            <!-- Input Area -->
                            <div class="p-4 bg-white border-t border-slate-100 shrink-0 z-10">
                                <form onsubmit="sendMessage(event)" class="flex gap-2">
                                    <input type="text" id="chat-input" class="flex-1 rounded-xl border-slate-200 text-sm focus:ring-indigo-500 focus:border-indigo-500 px-4" placeholder="Ketik pesan Anda..." autocomplete="off">
                                    <button type="submit" id="send-btn" class="bg-indigo-600 hover:bg-indigo-700 text-white p-2 rounded-xl transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    let selectedIndustry = null;
                    let messageCount = 0;

                    function openAiChat() {
                        const modal = document.getElementById('ai-chat-modal');
                        modal.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                        
                        // Reset state
                        document.getElementById('chat-setup').classList.remove('hidden');
                        document.getElementById('chat-interface').classList.add('hidden');
                        selectedIndustry = null;
                        messageCount = 0;
                        document.querySelectorAll('.industry-btn').forEach(btn => {
                            btn.classList.remove('border-indigo-600', 'bg-indigo-50', 'text-indigo-600');
                            btn.classList.add('border-slate-200', 'text-slate-600');
                        });
                        document.getElementById('start-btn').disabled = true;
                    }

                    function closeAiChat() {
                        const modal = document.getElementById('ai-chat-modal');
                        modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }

                    function selectIndustry(industry) {
                        selectedIndustry = industry;
                        
                        // Update UI
                        document.querySelectorAll('.industry-btn').forEach(btn => {
                            if (btn.textContent.trim() === industry || (industry === 'Wifi' && btn.textContent.includes('Wifi'))) {
                                btn.classList.remove('border-slate-200', 'text-slate-600');
                                btn.classList.add('border-indigo-600', 'bg-indigo-50', 'text-indigo-600');
                            } else {
                                btn.classList.add('border-slate-200', 'text-slate-600');
                                btn.classList.remove('border-indigo-600', 'bg-indigo-50', 'text-indigo-600');
                            }
                        });

                        document.getElementById('start-btn').disabled = false;
                    }

                    function startSimulation() {
                        document.getElementById('chat-setup').classList.add('hidden');
                        document.getElementById('chat-interface').classList.remove('hidden');
                        document.getElementById('chat-interface').classList.add('flex');
                        document.getElementById('selected-industry-text').textContent = selectedIndustry;
                        
                        // Clear previous messages except welcome
                        const chatMessages = document.getElementById('chat-messages');
                        while (chatMessages.children.length > 1) {
                            chatMessages.removeChild(chatMessages.lastChild);
                        }

                        setTimeout(() => document.getElementById('chat-input').focus(), 100);
                    }

                    async function sendMessage(e) {
                        e.preventDefault();
                        const input = document.getElementById('chat-input');
                        const message = input.value.trim();
                        const chatMessages = document.getElementById('chat-messages');
                        const sendBtn = document.getElementById('send-btn');

                        if (!message) return;

                        // Add user message
                        appendMessage('user', message);
                        input.value = '';
                        sendBtn.disabled = true;
                        messageCount++;

                        // Show typing indicator
                        const typingId = 'typing-' + Date.now();
                        appendTypingIndicator(typingId);

                        try {
                            const response = await fetch('{{ route("ai.chat") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ 
                                    message: message,
                                    industry: selectedIndustry
                                })
                            });

                            const data = await response.json();
                            
                            // Remove typing indicator
                            document.getElementById(typingId).remove();

                            if (response.ok) {
                                appendMessage('ai', data.reply);
                                
                                // Check for CTA trigger
                                if (messageCount >= 3) {
                                    setTimeout(() => {
                                        appendCTA();
                                    }, 1000);
                                }
                            } else {
                                appendMessage('ai', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
                                console.error('AI Error:', data);
                            }
                        } catch (error) {
                            document.getElementById(typingId).remove();
                            appendMessage('ai', 'Maaf, saya tidak dapat terhubung ke server saat ini.');
                            console.error('Network Error:', error);
                        } finally {
                            sendBtn.disabled = false;
                            input.focus();
                        }
                    }

                    function appendMessage(role, text) {
                        const chatMessages = document.getElementById('chat-messages');
                        const div = document.createElement('div');
                        div.className = 'flex items-start gap-3 ' + (role === 'user' ? 'flex-row-reverse' : '');
                        
                        const avatar = role === 'ai' 
                            ? `<div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg></div>`
                            : `<div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 flex-shrink-0"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></div>`;

                        const bubbleClass = role === 'ai'
                            ? 'neu-flat rounded-tl-none border-white/50 text-slate-600'
                            : 'neu-pressed text-indigo-700 rounded-tr-none border border-indigo-100';

                        div.innerHTML = `
                            ${avatar}
                            <div class="${bubbleClass} p-3 rounded-2xl shadow-sm border text-sm max-w-[80%]">
                                ${text}
                            </div>
                        `;
                        
                        chatMessages.appendChild(div);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    }

                    function appendTypingIndicator(id) {
                        const chatMessages = document.getElementById('chat-messages');
                        const div = document.createElement('div');
                        div.id = id;
                        div.className = 'flex items-start gap-3';
                        div.innerHTML = `
                            <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="neu-flat p-4 rounded-2xl rounded-tl-none border-white/50 text-sm text-slate-600 flex gap-1">
                                <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce"></span>
                                <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                                <span class="w-2 h-2 bg-slate-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                            </div>
                        `;
                        chatMessages.appendChild(div);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    }

                    function appendCTA() {
                        const chatMessages = document.getElementById('chat-messages');
                        const div = document.createElement('div');
                        div.className = 'flex items-start gap-3';
                        div.innerHTML = `
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 flex-shrink-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            </div>
                            <div class="bg-green-50 p-4 rounded-2xl rounded-tl-none shadow-sm border border-green-100 text-sm text-slate-700 w-full">
                                <p class="mb-3 font-medium">Tertarik mengimplementasikan solusi ini?</p>
                                <a href="https://wa.me/6282229046099?text=Halo%2C%20saya%20tertarik%20diskusi%20lebih%20lanjut%20mengenai%20solusi%20AI%20untuk%20industri%20${selectedIndustry}" target="_blank" class="block w-full py-2 bg-green-500 hover:bg-green-600 text-white text-center rounded-lg font-bold transition-colors">
                                    Diskusikan via WhatsApp
                                </a>
                            </div>
                        `;
                        chatMessages.appendChild(div);
                        chatMessages.scrollTop = chatMessages.scrollHeight;

                        // Disable input and button
                        const input = document.getElementById('chat-input');
                        const sendBtn = document.getElementById('send-btn');
                        
                        input.disabled = true;
                        input.placeholder = "Sesi chat telah berakhir. Silakan lanjut ke WhatsApp.";
                        input.classList.add('bg-slate-100', 'cursor-not-allowed');
                        
                        sendBtn.disabled = true;
                        sendBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    }
                </script>

                <!-- Digital Marketing -->
                <a href="{{ route('digitalmarketing') }}" class="block group">
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 h-full flex flex-col">
                        <h3 class="text-xl font-bold mb-4 text-slate-800">{{ __('messages.digital_sub_3_title') }}</h3>
                        <p class="text-slate-500 mb-6">
                            {{ __('messages.digital_sub_3_desc') }}
                        </p>
                        <ul class="space-y-2 text-sm text-slate-600 mb-6">
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_3_list_1') }}</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_3_list_2') }}</li>
                            <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_3_list_3') }}</li>
                        </ul>
                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <span class="inline-flex items-center font-semibold text-indigo-600 group-hover:text-indigo-700 transition-colors">
                                {{ __('messages.learn_more') }}
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-800">{{ __('messages.footer_cta_title') }}</h2>
            <p class="text-slate-500 text-lg mb-12 max-w-2xl mx-auto">
                {{ __('messages.footer_cta_desc') }}
            </p>
            
            <div class="flex justify-center">
                <!-- WhatsApp -->
                <a href="https://wa.me/6282229046099" target="_blank" class="neu-btn px-8 py-4 font-bold text-indigo-600 inline-flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    {{ __('messages.footer_cta_btn') }}
                </a>
            </div>
        </div>
    </section>
</x-layout>