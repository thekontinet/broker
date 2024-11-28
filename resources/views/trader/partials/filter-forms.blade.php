<div class="flex items-start justify-between">

    <!-- SORT BY TRADING STYLE AND ASSET SPECIALIZATION -->
    <div class="flex items-center gap-2">
        <x-ui.form method="GET" action="{{route('traders.index')}}" class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">
            <button id="hs-dropdown-hover-event" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                Asset specialization
                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-hover-event">
                <div class="p-1 space-y-0.5">
                    <button name="filter" value="crypto" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                        Crypto
                    </button>
                    <button name="filter" value="forex" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                        Forex
                    </button>
                    <button name="filter" value="stocks" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                        Stocks
                    </button>
                </div>
            </div>
        </x-ui.form>
        <x-ui.form method="GET" action="{{route('traders.index')}}" class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">
            <button id="hs-dropdown-hover-event" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                Trading style
                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-hover-event">
                <div class="p-1 space-y-0.5">
                    <button name="filter" value="aggressive" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                        Aggressive
                    </button>
                    <button name="filter" value="conservative" class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                        Conservative
                    </button>
                </div>
            </div>
        </x-ui.form>
    </div>

    <!-- FILTER BY FOLLOWERS AND PNL -->
    <x-ui.form action="{{route('traders.index')}}" method="GET">
        <div class="border-b-2 border-gray-200 dark:border-neutral-700">
            <nav class="-mb-0.5 flex gap-x-6">
                <button
                    name="filter"
                    value="followers"
                    class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 dark:focus:text-blue-500
                    {{ $query === 'followers' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500' }}">
                    Followers
                </button>

                <button name="filter" value="average_PnL" class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 dark:focus:text-blue-500
                    {{ $query === 'average_PnL' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500' }}">
                    PnL
                </button>
            </nav>
        </div>
    </x-ui.form>
</div>
