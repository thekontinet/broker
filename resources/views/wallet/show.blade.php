<x-app-layout>
    <section class="flex flex-col md:flex-row lg:items-center gap-2">
        <x-block.wallet-card :wallet="$wallet" class="flex-1 order-2 md:order-1 max-w-4xl"/>
        @if($wallet->slug !== 'usdt')
            <div class="order-1 md:order-2">
                <x-block.tradingview-single-ticker :asset="$wallet->asset"/>
            </div>
        @endif
    </section>

    <section class="my-8 max-w-4xl">
        <x-block.transaction-list :transactions="$transactions" />
    </section>
</x-app-layout>
