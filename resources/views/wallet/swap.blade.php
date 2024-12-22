<x-app-layout>
    <x-slot:title>Swap</x-slot:title>

    <section>
        <x-ui.form :action="route('swap.store')" method="post" class="space-y-6 max-w-xl">
            <input type="hidden" name="from" label="From" value="{{$asset->symbol}}" />

            <x-ui.text-input label="From" :value="$asset->name" readonly />

            <x-ui.select label="To" name="to">
                @foreach($assets as $asset)
                    <option value="{{$asset->symbol}}" {{old('to') === $asset->symbol ? 'selected' : null}}>{{ $asset->name }}</option>
                @endforeach
            </x-ui.select>

            <div x-data="{amount: 0}">
                <x-ui.text-input label="Amount" name="amount" placeholder="0.00" x-model="amount" value="{{ old('amount') }}" class="relative z-10">
                    <x-slot:suffix>
                        <button type="button" class="text-xs font-medium text-amber-500 relative z-50 pointer-events-auto" @click="amount = {{$wallet ? $wallet->balance_float : 0.00}}">Max</button>
                    </x-slot:suffix>
                </x-ui.text-input>
                <div class="text-right">
                    <span class="font-bold text-xs dark:text-white">Balance: {{$wallet ? $wallet->balance_float : 0.00}}</span>
                </div>
            </div>

            <x-ui.primary-button>Proceed</x-ui.primary-button>
        </x-ui.form>
    </section>
</x-app-layout>
