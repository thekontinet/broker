<x-app-layout>
    <x-slot name="title">Withdraw</x-slot>
    <section class="max-w-xl" x-data="{currency:@js(request()->query('currency')), amount:0}">
        <x-ui.form class="space-y-8 w-full" method="post" action="{{route('withdraw.store')}}">
            <x-ui.select x-model="currency" name="currency" label="Select cryptocurrency">
                <option>Select Currency</option>
                @foreach($assets as $asset)
                    <option value="{{$asset->symbol}}" {{$asset->symbol === request()->query('currency') ? 'selected' : ''}}>{{ $asset->name }}</option>
                @endforeach
            </x-ui.select>

            <div>
                <x-ui.text-input type="text" name="amount" x-model="amount" placeholder="0.00" label="Amount">
                    <x-slot:suffix>
                        <button type="button" class="text-xs font-medium text-amber-500 relative z-50 pointer-events-auto" @click="amount = {{$wallet ? $wallet->balance_float : 0.00}}">Max</button>
                    </x-slot:suffix>
                </x-ui.text-input>
                <div class="text-xs font-bold text-right">
                    Balance: {{$wallet ? money($wallet->balance_float, $wallet->currency) : money(0, $wallet->currency)}}
                </div>
            </div>

            <div x-show="amount != 0">
                <x-ui.text-input label="Wallet Address" placeholder="Enter your wallet address" name="address" />
            </div>

            <div class="flex items-center gap-2 pt-4">
                <x-ui.primary-button class="w-full justify-center">Proceed</x-ui.primary-button>
                <x-ui.secondary-button href="{{route('wallets.index')}}" class="w-full justify-center">Cancel</x-ui.secondary-button>
            </div>
        </x-ui.form>

        <div  x-show="currency" class="bg-yellow-50 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4 dark:bg-yellow-800/10 dark:border-yellow-900 dark:text-yellow-500 mt-24" role="alert" tabindex="-1" aria-labelledby="hs-with-description-label">
            <div class="flex">
                <div class="shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                </div>
                <div class="ms-4">
                    <h3 id="hs-with-description-label" class="text-sm font-semibold">
                        Tips
                    </h3>
                    <div class="mt-1 text-sm text-yellow-700">
                        <ul class="list-disc space-y-4">
                            <li>Please ensure you input the correct wallet address before proceeding. Funds sent to an incorrect address cannot be recovered.</li>
                            <li>Ensure the wallet address is <span class="uppercase font-bold" x-text="currency"></span> wallet address.</li>
                            <li>Withdraws requires 1 confirmation(s) on the  blockchain, it will be available on your wallet after 3 confirmations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
