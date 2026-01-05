<x-layout-upventure title="Verify Email">
    <div class="min-h-screen flex flex-col justify-center items-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-800">
                Verify your email
            </h2>
            <p class="mt-2 text-center text-sm text-slate-500">
                Please check your email inbox to verify your account.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                @if (session('message'))
                    <div class="mb-4 text-sm font-medium text-green-600">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="text-sm text-slate-600">
                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email,
                    <form class="inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="text-indigo-600 hover:text-indigo-500 font-medium focus:outline-none focus:underline transition duration-150 ease-in-out">
                            click here to request another
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout-upventure>
