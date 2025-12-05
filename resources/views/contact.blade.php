<x-layout>
    <x-slot:title>{{ __('messages.contact') }}</x-slot:title>

    <!-- Contact Content -->
    <section class="py-24 bg-[#eef2f6] relative overflow-hidden min-h-screen flex items-center">
        <!-- Background Blobs -->
        <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none">
             <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
             <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
             <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <!-- Unified Container -->
            <div class="neu-flat p-8 md:p-12 rounded-[2.5rem] border border-white/50 relative overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                    <!-- Left Column: Header & Contact Info -->
                    <div class="space-y-12 animate-fade-in-up">
                        <!-- Header -->
                        <div>
                            <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">{{ __('messages.contact_us') }}</h1>
                            <p class="text-lg text-slate-500 leading-relaxed">
                                {{ __('messages.footer_cta_desc') }}
                            </p>
                        </div>

                        <!-- Contact Info -->
                        <div>
                            <h3 class="text-2xl font-bold text-slate-800 mb-8">{{ __('messages.connect') }}</h3>
                            
                            <div class="space-y-8">
                                <!-- Address -->
                                <div class="flex items-start gap-4 group">
                                    <div class="w-12 h-12 shrink-0 neu-pressed rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 mb-1">{{ __('messages.contact_office') }}</h4>
                                        <p class="text-slate-500 text-sm leading-relaxed">
                                            Perumahan Klipang Pesona Asri Residence No.Kav 81,<br>
                                            Sendangmulyo, Kec. Tembalang, Kota Semarang, Jawa Tengah 50272
                                        </p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="flex items-start gap-4 group">
                                    <div class="w-12 h-12 shrink-0 neu-pressed rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 mb-1">{{ __('messages.contact_phone_wa') }}</h4>
                                        <p class="text-slate-500 text-sm">
                                            <a href="https://wa.me/6282229046099" class="hover:text-indigo-600 transition-colors">+62 822-2904-6099</a>
                                        </p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-start gap-4 group">
                                    <div class="w-12 h-12 shrink-0 neu-pressed rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-800 mb-1">{{ __('messages.contact_email') }}</h4>
                                        <p class="text-slate-500 text-sm">
                                            <a href="mailto:hello@tirtabhumi.com" class="hover:text-indigo-600 transition-colors">hello@tirtabhumi.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media -->
                            <div class="mt-12 pt-12 border-t border-slate-200">
                                <h4 class="font-bold text-slate-800 mb-6">{{ __('messages.contact_follow_us') }}</h4>
                                <div class="flex gap-4">
                                    <!-- Instagram -->
                                    <a href="https://instagram.com/tirtabhumi" target="_blank" class="w-10 h-10 rounded-full neu-pressed flex items-center justify-center text-slate-600 hover:text-pink-600 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </a>
                                    <!-- Facebook -->
                                    <a href="https://facebook.com/tirtabhumiid" target="_blank" class="w-10 h-10 rounded-full neu-pressed flex items-center justify-center text-slate-600 hover:text-blue-600 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                                    </a>
                                    <!-- LinkedIn -->
                                    <a href="https://linkedin.com/company/pt-tirta-bhumi-indonesia" target="_blank" class="w-10 h-10 rounded-full neu-pressed flex items-center justify-center text-slate-600 hover:text-blue-700 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Form & CTAs -->
                    <div class="space-y-12 animate-fade-in-up animation-delay-200">
                        <!-- Contact Form -->
                        <div class="bg-white/50 rounded-3xl p-8 neu-pressed">
                            <h3 class="text-2xl font-bold text-slate-800 mb-6">{{ __('messages.contact_form_title') }}</h3>
                        
                            @if (session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                                    <span class="block sm:inline">{{ session('success') }}</span>
                                </div>
                            @endif

                            <form action="{{ route('contacts.store') }}" method="POST" class="space-y-5">
                                @csrf
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">{{ __('messages.contact_name') }}</label>
                                        <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-xl neu-pressed border-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all bg-[#eef2f6]" placeholder="{{ __('messages.contact_name_placeholder') }}">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">{{ __('messages.contact_email_label') }}</label>
                                        <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-xl neu-pressed border-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all bg-[#eef2f6]" placeholder="{{ __('messages.contact_email_placeholder') }}">
                                    </div>
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-bold text-slate-700 mb-2">{{ __('messages.contact_subject') }}</label>
                                    <input type="text" id="subject" name="subject" class="w-full px-4 py-3 rounded-xl neu-pressed border-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all bg-[#eef2f6]" placeholder="{{ __('messages.contact_subject_placeholder') }}">
                                </div>
                                <div>
                                    <label for="message" class="block text-sm font-bold text-slate-700 mb-2">{{ __('messages.contact_message') }}</label>
                                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 rounded-xl neu-pressed border-none focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all bg-[#eef2f6]" placeholder="{{ __('messages.contact_message_placeholder') }}"></textarea>
                                </div>
                                <button type="submit" class="w-full px-8 py-4 neu-btn font-bold text-indigo-600 hover:scale-[1.02] active:scale-[0.98] transition-all">
                                    {{ __('messages.contact_send_btn') }}
                                </button>
                            </form>
                        </div>

                        <!-- Quick Action CTAs -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <a href="https://wa.me/6282229046099" target="_blank" class="neu-btn px-6 py-4 flex items-center justify-center gap-2 text-green-600 font-bold hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 group">
                                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.017-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                {{ __('messages.contact_cta_whatsapp') }}
                            </a>
                            <a href="mailto:hello@tirtabhumi.com" class="neu-btn px-6 py-4 flex items-center justify-center gap-2 text-indigo-600 font-bold hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 group">
                                <svg class="w-5 h-5 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                {{ __('messages.contact_cta_email') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Optional) -->
    <section class="h-96 w-full bg-slate-200 relative">
        <iframe src="https://maps.google.com/maps?q=-7.031657042712186,110.47015121642238&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="grayscale hover:grayscale-0 transition-all duration-500"></iframe>
    </section>
</x-layout>
