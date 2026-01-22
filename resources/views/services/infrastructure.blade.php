<x-layout title="{{ __('messages.service_infrastructure_title') }} - {{ config('app.name') }}" description="{{ __('messages.service_infrastructure_desc') }}">
    <!-- Hero Section -->
     <section class="relative pt-32 pb-4 md:pt-40 md:pb-6 overflow-hidden">
        <div class="absolute inset-0 w-full h-full bg-[#eef2f6]">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-purple-300/30 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative container mx-auto px-6 z-10">
            <!-- Breadcrumb (Modern) -->
            <div class="mb-10 animate-fade-in-up">
                <x-breadcrumb :paths="[__('messages.services') => '/#services']" :current="__('messages.service_infrastructure_title')" class="mb-0" />
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Text Column -->
                <div class="lg:w-7/12 text-left">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-50 border border-indigo-100 mb-8 animate-fade-in-up">
                        <span class="flex h-2 w-2 rounded-full bg-indigo-600 mr-3 animate-pulse"></span>
                        <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Network & IT Support</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold tracking-tight mb-6 text-slate-900 leading-[1.1] animate-fade-in-up">
                        {{ __('messages.service_infrastructure_title') }}
                    </h1>
                    <p class="text-base md:text-lg text-slate-500 mb-10 max-w-xl leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s">
                        {!! nl2br(e(__('messages.service_infrastructure_desc'))) !!}
                    </p>
                    <div class="flex flex-wrap gap-4 animate-fade-in-up" style="animation-delay: 0.4s">
                        <a href="https://wa.me/6282229046099" target="_blank" class="neu-btn px-8 py-3.5 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-all text-sm">
                            {{ __('messages.get_started') }}
                        </a>
                        <a href="#services-grid" class="neu-btn px-8 py-3.5 rounded-2xl bg-white text-indigo-600 font-bold hover:bg-slate-50 transition-all text-sm">
                             {{ __('messages.our_services') }}
                        </a>
                    </div>
                </div>
                <!-- Image Column -->
                <div class="lg:w-5/12 relative animate-fade-in-up" style="animation-delay: 0.6s">
                    <div class="neu-flat p-4 rounded-[2.5rem] relative z-10">
                        <img src="{{ asset('images/service-infra-3d.png') }}" alt="IT Infrastructure Indonesia" class="w-full h-full object-cover rounded-[2rem] shadow-sm">
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-8 -right-8 w-32 h-32 bg-cyan-400/20 rounded-full blur-2xl z-0"></div>
                    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-indigo-400/20 rounded-full blur-2xl z-0"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Services -->
    <section id="services-grid" class="py-24 bg-[#eef2f6]">
        <div class="container mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-slate-800">{{ __('messages.infrastructure_services_title') }}</h2>
                <p class="text-slate-500 text-lg max-w-3xl mx-auto">{{ __('messages.infrastructure_services_subtitle') }}</p>
            </div>


            <div class="grid md:grid-cols-3 gap-8">
                <!-- Network Installation -->
                <a href="{{ route('services.network') }}" class="neu-flat rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 overflow-hidden group flex flex-col h-full">
                    <!-- Image -->
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1520869562399-e772f042f422?w=800&q=80" alt="WiFi Network" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="inline-flex items-center justify-center p-2 rounded-xl neu-pressed bg-cyan-500/20 text-cyan-300 mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.infrastructure_sub_1_title') }}</h3>
                        <p class="text-slate-500 mb-6 leading-relaxed">
                            {{ __('messages.infrastructure_sub_1_desc') }}
                        </p>
                        
                        <!-- Features List -->
                        <ul class="space-y-3 text-sm text-slate-600 mb-6">
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_1_list_1') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_1_list_2') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_1_list_3') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Monitoring & troubleshooting 24/7</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Dokumentasi lengkap & training</span></li>
                        </ul>

                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <span class="inline-flex items-center font-semibold text-indigo-600 group-hover:text-indigo-700 transition-colors">
                                {{ __('messages.learn_more') }}
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Server Maintenance -->
                <a href="{{ route('services.server') }}" class="neu-flat rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 overflow-hidden group flex flex-col h-full">
                    <!-- Image -->
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=800&q=80" alt="Server Maintenance" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="inline-flex items-center justify-center p-2 rounded-xl neu-pressed bg-blue-500/20 text-blue-300 mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.infrastructure_sub_2_title') }}</h3>
                        <p class="text-slate-500 mb-6 leading-relaxed">
                            {{ __('messages.infrastructure_sub_2_desc') }}
                        </p>
                        
                        <!-- Features List -->
                        <ul class="space-y-3 text-sm text-slate-600 mb-6">
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_2_list_1') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_2_list_2') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_2_list_3') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Backup & disaster recovery plan</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Performance optimization</span></li>
                        </ul>

                        <div class="mt-auto pt-4 border-t border-slate-100">
                            <span class="inline-flex items-center font-semibold text-indigo-600 group-hover:text-indigo-700 transition-colors">
                                {{ __('messages.learn_more') }}
                                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- IP PABX & CCTV -->
                <a href="{{ route('services.security') }}" class="neu-flat rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 overflow-hidden group flex flex-col h-full">
                    <!-- Image -->
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1557597774-9d273605dfa9?w=800&q=80" alt="Security Systems" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="inline-flex items-center justify-center p-2 rounded-xl neu-pressed bg-purple-500/20 text-purple-300 mb-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-3 text-slate-800">{{ __('messages.infrastructure_sub_3_title') }}</h3>
                        <p class="text-slate-500 mb-6 leading-relaxed">
                            {{ __('messages.infrastructure_sub_3_desc') }}
                        </p>
                        
                        <!-- Features List -->
                        <ul class="space-y-3 text-sm text-slate-600 mb-6">
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_3_list_1') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_3_list_2') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>{{ __('messages.infrastructure_sub_3_list_3') }}</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Cloud storage & remote access</span></li>
                            <li class="flex items-start"><svg class="w-5 h-5 mr-2 text-cyan-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>AI-powered analytics</span></li>
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

            <!-- Why Choose Us Section -->
            <div class="mt-32">
                <div class="text-center mb-12">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4 text-slate-800">{{ __('messages.infrastructure_why_title') }}</h3>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">{{ __('messages.infrastructure_why_subtitle') }}</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Certified Team -->
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-cyan-300 transition-all duration-300 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent rounded-2xl blur-xl group-hover:blur-2xl transition-all"></div>
                            <div class="relative flex flex-col items-center text-center">
                                <div class="w-20 h-20 rounded-2xl neu-pressed flex items-center justify-center mb-6 bg-gradient-to-br from-cyan-500/20 to-cyan-600/20 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <h4 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.infrastructure_why_1_title') }}</h4>
                                <p class="text-slate-500 leading-relaxed">{{ __('messages.infrastructure_why_1_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Fast Response -->
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-indigo-300 transition-all duration-300 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent rounded-2xl blur-xl group-hover:blur-2xl transition-all"></div>
                            <div class="relative flex flex-col items-center text-center">
                                <div class="w-20 h-20 rounded-2xl neu-pressed flex items-center justify-center mb-6 bg-gradient-to-br from-indigo-500/20 to-indigo-600/20 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h4 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.infrastructure_why_2_title') }}</h4>
                                <p class="text-slate-500 leading-relaxed">{{ __('messages.infrastructure_why_2_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Best Price -->
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-purple-300 transition-all duration-300 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent rounded-2xl blur-xl group-hover:blur-2xl transition-all"></div>
                            <div class="relative flex flex-col items-center text-center">
                                <div class="w-20 h-20 rounded-2xl neu-pressed flex items-center justify-center mb-6 bg-gradient-to-br from-purple-500/20 to-purple-600/20 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.infrastructure_why_3_title') }}</h4>
                                <p class="text-slate-500 leading-relaxed">{{ __('messages.infrastructure_why_3_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Warranty -->
                    <div class="neu-flat p-8 rounded-3xl border border-white/50 hover:border-cyan-300 transition-all duration-300 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/10 to-transparent rounded-2xl blur-xl group-hover:blur-2xl transition-all"></div>
                            <div class="relative flex flex-col items-center text-center">
                                <div class="w-20 h-20 rounded-2xl neu-pressed flex items-center justify-center mb-6 bg-gradient-to-br from-cyan-500/20 to-cyan-600/20 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-10 h-10 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="text-xl font-bold text-slate-800 mb-3">{{ __('messages.infrastructure_why_4_title') }}</h4>
                                <p class="text-slate-500 leading-relaxed">{{ __('messages.infrastructure_why_4_desc') }}</p>
                            </div>
                        </div>
                    </div>
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
