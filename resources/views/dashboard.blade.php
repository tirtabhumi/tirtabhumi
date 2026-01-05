<x-layout-upventure title="Dashboard">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-600 mb-6">Here is your dashboard overview.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- My Classes -->
                        <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100">
                            <h3 class="font-semibold text-lg text-indigo-900 mb-2">My Classes</h3>
                            <p class="text-3xl font-bold text-indigo-700">0</p>
                            <a href="{{ route('trainings.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 mt-2 inline-block">Browse Classes &rarr;</a>
                        </div>

                        <!-- My Webinars -->
                        <div class="bg-purple-50 p-6 rounded-xl border border-purple-100">
                            <h3 class="font-semibold text-lg text-purple-900 mb-2">My Webinars</h3>
                            <p class="text-3xl font-bold text-purple-700">0</p>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-800 mt-2 inline-block">Browse Webinars &rarr;</a>
                        </div>

                        <!-- Affiliate Stats (If applicable) -->
                        @if(Auth::user()->isAffiliate())
                            <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                                <h3 class="font-semibold text-lg text-green-900 mb-2">Affiliate Balance</h3>
                                <p class="text-3xl font-bold text-green-700">Rp {{ number_format(Auth::user()->affiliate->balance ?? 0, 0, ',', '.') }}</p>
                                <a href="/affiliate" class="text-sm text-green-600 hover:text-green-800 mt-2 inline-block">Go to Affiliate Dashboard &rarr;</a>
                            </div>
                        @else
                            <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                                <h3 class="font-semibold text-lg text-slate-900 mb-2">Join Affiliate</h3>
                                <p class="text-sm text-slate-600 mb-3">Earn commissions by sharing classes.</p>
                                <a href="#" class="text-sm font-medium text-white bg-slate-800 px-3 py-2 rounded-lg hover:bg-slate-900 inline-block">Join Program</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-upventure>
