@php
$addresses = $assets->pluck('address', 'symbol');
@endphp

<x-app-layout>
    <x-slot name="title">Deposit</x-slot>
    <section class="max-w-xl" x-data="{addresses: @js($addresses), currency:@js(request()->query('currency')), amount:0, prices: @js($assets->pluck('price', 'symbol')->toArray()), precisions: @js($assets->pluck('precision', 'symbol')->toArray()), images: @js($assets->pluck('image', 'symbol')->toArray())}">
        <x-ui.form class="space-y-8 w-full" method="post" action="{{route('deposit.store')}}">
            <x-ui.select x-model="currency" name="currency" label="Select cryptocurrency">
                <option>Select Currency</option>
                @foreach($assets as $asset)
                    <option value="{{$asset->symbol}}" {{$asset->symbol === request()->query('currency') ? 'selected' : ''}}>{{ $asset->name }}</option>
                @endforeach
            </x-ui.select>

            <x-ui.text-input type="text" x-model="amount" placeholder="0.00" label="Pay">
                <x-slot:prefix>
                    <span class="text-sm">$</span>
                </x-slot:prefix>
            </x-ui.text-input>

            <x-ui.text-input type="text" name="amount" label="Receive (estimate)" x-bind:value="Number(amount / prices[currency]).toFixed(precisions[currency])" readonly>
                <x-slot:prefix>
                    <img x-bind:src="images[currency]" alt="" class="w-6">
                </x-slot:prefix>
            </x-ui.text-input>

            <div x-show="addresses[currency] && amount != 0">
                <span class="block text-sm mb-2 dark:text-white">Wallet Address</span>
                <div class="flex justify-between items-center bg-white border border-gray-200 shadow-sm rounded-xl p-3 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    <span x-text="addresses[currency]" class="text-sm"></span>
                    <x-ui.secondary-button class="justify-between" data-copyable="rambam" x-init="
                        const clipboard = new Clipboard($el, { text: (trigger) => trigger.getAttribute('data-copyable')});
                        clipboard.on('success', (e) => {
                            $refs.text.textContent = 'Copied'
                            setTimeout(() => $refs.text.textContent = 'Copy', 1500)
                        });
                    ">
                        <span x-ref="text">Copy</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                        </svg>
                    </x-ui.secondary-button>
                </div>
            </div>

            <div class="flex items-center gap-2 pt-4">
                <x-ui.primary-button class="w-full justify-center">Proceed</x-ui.primary-button>
                <x-ui.secondary-button href="{{route('wallets.index')}}" class="w-full justify-center">Cancel</x-ui.secondary-button>
            </div>
        </x-ui.form>

        <div x-show="currency" class="bg-yellow-50 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4 dark:bg-yellow-800/10 dark:border-yellow-900 dark:text-yellow-500 mt-24" role="alert" tabindex="-1" aria-labelledby="hs-with-description-label">
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
                            <li>Please ensure you copy the correct address before making a deposit. Deposits sent to an incorrect address cannot be recovered or refunded.</li>
                            <li>If you send any other crypto except <span class="uppercase font-bold" x-text="currency"></span>, you won't be able to get it back.</li>
                            <li>Deposit requires 1 confirmation(s) on the  blockchain, it will be available on your balance after 3 confirmations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
