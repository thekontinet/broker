<x-app-layout>
    <header class="flex items-center">
        <h2 class="text-lg font-semibold py-2">Market</h2>
        <div class="border-b-2 border-gray-200 dark:border-neutral-700 ms-auto">
{{--            <nav class="-mb-0.5 flex gap-x-6">--}}
{{--                <a class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500 active" href="{{ route('markets.index', \App\Enums\AssetTypeEnum::CRYPTO->value) }}" aria-current="page">--}}
{{--                    Crypto--}}
{{--                </a>--}}
{{--                <a class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{ route('markets.index', \App\Enums\AssetTypeEnum::FOREX->value) }}">--}}
{{--                    Forex--}}
{{--                </a>--}}
{{--                <a class="py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{ route('markets.index', \App\Enums\AssetTypeEnum::STOCK->value) }}">--}}
{{--                    Stocks--}}
{{--                </a>--}}
{{--            </nav>--}}
        </div>
    </header>

    <div class="flex flex-col bg-white shadow-sm rounded dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 overflow-hidden">
        @foreach($assets as $asset)
            <div class="flex items-center border border-neutral-800 mb-2 hover:bg-neutral-800 px-2 py-2 rounded-lg">
                <div class="flex flex-1 relative">
                    <img src="{{ $asset->image }}" alt="logo" class="w-6 h-6 me-2 rounded-full">
                    <div class="relative">
                        <h4 class="font-medium text-sm dark:text-gray-100">{{ $asset->name }}</h4>
                        <p class="text-xs">{{ strtoupper($asset->symbol) }}</p>
                    </div>
                    <a href="{{ route('markets.show', $asset) }}" class="absolute inset-0"></a>
                </div>

                <div class="max-w-[100px] ms-autos">
                    <p class="text-sm dark:text-gray-100">{{ money($asset->price ?? 0) }}</p>
                    <p class="{{($asset->price_change_percentage24h >= 0) ? 'text-green-500' : 'text-red-500'}} text-xs">
                        {{($asset->price_change_percentage24h >= 0) ? '+' : '-'}}
                        {{ number_format(abs($asset->price_change_percentage24h), 2) }}%
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
