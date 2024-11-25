<x-app-layout>
    <h1 class="text-lg font-semibold">Staking Pool</h1>

    <div class="grid grid-cols-3 shadow rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
        @foreach($stakes as $stake)
        <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 space-y-3">
            <div class="flex justify-between">
                <h4 class="font-bold text-lg dark:text-gray-100">{{ $stake->name }}</h4>
                <div>
                    <h6 class="text-sm">Duration:</h6>
                    <span class="text-xs">{{ strtoupper($stake->duration) }} days</span>
                </div>
            </div>

            <div>
                <h6 class="text-sm">End date:</h6>
                <span class="text-xs">{{ $stake->end_date }}</span>
            </div>

            <div x-data="{open:false}">
                <x-ui.primary-button @click="open=true" x-show="open==false" class="justify-center w-full">Stake</x-ui.primary-button>

                <form x-show="open==true" action="">
                    <x-ui.text-input type="number" name="amount" label="Amount" required />
                    <div class="flex items-center justify-between gap-1">
                        <x-ui.primary-button class="justify-center mt-4 w-full">Deposit</x-ui.primary-button>
                        <x-ui.secondary-button @click="open=false" class="justify-center mt-4 w-full">Cancel</x-ui.secondary-button>
                    </div>
                </form>
            </div>

        </div>
        @endforeach
    </div>
</x-app-layout>
