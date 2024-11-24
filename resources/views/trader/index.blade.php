<x-app-layout>
    <header class="space-y-4">
        <h1 classs="text-lg">Copy Trader</h1>

        <div class="w-full flex justify-between">
            <div class="flex items-center gap-2">
                @include('trader.partials.asset-spec-dropdown')
                @include('trader.partials.trading-style-dropdown')
            </div> @include('trader.partials.index-filter-form')
        </div>
    </header>

    <div class="grid grid-cols-2 gap-5">
        @if($traders->isEmpty())
        <p>No data to display</p>
        @else
        @foreach ($traders as $trader)
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="text-sm bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-neutral-900 dark:border-neutral-700">
                <div class="flex items-center justify-between mb-3">
                    <span class="flex items-center">
                        <img class="inline-block shrink-0 size-[48px] rounded-lg" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Avatar">
                        <div class="ms-3">
                            <h3 class="font-semibold text-gray-800 dark:text-white">{{$trader->name}}</h3>
                            <p class="text-sm font-medium text-gray-400 dark:text-neutral-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                    <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                                </svg>
                                Followers: {{$trader->followers}}/{{$trader->max_copiers}}
                            </p>
                        </div>
                    </span>
                    <p class="text-gray-800 font-bold dark:text-white text-right">
                        Asset Specialization
                        <span class="block capitalize font-normal text-gray-400 dark:text-neutral-500">{{$trader->specialization}}</span>
                    </p>
                </div>
                <p class="text-gray-800 text-right font-bold dark:text-white">
                    Trading Style
                    <span class="block capitalize font-normal text-gray-400 dark:text-neutral-500">{{$trader->trading_style}}</span>
                </p>
            </div>

            <div class="p-4 md:p-5">
                <div class="flex items-center text-sm justify-between mb-5">
                    <p class="text-gray-400 dark:text-neutral-500">Average PnL: <span class="font-bold text-gray-800 dark:text-white">{{ $trader->average_PnL }}</p>
                    <p class="text-gray-500 dark:text-neutral-400">
                        ROI: <span class="font-bold text-gray-800 dark:text-white">{{ $trader->ROI }}</span>
                    </p>
                </div>

                <div x-data="{open:false}">
                    <div class="mt-2 flex items-center justify-between gap-2">
                        <x-ui.link href="{{ route('traders.show', $trader->id) }}" class="w-full py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 focus:outline-none focus:border-blue-600 focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:text-blue-500 dark:focus:border-blue-600">
                            See more
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </x-ui.link>
                        <x-ui.primary-button @click="open=true" class="w-full justify-center">COPY</x-ui.primary-button>
                    </div>
                    <form x-show="open==true" action="" class="space-y-3 mt-5">
                        <x-ui.text-input type="number" name="amount" label="Amount" required />
                        <div class="text-sm space-y-2">
                            <label for="service_time" class="font-bold">Service time</label>
                            <select id="service_time" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option selected="">Choose a service time</option>
                                <option>One-time basis</option>
                                <option>Copy weekly</option>
                                <option>Copy monthly</option>
                            </select>
                        </div>
                        <div class="text-sm space-y-2">
                            <label for="risk_level" class="font-bold">Risk level</label>
                            <select id="risk_level" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option selected="">Choose a risk level</option>
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between gap-1 mt-5">
                            <x-ui.primary-button class="justify-center w-full">Deposit</x-ui.primary-button>
                            <x-ui.secondary-button @click="open=false" class="justify-center w-full">Cancel</x-ui.secondary-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
        @endif
    </div>
</x-app-layout>