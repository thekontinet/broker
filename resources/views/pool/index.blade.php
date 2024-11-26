<x-app-layout>
    <h1 class="text-lg font-semibold">Staking Pool</h1>

    <div class="grid grid-cols-3 shadow rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
        @foreach($pools as $pool)
        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 space-y-3">
            <div class="flex justify-between">
                <h4 class="font-bold text-lg dark:text-gray-100">{{ $pool->name }}</h4>
                <div>
                    <h6 class="text-sm">Duration:</h6>
                    <span class="text-xs">{{ strtoupper($pool->duration) }} days</span>
                </div>
            </div>

            <div>
                <h6 class="text-sm">End date:</h6>
                <span class="text-xs">{{ $pool->end_date }}</span>
            </div>

            <div x-data="{open:@js($errors->has('amount') ?? true)}">
                <x-ui.primary-button @click="open=true" x-show="open==false" class="justify-center w-full">Stake</x-ui.primary-button>

                {{-- Deposit Form --}}
                <x-ui.form x-show="open==true" action="{{ route('stakes.store') }}" method="POST">
                    <x-ui.text-input type="number" name="amount" label="Amount" required />
                    <x-ui.text-input type="hidden" value="{{ $pool->id }}" name="pool_id" required />
                    <div class="flex items-center justify-between gap-1">
                        <x-ui.primary-button class="justify-center mt-4 w-full">Deposit</x-ui.primary-button>
                        <x-ui.secondary-button @click="open=false" class="justify-center mt-4 w-full">Cancel</x-ui.secondary-button>
                    </div>
                </x-ui.form>

            </div>

        </div>
        @endforeach

        @foreach($stakes as $stake)
        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 space-y-3">
            <div class="flex justify-between">
                <h4 class="font-bold text-lg dark:text-gray-100">{{ $stake->pool->name }}</h4>
                <div>
                    <h6 class="text-sm">Duration:</h6>
                    <span class="text-xs">{{ strtoupper($stake->pool->duration) }} days</span>
                </div>
            </div>

            <div>
                <h6 class="text-sm">End date:</h6>
                <span class="text-xs">{{ $stake->pool->end_date }}</span>
            </div>

            <div x-data="{open:@js($errors->has('amount') ?? true)}">
                @if($stake->pool->end_date->isPast())                    
                    <x-ui.form action="{{ route('stakes.destroy', $stake->pool->id) }}" method="DELETE">
                        <x-ui.primary-button name="withdraw" class="justify-center w-full">Withdraw</x-ui.primary-button>
                    </x-ui.form>
                @endif

            </div>

        </div>
        @endforeach
    </div>
</x-app-layout>