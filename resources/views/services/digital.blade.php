<x-layout title="{{ __('messages.service_digital_title') }} - {{ config('app.name') }}">
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 bg-[#eef2f6] overflow-hidden">
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-300/20 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
        </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <!-- Breadcrumb -->
            <nav class="flex justify-center mb-8 text-sm text-slate-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 bg-white/50 backdrop-blur-sm px-4 py-2 rounded-full border border-white/50 shadow-sm">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center hover:text-indigo-600 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            {{ __('messages.home') }}
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-slate-500 md:ml-2 font-medium">{{ __('messages.services') }}</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-slate-800 md:ml-2 font-medium">{{ __('messages.service_digital_title') }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

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
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                    <h3 class="text-xl font-bold mb-4 text-slate-800">{{ __('messages.digital_sub_1_title') }}</h3>
                    <p class="text-slate-500 mb-6">
                        {{ __('messages.digital_sub_1_desc') }}
                    </p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_1_list_1') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_1_list_2') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_1_list_3') }}</li>
                    </ul>
                </div>

                <!-- Automation & AI -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                    <h3 class="text-xl font-bold mb-4 text-slate-800">{{ __('messages.digital_sub_2_title') }}</h3>
                    <p class="text-slate-500 mb-6">
                        {{ __('messages.digital_sub_2_desc') }}
                    </p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_2_list_1') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_2_list_2') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_2_list_3') }}</li>
                    </ul>
                </div>

                <!-- Digital Marketing -->
                <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:-translate-y-1 transition-transform duration-300">
                    <h3 class="text-xl font-bold mb-4 text-slate-800">{{ __('messages.digital_sub_3_title') }}</h3>
                    <p class="text-slate-500 mb-6">
                        {{ __('messages.digital_sub_3_desc') }}
                    </p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_3_list_1') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_3_list_2') }}</li>
                        <li class="flex items-center"><svg class="w-4 h-4 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>{{ __('messages.digital_sub_3_list_3') }}</li>
                    </ul>
                </div>
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
