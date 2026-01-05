<x-layout-upventure title="Join Affiliate Program">
    <div class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-xl shadow-lg border border-slate-200 text-center">
            <div>
                <div class="mx-auto h-16 w-16 bg-indigo-100 rounded-full flex items-center justify-center">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Join UpVenture Affiliates
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Earn commissions by helping others learn. Get 10% commission on every successful referral.
                </p>
            </div>
            
            <form class="mt-8 space-y-6" action="{{ route('affiliate.join') }}" method="POST">
                @csrf
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Activate Affiliate Account
                </button>
            </form>
            
            <p class="text-xs text-slate-400 mt-4">
                By joining, you agree to our Affiliate Terms & Conditions.
            </p>
        </div>
    </div>
</x-layout-upventure>
