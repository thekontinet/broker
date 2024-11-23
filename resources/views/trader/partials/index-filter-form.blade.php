<form action="{{route('traders.index')}}" method="get">
    <div class="border-b-2 border-gray-200 dark:border-neutral-700">
        <nav class="-mb-0.5 flex gap-x-6">
            <button
                name="filter"
                value="followers"
                class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 dark:focus:text-blue-500 
        {{ $query === 'followers' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500' }}">
                Followers
            </button>

            <button name="filter" value="PnL" class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap focus:outline-none focus:text-blue-600 dark:focus:text-blue-500 
            {{ $query === 'PnL' ? 'text-blue-600 dark:text-blue-500' : 'text-gray-500 hover:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500' }}">
                PnL
            </button>
        </nav>
    </div>
</form>