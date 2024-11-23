<x-app-layout>
    <section class="flex flex-col lg:items-center gap-2">
        <x-block.wallet-card :wallet="$wallet" class="flex-1"/>
        <div>
            <x-block.tradingview-single-ticker :asset="$wallet->asset"/>
        </div>
    </section>

    <section class="my-8">
        <ul>
            <li class="font-bold py-4 dark:neutral-100">All Transactions</li>
            @forelse($transactions as $transaction)
                <li class="flex justify-between items-center py-4">
                    <div>
                        <p class="text-sm dark:neutral-300 font-bold">{{ $transaction->description }}</p>
                        <p class="text-xs">{{ $transaction->created_at->format('Y-m-d h:i:s') }}</p>
                        <p class="text-xs">{{ ucfirst($transaction->type) }}</p>
                        <p class="text-xs">Txid: {{ ucfirst($transaction->uuid) }}</p>
                    </div>
                    <div>
                        @if($transaction->type === 'deposit')
                            <p class="text-green-500">{{ ($transaction->amountFloat) }}</p>
                        @else
                            <p class="text-red-500">{{ ($transaction->amountFloat) }}</p>
                        @endif

                            @if($transaction->confirmed)
                                <p class="text-gray-400 text-xs">confirmed</p>
                            @else
                                <p class="text-amber-500 text-xs">processing</p>
                            @endif
                    </div>
                </li>
            @empty
                <li class="py-12 text-center text-sm">No transaction available</li>
            @endforelse
        </ul>

        {{$transactions->links()}}
    </section>
</x-app-layout>
