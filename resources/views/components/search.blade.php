<form method="GET" action={{ $action }}>
    <div class="relative">
        <input type="search" name="query" value="{{ request('query') }}"
            class="block p-2.5 w-full z-20 text-sm border-gray-200 text-gray-900 bg-gray-50 rounded-lg focus:border-blue-500"
            placeholder="Zoeken">
        <button type="submit"
            class="absolute top-0 right-0 h-full p-2.5 text-sm font-medium text-white bg-gray-700 rounded-r-lg border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none">
            <div class="flex">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
        </button>
    </div>
</form>
