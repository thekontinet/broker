<x-ui.form action="{{ route('orders.store') }}" method="post" x-data="{trade: 'limit'}">
    <input type="hidden" name="asset_id" value="{{old('asset_id', $asset->id)}}">
    <x-ui.select name="trade" x-model="trade">
        <option value="limit">Limit</option>
        <option value="market">Market</option>
    </x-ui.select>

    <x-ui.text-input type="number" name="price" x-show="trade === 'limit'" placeholder="price" value="{{old('price', $asset->price)}}" required/>

    <div class="my-2">
        <span class="text-xs block text-right py-1">Bal: {{money($wallet->balanceFloat, $wallet->currency)}}</span>
        <x-ui.text-input type="number" name="amount" placeholder="Amount" value="{{ old('amount') }}" required/>
    </div>

    <div class="flex items-center gap-2">
        <x-ui.primary-button name="type" value="buy" class="justify-between w-full" variant="success">
            Buy
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M4.22 11.78a.75.75 0 0 1 0-1.06L9.44 5.5H5.75a.75.75 0 0 1 0-1.5h5.5a.75.75 0 0 1 .75.75v5.5a.75.75 0 0 1-1.5 0V6.56l-5.22 5.22a.75.75 0 0 1-1.06 0Z" clip-rule="evenodd" />
            </svg>
        </x-ui.primary-button>
        <x-ui.primary-button name="type" value="sell" class="w-full justify-between" variant="danger">
            Sell
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M4.22 4.22a.75.75 0 0 0 0 1.06l5.22 5.22H5.75a.75.75 0 0 0 0 1.5h5.5a.75.75 0 0 0 .75-.75v-5.5a.75.75 0 0 0-1.5 0v3.69L5.28 4.22a.75.75 0 0 0-1.06 0Z" clip-rule="evenodd" />
            </svg>
        </x-ui.primary-button>
    </div>
</x-ui.form>
