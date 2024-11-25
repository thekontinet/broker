@props(['transactions'])
<div {{$attributes}}>
    <ul>
        <li class="font-bold py-4 dark:neutral-100">All Transactions</li>
        @forelse($transactions as $transaction)
            <li class="flex justify-between items-center py-4 border-b dark:border-neutral-800">
                <div class="dark:text-neutral-500">
                    <p class="text-sm dark:text-neutral-100 font-bold">{{ $transaction->description }}</p>
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
</div>
