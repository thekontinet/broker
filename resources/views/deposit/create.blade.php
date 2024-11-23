<x-app-layout>
    <div class="h-24"></div>
    <section class="max-w-sm mx-auto bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
        <h4 class="text-lg font-bold mb-4">Select a currency and enter amount to deposit</h4>
        <x-ui.form class="space-y-4 w-full" method="post" action="{{route('deposit.store')}}">
            <x-ui.select name="currency">
                @foreach($assets as $asset)
                    <option value="{{$asset->id}}" {{$asset->symbol === request()->query('currency') ? 'selected' : ''}}>{{ $asset->name }}</option>
                @endforeach
            </x-ui.select>
            <x-ui.text-input name="amount" placeholder="0.00"/>
            <div class="flex items-center gap-2 pt-4">
                <x-ui.primary-button class="w-full justify-center">Proceed</x-ui.primary-button>
                <x-ui.secondary-button href="{{route('wallets.index')}}" class="w-full justify-center">Cancel</x-ui.secondary-button>
            </div>
        </x-ui.form>
    </section>
</x-app-layout>
