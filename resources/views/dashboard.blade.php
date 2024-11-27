<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <section>
        <x-block.tradingview-ticker/>
    </section>

    <section class="grid lg:grid-cols-2 gap-4">
        @props(['wallet'])
        <div class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="mt-1 text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                        Trading Balance
                    </h3>

                    <p class="text-lg font-bold text-gray-800 dark:text-white">
                        $400.00
                    </p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                </svg>
            </div>

            <p class="my-2 text-gray-500 dark:text-neutral-400">
                <!-- Progress -->
                <div>
                    <div class="inline-block mb-2 py-0.5 px-1.5 bg-blue-50 border border-blue-200 text-xs font-medium text-blue-600 rounded-lg dark:bg-blue-800/30 dark:border-blue-800 dark:text-blue-500" style="margin-left: 50%; transform: translateX(-100%)">Trading Signal: 25%</div>
                    <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: 50%"></div>
                    </div>
                </div>
                <!-- End Progress -->
            </p>
        </div>

        @foreach($wallets as $wallet)
            <x-block.wallet-card :wallet="$wallet"/>
        @endforeach
    </section>
</x-app-layout>
