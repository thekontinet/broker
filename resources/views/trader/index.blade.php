<x-app-layout>
    <x-slot name="title">Traders</x-slot>

    <div class="grid grid-cols-3 gap-5">
        @forelse ($traders as $trader)
            <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                <img src="{{$trader->image}}" alt="profile" class="size-20 mb-4 rounded-full">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $trader->name }}</h3>
                <ul class="text-sm">
                    <li class="flex justify-between items-center">
                        <strong>Win Rate:</strong>
                        <span>{{$trader->win_rate}}%</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <strong>Profit Share:</strong>
                        <span>{{$trader->profit_share}}%</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <strong>Wins:</strong>
                        <span>{{$trader->wins}}</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <strong>Losses:</strong>
                        <span>{{$trader->losses}}</span>
                    </li>
                </ul>

                <div class="flex justify-center gap-4">
                    <x-ui.guage-bar :value="$trader->win_rate" label="Win Rate" size="md" color="success"/>
                </div>

                <div class="mt-4">
                    @if(!$trader->users->contains(auth()->user()))
                        <x-ui.form action="{{route('traders.store')}}" method="post">
                            <x-ui.primary-button name="trader_id" value="{{$trader->id}}" class="w-full justify-center">Copy</x-ui.primary-button>
                        </x-ui.form>
                    @else
                        <x-ui.form action="{{route('traders.destroy', $trader)}}" method="delete">
                            <x-ui.danger-button class="w-full justify-center">Stop Copying</x-ui.danger-button>
                        </x-ui.form>
                    @endif
                </div>
            </div>
        @empty
            <div class="min-h-60 col-span-full flex flex-col bg-white rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-10 text-gray-500 dark:text-neutral-500">
                        <path d="M8 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM3.156 11.763c.16-.629.44-1.21.813-1.72a2.5 2.5 0 0 0-2.725 1.377c-.136.287.102.58.418.58h1.449c.01-.077.025-.156.045-.237ZM12.847 11.763c.02.08.036.16.046.237h1.446c.316 0 .554-.293.417-.579a2.5 2.5 0 0 0-2.722-1.378c.374.51.653 1.09.813 1.72ZM14 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM3.5 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM5 13c-.552 0-1.013-.455-.876-.99a4.002 4.002 0 0 1 7.753 0c.136.535-.324.99-.877.99H5Z" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-800 dark:text-neutral-300">
                        No data to show
                    </p>
                </div>
            </div>
        @endforelse
    </div>
</x-app-layout>
