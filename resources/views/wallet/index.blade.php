<x-app-layout>
    <x-slot name="title">Wallets</x-slot>
    <x-slot name="description">Manage all your wallets</x-slot>

    <section class="grid gap-4 md:grid-cols-3 2xl:grid-cols-4">
        @forelse($wallets as $wallet)
            <x-block.wallet-card :wallet="$wallet"/>
        @empty
            <div class="flex flex-col items-center justify-center h-[70svh] col-span-full">
                <h4>No wallet</h4>
                <p class="text-sm dark:text-neutral-500 text-center">You do not have any wallet account available. <br> A wallet is automatically created on your first deposit</p>
                <x-ui.link href="{{ route('deposit.create') }}" class="text-sm inline-block mt-2">Make your first deposit</x-ui.link>
            </div>
        @endforelse
    </section>

    <section class="my-8 max-w-4xl">
        <x-block.transaction-list :transactions="$transactions" />
    </section>
</x-app-layout>
