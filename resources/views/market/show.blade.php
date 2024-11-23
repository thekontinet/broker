<x-app-layout>
    <header class="flex items-center">
        <h2 class="text-lg font-semibold py-2 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path d="M3 4.75a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6.25 3a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5h-7ZM6.25 7.25a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5h-7ZM6.25 11.5a.75.75 0 0 0 0 1.5h7a.75.75 0 0 0 0-1.5h-7ZM4 12.25a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM3 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
            </svg>
            {{ $symbol }}
        </h2>
    </header>

    <section class="grid gap-2 lg:grid-cols-12">
        <div class="lg:col-span-3">
            <div>
                <ul class="space-y-2 mb-8 px-2 py-4 border dark:border-neutral-800 shadow rounded-lg">
                    <li class="text-sm dark:text-neutral-100 font-medium">Order History</li>
                    @forelse($orders as $order)
                        <li class="p-2 border-b dark:border-neutral-800">
                            <div class="flex justify-between">
                                <p class="text-sm font-bold dark:text-neutral-200 mt-2">
                                    {{strtoupper($order->asset->symbol)}}USDT
                                    @if($order->isBuy())
                                        <span class="bg-green-200/30 text-green-400 p-1 rounded text-[.5rem]">Long</span>
                                    @else
                                        <span class="bg-red-200/30 text-red-400 p-1 rounded text-[.5rem]">Short</span>
                                    @endif
                                </p>
                                <p>
                                    <span class="text-[.7rem] dark:text-neutral-500">Unrealized P&L</span>
                                    @if($order->profit_and_loss_price < 0)
                                        <span class="text-sm block text-red-400">{{$order->profit_and_loss_price}} ({{$order->profit_and_loss_percentage}}%)</span>
                                    @else
                                        <span class="text-sm block text-green-400">{{$order->profit_and_loss_price}} (+{{$order->profit_and_loss_percentage}} %)</span>
                                    @endif
                                </p>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <p>
                                    <span class="text-[.7rem] dark:text-neutral-500">Value</span>
                                    <span class="text-xs block dark:text-neutral-200">{{ number_format($order->quantity, $asset->precision) }}</span>
                                </p>
                                <p>
                                    <span class="text-[.7rem] dark:text-neutral-500">Entry Price</span>
                                    <span class="text-xs block dark:text-neutral-200">{{ number_format($order->price, 2) }}</span>
                                </p>
                                <p>
                                    <span class="text-[.7rem] dark:text-neutral-500">Mark. Price</span>
                                    <span class="text-xs block dark:text-neutral-200">{{ number_format($order->asset->price, 2) }}</span>
                                </p>
                            </div>
                            <x-ui.form method="delete" action="{{ route('orders.destroy', $order) }}" class="mt-2" onsubmit="return confirm('Are you sure you want to close this trade ?')">
                                <x-ui.secondary-button type="submit" class="w-full justify-center">Close</x-ui.secondary-button>
                            </x-ui.form>
                        </li>
                    @empty
                        <li class="text-sm py-4 dark:text-neutral-700 text-center">No orders available</li>
                    @endforelse
                </ul>
            </div>
        </div>
       <div class="lg:col-span-6 lg:h-[70svh] h-[50svh] border dark:border-neutral-800 rounded-xl overflow-hidden">
           <x-block.tradingview-chart :asset="$asset"/>
       </div>
        <div class="lg:col-span-3">
            @include('market.partials.order-form')
        </div>
    </section>
</x-app-layout>
