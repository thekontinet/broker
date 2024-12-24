<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>

    <section>
        <x-block.tradingview-ticker/>
    </section>

    <section class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4">
            @props(['wallet'])
            @if($user->subscription()->exists())
                <div class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="mt-1 text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
                            Trading Balance
                        </h3>

                        <p class="text-lg font-bold text-gray-800 dark:text-white">
                            {{money($user->subscription->total)}}
                        </p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                    </svg>
                </div>


                <!-- Progress -->
                <div class="my-2 text-gray-500 dark:text-neutral-400">
                    <div class="inline-block mb-2 py-0.5 px-1.5 bg-blue-50 border border-blue-200 text-xs font-medium text-blue-600 rounded-lg dark:bg-blue-800/30 dark:border-blue-800 dark:text-blue-500" style="margin-left: {{$user->subscription->strength}}%; transform: translateX(-{{$user->subscription->strength}}%)">
                        Signal: {{$user->subscription->strength}}%
                    </div>
                    <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700" role="progressbar" aria-valuenow="{{$user->subscription->strength}}" aria-valuemin="0" aria-valuemax="100">
                        <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500" style="width: {{$user->subscription->strength}}%"></div>
                    </div>
                </div>
                <!-- End Progress -->
                @if($user->subscription->end_date->isPast())
                    <x-ui.form action="{{ route('subscriptions.destroy', $user->subscription) }}" method="delete" class="flex gap-3 items-center">
                        <x-ui.secondary-button type="submit" class="justify-between w-full">
                            <span>Withdraw</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                <path d="M8.75 2.75a.75.75 0 0 0-1.5 0v5.69L5.03 6.22a.75.75 0 0 0-1.06 1.06l3.5 3.5a.75.75 0 0 0 1.06 0l3.5-3.5a.75.75 0 0 0-1.06-1.06L8.75 8.44V2.75Z" />
                                <path d="M3.5 9.75a.75.75 0 0 0-1.5 0v1.5A2.75 2.75 0 0 0 4.75 14h6.5A2.75 2.75 0 0 0 14 11.25v-1.5a.75.75 0 0 0-1.5 0v1.5c0 .69-.56 1.25-1.25 1.25h-6.5c-.69 0-1.25-.56-1.25-1.25v-1.5Z" />
                            </svg>
                        </x-ui.secondary-button>
                    </x-ui.form>
                @endif
            </div>
             @endif

        @foreach($wallets as $wallet)
            <x-block.wallet-card :wallet="$wallet"/>
        @endforeach
    </section>

    <section class="grid gap-4">
        <div>
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                    {
                        "colorTheme": "dark",
                        "dateRange": "12M",
                        "showChart": true,
                        "locale": "en",
                        "width": "100%",
                        "height": "700",
                        "largeChartUrl": "{{route('markets.index', 'crypto')}}",
                        "isTransparent": true,
                        "showSymbolLogo": true,
                        "showFloatingTooltip": false,
                        "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                        "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                        "gridLineColor": "rgba(42, 46, 57, 0)",
                        "scaleFontColor": "rgba(209, 212, 220, 1)",
                        "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                        "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                        "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                        "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                        "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                        "tabs": [
                        {
                            "title": "Crypto",
                            "symbols": @json($assets->map(fn($asset) => ['s' => "BYBIT:". strtoupper($asset->symbol) . "USDT"]))
                        }
                        {{--{
                            "title": "Stocks",
                            "symbols": [
                                {
                                    "s": "NASDAQ:NVDA"
                                },
                                {
                                    "s": "NASDAQ:TSLA"
                                },
                                {
                                    "s": "NASDAQ:AAPL"
                                },
                                {
                                    "s": "NASDAQ:MSTR"
                                },
                                {
                                    "s": "NASDAQ:AMZN"
                                },
                                {
                                    "s": "NASDAQ:MSFT"
                                },
                                {
                                    "s": "NASDAQ:META"
                                }
                            ],
                            "originalTitle": "Bonds"
                        },
                        {
                            "title": "Forex",
                            "symbols": [
                                {
                                    "s": "FX:EURUSD",
                                    "d": "EUR to USD"
                                },
                                {
                                    "s": "FX:GBPUSD",
                                    "d": "GBP to USD"
                                },
                                {
                                    "s": "FX:USDJPY",
                                    "d": "USD to JPY"
                                },
                                {
                                    "s": "FX:USDCHF",
                                    "d": "USD to CHF"
                                },
                                {
                                    "s": "FX:AUDUSD",
                                    "d": "AUD to USD"
                                },
                                {
                                    "s": "FX:USDCAD",
                                    "d": "USD to CAD"
                                }
                            ],
                            "originalTitle": "Forex"
                        } --}}
                    ]
                    }
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>
    </section>
</x-app-layout>
