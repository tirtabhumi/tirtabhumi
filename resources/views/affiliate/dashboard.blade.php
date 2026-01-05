<x-layout-upventure title="Affiliate Dashboard">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Affiliate Dashboard
                </h2>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Withdraw Funds
                    </button>
                </span>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 mb-10">
            <div class="bg-white overflow-hidden shadow rounded-lg border border-slate-200">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Total Earnings
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        Rp {{ number_format($affiliate->balance, 0, ',', '.') }}
                    </dd>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg border border-slate-200">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Pending Commissions
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        Rp 0
                    </dd>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow rounded-lg border border-slate-200">
                <div class="px-4 py-5 sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">
                        Total Clicks
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">
                        {{ $affiliate->links->sum('clicks') }}
                    </dd>
                </div>
            </div>
        </div>

        <!-- Link Generator -->
        <div class="bg-white shadow sm:rounded-lg mb-10 border border-slate-200">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Generate Referral Link
                </h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 mb-5">
                    <p>Select an item to promote and generate your unique referral link.</p>
                </div>
                <form class="mt-5 sm:flex sm:items-center" action="{{ route('affiliate.url') }}" method="POST">
                    @csrf
                    <div class="w-full sm:max-w-xs">
                        <label for="item_type" class="sr-only">Type</label>
                        <select id="item_type" name="item_type" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="training">Class / Workshop</option>
                            <option value="webinar">Webinar</option>
                        </select>
                    </div>
                    <div class="w-full sm:max-w-xs sm:ml-3 mt-3 sm:mt-0">
                        <label for="item_id" class="sr-only">Item ID</label>
                         <!-- Ideally this would be a search or dropdown populated via AJAX -->
                        <input type="number" name="item_id" id="item_id" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Item ID (e.g. 1)">
                    </div>
                    <button type="submit" class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Generate
                    </button>
                </form>
            </div>
        </div>

        <!-- Active Links Table -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Item ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Referral Code
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Clicks
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Link
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($affiliate->links as $link)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ ucfirst($link->item_type) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $link->item_id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-600">
                                            {{ $link->code }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $link->clicks }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="bg-gray-100 px-2 py-1 rounded text-xs select-all">
                                                {{ url('/ref/' . $link->code) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            No links generated yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout-upventure>
